<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE=html>
<html>
<head>
    <script src="jquery.js" type="text/javascript"></script>
</head>
<body>
<div>下拉加载更多</div>
<div class="main" style="height:700px;overflow:auto;">
    <div class="child" style='border:1px solid red;margin-top:20px;color:grey;height:800px' ></div>
</div>
</body>
<script  type="text/javascript">
    $(document).ready(function(){
        $(".main").unbind("scroll").bind("scroll", function(e){
            var sum = this.scrollHeight;
            if (sum <= $(this).scrollTop() + $(this).height()) {
                $(".main").append($(".child").clone());
            }
        });
    });
</script>
</html>