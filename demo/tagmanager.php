<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <link href="../css/plugins/tagmanager.css" rel="stylesheet"/>
    <?php include "head.php"?>
    <title>Awesome UI</title>
</head>
<body>
<div class="container">
    <h1>TagManager</h1>
    <div class="as-panel">
        <div class="as-panel-header"></div>
        <div class="as-panel-body">
            <div class="as-form-group">
                <label class="col-md-3 as-control-label">Tag Field</label>
                <div class="col-md-9">
                    <input type="text" id="tagmanager" class="as-form-control">
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "foot.php"?>
<script src="../js/plugins/tagmanager.js"></script>
<script type="text/javascript">
    $("#tagmanager").tagmanager({
        color: "primary"
    });
</script>
</body>
</html>