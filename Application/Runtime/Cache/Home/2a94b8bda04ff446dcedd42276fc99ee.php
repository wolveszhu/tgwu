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
    <script src="/tangguowu/Public/Js/jquery.min.js"></script>
    <script src="/tangguowu/Public/Js/bootstrap.min.js"></script>
    <script src="/tangguowu/Public/Home/Js/index.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myCarousel').carousel({interval:5000});
        });
    </script>
</head>
<body id="body">
<!--轮播图部分-->
<div id="myCarousel" class="carousel slide">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators carouselInd">
        <li data-target="#myCarousel" data-slide-to="0" class="active carouselLi"></li>
        <li data-target="#myCarousel" data-slide-to="1" class="carouselLi"></li>
    </ol>
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="/tangguowu/Public/Home/Image/juhuasuan.png" class="carPto" alt="juhuasuan">
        </div>
        <div class="item">
            <img src="/tangguowu/Public/Home/Image/zhui.png" class="carPto" alt="zhui">
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev"></a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next"></a>
</div>
<!--导航栏部分-->
<div class="container" id="container">
    <div class="row navbar">
        <div class="col-xs-3">
            <!-- TUDO a标签 图片居中 -->
            <div class="nav">
                <a href="#">
                    <img src="/tangguowu/Public/Home/Image/jianguo.png" class="cateImg"  alt="坚果">
                </a>
            </div>
            <div class="cdesc">坚果类</div>
        </div>
        <div class="col-xs-3">
            <div class="nav">
                <a href="#">
                    <img src="/tangguowu/Public/Home/Image/wanju.png" class="cateImg" alt="玩具">
                </a>
            </div>
            <div class="cdesc">玩具类</div>
        </div>
        <div class="col-xs-3">
            <div class="nav">
                <a href="#">
                    <img src="/tangguowu/Public/Home/Image/tangguo.png" class="cateImg" alt="糖果">
                </a>
            </div>
            <div class="cdesc">糖果类</div>
        </div>
        <div class="col-xs-3">
            <div class="nav">
                <a href="#">
                    <img src="/tangguowu/Public/Home/Image/yinliao.png" class="cateImg" alt="饮料">
                </a>
            </div>
            <div class="cdesc">饮料类</div>
        </div>
        <div class="col-xs-3">
            <div class="nav">
                <a href="#">
                    <img src="/tangguowu/Public/Home/Image/jinkou.png" class="cateImg" alt="进口食品">
                </a>
            </div>
            <div class="cdesc">进口食品专区</div>
        </div>
        <div class="col-xs-3">
            <div class="nav">
                <a href="#">
                    <img src="/tangguowu/Public/Home/Image/lu.png" class="cateImg" alt="卤食">
                </a>
            </div>
            <div class="cdesc">卤食类</div>
        </div>
        <div class="col-xs-3">
            <div class="nav">
                <a href="#">
                    <img src="/tangguowu/Public/Home/Image/rou.png" class="cateImg" alt="肉制品">
                </a>
            </div>
            <div class="cdesc">肉类制品</div>
        </div>
        <div class="col-xs-3">
            <div class="nav">
                <a href="#">
                    <img src="/tangguowu/Public/Home/Image/mijian.png" class="cateImg" alt="蜜饯果干">
                </a>
            </div>
            <div class="cdesc">蜜饯果干</div>
        </div>
    </div>
</div>
<!--特价and爆款-->
<div class="bao_te">
    <div class="te"><img src="/tangguowu/Public/Image/tejia.png">&nbsp;特价促销</div>
    <div class="bao"><img src="/tangguowu/Public/Image/baokuan.png">&nbsp;爆款推荐</div>
</div>
<!--新品上市-->
<div class="container" id="container1">
    <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-xs-6 new"><img src="/tangguowu/Public/Image/hengxian.png">&nbsp;新品上架&nbsp;<img src="/tangguowu/Public/Image/hengxian.png"></div>
        <div class="col-xs-3 more"><a href="<?php echo U('newProduct/more');?>" class="morePro">更多&nbsp;<img src="/tangguowu/Public/Image/more.png" class="gengduo"></a></div>
    </div>
    <div class="row">
        <div class="col-xs-4 newpro">
            <a href="#">
                <img src="/tangguowu/Public/Home/Image/hefeng.png" class="proImg" alt="坚果">
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
                <img src="/tangguowu/Public/Home/Image/putao.png" class="proImg" alt="玩具">
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
                <img src="/tangguowu/Public/Home/Image/huasheng.png" class="proImg" alt="糖果">
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
                <img src="/tangguowu/Public/Home/Image/liulian.png" class="proImg" alt="饮料">
            </a>
            <div class="desc">榴莲干450g/袋</div>
            <div class="shoucang">
                <div class="row">
                    <div class="col-xs-3"><img src="/tangguowu/Public/Image/shoucang.png" class="scPto"></div>
                    <div class="col-xs-9">56人已收藏</div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 newpro">
            <a href="#">
                <img src="/tangguowu/Public/Home/Image/binggan.png" class="proImg" alt="进口食品">
            </a>
            <div class="desc">进口食品专区</div>
            <div class="shoucang">
                <div class="row">
                    <div class="col-xs-3"><img src="/tangguowu/Public/Image/shoucang.png" class="scPto"></div>
                    <div class="col-xs-9">652人已收藏</div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 newpro">
            <a href="#">
                <img src="/tangguowu/Public/Home/Image/rousong.png" class="proImg" alt="卤食">
            </a>
            <div class="desc">卤食类</div>
            <div class="shoucang">
                <div class="row">
                    <div class="col-xs-3"><img src="/tangguowu/Public/Image/shoucang.png" class="scPto"></div>
                    <div class="col-xs-9">123人已收藏</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bot">
    <div class="leftBot">
        <div class="leftTop"><img src="/tangguowu/Public/Image/amailogo.png" class="amai">阿麦科技</div>
        <div class="leftBottom">amailive.com</div>
    </div>
    <div class="centerBot"><img src="/tangguowu/Public/Image/fengexian.png" class="fenggexian"></div>
    <div class="rightBot">技术支持</div>
</div>
</body>
<script type="text/javascript">
    var widthDev = document.documentElement.clientWidth;
    var heightDev = widthDev / 1.5;
    var carPto = $(".carPto");
    carPto.attr('width',widthDev);
    carPto.attr('height',heightDev);

    var navWH = $(".nav").width();

    var cateImgWH = $(".cateImg");
    cateImgWH.attr('width',navWH);
    cateImgWH.attr('height',navWH);

    var width = $(".newpro").width() * 0.9;
    var height = width * 1.5;
    var imgWH = $(".proImg");
    imgWH.attr('width',width);
    imgWH.attr('height',height);
    var desc = $(".desc");
    desc.attr('width',width);
</script>
</html>