# sass 简明教程

> 本文总结自 [SASS 中文网](http://www.sasschina.com/guide/)

### 简介

sass 是为了使 css 变得更容易编写而产生的一种 「css 预处理语言」，以下是 sass 的特性介绍。

### 文件后缀

sass 有可以有两种文件后缀
- sass
- scss

`sass` 不使用大括号和分号，而且对语法格式的检测也比较严格，`scss` 的语法则与普通 css 一致，默认情况下，都推荐使用 `scss` 后缀。

### 变量

变量是 sass 的一个重要特性，它让 css 变得可编程，可维护，简化了 css 的编写。

sass 的变量以字符 `$` 开始（旧版本中以 `!` 开始），一个 sass 的变量声明和使用代码如下：

```css
$font-size: 12px;

* {
    font-size:$font-size;
}
```
### 运算

sass 除了提供变量以外，还提供了简单的算术运算（加减乘除），颜色运算和布尔运算，但你很少会用到这一特性。

以下是一些运算示例：
```css
p{
    width: 1rem + 2rem; /*最终编译得出 width: 3rem;*/
    content: "hello" + "world"; /*最终编译得出 content: "hello world";*/
}
```



### 嵌套

嵌套是 sass 简化代码编写的一个重要手段， 它让 css 代码看起来更有层次，而且避免了父元素的重复书写。

以下是一段 sass 的嵌套示例代码：

```css
nav {

    background-color : #FFF; 

    ul {
        list-style: none;
    }

    li {
        display : inline-block;
    }
}
```

在编译后，它所对应的 css 代码如下：

```css
nav {
    background-color : #FFF;
}

nav ul {
    list-style: none;
}

nav li {
    display : inline-block;
}
```

可能这样的层次感看起来不够强烈，那么我们可以看看更酷的用法：

```css
a{
    color: blue;
    /* & 在这里有特殊的意义，具体的意义在后面会有解析 */
    &:hover{ color : green; }
    &:visted{ color: red; }
}
```

在编译后，它对应的 css 代码如下：

```css
a{ color: blue; }
a:hover{ color : green; }
a:visted{ color: red; }
```

怎么样，sass 代码看起来是不是有了一点对象的味道？

### 关于 ‘&’

如果你阅读过其它的 sass 教程，可能会留意到，上文中的 `&` 并不是必要的，也就是说即使你不写 `&` 
代码也会正常编译，结果也如你所想，那为什么还要写这个 `&` 呢。

仔细对比有 `&` 跟没 `&` 的 sass 代码编译出来的 css，你会发现，不写 `&` 的时候，
a 跟 :hover 之间是有空格的，而写了 & 之后 a 跟 :hover 之间是没有空格的，如下：

```
/* 加 & 的编辑结果 */
a:hover{color : green;}

/* 不加 & 的编辑结果 */
a :hover{color : green;}
```

尽管在这个例子里，两段代码的表现是一致的，但熟悉 css 规则后就会发现这里的问题，如果这里的选择器不是单层，而是多层呢？
比如说：

```
/* .nav a { &:hover{color:green; }} 编译结果 */
.nav a:hover{
    color : green;
}

/* .nav a { :hover{color:green; }} 编译结果 */
.nav a :hover{
    color : green;
}
```

这里两个 css 规则就有不同的意义了，两者的差异主要在于 `a` 元素自身是否在集合内。

- `.nav a:hover` ：表示在 `nav` 类下的所有 `a` 元素的 `:hover` 状态
- `.nav a :hover` ：表示在 `nav` 类下的 `a` 元素内的所有子元素的 `:hover` 状态

为什么会导致这种差异呢，因为 sass 在编译嵌套时会拼接父选择器跟子选择器，并在它们之间添加一个空格。
但当我们在子选择器前面加上 `&` 时，sass 只是简单的把 `&` 替换成父选择器，而不会做其它操作。
于是，我们有了一些比较有趣的嵌套用法：
```css
.a{
    .b & {
        color:green;
    }
}
```
编译结果
```css
.b .a {
    color:green;
}
```

### 「扩展」 与 「继承」

sass 让 css 代码有了对象的味道，那有没有对象的经典特性 -- 「扩展」 与 「继承」呢？

有！sass 通过 `@extend` 就可以让样式得以「扩展」和 「继承」，例如：

```css
.a{
    border: 1px solid #bbb;
}

.b{
    @extend .a;
    border-color: red;
}
```

这段代码编译之后是这样的：

```css
.a, .b{
    border: 1px solid #bbb;
}

.b{
    border-color: red;
}
```

`.b` 选择器在「继承」了 `.a` 选择器的样式之后，又再「扩展」了自己的样式。

### mixin 

有了「对象」，就当然有「方法」了， sass 通过 @mixin 提供了「方法」特性，@mixin 的使用示例如下：

```css
@mixin padding-horizontal( $value ){
    padding-left: $value;
    padding-right:$value;
}

.a{
    border:1px solid #ccc;
    @include padding-horizontal(3px);
}
```

以上代码编译结果为

```css
.a{
    border:1px solid #ccc;
    padding-left: 3px;
    padding-right: 3px;
}
```

### 导入

当 sass 代码开始庞大，我们可能会把代码分拆为不同的文件，但是为了引用方便，我们又希望把这些分散的 sass 文件编译成一个 css 文件，所幸 sass 提供了导入特性 @import 来解决这个问题。

以下是一些 sass 文件导入的特性：

- sass 文件可以以下划线 '_' 开头，但引入时可以忽略下划线
- sass 文件的引入可以忽略文件后缀「sass」或「scss」
- 引入的 sass 文件会合并到编译后的 css 文件中

当然 sass 也可以直接引入 css 文件，这不会引起错误，但是要注意这两者的引入有一点不同：

- css 文件的引入在编译后的 css 文件中依旧以 @import 方式存在，而不会合并到此 css 中

以下是 sass 导入的使用示例：

```css
/* a.scss*/
.a{
    color:red;
}

/* b.css*/
.b{
    color:green;
}

/* c.scss*/
@import "a"
@import "b.css"
.c{
    color:blue;
}
```

c.scss 文件的编译结果如下：

```css
@import "b.css"

.a{
    color:red;
}

.c{
    color:blue;
}
```

可以注意到，引入的 css 文件并没有被合并到编译结果中，而是依旧保持导入方式存在。