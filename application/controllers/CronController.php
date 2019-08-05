#!/usr/bin/php
<?php 

class CronController {
    public $pv, $uu, $connect, $date, $pureDate, $totalRow, $cvr;

    public function __construct() {
        $this->pv = 0;
        $this->uu = 0;
        $this->connect = mysqli_connect("localhost", "root", "rootroot", "ec");
    }
    
    public function formatDate()
    {
        $today = date("w");

        // today 6 or 0 -> saturday, sunday
        if($today == 0 || $today == 6) { return; }

        /**
         * 1 ~ 5 
         * WeekDay
         */
        
        // current date 
        $date = date("Y-m-d");
        // current date days -1
        // But Monday is days -3
        // Monday send Friday Info  
        if($today == 1) {
            $timestamp = strtotime("-3 days");
        } else {
            $timestamp = strtotime("-1 days");
        }
        // yesterday dateformat
        $date = date("Y-m-d", $timestamp);
        // yesterday dateformat
        $this->pureDate = $date;
        // yesterday dateformat split("-")
        $dateArr = explode("-", $date);
        // yesterday log file dateformat
        $this->date = $dateArr[0] . $dateArr[1] . $dateArr[2]; 

        // read yesterday log file  
        $this->loadFile();

        // send mail
        $this->sendMail();
    }

    public function loadFile()
    {
        

        $regex = '/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/';
        $regex2 = '/^\/funnyec\/product$|cartPageGo$|productInfo|orderPage|order/';

        $ipArr = array();
        
        // 파일 열러
        $file_handle  = fopen("/etc/httpd/logs/access_log-" . $this->date, "r");
        // 파일 열어서 포인터가 마지막인지 아닌지 확인
        $index = 1;
        while (!feof($file_handle)) {
            // 한줄씩 읽어
            $line_of_text = fgets($file_handle);
            // $routeMatch = '/product|cartPageGo|productInfo|orderPage/';
            // print $line_of_text . "\n";
            // 마지막 줄 다음 빈줄까지 읽기때문에 빈줄은 걸러줌
            if($line_of_text != "") {
                $logArr = explode(" ", $line_of_text);
                
                if(preg_match($regex2, $logArr[6])) {
                    $this->pv++; 
                }
                // 아이피 값들을 전부 넣어줌 -> 유니크 값 파악하기 위해
                if(!in_array($logArr[0], $ipArr)) {
                    if(preg_match($regex, $logArr[0])) {
                        array_push($ipArr, $logArr[0]);   
                    };
                }
                flush();
            }
        }

        // 파일 닫아
        fclose($file_handle);
        $this->uu += count(($ipArr));
    }

    public function selectDatabase()
    {
        $sql = "SELECT * FROM ec.order WHERE DATE(order_time) = '$this->pureDate'";

        $result = mysqli_query($this->connect, $sql);

        return $result;
    }

    public function sendMail()
    {
        $result = $this->selectDatabase();

        

        while ($info = mysqli_fetch_array($result)) {
            // $content .= $info["order_id"];
        }
        $this->totalRow = mysqli_num_rows($result);
        $this->cvr = round(($this->totalRow / $this->pv) * 100, 3);

        $who = "sonjh32@naver.com";

        $title = "PHP TEST YHAHO";

        $content = "<h1><center>DATA</center></h1>";
        $content .= "<h1>Report Days : $this->pureDate \n</h1>";
        $content .= "<h1>PV : $this->pv /n UU : $this->uu \n</h1>";
        $content .= "<h1>TOTAL ORDER : $this->totalRow \n</h1>";
        $content .= "<h1>CVR         : $this->cvr% \n</h1>";
        

        $option = "From: sonjh32@naver.com\r\n";
        $option .= "Content-Type: text/html; charset=UTF-8\r\n";
        mail($who, $title, $content, $option);
        $this->createFile($content);
    }

    public function createFile($content)
    {
        // $dir = $_SERVER['DOCUMENT_ROOT']  . "/logDir";
        $dir = "/var/www/html/logDir";

        if( !file_exists($dir) ) {
            $old= umask(0);
            mkdir($dir, 0777);
            umask($old);
        }
        
        file_put_contents($dir . "/access_log-" . $this->date, $content);
        // file_put_contents($dir . "/access_log-22", $content);
    }
}

$cronObject = new CronController();
$cronObject->formatDate();
// $cronObject->loadFile();
// $cronObject->sendMail();

?>
