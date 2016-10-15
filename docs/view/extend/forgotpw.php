<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <?php include "head.php"?>
    <title></title>
</head>
<body style="background: ">
<?php include "sidebar.php"?>
<div id="content_wrapper">
    <div id="content">
        <div class="jumbotron jumbotronSty">
            <div class="container-fluid">
    <div style="margin: 200px auto;max-width:500px; ">


        <div class="">
        <img src="../../img/3.png">


        <a class=" pull-right" style="margin-top:28px;color:black;"href="">Password Reset</a>
        </div>
        <div class="as-panel">
            <div class="as-panel-body panel-body-top">
                <div style="border-left:6px solid skyblue;background:#bce4f2;" type="text" value="Enter Your Email and instructions will be sent you!"class="mt5 col-md-12 text-primary well well-sm">
                    <span>
                            <i class="fa fa-info"></i>
                    </span>
                    <span class="ml10">
                        Enter Your Email and instructions will be sent to you!
                    </span>


                </div>

            </div>
            <div class="as-panel-footer">

                    <div class="mt5  as-form-group ">

                    <div class="as-input-group">
                        <span class="as-input-icon ">
                            <i class="fa fa-envelope-o"></i>
                        </span>

                        <input style="width:300px;"  type="text" value="Your Email Address"class="as-form-control">

                    </div>
                    <div style="position:absolute;left:339px;bottom:0.5px">
                        <a style="border-left:0;text-decoration:none;color:black;height:39px;" class="btn btn-gradient">Reset</a>
                    </div>

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
    $("#forgotpw").addClass("menu-open");
</script>
</body>