<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <link href="../css/plugins/listbox.css" rel="stylesheet"/>
        <?php include "head.php"?>
        <title>Awesome UI</title>
    </head>
    <body>
        <div class="container">
            <h1>ListBox</h1>
            <div class="as-panel">
                <div class="as-panel-header"></div>
                <div class="as-panel-body">
                    <div class="as=form-group" id="listbox">

                    </div>
                </div>
            </div>
        </div>



        <?php include "foot.php"?>
        <script src="../js/plugins/listbox.js"></script>
        <script type="text/javascript">
            $("#listbox").listbox({
                url:'http://127.0.0.1/TP_DEV/Home/Test/testA'
            });
        </script>
    </body>
</html>