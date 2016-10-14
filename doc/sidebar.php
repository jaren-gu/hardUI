<header class="navbar navbar-fixed-top bg-info">
    <div class="navbar-branding dark bg-info">
        <a href="#" class="navbar-brand"><i class="fa fa-skyatlas pr5"></i>Awesome扩展</a>
        <span id="toggle_sidemenu_l" class="fa fa-bars"></span>
    </div>
</header>
<aside id="sidebar_left" class="nano nano-light affix has-scrollbar sidebar-default">
    <!-- Start: Sidebar -->
    <div class="sidebar-left-content nano-content">
        <!--        <header class="sidebar-header">-->
        <!--            <div class="sidebar-widget author-widget">-->
        <!--                <div class="media">-->
        <!--                    <a class="media-left" href="#">-->
        <!--                        <img src="../doc/img/3.jpg" class="img-responsive">-->
        <!--                    </a>-->
        <!--                    <div class="media-body">-->
        <!--                        <div class="media-links">-->
        <!--                            <a href="#" class="sidebar-menu-toggle">用户菜单 -</a>-->
        <!--                            <a href="_ROOT_/Home/Index/Login">退出</a>-->
        <!--                        </div>-->
        <!--                        <div class="media-author">admin</div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </header>-->

        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt15">会员数据</li>
            <li>
                <a id="faq-list" href="faq.php">
                    <span class="fa fa-calendar sidebar-icon"></span>
                    <span class="sidebar-title"> 帮助与文档 </span>
                </a>
            </li>
            <li>
                <a id="invoice-list" class="accordion-toggle" href="#">
                    <span class="fa fa-cogs sidebar-icon"></span>
                    <span class="sidebar-title">发票，账单，报表类</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a id="bill" href="view/extend/bill.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            付费表单
                        </a>
                    </li>
                    <li>
                        <a id="invoice" href="view/extend/invoice.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            报表
                        </a>
                    </li>
                    <li>
                        <a  id="cash" href="view/extend/cash.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            现金支付
                        </a>
                    </li>
                    <li>
                        <a id="combo" href="view/extend/combo.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            VIP套餐
                        </a>
                    </li>
                    <li>
                        <a id="commontable1" href="view/extend/commontable1.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            通用列表1
                        </a>
                    </li>
                    <li>
                        <a id="commontable2" href="view/extend/commontable2.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            通用列表2
                        </a>
                    </li>
                    <li>
                        <a id="flowone" href="view/extend/flowone.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            业务流程1
                        </a>
                    </li>
                    <li>
                        <a  id="flowtwo" href="view/extend/flowtwo.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            业务流程2
                        </a>
                    </li>
                    <li>
                        <a id="leadpage" href="view/extend/leadpage.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            标签打印
                        </a>
                    </li>
                    <li>
                        <a id="pandect" href="view/extend/pandect.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            账户总览
                        </a>
                    </li>
                    <li>
                        <a id="reminder" href="view/extend/reminder.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            域名信息模板管理
                        </a>
                    </li>
                    <li>
                        <a id="rebate" href="view/extend/rebate.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            返利推荐
                        </a>
                    </li>
                    <li>
                        <a id="remit" href="view/extend/remit.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            线下汇款
                        </a>
                    </li>
                    <li>
                        <a id="workOrder" href="view/extend/workOrder.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            财务类
                        </a>
                    </li>
                    <li>
                        <a id="deposit" href="view/extend/deposit.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            申请提现
                        </a>
                    </li>
                    <li>
                        <a id="recharge" href="view/extend/recharge.php">
                            <span class="fa fa-arrows-h sidebar-icon"></span>
                            充值
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a id="profile-list" href="view/extend/profile.php">
                    <span class="fa fa-cogs sidebar-icon"></span>
                    <span class="sidebar-title"> 个人中心类 </span>
                </a>
            </li>
            <li>
                <a id="search-list" href="view/extend/search.php">
                    <span class="fa fa-cogs sidebar-icon"></span>
                    <span class="sidebar-title"> 搜索类 </span>
                </a>
            </li>
            <li>
                <a id="success-list" class="accordion-toggle" href="#">
                    <span class="fa fa-columns sidebar-icon"></span>
                    <span class="sidebar-title">重置或结果类</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a id="member-li" class="accordion-toggle" href="#">
                            <span class="fa fa fa-arrows-h sidebar-icon"></span>
                            成功、失败、结束
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a id="success" href="view/extend/success.php">
                                    <span class="fa fa-arrows-h sidebar-icon"></span>
                                    成功
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a id="forgotpw" href="view/extend/forgotpw.php">
                            <span class="fa fa fa-arrows-h sidebar-icon"></span>
                            重置密码
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- End: Sidebar -->
</aside>