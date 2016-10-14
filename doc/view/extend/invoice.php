<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <?php include "head.php"?>
    <title></title>
  <style>
 .as-panel-header{height:51px;}
  </style>
</head>
<body>
<?php include "sidebar.php"?>
<div id="content_wrapper">
    <div id="content">
        <div class="jumbotron jumbotronSty">
            <div class="container-fluid">
                 <div class="row">
                    <div class="col-md-12 mt15">
                        <div class="as-panel">
                            <div class="as-panel-header">
                                <span class=" as-panel-title">Border Top</span></span>
                                <span class="as-panel-controls">
                                    <a class="btn btn-sm btn-default">a</a>
                                    <a class="btn btn-sm btn-default">b</a>
                                </span>
                            </div>
                            <div class="as-panel-body">
                                <div class="col-md-12">
                                <div class="col-md-4">
                                    <ul style="list-style: none">
                                    <li><b class="fs26">INVOICE</b></li>
                                    <li ><b>Created: Nov 23 2013</b></li>
                                    <li><span class="fw600">status:</span> <span class="text-success">Paid - On Time</span></li>


                                </div>
                                <div class="text-center col-md-4">
                                    <img src="../../img/3.png"class=""/>


                                </div>
                                <div class="text-right col-md-4">
                                        <p class="mt20 "><span><b>Sales Rep:</b></span> <span class="text-primary">Michael Ronny</span></p>


                                </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="col-md-4">
                                       <div class="as-panel">
                                           <div class="as-panel-header">
                                               <span class="as-panel-title"><i class="fa fa-user"></i> Bill to:</span>
                                               <span class="as-panel-controls">Edit</span>
                                           </div>
                                           <div class="as-panel-body">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu</div>

                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="as-panel">
                                            <div class="as-panel-header">
                                                <span class="as-panel-title"><i class="fa fa-paper-plane"></i> Bill to:</span>
                                                <span class="as-panel-controls">Edit</span>
                                            </div>
                                            <div class="as-panel-body">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu</div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="as-panel ">
                                            <div class="as-panel-header">
                                                <span class="as-panel-title"><i class="fa fa-info"></i> Invoice Details</span>
                                            </div>
                                            <div class="as-panel-body">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu</div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="as-table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>Description</th>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>number</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                            <td>1</td>
                                            <td>Mike</td>
                                            <td>cell</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="mt20 pull-left">

                                        <p class=" fs15 text-primary">Thanks for your business</p>



                                        <a class="btn btn-default mt20">Print invoice</a>
                                        <a class="btn btn-info ml10 mt20">Save invoice</a>

                                    </div>
                                    <div style="margin-right:80px;"class=" pull-right mt20  ">
                                        <p style="border-bottom:1px solid #D4D4D4;"><span class=" fw600 fs15 ">sub Total:</span><span class="pull-right">$1375.98</span></p>
                                        <p style="border-bottom:1px solid #D4D4D4;"><span style="margin-right:110px;"class="fw600 fs15 ">sub Total:</span>$1375.98</p>
                                        <p style="border-bottom:1px solid #D4D4D4;"><span style="margin-right:110px;"class="fw600 fs15">sub Total:</span>$1375.98</p>
                                        <p style="border-bottom:1px solid #D4D4D4;"><span style="margin-right:110px;"class="fw600 fs15">sub Total:</span>$1375.98</p>
                                        <p style="border-bottom:1px solid #D4D4D4;"> <span style="margin-right:110px;"class="fw600 fs15">sub Total:</span>$1375.98</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php include "foot.php"?>
<script>
    $("#invoice-list").addClass("menu-open");
    $("#invoice").addClass("menu-open");
</script>
</body>
</html>