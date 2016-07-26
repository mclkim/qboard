<?php /* Template_ 2.2.8 2016/05/30 08:53:21 D:\phpdev\workspace\qboard\public\_template\sboard\listPage.html 000007064 */ 
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
                <div class='box'>
                    <div class="box-header with-border">
                        <h3 class="box-title">Board List</h3>
                    </div>


                    <div class='box-body'>

                        <select name="searchType">
                            <option value="n" <?php if($TPL_VAR["pageMaker"]["cri"]["searchType"]==null){?>selected<?php }?>>------</option>
                            <option value="t" <?php if($TPL_VAR["pageMaker"]["cri"]["searchType"]=='t'){?>selected<?php }?>>Title</option>
                            <option value="c" <?php if($TPL_VAR["pageMaker"]["cri"]["searchType"]=='c'){?>selected<?php }?>>Content</option>
                            <option value="w" <?php if($TPL_VAR["pageMaker"]["cri"]["searchType"]=='w'){?>selected<?php }?>>Writer</option>
                            <option value="tc" <?php if($TPL_VAR["pageMaker"]["cri"]["searchType"]=='tc'){?>selected<?php }?>>Title OR Content</option>
                            <option value="cw" <?php if($TPL_VAR["pageMaker"]["cri"]["searchType"]=='cw'){?>selected<?php }?>>Content OR Writer
                            </option>
                            <option value="tcw" <?php if($TPL_VAR["pageMaker"]["cri"]["searchType"]=='tcw'){?>selected<?php }?>>Title OR Content OR
                            Writer
                            </option>
                        </select>
                        <input type="text" name='keyword' id="keywordInput" value='<?php echo $TPL_VAR["pageMaker"]["cri"]["keyword"]?>'>
                        <button id='searchBtn'>Search</button>
                        <button id='newBtn'>New Board</button>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">LIST PAGING</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">BNO</th>
                                <th>TITLE</th>
                                <th>WRITER</th>
                                <th>REGDATE</th>
                                <th style="width: 40px">VIEWCNT</th>
                            </tr>

<?php if($TPL_list_1){foreach($TPL_VAR["list"] as $TPL_V1){?>
                            <tr>
                                <td><?php echo $TPL_V1["bno"]?></td>
                                <td><a href='?sboard.readPage&bno=<?php echo $TPL_V1["bno"]?>&<?php echo $TPL_VAR["pageMaker"]["query"]?>'>
                                    <?php echo $TPL_V1["title"]?> <strong>[ <?php echo $TPL_V1["replycnt"]?> ]</strong>
                                </a></td>
                                <td><?php echo $TPL_V1["writer"]?></td>
                                <td><?php echo $TPL_V1["regdate"]?></td>
                                <td><span class="badge bg-red"><?php echo $TPL_V1["viewcnt"]?></span></td>
                            </tr>
<?php }}?>

                        </table>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">

                        <div class="text-center">
                            <ul class="pagination">

<?php if($TPL_VAR["pageMaker"]["prev"]){?>
                                <li><a href="<?php echo $TPL_VAR["pageMaker"]["startPage"]- 1?>">&laquo;</a></li>
<?php }?>

<?php if(is_array($TPL_R1=$TPL_VAR["pageMaker"]["pages"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?>
<?php if($TPL_VAR["pageMaker"]["cri"]["page"]==$TPL_K1){?>
                                <li class='active'>
<?php }else{?>
                                <li>
<?php }?>
                                    <a href="<?php echo $TPL_K1?>"><?php echo $TPL_K1?></a>
                                </li>
<?php }}?>

<?php if($TPL_VAR["pageMaker"]["next"]&&$TPL_VAR["pageMaker"]["endPage"]> 0){?>
                                <li><a href="<?php echo $TPL_VAR["pageMaker"]["endPage"]+ 1?>">&raquo;</a></li>
<?php }?>

                            </ul>
                        </div>

                    </div>
                    <!-- /.box-footer-->
                </div>
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<form id="jobForm">
    <input type='hidden' name="action" value="">
    <input type='hidden' name="page" value=<?php echo $TPL_VAR["pageMaker"]["cri"]["page"]?>>
    <input type='hidden' name="perPageNum" value=<?php echo $TPL_VAR["pageMaker"]["cri"]["perPageNum"]?>>
    <input type='hidden' name="searchType" value=<?php echo $TPL_VAR["pageMaker"]["cri"]["searchType"]?>>
    <input type='hidden' name="keyword" value=<?php echo $TPL_VAR["pageMaker"]["cri"]["keyword"]?>>
</form>

<script>
    $(document).ready(function () {
        $('#searchBtn').on("click", function (event) {
            self.location = "?sboard.listPage"
                    + '&<?php echo $TPL_VAR["pageMaker"]["first"]?>'
                    + "&searchType=" + $("select option:selected").val()
                    + "&keyword=" + $('#keywordInput').val();
        });

        $('#newBtn').on("click", function (evt) {
            self.location = "?sboard.registerPage";
        });
    });

    $(".pagination li a").on("click", function (event) {

        event.preventDefault();

        var targetPage = $(this).attr("href");

        var jobForm = $("#jobForm");

        jobForm.find("[name='page']").val(targetPage);
        jobForm.find("[name='action']").val('sboard.listPage');
        jobForm.attr("method", "get");
        jobForm.submit();
    });
</script>

<script>
    var result = '<?php echo $TPL_VAR["msg"]?>';

    if (result == 'SUCCESS') {
        alert("처리가 완료되었습니다.");
        location.replace(self.location);
    }
</script>