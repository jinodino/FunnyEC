<?php //@session_start(); ?>
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
    <link rel="stylesheet" type="text/css" href="../funnyec/public/css/search.css">
    <link rel="stylesheet" type="text/css" href="../funnyec/public/css/cart.css">

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
            <?php include_once  APPPATH ."views/public/product_top_search.php"; ?>

            <div class="artical">
                <!-- product_menu -->
                <?php include_once  APPPATH ."views/public/product_menu_search.php"; ?>
                
                <div class="product_view">
                    <?php
                       
                        if($info != 0) {
                            foreach ($info as $key) {
                                echo '<div class="product_view_container">';
                                echo '    <div class="product_view_container_piture" onclick=productInfoPageGo(' . $key->code . ')>';
                                echo '        <img src="' . $key->src . '" alt="default"></img>';
                                echo '    </div>';
                                echo '    <div class="product_view_container_display">';
                                echo '        <div class="product_info">';
                                echo '            <span>' . $key->name . '</span>';
                                echo '        </div>';
                                echo '        <div class="product_price"> ' . $key->price . '</div>';
                                echo '    </div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="cart-container">';
                            echo '    <div class="cart-no-header">';
                            echo '        <div class="cart-no-header-p">';
                            echo '            <p>There is no product that matches the word</p>';
                            echo '            <p>Please check again</p>';
                            echo '        </div>';
                            echo '        <div class="cart-no-header-button">';
                            echo '            <div class="goshopping" onclick="gotoshopping()">GO TO <br> SHOPPING</div>';
                            echo '        </div>';
                            echo '    </div>';
                            echo '    <div class="picturearea">';
                            echo '        <img src="../../../public/picture/aaa.jpg" alt="">';
                            echo '    </div>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </main>

        <!-- footer -->
        <?php include_once  APPPATH ."views/public/footer.php"; ?>
    </body>
</html>