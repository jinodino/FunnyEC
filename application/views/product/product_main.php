<?php 
    $date = date("Y-m-d");
    $dateArr = explode("-", $date);
    $dateform = $dateArr[0] . $dateArr[1] . $dateArr[2];
    // if(file_exists('/etc/httpd/logs/access_log')) {
    //     echo "exist";
    // } else {
    //     echo "NO";
    // }

    // $file_handle  = fopen("c:/dev/Apache24/logs/access.log", "r");
    $file_handle = fopen("/etc/httpd/logs/access_log-" . $dateform, "r");
    $count = 0;
    while (!feof($file_handle)) {

        $line_of_text = fgets($file_handle);

        if($line_of_text != "") {
            $logArr = explode(" ", $line_of_text);
        
            print ($logArr[0] . " : " . $logArr[6] . "\n");

            if($logArr[6] == "/funnyec/product") {
                $count++;
                
            }
            flush();
        }
        
    }
    
    fclose($file_handle);
    print_r($count);     
        
        

// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- modal 관련 link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- css link -->
    <link rel="stylesheet" type="text/css" href="../funnyec/public/css/product.css">
</head>
<body>
    <!-- javacscipt include -->
    <script type="text/javascript" src="../funnyec/public/script/product.js"></script>

    <!-- header -->
    <?php include_once  APPPATH ."views/public/header.php"; ?>
    <!-- login modal -->
    <?php include_once  APPPATH ."views/public/loginModal.php"; ?>
    <!-- menual -->
    <?php include_once  APPPATH ."views/public/menual.php"; ?>

    <!-- main -->
    <main class="main">
        <!-- layered -->
        <?php include_once  APPPATH ."views/public/layered.php"; ?>
        
        <!-- product_top -->
        <?php include_once  APPPATH ."views/public/product_top.php"; ?>

        <div class="artical">
            <!-- product_menu -->
            <?php include_once  APPPATH ."views/public/product_menu.php"; ?>
            
            <div class="product_view">
                <div class="mainpageImg">
                    <div class="mainpageImg_left">
                        <img src="../funnyec/public/picture/mainpage.png" alt="">
                    </div>
                    <div class="mainpageImg_right">
                        <img src="../funnyec/public/picture/mainpage2.jpg" alt="">
                        <img src="../funnyec/public/picture/mainpage3.jpg" alt="">
                    </div> 
                </div>                
            </div>
        </div>
    </main>

    <!-- footer -->
    <?php include_once  APPPATH ."views/public/footer.php"; ?>
</body>
</html>