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
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo U('index');?>">商品管理</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> 商品添加
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6">

                    <form class="form-horizontal" id="singcms-form">
                        <div class="form-group">
                            <label for="warename" class="col-sm-2 control-label">名称:</label>
                            <div class="col-sm-5">
                                <input type="text" name="wareName" class="form-control" id="warename" placeholder="请填写名称">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品分类:</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="categoryId">
                                    <option value="0">==请选择分类==</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <?php if(is_array($titleFontColor)): foreach($titleFontColor as $key=>$color): ?><option value=""></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品封面图:</label>
                            <div class="col-sm-5">
                                <input id="file_upload"  type="file" name="wareCover">
                                <img style="display: none" id="upload_org_code_img" src="" width="150" height="150">
                                <input id="file_upload_image" name="wareCover" type="hidden" multiple="true" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品主题图:</label>
                            <div class="col-sm-5">
                                <input id="file_upload_mut"  type="file" name="wareMstChart">
                                <img style="display: none" id="upload_org_code_imgs" src="" width="150" height="150">
                                <input id="file_upload_images" name="wareMstChart" type="hidden" multiple="true" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="waredesc" class="col-sm-2 control-label">描述:</label>
                            <div class="col-sm-5">
                                <input type="text" name="wareDesc" class="form-control" id="waredesc" placeholder="请填写描述">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="wareprice" class="col-sm-2 control-label">价格:</label>
                            <div class="col-sm-5">
                                <input type="text" name="warePrice" class="form-control" id="wareprice" placeholder="请填写价格">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品状态:</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="status">
                                    <option value="0">==请选择状态==</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="warecode" class="col-sm-2 control-label">货号:</label>
                            <div class="col-sm-5">
                                <input type="text" name="wareCode" class="form-control" id="warecode" placeholder="请填写货号">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="colltimes" class="col-sm-2 control-label">收藏次数:</label>
                            <div class="col-sm-5">
                                <input type="text" name="collTimes" class="form-control" id="colltimes" placeholder="收藏次数">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="browsetimes" class="col-sm-2 control-label">浏览次数:</label>
                            <div class="col-sm-5">
                                <input type="text" name="browseTimes" class="form-control" id="browsetimes" placeholder="浏览次数">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inventory" class="col-sm-2 control-label">库存数:</label>
                            <div class="col-sm-5">
                                <input type="text" name="inventory" class="form-control" id="inventory" placeholder="库存数">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="discount" class="col-sm-2 control-label">折扣:</label>
                            <div class="col-sm-5">
                                <input type="text" name="discount" class="form-control" id="discount" placeholder="折扣（0-10）">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cutprice" class="col-sm-2 control-label">降价:</label>
                            <div class="col-sm-5">
                                <input type="text" name="cutPrice" class="form-control" id="cutprice" placeholder="降价">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="isnew" class="col-sm-2 control-label">是否新品:</label>
                            <div class="col-sm-5">
                                <input type="radio" name="isNew" id="isnew" value="1"> 是
                                <input type="radio" name="isNew" id="isnew" value="0" checked> 否
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="ishot" class="col-sm-2 control-label">是否热卖:</label>
                            <div class="col-sm-5">
                                <input type="radio" name="isHot" id="ishot" value="1"> 是
                                <input type="radio" name="isHot" id="ishot" value="0" checked> 否
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