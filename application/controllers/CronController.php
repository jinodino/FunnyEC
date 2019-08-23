#!/usr/bin/php
<?php 
include "/var/www/html/funnyec/application/controllers/mailer/src/PHPMailer.php";
include "/var/www/html/funnyec/application/controllers/mailer/src/SMTP.php";
include "/var/www/html/funnyec/application/controllers/mailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "/var/www/html/funnyec/application/models/DB.php";

class CronController {
    public $pv, $uu, $connect, $date, $pureDate, $totalRow, $cvr;

    public function __construct()  {
        $this->pv = 0;
        $this->uu = 0;
        $this->connect = new ConnectModel();
        date_default_timezone_set('Asia/Seoul');
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

        // $test = $this->popularItem();
        
        

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
        $file_path = "/etc/httpd/logs/access_log-" . $this->date;
        if (!file_exists($file_path)) {
            throw new \Exception("report file not found");
        }
        // 파일 열러
        $file_handle  = fopen($file_path, "r");
        if(!$file_handle || !is_resource($file_handle)) {
            throw new \Exception("report file cannot open.");
        }
        
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
                // flush();
            }
        }

        // 파일 닫아
        fclose($file_handle);
        $this->uu += count(($ipArr));
    }


    public function sendMail()
    {
        $result = $this->connect->selectDatabase($this->pureDate);

        $this->totalRow = mysqli_num_rows($result);
        $this->cvr = round(($this->totalRow / $this->pv) * 100, 3);

        

        $who = "sonjh32@naver.com";

        $title = "WWC(Word Wide Cracker)'s Report";

        $content = "<h1><center>==============DATA==============</center></h1>\n";
        $content .= "<h1>Report Days : $this->pureDate \n</h1>";
        $content .= "<h1>PV : $this->pv \n UU : $this->uu \n</h1>";
        $content .= "<h1>TOTAL ORDER : $this->totalRow \n</h1>";
        $content .= "<h1>CVR         : $this->cvr% \n</h1>";
        $content .= "<h1><center>\n=======POPULAER ITEM RANK!=======\n</center></h1>";

        

        $popularItem = $this->popularItem();

        foreach ($popularItem as $key => $value) {
            $index = $key + 1;
            $name = $value['name'];
            $content .= "<h2>$index : $name \n</h2>";
        }
        
        // create File 
        $this->createFile($content);

        $arr = $this->readLogFile();
        $fileContent = "";

        foreach ($arr as $key) {
            $fileContent .= $key;
        }

        $this->mailsetting($title, $fileContent);

        
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

    public function readLogFile()
    {
        $file_path = "/var/www/html/logDir/access_log-" . $this->date;
        if (!file_exists($file_path)) {
            throw new \Exception("report file not found");
        }
        // 파일 열러
        $file_handle  = fopen($file_path, "r");
        if(!$file_handle || !is_resource($file_handle)) {
            throw new \Exception("report file cannot open.");
        }
        
        // 파일 열어서 포인터가 마지막인지 아닌지 확인
        $readContents = [];
        while (!feof($file_handle)) {
            // 한줄씩 읽어
            $line_of_text = fgets($file_handle);
            array_push($readContents, $line_of_text);
        }
        fclose($file_handle);

        return $readContents;
    }

    public function popularItem()
    {
        $item = $this->connect->popularItem($this->pureDate);
        
        // $contents = "\n popularItem \n";

        // foreach ($item as $key => $value) {
        //     $index = $key + 1;
        //     $contents .= "$index : " . $value['name'] . "\n";
        // }

        // return $contents;
        return $item;
    }

    public function mailsetting($title, $fileContent)
    {
        $mail = new PHPMailer(true);

        try {
            // servet setting
            $mail->SMTPDebug = 2;
            $mail->isSMTP();

            $mail->Host = "smtp.naver.com";
            $mail->SMTPAuth = true;
            $mail->Username = "sonjh32@naver.com";
            $mail->Password = "wlsgh950";
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->CharSet = "utf-8";

            // send mail address
            $mail->setFrom("sonjh32@naver.com", "SON JIN HO");

            // to mail address
            $mail->addAddress("son@estore.co.jp");

            // mail contents
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $fileContent;

            $mail->send();

            echo "Message has been sent";

        } catch (Exception $e) {
            echo "mee";
        }
    }
}

$cronObject = new CronController();
$cronObject->formatDate();
// $cronObject->loadFile();
// $cronObject->sendMail();

?>
