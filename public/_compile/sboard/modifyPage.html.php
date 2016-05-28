<?php /* Template_ 2.2.8 2016/05/27 09:45:02 C:\phpdev\workspace\qboard\public\_template\sboard\modifyPage.html 000004510 */ ?>
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
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">MODIFY BOARD</h3>
                    </div>
                    <!-- /.box-header -->

                    <form role="form" action="?sboard.modifyPost" method="post">

                        <input type='hidden' name='page' value="<?php echo $TPL_VAR["cri"]["page"]?>">
                        <input type='hidden' name='perPageNum' value="<?php echo $TPL_VAR["cri"]["perPageNum"]?>">
                        <input type='hidden' name='searchType' value="<?php echo $TPL_VAR["cri"]["searchType"]?>">
                        <input type='hidden' name='keyword' value="<?php echo $TPL_VAR["cri"]["keyword"]?>">

                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">BNO</label>
                                <input type="text"
                                       name='bno' class="form-control"
                                       value="<?php echo $TPL_VAR["boardVO"]["bno"]?>"
                                       readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text"
                                       name='title' class="form-control"
                                       value="<?php echo $TPL_VAR["boardVO"]["title"]?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <textarea class="form-control" name="content" rows="3"><?php echo $TPL_VAR["boardVO"]["content"]?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Writer</label>
                                <input type="text" name="writer" class="form-control"
                                       value="<?php echo $TPL_VAR["boardVO"]["writer"]?>">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                        <button type="submit" class="btn btn-warning">CANCEL</button>
                    </div>

                    <script>
                        $(document).ready(function () {

                            var formObj = $("form[role='form']");

                            console.log(formObj);

                            $(".btn-warning").on("click", function () {
                                self.location = "?sboard.listPage?page=<?php echo $TPL_VAR["cri"]["page"]?>&perPageNum=<?php echo $TPL_VAR["cri"]["perPageNum"]?>"
                                        + "&searchType=<?php echo $TPL_VAR["cri"]["searchType"]?>&keyword=<?php echo $TPL_VAR["cri"]["keyword"]?>";
                            });

                            $(".btn-primary").on("click", function () {
                                formObj.submit();
                            });
                        });
                    </script>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->