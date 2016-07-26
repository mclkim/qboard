<?php /* Template_ 2.2.8 2016/05/30 08:53:21 D:\phpdev\workspace\qboard\public\_template\reply\listTemplate.html 000000965 */ 
$TPL_list_1=empty($TPL_VAR["list"])||!is_array($TPL_VAR["list"])?0:count($TPL_VAR["list"]);?>
<?php if($TPL_list_1){foreach($TPL_VAR["list"] as $TPL_V1){?>
<li class="replyLi" data-rno=<?php echo $TPL_V1["rno"]?>>
    <i class="fa fa-comments bg-blue"></i>
    <div class="timeline-item">
                <span class="time">
                <i class="fa fa-clock-o"></i><?php echo $TPL_V1["regdate"]?>

                </span>
        <h3 class="timeline-header"><strong><?php echo $TPL_V1["rno"]?></strong> -<?php echo $TPL_V1["replyer"]?></h3>
        <div class="timeline-body"><?php echo $TPL_V1["replytext"]?></div>
        <div class="timeline-footer">
            <a class="btn btn-primary btn-xs"
               data-toggle="modal" data-target="#modifyModal">Modify</a>
        </div>
    </div>
</li>
<?php }}?>