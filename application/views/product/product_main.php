<?php
    session_cache_expire(360); 
    session_start();
    echo @$_SESSION['id'];
    echo @$_SESSION['password'];
?>
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
</head>
<style>
    /* header CSS */
    @font-face {
        font-family: 'Trade_Gothic';
        src: url(../../../public/font/TradeGothicLTBoldCondensedNo.20.ttf) format('truetype');
    }
    .header {
        display: flex;
        border-top: 1px solid #cfcfcf;
        border-bottom: 1px solid #cfcfcf;
        /* background: chartreuse; */
        height: 40px;
    }
    
    .header_left {
        flex: 4;
        /* background: palegreen; */
        height: 40px;
    }

    .header_right {
        display: flex;
        flex: 1;
        height: 40px;
        margin-top: 7.5px;
    }

    .header_right_register {
        display: flex;
        flex: 1;
        height: 40px;
    }

    .header_right_callcenter {
        display: flex;
        flex: 1;
        height: 40px;
    }

    .header_right_cart {
        display: flex;
        flex: 1;
        height: 40px;
    }

    .header_right_country {
        display: flex;
        flex: 1;
        height: 40px;
    }

    /* menual CSS */
    .menual {
        display: flex;
        border-bottom: 1px solid #cfcfcf;
        height: 80px;
    }

    .menual_logo {
        flex: 1;
        background-image: url(../../../public/picture/logo.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        height: 79px;
        cursor: pointer;
    }

    .menual_search {
        flex: 1;
        margin: auto;
        /* text-align: center; */
    }

    .container-1{
        width: 300px;
        vertical-align: middle;
        white-space: nowrap;
        position: relative;
    }

    .container-1 input#search{
        width: 220px;
        height: 45px;
        border: 1px solid #bdbdbd;
        font-size: 10pt;
        float: left;
        margin-left: 125%;
        padding-left: 45px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 3px;
    }

    .container-1 .icon{
        position: absolute;
        top: 50%;
        margin-left: 133%;
        margin-top: 12px;
        z-index: 1;
        color: #4f5b66;
    }

    .menual_menu {
        display: flex;
        flex: 1;
        text-align: center;
        font-family: Trade_Gothic;
        font-size: 24px;
        height: 80px;
    }

    .menual_menu_ul {
        /* aa */
        list-style:none;
        display: flex; 
        float: left;
        margin: auto;
        flex: 1;
    }

    .menual_menu_casual {
        float: left;
        margin: auto;
        flex: 1;
        height: 55px;
        margin-top: 25px;
    }

    .menual_menu_casual:hover {
        border-bottom: 2px solid #000000;
    }

    .menual_menu_sport {
        float: left;
        margin: auto;
        flex: 1;
        height: 55px;
        margin-top: 25px;
    }

    .menual_menu_sport:hover {
        border-bottom: 2px solid #000000;
    }

    .menual_menu_baby {
        float: left;
        margin: auto;
        flex: 1;
        height: 55px;
        margin-top: 25px;
    }
    
    .menual_menu_baby:hover {
        border-bottom: 2px solid #000000;
    }

    .menual_menu_business {
        float: left;
        margin: auto;
        flex: 1;
        height: 55px;
        margin-top: 25px;
    }

    .menual_menu_business:hover {
        border-bottom: 2px solid #000000;
    }

    /* main CSS */
    .main {
        /* background: cornflowerblue; */
        border-bottom: 1px solid #cfcfcf;
    }

    .product_top {
        /* background: lightskyblue; */
        height: 130px;
    }
    
    .product_menu {
        float: left;
        background: orange;
        width: 20%;
        height: 700px;
    }

    .product_view {
        float: left;
        background: mistyrose;
        width: 80%;
        height: 700px;
    }

    .footer {
        /* background: chocolate; */
        height: 80px;
        width: 100%;
        clear: both;
    }

</style>
<body>
    <header class="header">
        <div class="header_left"></div>
        <div class="header_right">
            <div class="header_right_register">
                SING IN
            </div>
            <div class="header_right_callcenter">
                QUESTION
            </div>
            <div class="header_right_cart">
                <i class="fa fa-shopping-cart fa-2x"></i>
            </div>
            <div class="header_right_country">
                <i class="fa fa-globe fa-2x"></i>
            </div>
        </div>
    </header>
    <div class="menual">
        <div class="menual_logo" onclick="window.location.reload()"></div>
        <div class="menual_menu">
            <ul class="menual_menu_ul">
                <li class="menual_menu_casual">CASUL</li>
                <li class="menual_menu_sport">SPORT</li>
                <li class="menual_menu_baby">BABY</li>
                <li class="menual_menu_business">BUSINESS</li>
            </ul>
        </div>
        <div class="menual_search">
            <div class="container-1">
                <span class="icon"><i class="fa fa-search"></i></span>
                <input type="search" id="search" placeholder="Search..." />
            </div>
        </div>
    </div>
    <main class="main">
        <div class="product_top">product_top</div>
        <article>
                <div class="product_menu">product_menu</div>
                <div class="product_view">product_view</div>
        </article>
    </main>
    <footer class="footer">footer</footer>
</body>
</html>

