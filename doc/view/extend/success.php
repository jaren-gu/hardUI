<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <?php include "head.php" ?>
    <title>success页面</title>
<style>
    .confirm_wd>a{
        font-size: 13px;
        color: rgba(0, 0, 0, 0.35);
    }
    .confirm_btn{
        float: right;
        margin-right: 5%;
    }
    .confirm_foot{
        margin-top:10px;
    }
    .confirm_foot p{
        text-align: center;
    }
    .confirm_foot_p{
        color:#3499db;
        font-weight:700;
    }

</style>
</head>

<body style="background:#f4f4f4;">
<?php include "sidebar.php"?>
<div id="content_wrapper">
    <div id="content">
        <div class="jumbotron jumbotronSty">
            <div class="container-fluid">
        <div class="center-block mt70" style="max-width: 625px">
            <div class="row">
                <div class="col-xs-12 pn">
                    <div class="col-xs-7">
                        <h2 class="mbn">
                            <i class="fa fa-check" style="position: relative;font-size: 32px;background: #eee;border: 1px solid #DDD;border-radius: 50%;padding: 6px;margin-right: 9px; color: #70ca63"></i>
                            Account Confirmed
                        </h2>
                    </div>
                    <div class="col-xs-5" style="height: 65px;text-align: right">
                        <div class="confirm_wd" style="padding-top: 35px;">
                            <a href="#">首页</a>
                            <span class="pl5 pr5">|</span>
                            <a href="#">帮助与支持</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 mt15 pn">
                    <div class="as-panel panel-body-top">
                        <div class="as-panel-body ">
                            <h2 style="padding: 0 5%;">Hello Jusitn</h2>
                            <div style="padding:0 5%;">
                                <hr style=";border:none;border-top:1px dashed #666;width:100%;height: 1px;" />
                            </div>
                            <div style="padding:0 5%;">
                             <span style="line-height:30px;">
                                 Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu
                                 Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu
                                 Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu
                                 Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu
                                 Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu
                             </span>
                            </div>
                            <div class="confirm_btn mt20 mb10">
                                <button class="btn btn-lg btn-primary btn-rounded ph40">SIGN IN</button>
                            </div>
                        </div>
                    </div>
                    <div class="confirm_foot">
                        <p class="confirm_foot_p">Need More Help</p>
                        <p class="confirm_foot_p1">
                            Music qusetion two?<span style="color:rgba(27, 25, 25, 0.63);font-weight: bold;font-size: 14px;">Response</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
<?php include "foot.php"?>
<script>
    $("#success-list").addClass("menu-open");
    $("#member-li").addClass("menu-open");
    $("#success").addClass("menu-open");
</script>
</body>