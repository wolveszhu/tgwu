<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>糖果屋</title>
    <meta name="keywords" content="糖果屋,玩具,坚果,糖果,饮料,进口食品,卤食,肉类制品,蜜饯果干">
    <meta name="description" content="糖果屋,您购物的一站式天堂">
    <link rel="stylesheet" href="/wxmsg/Public/Home/Css/index.css" type="text/css">
    <link rel="stylesheet" href="/wxmsg/Public/Css/bootstrap.min.css" type="text/css">
    <script src="/wxmsg/Public/Home/Js/index.js"></script>
</head>
<body>
<!--轮播图部分-->
<div id="myCarousel" class="carousel slide">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="/wxmsg/Public/Home/Image/tangguoDet.png" class="itemImg" alt="First slide">
        </div>
        <div class="item">
            <img src="/wxmsg/Public/Home/Image/tangguoDet.png" class="itemImg" alt="Second slide">
        </div>
        <div class="item">
            <img src="/wxmsg/Public/Home/Image/tangguoDet.png" class="itemImg" alt="Third slide">
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev"></a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next"></a>
</div>
<div class="detail">
    <div class="desDet det">进口糖果,儿童糖果,礼盒装糖果,送礼佳品,馈赠佳品</div>
    <div class="desDet"><label class="lable1">价格:65.6</label></div>
    <div class="desDet"><label class="lable1">商品货号:136598596</label></div>
</div>
</body>
<script src="/wxmsg/Public/Js/jquery.js"></script>
<script src="/wxmsg/Public/Js/bootstrap.min.js"></script>
<script type="text/javascript">
    var width = $(".item").width();
    var height = width / 1.5;
    var itemImg  = $(".itemImg");
    itemImg.attr("height",height);
    itemImg.attr("width",width);
</script>
</html>