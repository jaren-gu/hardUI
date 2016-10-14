<script src="../js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../js/awesome.js"></script>
<script src="../js/plugins/sidebar.js"></script>

<script src="SyntaxHighlighter/scripts/shCore.js"></script>
<script src="SyntaxHighlighter/scripts/shBrushCss.js"></script>
<script src="SyntaxHighlighter/scripts/shBrushPhp.js"></script>
<script src="SyntaxHighlighter/scripts/shBrushJava.js"></script>
<script src="SyntaxHighlighter/scripts/shBrushXml.js"></script>
<script src="SyntaxHighlighter/scripts/shBrushJScript.js"></script>

<script>
    $("#sidebar_left").sidebar();
    $(function() {
        //右边导航fixed
        var elm = $('.bs-docs-sidebar'); 
        var startPos = $(elm).offset().top - 30; 
        $.event.add(window, "scroll", function() { 
            var p = $(window).scrollTop(); 
            $(elm).css('position',((p) > startPos) ? 'fixed' : 'static'); 
            $(elm).css('top',((p) > startPos) ? '5px' : ''); 
        }); 
        
        //流动监听
        $('body').scrollspy({ target: '.navbar-example' })
        $('[data-spy="scroll"]').each(function () {
		//var $spy = $(this).scrollspy('refresh')
        })
    });

    //
    function backToTop(){
        $('body,html').animate({scrollTop:0},600);
        return false;
    }

    function setFooterOffset(){
	    var bodyHeight = document.documentElement.clientHeight - document.body.clientHeight;

	    if (bodyHeight > 0){
	    	$("footer").css("position", "relative");
	    	$("footer").css("top",bodyHeight + "px");	
	    }
	}

	//
	setFooterOffset();

	window.onresize = setFooterOffset;

	SyntaxHighlighter.all();

    window.onload = function(){
        $(".syntaxhighlighter").children("div.toolbar").remove();
    }

</script>