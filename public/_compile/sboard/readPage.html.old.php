<?php /* Template_ 2.2.8 2016/05/27 18:08:29 C:\phpdev\workspace\qboard\public\_template\sboard\readPage.html.old 000012917 */ ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.1/handlebars.js"></script>

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
                        <input type='hidden' name='action'>
                        <input type='hidden' name='bno' value="<?php echo $TPL_VAR["boardVO"]["bno"]?>">
                        <input type='hidden' name='page' value="<?php echo $TPL_VAR["cri"]["page"]?>">
                        <input type='hidden' name='perPageNum' value="<?php echo $TPL_VAR["cri"]["perPageNum"]?>">
                        <input type='hidden' name='searchType' value="<?php echo $TPL_VAR["cri"]["searchType"]?>">
                        <input type='hidden' name='keyword' value="<?php echo $TPL_VAR["cri"]["keyword"]?>">
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
                        <button type="submit" class="btn btn-warning" id="modifyBtn">Modify</button>
                        <button type="submit" class="btn btn-danger" id="removeBtn">REMOVE</button>
                        <button type="submit" class="btn btn-primary" id="goListBtn">GO LIST</button>
                    </div>

                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">ADD NEW REPLY</h3>
                    </div>
                    <div class="box-body">
                        <label for="exampleInputEmail1">Writer</label>
                        <input class="form-control" type="text" placeholder="USER ID"
                               id="newReplyWriter">
                        <label for="exampleInputEmail1">Reply Text</label>
                        <input class="form-control" type="text"
                               placeholder="REPLY TEXT" id="newReplyText">
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" id="replyAddBtn">ADD
                            REPLY
                        </button>
                    </div>
                </div>

                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline time label -->
                    <li class="time-label" id="repliesDiv">
		  <span class="bg-green">
		    Replies List <small id='replycntSmall'> [ <?php echo $TPL_VAR["boardVO"]["replycnt"]?> ] </small>
		    </span>
                    </li>
                </ul>

                <div class='text-center'>
                    <ul id="pagination" class="pagination pagination-sm no-margin ">

                    </ul>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Modal -->
        <div id="modifyModal" class="modal modal-primary fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body" data-rno>
                        <p><input type="text" id="replytext" class="form-control"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" id="replyModBtn">Modify</button>
                        <button type="button" class="btn btn-danger" id="replyDelBtn">DELETE</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<script id="template" type="text/x-handlebars-template">
    {{#each .}}
    <li class="replyLi" data-rno={<?php echo $TPL_VAR["rno"]?>}>
        <i class="fa fa-comments bg-blue"></i>
        <div class="timeline-item">
  <span class="time">
    <i class="fa fa-clock-o"></i>{{prettifyDate regdate}}
  </span>
            <h3 class="timeline-header"><strong>{<?php echo $TPL_VAR["rno"]?>}</strong> -{<?php echo $TPL_VAR["replyer"]?>}</h3>
            <div class="timeline-body">{<?php echo $TPL_VAR["replytext"]?>}</div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-xs"
                   data-toggle="modal" data-target="#modifyModal">Modify</a>
            </div>
        </div>
    </li>
    {{/each}}
</script>

<script>
    Handlebars.registerHelper("prettifyDate", function (timeValue) {
        var dateObj = new Date(timeValue);
        var year = dateObj.getFullYear();
        var month = dateObj.getMonth() + 1;
        var date = dateObj.getDate();
        return year + "/" + month + "/" + date;
    });

    var printData = function (replyArr, target, templateObject) {

        var template = Handlebars.compile(templateObject.html());

        var html = template(replyArr);
        $(".replyLi").remove();
        target.after(html);

    }

    var bno = <?php echo $TPL_VAR["boardVO"]["bno"]?>

    ;

    var replyPage = 1;

    function getPage(pageInfo) {

        $.getJSON(pageInfo, function (data) {
            printData(data.list, $("#repliesDiv"), $('#template'));
            printPaging(data.pageMaker, $(".pagination"));

            $("#modifyModal").modal('hide');
            $("#replycntSmall").html("[ " + data.pageMaker.totalCount + " ]");

        });
    }


    var printPaging = function (pageMaker, target) {

        var str = "";

        if (pageMaker.prev) {
            str += "<li><a href='" + (pageMaker.startPage - 1)
                    + "'> << </a></li>";
        }

        for (var i = pageMaker.startPage, len = pageMaker.endPage; i <= len; i++) {
            var strClass = pageMaker.cri.page == i ? 'class=active' : '';
            str += "<li " + strClass + "><a href='" + i + "'>" + i + "</a></li>";
        }

        if (pageMaker.next) {
            str += "<li><a href='" + (pageMaker.endPage + 1)
                    + "'> >> </a></li>";
        }

        target.html(str);
    };

    $("#repliesDiv").on("click", function () {

        if ($(".timeline li").size() > 1) {
            return;
        }
        getPage("/replies/" + bno + "/1");

    });


    $(".pagination").on("click", "li a", function (event) {

        event.preventDefault();

        replyPage = $(this).attr("href");

        getPage("/replies/" + bno + "/" + replyPage);

    });


    $("#replyAddBtn").on("click", function () {

        var replyerObj = $("#newReplyWriter");
        var replytextObj = $("#newReplyText");
        var replyer = replyerObj.val();
        var replytext = replytextObj.val();


        $.ajax({
            type: 'post',
            url: '/replies/',
            headers: {
                "Content-Type": "application/json",
                "X-HTTP-Method-Override": "POST"
            },
            dataType: 'text',
            data: JSON.stringify({bno: bno, replyer: replyer, replytext: replytext}),
            success: function (result) {
                console.log("result: " + result);
                if (result == 'SUCCESS') {
                    alert("등록 되었습니다.");
                    replyPage = 1;
                    getPage("/replies/" + bno + "/" + replyPage);
                    replyerObj.val("");
                    replytextObj.val("");
                }
            }
        });
    });


    $(".timeline").on("click", ".replyLi", function (event) {

        var reply = $(this);

        $("#replytext").val(reply.find('.timeline-body').text());
        $(".modal-title").html(reply.attr("data-rno"));

    });


    $("#replyModBtn").on("click", function () {

        var rno = $(".modal-title").html();
        var replytext = $("#replytext").val();

        $.ajax({
            type: 'put',
            url: '/replies/' + rno,
            headers: {
                "Content-Type": "application/json",
                "X-HTTP-Method-Override": "PUT"
            },
            data: JSON.stringify({replytext: replytext}),
            dataType: 'text',
            success: function (result) {
                console.log("result: " + result);
                if (result == 'SUCCESS') {
                    alert("수정 되었습니다.");
                    getPage("/replies/" + bno + "/" + replyPage);
                }
            }
        });
    });

    $("#replyDelBtn").on("click", function () {

        var rno = $(".modal-title").html();
        var replytext = $("#replytext").val();

        $.ajax({
            type: 'delete',
            url: '/replies/' + rno,
            headers: {
                "Content-Type": "application/json",
                "X-HTTP-Method-Override": "DELETE"
            },
            dataType: 'text',
            success: function (result) {
                console.log("result: " + result);
                if (result == 'SUCCESS') {
                    alert("삭제 되었습니다.");
                    getPage("/replies/" + bno + "/" + replyPage);
                }
            }
        });
    });

</script>

<script>
    $(document).ready(function () {

        var formObj = $("form[role='form']");

        console.log(formObj);

        $("#modifyBtn").on("click", function () {
            formObj.find('input[name=action]').val('sboard.modifyPage');
            formObj.attr("method", "get");
            formObj.submit();
        });

        $("#removeBtn").on("click", function () {
            formObj.find('input[name=action]').val('sboard.removePage');
            formObj.attr("method", "post");
            formObj.submit();
        });

        $("#goListBtn ").on("click", function () {
            formObj.find('input[name=action]').val('sboard.listPage');
            formObj.attr("method", "get");
            formObj.submit();
        });

    });
</script>