<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增題目</title>
<link rel=stylesheet type="text/css" href="css/vote_style.css">

	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
     <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>

function showAnswer(){
	var i;
	$('#answer').empty(); 
	for(i=0; i<$('#total').val() ;i++){
		//alert($('#answer').text());
		$('#answer').append( 
		"<p>"+(i+1)+". <input id='not_empty' type='text' name='answer[]' value=''></p>" );
	}	
	$('input[type="submit"]').attr({disabled: false});	//新增啟用
	
	//假設"幾個選項"沒填入值，則送出按鈕就不啟用
	if($("#total").val()=='')
		$('input[type="submit"]').attr('disabled','true');		
}

function clearText(){
	$("form :text").val('');
	showAnswer();
}

$().ready(function(){
	$('input[type="submit"]').attr('disabled','true');
});

</script>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Hellovotes</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?d=hellovotes&c=votes&a=index"><font color="#404040">投票首頁</font></a></li>
                    <li><a href="index.php?d=hellovotes&c=votes&a=result"><font color="#404040">投票結果</font></a></li>
                    <li><a href="index.php?d=hellovotes&c=votes&a=add"><font color="#404040">新增題目</font></a></li>
                    <li><a href="index.php?d=hellovotes&c=votes&a=add_quest"><font color="#404040">製作問卷</font></a></li>
                    <li><a href="index.php?d=hellovotes&c=votes&a=del"><font color="#404040">刪除題目</font></a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
     <!-- Main Content -->
    <div class="container">
    	<div class="row">
        	<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            
            	<br><br><br><br>

    <form id='addvote' method="POST" action="index.php?d=hellovotes&c=votes&a=add_vote"> 
    
    <p>題目<input type="text" id='title' onBlur="" name="tName" >
    	題型<select name="tType">
            <option value="1">單選題</option>
            <option value="N">多選題</option>
        </select></p>
    <p>幾個選項<input type="text" id='total' onBlur="showAnswer()" ></p>
    <div id='answer'></div>
    <p><input type="hidden" name="vote_go" value="choose"> </p>
    <p><input type="submit" name="A1" value="新增題目" >
        <input type="reset" name="R1" value="清空" onClick="clearText()"></p> 
    </form> 
    
    <br>
    <h3>倒數<?php echo $_SESSION['quest']['count'];?>題</h3>
    
    		    		</div>
    	</div>
    
    
    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; hellorh 2015 by Ronghong</p>
                </div>
            </div>
        </div>
    </footer>
    
    </div>
    
     <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
   
</body>
</html>