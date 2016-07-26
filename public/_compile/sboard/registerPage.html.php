<?php /* Template_ 2.2.8 2016/05/30 08:53:21 D:\phpdev\workspace\qboard\public\_template\sboard\registerPage.html 000002609 */ ?>
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
                        <h3 class="box-title">REGISTER BOARD</h3>
                    </div>
                    <!-- /.box-header -->

                    <form role="form" action="?sboard.registerPost" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text"
                                       name='title' class="form-control" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
							<textarea class="form-control" name="content" rows="3"
                                      placeholder="Enter ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Writer</label>
                                <input type="text"
                                       name="writer" class="form-control" placeholder="Enter Writer">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

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