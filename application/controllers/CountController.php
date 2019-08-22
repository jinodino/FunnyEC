<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CountController {

    public $pv, $uu;
 

    public function countPVUU()
    {
        // 파일 열러
        $file_handle  = fopen("c:/dev/Apache24/logs/access.log", "r");
        // 피브이 카운터
        $count = 0;
        // 로그 기록 날짜 폼
        $date = date("Y-m-d");

        // 원하는 형식으로 짤라 붙여
        $dateArr = explode("-", $date);
        $dateform = $dateArr[0] . $dateArr[1] . $dateArr[2]; 
        $ipArr = array();
        $ipArr2 = array();
        $regex = '/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/';
        $regex2 = '/funnyec/';
        // 파일 열어서 포인터가 마지막인지 아닌지 확인
        while (!feof($file_handle)) {
            // 한줄씩 읽어
            $line_of_text = fgets($file_handle);
            
            // 마지막 줄 다음 빈줄까지 읽기때문에 빈줄은 걸러줌
            if($line_of_text != "") {
                // 로그 기록을 나눠서 관리
                $logArr = explode(" ", $line_of_text);
                print $line_of_text . "\n";
                // 
                 
                // print "User IP : " . $logArr[0] . " Routing : " . $logArr[6];
                // 아이피 값들을 전부 넣어줌 -> 유니크 값 파악하기 위해
                array_push($ipArr, $logArr[0]);
                // 라우팅 부분 -> 유유
                if($logArr[6] == "/product") {
                    $this->pv++;
                    preg_match($regex, $logArr[0], $ipArr2);   
                }
                
                flush();
            }
            
        }
        // 파일 닫아
        fclose($file_handle);
        print_r($ipArr2);
        return;
        $this->uu += count(array_unique($ipArr));


        
        return ["pv" => $this->pv, "uu" => $this->uu];


    }

}