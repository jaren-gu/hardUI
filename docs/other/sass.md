# sass 简明教程

sass 是为了使 css 变得更容易编写而产生的一种 「css 预处理语言」

以下是 sass 的特性介绍：

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

