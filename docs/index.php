<!doctype html>
<html>
<head>

    <?php include "head.php" ?>

    <title>主页</title>

</head>

<body>
    <?php include "nav.php" ?>
    <div class="jumbotron jumbotronSty">
        <div class="container">
          <h1 class="text-center">JQuery Awsome</h1>
          <p class="text-center">帮助web开发者更轻松的打造出功能丰富并且美观的UI界面</p><br/>
          <p class="text-center"><a class="btn btn-primary" href="setup.php" role="button">了解Awesome</a></p>
        </div>
    </div>
    
    <div class="container">
        <div class="row contentSty">
            <section id="content" class="animated fadeIn">
                <h1>Awesome 简介</h1>
                <p>Awesome是一种基于jQuery的用户界面插件集合。</p>
                <p>Awesome为创建现代化，互动，JavaScript应用程序，提供必要的功能。</p>
                <p>使用Awesome你不需要写很多代码，你只需要通过编写一些简单HTML标记，就可以定义用户界面。</p>
                <p>Awesome是个完美支持HTML5网页的完整框架。</p>
                <p>Awesome节省您网页开发的时间和规模。</p>
                <p>Awesome很简单但功能强大的。</p>
            </section>
            <section id="content" class="animated fadeIn">
                <h1>在jQuery 和 HTML5 上轻松使用Awesome</h1>
                <p>jQuery Awesome 提供易于使用的组件，它使 Web 开发人员能快速地在流行的 jQuery 核心和 HTML5 上建立程序页面。 这些功能使您的应用适合今天的网络。 有两个方法声明的 UI 组件:</p>
                <p>1. 直接在 HTML 声明组件。</p>
                <pre class="brush:xml">
                    <div>
                        <input type="text" class="as-validatebox as-form-control" data-options="validType:'email'">
                    </div>
                </pre>
                <p>2. 编写 JavaScript 代码来创建组件。</p>
                <pre class="brush:xml">
                    <input id="cc" />
                </pre>
                <pre class="brush:js">
                    $('#cc').combobox({
                        url: ...,
                        required: true,
                        valueField: 'id',
                        textField: 'text'
                    });
                </pre>
            </section>
        </div>
    </div>
    
    <?php include "footer.php" ?>
    <?php include "foot.php" ?>
</body>
</html>
