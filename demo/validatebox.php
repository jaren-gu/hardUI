<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <!--<link href="../css/plugins/datatable.css" rel="stylesheet"/>-->
    <?php include "head.php"?>
    <title>Awesome UI</title>

</head>
<body>
<div class="container">
    <h1>Validatebox</h1>
    <div class="as-panel">
        <div class="as-panel-header"></div>
        <div class="as-panel-body">
            <div class="as-form-group">
                <label class="as-control-label col-md-2">Validatebox：</label>
                <div class="col-md-6">
                    <input type="text" class="as-form-control" id="asd">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/jquery-1.11.2.min.js"></script>
<script src="../js/plugins/validatebox.js"></script>
<script src="../js/plugins/parser.js"></script>
<script type="text/javascript">
    $("#asd").validatebox({
        validType:'number',
        addRule:{
            text:'number',
            rule: function(e){
                return /^[0-9]*$/.test(e);
            },
            message:'你输入的字符不是数字！'
        }
    });
</script>
</body>
</html>