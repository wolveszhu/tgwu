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
    <div class="container scAll">
        <div class="row">
            <div class="col-xs-2 userPho"><img src="/wxmsg/Public/Image/u3.jpg" class="img-circle user"></div>
            <div class="col-xs-10">朱运领</div>
        </div>
        <div class="row proSc">
            <div class="col-xs-2 userPho"><img src="/wxmsg/Public/Image/u3.jpg" class="user"></div>
            <div class="col-xs-10">我的收藏</div>
        </div>
    </div>
</body>
<script src="/wxmsg/Public/Js/jquery.js"></script>
<script src="/wxmsg/Public/Js/bootstrap.min.js"></script>
<script type="text/javascript">
    var height = $(".userPho").height() - 10;
    var user = $(".user");
    user.attr("height",height);
    user.attr("width",height);

    var height = $(".proSc").height() - 10;
    var user = $(".userSc");
    user.attr("height",height);
    user.attr("width",height);
</script>
</html>