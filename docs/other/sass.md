# sass 简明教程

sass 是为了使 css 变得更容易编写而产生的一种 「css 预处理语言」

以下是 sass 的特性介绍：

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

怎么样，sass 代码看起来是不是有了一点对象的意味？