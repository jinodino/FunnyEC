<?php @session_start(); ?>
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
    <link rel="stylesheet" type="text/css" href="../../../public/css/product.css">
</head>
<body>
    <!-- javacscipt include -->
    <script type="text/javascript" src="../../../public/script/product.js"></script>

    <!-- header -->
    <?php include_once  APPPATH ."views/public/header.php"; ?>
    <!-- login modal -->
    <?php include_once  APPPATH ."views/public/loginModal.php"; ?>
    <!-- menual -->
    <?php include_once  APPPATH ."views/public/menual.php"; ?>

    <!-- main -->
    <main class="main">
        <!-- product_top -->
        <?php include_once  APPPATH ."views/public/product_top.php"; ?>

        <div class="artical">
            <!-- product_menu -->
            <?php include_once  APPPATH ."views/public/product_menu.php"; ?>
            
            <div class="product_view">
                <div class="mainpageImg">
                    <div class="mainpageImg_left">
                        <img src="../../../public/picture/mainpage.png" alt="">
                    </div>
                    <div class="mainpageImg_right">
                        <img src="../../../public/picture/mainpage2.jpg" alt="">
                        <img src="../../../public/picture/mainpage3.jpg" alt="">
                    </div> 
                </div>                
            </div>
        </div>
    </main>

    <!-- footer -->
    <?php include_once  APPPATH ."views/public/footer.php"; ?>
</body>
</html>

<!-- <div class="product_view_container">
                    <div class="product_view_container_piture">
                        <img src="../../../public/picture/airmax97_WH.jpg" alt="aa">
                    </div>
                    <div class="product_view_container_display">
                        <div class="product_info">
                            <span>나이키 오디세이</span>
                        </div>
                        <div class="product_price">130,000원</div>
                    </div>
                </div>
                <div class="product_view_container">
                    <div class="product_view_container_piture">
                        <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/AQ1289-401/001c416c-2073-47d5-901e-09174fc4f32b_primary.jpg?gallery" alt="aa">
                    </div>
                    <div class="product_view_container_display">
                        <div class="product_info">
                            <span>나이키 오디세이</span>
                        </div>
                        <div class="product_price">130,000원</div>
                    </div>
                </div>
                <div class="product_view_container">
                    <div class="product_view_container_piture">
                        <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/AQ1289-401/001c416c-2073-47d5-901e-09174fc4f32b_primary.jpg?gallery" alt="aa">
                    </div>
                    <div class="product_view_container_display">
                        <div class="product_info">
                            <span>나이키 오디세이</span>
                        </div>
                        <div class="product_price">130,000원</div>
                    </div>
                </div>
                <div class="product_view_container">
                    <div class="product_view_container_piture">
                        <img src="https://static-breeze.nike.co.kr/kr/ko_kr/cmsstatic/product/AJ3547-009/ad2a10a9-7f33-4fbe-aeb8-217ee026384b_primary.jpg?gallery" alt="aa">
                    </div>
                    <div class="product_view_container_display">
                        <div class="product_info">
                            <span>나이키 오디세이</span>
                        </div>
                        <div class="product_price">130,000원</div>
                    </div>
                </div> -->