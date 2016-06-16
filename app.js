//引入 express 模块
var express = require('express');

var utility = require('utility');

var superagent = require('superagent');

var cheerio = require('cheerio');

//获取 express 实例
var app = express();

//类似方法还有 post  put/patch delete
// request 中包含了浏览器传来的各种信息，比如 query 啊，body 啊，headers 啊之类的，都可以通过 req 对象访问到。
// res 对象，我们一般不从里面取信息，而是通过它来定制我们向浏览器输出的信息，比如 header 信息，比如想要向浏览器输出的内容。这里我们调用了它的 #send 方法，向浏览器输出一个字符串。
app.get('/', function (req, res, next) {

    //获取 req 传递的参数 w
    var word = req.query.w;

    if (undefined !== word) {
        var MD5Value = utility.md5(word);
        res.send('Hello World ' + MD5Value);
    }

    superagent.get('https://cnodejs.org/')
        .end(function (err, sres) {
            if (err) {
                return next(err);
            }

            // sres.text 里面存储着网页的 html 内容，将它传给 cheerio.load 之后
            // 就可以得到一个实现了 jquery 接口的变量，我们习惯性地将它命名为 `$`
            // 剩下就都是 jquery 的内容了
            var $ = cheerio.load(sres.text);
            var items = [];

            $("#topic_list .topic_title").each(function (idx, element) {
                var $element = $(element);
                items.push({
                    title: $element.attr('title'),
                    href: $element.attr('href')
                });
            });

            res.send(items);
        });
});

//监听指定端口，并在完成监听后调用函数
app.listen(80, function () {
    console.log('app is listening at port 80');
});