<?php /* Template_ 2.2.8 2015/07/26 20:52:38 C:\phpdev\workspace\qboard\public\_template\reply\ex00.html 000000818 */ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.1/handlebars.js"></script>


<div id="displayDiv">

</div>

<script>
    var source = "<h1><p>{<?php echo $TPL_VAR["name"]?>}</p> <p>{<?php echo $TPL_VAR["userid"]?>}</p> <p>{<?php echo $TPL_VAR["addr"]?>}</p></h1>";
    var template = Handlebars.compile(source);
    var data  = {name:"홍길동", userid:"user00", addr:"조선 한양"};

    $("#displayDiv").html(template(data));

</script>
</body>
</html>