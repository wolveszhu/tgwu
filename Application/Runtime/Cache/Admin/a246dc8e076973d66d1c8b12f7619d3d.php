<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>糖果屋后台管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/tangguowu/Public/Css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/tangguowu/Public/Admin/Css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/tangguowu/Public/Css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/tangguowu/Public/Css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/tangguowu/Public/Admin/Css/common.css" />
    <link rel="stylesheet" href="/tangguowu/Public/Css/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/tangguowu/Public/Css/uploadify/uploadify.css">

    <!-- jQuery -->
    <script src="/tangguowu/Public/Js/jquery.min.js"></script>
    <script src="/tangguowu/Public/Js/bootstrap.min.js"></script>
    <script src="/tangguowu/Public/Js/layer/layer.js"></script>
    <script src="/tangguowu/Public/Js/dialog.js"></script>
    <script type="text/javascript" src="/tangguowu/Public/Js/uploadify/jquery.uploadify.js"></script>

</head>

    



<body>
<div id="wrapper">

    <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

        <a class="navbar-brand">糖果屋内容管理平台</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo U('Admin/personal');?>"><i class="fa fa-fw fa-user"></i> 个人中心</a>
                </li>

                <li class="divider"></li>
                <li>
                    <a href="<?php echo U('Login/logout');?>"><i class="fa fa-fw fa-power-off"></i> 退出</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav nav_list">
            <li>
                <a href="<?php echo U('Index/index');?>"><i class="fa fa-fw fa-dashboard"></i>  首页</a>
            </li>
            <li>
                <a href="<?php echo U('Carousel/index');?>"><i class="fa fa-fw fa-bar-chart-o"></i>  轮播图管理</a>
            </li>
            <li>
                <a href="<?php echo U('Invitation/index');?>"><i class="fa fa-fw fa-bar-chart-o"></i>  邀请码管理</a>
            </li>
            <li>
                <a href="<?php echo U('Category/index');?>"><i class="fa fa-fw fa-bar-chart-o"></i>  分类管理</a>
            </li>
            <li>
                <a href="<?php echo U('Wares/index');?>"><i class="fa fa-fw fa-bar-chart-o"></i>  商品管理</a>
            </li>
            <li>
                <a href="<?php echo U('User/index');?>"><i class="fa fa-fw fa-bar-chart-o"></i>  用户管理</a>
            </li>
        </ul>
    </div>
</nav>
    <script src="/tangguowu/Public/Js/kindeditor/kindeditor-all.js"></script>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo U('index');?>">轮播图管理</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> 轮播图添加
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6">

                    <form class="form-horizontal" id="singcms-form">
                        <div class="form-group">
                            <label for="carousdesc" class="col-sm-2 control-label">描述:</label>
                            <div class="col-sm-5">
                                <input type="text" name="carouselDesc" class="form-control" id="carousdesc" placeholder="请填写描述">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">轮播图缩图:</label>
                            <div class="col-sm-5">
                                <input id="file_upload"  type="file" name="carouselIcon">
                                <img style="display: none" id="upload_org_code_img" src="" width="150" height="150">
                                <input id="file_upload_image" name="carouselIcon" type="hidden" multiple="true" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">轮播图状态:</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="status">
                                    <option value="0">==请选择状态==</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="carouskip" class="col-sm-2 control-label">轮播图跳转地址:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="carouselPath" id="carouskip" placeholder="轮播图跳转地址">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<script>
    var SCOPE = {
        'save_url' : '<?php echo U("add");?>',
        'jump_url' : '<?php echo U("index");?>',
        'ajax_upload_image_url' : '<?php echo U("Image/ajaxuploadimage");?>',
        'ajax_upload_swf' : '/tangguowu/Public/Js/uploadify/uploadify.swf',
        'root' : '/tangguowu',
    };

</script>
<!-- /#wrapper -->
<script src="/tangguowu/Public/Admin/Js/image.js"></script>
<!--<script>
    // 6.2
    KindEditor.ready(function(K) {
        window.editor = K.create('#editor_singcms',{
            uploadJson : '',
            afterBlur : function(){this.sync();}, //
        });
    });
</script>-->
<script src="/tangguowu/Public/Admin/Js/common.js"></script>



</body>

</html>