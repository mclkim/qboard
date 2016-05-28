<?php /* Template_ 2.2.8 2016/05/24 22:09:36 C:\phpdev\workspace\qboard\public\_template\board\listAll.html 000002664 */ 
$TPL_list_1=empty($TPL_VAR["list"])||!is_array($TPL_VAR["list"])?0:count($TPL_VAR["list"]);?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">LIST ALL PAGE</h3>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">BNO</th>
                                <th>TITLE</th>
                                <th>WRITER</th>
                                <th>REGDATE</th>
                                <th style="width: 10px">VIEW</th>
                            </tr>

<?php if($TPL_list_1){foreach($TPL_VAR["list"] as $TPL_V1){?>
                            <tr>
                                <td><?php echo $TPL_V1["bno"]?></td>
                                <td><a href='/?board.read&bno=<?php echo $TPL_V1["bno"]?>'><?php echo $TPL_V1["title"]?></a></td>
                                <td><?php echo $TPL_V1["writer"]?></td>
                                <td><?php echo $TPL_V1["regdate"]?></td>
                                <td><span class="badge bg-red"><?php echo $TPL_V1["viewcnt"]?></span></td>
                            </tr>
<?php }}?>
                        </table>

                    </div>
                    <!-- box-body -->
                    <div class="box-footer">Footer</div>
                    <!-- box-footer-->
                </div>
            </div>
            <!--col (left) -->

        </div>
        <!-- row -->
    </section>
    <!-- content -->
</div>
<!-- content-wrapper -->

<script>
    var result = '<?php echo $TPL_VAR["msg"]?>';

    if (result == 'SUCCESS') {
        alert("처리가 완료되었습니다.");
    }
</script>