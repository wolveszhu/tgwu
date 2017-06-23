<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>糖果屋</title>
    <meta name="keywords" content="糖果屋,玩具,坚果,糖果,饮料,进口食品,卤食,肉类制品,蜜饯果干">
    <meta name="description" content="糖果屋,您购物的一站式天堂">
    <link rel="stylesheet" href="/tangguowu/Public/Home/Css/index.css" type="text/css">
    <link rel="stylesheet" href="/tangguowu/Public/Css/bootstrap.min.css" type="text/css">
    <script src="/tangguowu/Public/Home/Js/index.js"></script>
</head>
<body id="body">
<!--新品上市-->
<div class="container">
    <div class="row">
        <div class="col-xs-3 ret"><a href="<?php echo U('Index/index');?>" class="morePro"><img src="/tangguowu/Public/Image/ret.png" class="retIcon"></a></div>
        <div class="col-xs-6 new">玩具类</div>
        <div class="col-xs-3"></div>
    </div>
    <div class="row">
        <div class="col-xs-4 newpro">
            <a href="#">
                <img src="/tangguowu/Public/Home/Image/maoxiong.png" class="proImg" alt="坚果">
            </a>
            <div class="desc">抹茶味正宗山货薯条500g/袋</div>
            <div class="shoucang">
                <div class="row">
                    <div class="col-xs-3"><img src="/tangguowu/Public/Image/shoucang.png" class="scPto"></div>
                    <div class="col-xs-9">25人已收藏</div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 newpro">
            <a href="#">
                <img src="/tangguowu/Public/Home/Image/paopaoji.png" class="proImg" alt="卤食">
            </a>
            <div class="desc">卤食类</div>
            <div class="shoucang">
                <div class="row">
                    <div class="col-xs-3"><img src="/tangguowu/Public/Image/shoucang.png" class="scPto"></div>
                    <div class="col-xs-9">123人已收藏</div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 newpro">
            <a href="#">
                <img src="/tangguowu/Public/Home/Image/bianxing.png" class="proImg" alt="玩具">
            </a>
            <div class="desc">新疆葡萄干500g/袋</div>
            <div class="shoucang">
                <div class="row">
                    <div class="col-xs-3"><img src="/tangguowu/Public/Image/shoucang.png" class="scPto"></div>
                    <div class="col-xs-9">62人已收藏</div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 newpro">
            <a href="#">
                <img src="/tangguowu/Public/Home/Image/gongzai.png" class="proImg" alt="糖果">
            </a>
            <div class="desc">竹炭花生正宗台湾口味500g/袋</div>
            <div class="shoucang">
                <div class="row">
                    <div class="col-xs-3"><img src="/tangguowu/Public/Image/shoucang.png" class="scPto"></div>
                    <div class="col-xs-9">462人已收藏</div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 newpro">
            <a href="#">
                <img src="/tangguowu/Public/Home/Image/feixia.png" class="proImg" alt="卤食">
            </a>
            <div class="desc">卤食类</div>
            <div class="shoucang">
                <div class="row">
                    <div class="col-xs-3"><img src="/tangguowu/Public/Image/shoucang.png" class="scPto"></div>
                    <div class="col-xs-9">123人已收藏</div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 newpro">
            <a href="#">
                <img src="/tangguowu/Public/Home/Image/baozhen.png" class="proImg" alt="饮料">
            </a>
            <div class="desc">榴莲干450g/袋</div>
            <div class="shoucang">
                <div class="row">
                    <div class="col-xs-3"><img src="/tangguowu/Public/Image/shoucang.png" class="scPto"></div>
                    <div class="col-xs-9">56人已收藏</div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/tangguowu/Public/Js/jquery.min.js"></script>
<script src="/tangguowu/Public/Js/bootstrap.min.js"></script>
<script type="text/javascript">
    var width = $(".newpro").width() * 0.9;
    var height = width * 1.5;
    var imgWH = $(".proImg");
    imgWH.attr('width',width);
    imgWH.attr('height',height);
    var desc = $(".desc");
    desc.attr('width',width);
</script>
</html>