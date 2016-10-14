<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../css/awesome.css" rel="stylesheet"/>
    <link href="../css/plugins/sidebar.css" rel="stylesheet"/>
    <link href="../css/plugins/process.css" rel="stylesheet"/>
    <link href="../css/font-awesome.min.css" rel="stylesheet"/>
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->

    <title>Awesome UI</title>
</head>
<body class="dashboard-page sb-l-o sb-r-c">

    <header class="navbar navbar-fixed-top bg-info">
        <div class="navbar-branding dark bg-info">
            <a href="#" class="navbar-brand"><i class="fa fa-skyatlas pr5"></i>代理商控制台</a>
            <span id="toggle_sidemenu_l" class="fa fa-bars"></span>
        </div>
    </header>

    <div id="main">
        <aside id="sidebar_left" class="nano nano-light affix has-scrollbar sidebar-default">
            <!-- Start: Sidebar -->
            <div class="sidebar-left-content nano-content">
                <header class="sidebar-header">
                    <div class="sidebar-widget author-widget">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="../doc/img/3.jpg" class="img-responsive">
                            </a>
                            <div class="media-body">
                                <div class="media-links">
                                    <a href="#" class="sidebar-menu-toggle">用户菜单 -</a>
                                    <a href="_ROOT_/Home/Index/Login">退出</a>
                                </div>
                                <div class="media-author">admin</div>
                            </div>
                        </div>
                    </div>
                </header>

                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt15">会员数据</li>
                    <li>
                        <a id="person-node" href="_ROOT_/Home/Person/listPerson">
                            <span class="fa fa-calendar sidebar-icon"></span>
                            <span class="sidebar-title"> 人员数据 </span>
                        </a>
                    </li>
                    <li>
                        <a id="org-node" class="accordion-toggle" href="#">
                            <span class="fa fa-cogs sidebar-icon"></span>
                            <span class="sidebar-title">组织数据</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a id="org-li" href="_ROOT_/Home/Org/listOrganization">
                                    <span class="fa fa-arrows-h sidebar-icon"></span>
                                    组织列表
                                </a>
                            </li>
                            <li>
                                <a id="org-department" href="_ROOT_/Home/Org/listDepartment">
                                    <span class="fa fa-arrows-h sidebar-icon"></span>
                                    我的部门
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a id="person-node" href="_ROOT_/Home/Person/listPerson">
                            <span class="fa fa-cogs sidebar-icon"></span>
                            <span class="sidebar-title"> 人数据 </span>
                        </a>
                    </li>
                    <li>
                        <a id="person-node" href="_ROOT_/Home/Person/listPerson">
                            <span class="fa fa-cogs sidebar-icon"></span>
                            <span class="sidebar-title"> 员数据 </span>
                        </a>
                    </li>
                    <li>
                        <a id="member-node" class="accordion-toggle" href="#">
                            <span class="fa fa-columns sidebar-icon"></span>
                            <span class="sidebar-title">会员数据</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a id="member-li" class="accordion-toggle" href="#">
                                    <span class="fa fa fa-arrows-h sidebar-icon"></span>
                                    会员企业
                                    <span class="caret"></span>
                                </a>
                                <ul class="nav sub-nav">
                                    <li>
                                        <a id="org-li" href="_ROOT_/Home/Org/listOrganization">
                                            组织列表
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a id="org-department" href="#">
                                            我的部门
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a id="member-list" href="_ROOT_/Home/Member/listMember">
                                    <span class="fa fa fa-arrows-h sidebar-icon"></span>
                                    个人会员
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End: Sidebar -->
        </aside>

        <div id="content_wrapper">
            <header id="topbar" class="alt">
                <div class="breadcrumb">新建代理商资料</div>
            </header>
            <div id="content">
                <div class="page-heading">
                    <div class="media clearfix">
                        <a class="media-left pr30" href="#">
                            <img src="../doc/img/3.jpg" alt="holder-img">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">代理商全称<small> - 联系人</small></h4>
                            <p>Lorem ipsum dolor sit amet ctetur adicing elit, sed do eiusmod tempor incididunt</p>
                        </div>
                    </div>
                </div>
                
                <div class="as-panel">
<!--                    <div class="as-panel-header"></div>-->
                    <div class="as-panel-body panel-body-top pn">
                        <!-- Start toolBar -->
                        <div class="as-panel-menu clearfix">
                            <div class="DTTT btn-group">
                                <a href="/TP_DEV/Admin/Authority/showAddAuthority" class="btn btn-default light btn-sm"><span>新建</span></a>
                            </div>
                            <div class="table_filter">
                                <label>
                                    权限名称：
                                    <input type="search" class="as-form-control as-input-sm" id="title">
                                </label>
                                <button class="btn btn-info btn-sm" onclick="titleSearch()">查找</button>
                            </div>
                        </div>
                        <!-- End toolBar -->
                        <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                            <thead>
                            <tr>
                                <th>结算状况</th>
                                <th>购买时间</th>
                                <th>订单号</th>
                                <th>订单类型</th>
                                <th class="text-right">金额</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><span class="label label-success">已结算</span></td>
                                <td>2016-05-05 20:23:38</td>
                                <td>20160504006</td>
                                <td>购买套餐</td>
                                <td class="text-right text-danger"><b>￥4080.00</b></td>
                            </tr>
                            <tr>
                                <td><span class="label label-danger">未结算</span></td>
                                <td>2016-04-26 20:23:38</td>
                                <td>2016042600B</td>
                                <td>购买用户</td>
                                <td class="text-right text-danger"><b>￥1440.00</b></td>
                            </tr>                                                                            </tbody>
                        </table>
                        <div class="dt-panelfooter clearfix">
                            <div class="table_paginate" id="page"><nav><ul class="as-page"><li class="prev disabled"><a href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true">«</span></a></li><li class="active"><a href="/TP_DEV/Admin/Authority/showAuthorityList?page=1&amp;title=">1</a></li><li class="next disabled"><a href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true">»</span></a></li></ul></nav></div>
                        </div>
                    </div>
                </div>
<!--
                <div class="as-panel panel-warning panel-border top mt30 mb10 mw900 center-block">
                    <div class="as-panel-header">
                        <span class="as-panel-title">新建代理商资料</span>
                    </div>
                    <div class="as-panel-body bg-light dark">
                        <div class="as-form-group">
                            <label class="col-md-3 as-control-label">编号：</label>
                            <div class="col-md-9">
                                <input type="text" class="as-form-control">
                            </div>
                        </div>
                        <div class="as-form-group">
                            <label class="col-md-3 as-control-label">代理商全称：</label>
                            <div class="col-md-9">
                                <input type="text" class="as-form-control">
                            </div>
                        </div>
                        <div class="as-form-group">
                            <label class="col-md-3 as-control-label">联系人：</label>
                            <div class="col-md-9">
                                <input type="text" class="as-form-control">
                            </div>
                        </div>
                        <div class="as-form-group">
                            <label class="col-md-3 as-control-label">联系电话：</label>
                            <div class="col-md-9">
                                <input type="text" class="as-form-control">
                            </div>
                        </div>
                        <div class="as-form-group">
                            <label class="col-md-3 as-control-label">开户行：</label>
                            <div class="col-md-9">
                                <input type="text" class="as-form-control">
                            </div>
                        </div>
                        <div class="as-form-group">
                            <label class="col-md-3 as-control-label">账号：</label>
                            <div class="col-md-9">
                                <input type="text" class="as-form-control">
                            </div>
                        </div>
                        <div class="as-form-group">
                            <label class="col-md-3 as-control-label">地址：</label>
                            <div class="col-md-9">
                                <input type="text" class="as-form-control">
                            </div>
                        </div>
                        <div class="as-form-group">
                            <label class="col-md-3 as-control-label">税号：</label>
                            <div class="col-md-9">
                                <input type="text" class="as-form-control">
                            </div>
                        </div>
                        <div class="as-form-group">
                            <label class="col-md-3 as-control-label">登录密码：</label>
                            <div class="col-md-9">
                                <input type="text" class="as-form-control">
                            </div>
                        </div>
                    </div>
                    <div class="as-panel-footer text-right">
                        <button type="button" class="btn btn-sm btn-info"><i class="fa fa-envelope-o"></i>&nbsp;保存并发短信</button>
                        <button type="button" class="btn btn-sm btn-system"><i class="fa fa-save"></i>&nbsp;保存</button>
                        <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-refresh"></i>&nbsp;返回</button>
                    </div>
                </div>
-->
            </div>
        </div>
    </div>


<?php include "foot.php"?>
<script src="../js/plugins/sidebar.js"></script>
<script>
    $("#sidebar_left").sidebar();
</script>
</body>
</html>