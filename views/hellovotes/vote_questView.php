<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投票首頁</title>
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

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
$().ready(function(){	
	$('#show_new').hide();
});

function show_new_ans(my){
	$('#show_new').show();
	$(my).hide();
}
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

<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>"> 
<?php

$b;		$rand=1;
foreach($row as $k=>$v)
{
	if($k==0){
		$max_id=$v['tId'];	//在第一筆資料時產生一個亂數最大值
		$rand=rand(0,count($rand_id)-1);	
		echo $rand_id[$rand];		//第幾個題目編號
	}
	
	
	if($rand_id[$rand]!=$v['tId'])continue;		//與亂數比對題目，產生隨機抽
	if($b!=$v['tId'])
		echo "<br/><hr/>".$v['tName'];	
	
	if(!empty($v['aName']))
		if($v['tType']=='1'){
			echo "<p><input type='radio' value='".$v['aId']."' name='vote'>".$v['aName']."</p>";
		}
		elseif($v['tType']=='N'){
			echo "<p><input type='checkbox' value='".$v['aId']."' name='vote[]'>".$v['aName']."</p>";	
			
		}
	
	$b=$v['tId'];
}

echo "<p id='show_new'><input type='text' name='new_ans' value=''></p>";		//藏一個新項目文字框

?>
<p><!--<input type="button" onClick="show_new_ans(this)" value="新項目">--></p>
<p><hr></p>
<p><input type="hidden" name="tid" value="<?php echo $b;?>"> </p>
<p><input type="submit" value=">" name="B1"><font color="#339966">(若都有選過，即可離開此問卷)</font></p> 
</form> 

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