<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../css/awesome.css" rel="stylesheet"/>
    <link href="../css/plugins/login.css" rel="stylesheet"/>
    <link href="../css/font-awesome.min.css" rel="stylesheet"/>
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->

    <title>Awesome UI</title>
</head>
<body class="external-page external-alt sb-l-c sb-r-c onload-check sb-l-m">
    <div id="main">
        <section class="content_wrapper">
            <section id="content">
                <div class="admin-form theme-info mw500">
                    <div class="as-panel mt30 mb25">
                        <form method="post" action="">
                            <div class="as-panel-body panel-body-top bg-light p25 pb15">
                                <div class="section row">
                                    <div class="col-md-6">
<!--                                        <a class="btn btn-dark btn-block">客户</a>-->
                                        <a href="#" class="button btn-social facebook span-left btn-block">
                                        <span>
                                            <i class="fa fa-user"></i>
                                        </span>用户登录</a>
                                    </div>
                                    <div class="col-md-6">
<!--                                        <a class="btn btn-danger btn-block">代理商</a>-->
                                        <a href="#" class="button btn-social googleplus span-left btn-block">
                                        <span>
                                            <i class="fa fa-user-secret"></i>
                                        </span>代理商登录</a>
                                    </div>
                                </div>
                                <div class="section-divider mv30">
                                    <span>OR</span>
                                </div>
                                <div class="section">
                                    <label for="username" class="field-label text-muted fs14 mb10">用户名</label>
                                    <label for="username" class="field prepend-icon">
                                        <input type="text" name="username" class="gui-input" placeholder="手机号/邮箱">
                                        <label for="username" class="field-icon"><i class="fa fa-user"></i></label>
                                    </label>
                                </div>
                                <div class="section">
                                    <label for="username" class="field-label text-muted fs14 mb10">登录密码</label>
                                    <label for="password" class="field prepend-icon">
                                        <input type="password" name="password" class="gui-input" placeholder="登录密码">
                                        <label for="password" class="field-icon"><i class="fa fa-lock"></i></label>
                                    </label>
                                </div>
                            </div>
                            <div class="as-panel-footer clearfix">
                                <button type="submit" class="btn btn-primary mr10 pull-right">登&nbsp;录</button>
                                <label class="mt10">
                                    <input type="checkbox" name="remember" id="remember" checked="">
                                    <label for="remember" data-on="YES" data-off="NO"></label>
                                    <span>记住帐号</span>
                                </label>
                            </div>
                        </form>
                    </div>

                    <div class="login-links">
                        <p>
                            <a href="pages_forgotpw.html" tppabs="#" class="active" title="登录">忘记密码？</a>
                        </p>
                        <p>还没有帐号？
                            <a href="pages_register.html" tppabs="http://admindesigns.com/demos/absolute/1.1/pages_register.html" title="注册">立即注册</a>
                        </p>
                    </div>

                </div>
            </section>
        </section>
    </div>

<?php include "foot.php"?>
</body>
</html>