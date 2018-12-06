<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="KeyWords" CONTENT="投票'線上投票'小小投票'小小民調'問卷'免費線上問卷'選擇題'單選題'問卷統計">
<META NAME="KeyWords" CONTENT="vote'hellovotes'ronghong'hellorh'hello080810'hellorh.000space.com">
<META NAME="Description" CONTENT="這是一個免費投票的好地方，表達您的想法與支持">
<META NAME="Author" CONTENT="Ronghong">
<META NAME="Creation-Date" CONTENT="16-jul-2015 14:31:01">
<link rev="made" href="mailto:hello080810@gmail.com">
<link rev="made" href="http://hellorh.000space.com/">
<title>首頁</title>
<style>
#gotop {
    display: block ;/*display;*/
    position: fixed;
	left: 20px;
    right: 20px;
    bottom: 20px;    
    padding: 5px 15px;    
    font-size: 10px;
    background: #777;
    color: white;
    /*cursor: pointer;*/
}
</style>
<script type="text/javascript">
$(function(){
    $("#gotop").click(function(){
        jQuery("html,body").animate({
            scrollTop:0
        },1000);
    });
    $(window).scroll(function() {
        if ( $(this).scrollTop() > 300){		//若大於 300px 就會將按鈕顯示出來，小於就會隱藏。
            $('#gotop').fadeIn("fast");
        } else {
            $('#gotop').stop().fadeOut("fast");
        }
    });
});
</script>
</head>
<body>
<h1>Hello , Welcome my web </h1>
<h2>go to <a href="index.php?d=hellovotes&c=votes&a=index">Hellovotes</a></h2>

<div id="gotop"><p>&copy; 2015 <i>RongHong</i> All rights reserved Design. <i>Have any questions send <u>hello080810@gmail.com</u></i><p></div>
</body>
</html>
