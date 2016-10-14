<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <?php include "head.php" ?>
        <title>起步</title>
    </head>
    <body data-spy="scroll" data-target=".navbar-example">
        
        <?php include "nav.php" ?>
        
        <div class="jumbotron jumbotronSty">
            <div class="container">
                <h1>起步</h1>
                <p>简单介绍 AwesomeUI 如何下载、使用，还有基础模板等</p>
            </div>
        </div>

        <div class="container">
            <div class="row contentSty">
                
                <div class="col-md-9" role="main">

                    <div class="bs-docs-section" id="download">
                        <?php include "view/setup/download.html" ?>
                    </div>

                    <div class="bs-docs-section" id="package">
                        <?php include "view/setup/package.html" ?>
                    </div>

                    <div class="bs-docs-section" id="method">
                        <h1>使用</h1>
                    </div>

                    <div class="bs-docs-section" id="dependent">
                        <?php include "view/setup/method.html" ?>
                    </div>
                    
                    <div class="bs-docs-section" id="model">
                        <?php include "view/setup/model.html" ?>
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top navbar-example" role="complementary">
                        <ul class="nav bs-docs-sidenav">

                            <li>
                                <a href="#download">下载</a>
                            </li>

                            <li>
                                <a href="#package">包含的内容</a>
                            </li>
                            
                            <li>
                                <a href="#method">使用</a>
                                <ul class="nav">
                                    <li><a href="#dependent ">引入依赖</a></li>
                                    <li><a href="#model">基础模板</a></li>
                                </ul>
                            </li>
                        </ul>

                        <a class="back-to-top" href="javascript:backToTop();">返回顶部</a>
                        
                    </div>
                </div>

            </div>
        </div>



        
        <?php include "footer.php" ?>
        <?php include "foot.php" ?>
        
    </body>
</html>