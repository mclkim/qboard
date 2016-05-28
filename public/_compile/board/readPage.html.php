<?php /* Template_ 2.2.8 2016/05/25 18:37:25 C:\phpdev\workspace\qboard\public\_template\board\readPage.html 000004687 */ ?>
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
                        <h3 class="box-title">READ BOARD</h3>
                    </div>
                    <!-- /.box-header -->

                    <form role="form">
                        <input type='hidden' name='action' id="action">
                        <input type='hidden' name='bno' value="<?php echo $TPL_VAR["boardVO"]["bno"]?>">
                        <input type='hidden' name='page' value="<?php echo $TPL_VAR["cri"]["page"]?>">
                        <input type='hidden' name='perPageNum' value="<?php echo $TPL_VAR["cri"]["perPageNum"]?>">
                    </form>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text"
                                   name='title' class="form-control"
                                   value="<?php echo $TPL_VAR["boardVO"]["title"]?>"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
						<textarea class="form-control" name="content" rows="3"
                                  readonly="readonly"><?php echo $TPL_VAR["boardVO"]["content"]?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Writer</label>
                            <input type="text"
                                   name="writer" class="form-control"
                                   value="<?php echo $TPL_VAR["boardVO"]["writer"]?>"
                                   readonly="readonly">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-warning">Modify</button>
                        <button type="submit" class="btn btn-danger">REMOVE</button>
                        <button type="submit" class="btn btn-primary">GO LIST</button>
                    </div>


                    <script>
                        $(document).ready(function () {

                            var formObj = $("form[role='form']");

                            console.log(formObj);

                            $(".btn-warning").on("click", function () {
                                $('input[name=action]').val('board.modifyPage');
//                                formObj.attr("action", "?/board/modifyPage");
                                formObj.attr("method", "get");
                                formObj.submit();
                            });

                            $(".btn-danger").on("click", function () {
//                                formObj.attr("action", "?/board/removePage");
                                $('input[name=action]').val('board.removePage');
                                formObj.submit();
                            });

                            $(".btn-primary").on("click", function () {
                                $('input[name=action]').val('board.listPage');
                                formObj.attr("method", "get");
//                                formObj.attr("action", "?/board/listPage");
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