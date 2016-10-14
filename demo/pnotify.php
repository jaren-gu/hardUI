<!DOCTYPE html>
<html lang="zh-CN">
<head>
<!--    <link href="../css/plugins/pnotify.css" rel="stylesheet"/>-->
    <?php include "head.php"?>
    <title>Awesome UI</title>
</head>
<body>
<div class="container">
    <h1>Pnotify</h1>
    <div class="as-panel">
        <div class="as-panel-header"></div>
        <div class="as-panel-body">
            <div class="as-form-group">
                <label class="col-md-3 as-control-label">Pnotify</label>
                <div class="col-md-9">
                    <button id="pnotify" class="btn btn-alert">点击</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "foot.php"?>
<script src="../js/plugins/pnotify.js"></script>
<script type="text/javascript">
    $("#pnotify").pnotify({
        type: 'warning',
        title:'Bootstrap Themed',
        text: 'Look at my beautiful styling! ^_^!Look at my beautiful styling! ^_^!Look at my beautiful styling! ^_^!Look at my beautiful styling! ^_^!Look at my beautiful styling! ^_^!'

    });
</script>
</body>
</html>