<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>刪除題目</title>
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
<script type="text/javascript">
	function del_ans(del_id,del_count,del_vid){
		$.ajax({
			url: "index.php?d=hellovotes&c=votes&a=del_vote_answer",
			type: 'post',
			cache: false,
			dataType: 'html',
			data: {vote_del_id: del_id , 
					vote_count: del_count ,
					vote_del_vid: del_vid },
			success: function(){
				// $(this).addClass("done");
				location.reload();
			},
			error: function(){
				// $(this).addClass("done");
				alert('無法刪除');
			}
		});
	}
	
	function forward(url){
			window.location=url;
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
                    <li><a href="index.php?d=hellovotes&c=votes&a=logout"><font color="#404040">登出</font></a></li>
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

<form method="POST" action="index.php?d=hellovotes&c=votes&a=del_vote"> 
<?php

$b=0; $i=0;  $j=1;
foreach($row as $k=>$v)
{
	//echo $tid;
	if($rand_id[$tid]!=$v['tId'])continue;
	
	if($b!=$v['tId'] && $i!=1){
		echo "<br/><hr/>".$v['tName'];	
		$i=1;
	}elseif($b!=$v['tId'] && $i==1) break;
	
	if(!empty($v['aName']))
		echo "<p>".($j++) .". <input type='text' value='".$v['aName']."' readonly='true'>
			<input type='button'  onclick='del_ans(".$v['aId'].",".$v['aCount'].",".$v['tId'].")' value='X'></p>";	
	
	$b=$v['tId'];	
}


?>
<p><input type="hidden" name="vote_del_id" value="<?php echo $b;?>"> </p>
<p><hr></p>
<p><input type="button" value="＜" onClick="forward('index.php?d=hellovotes&c=votes&a=del&p=<?php echo $tid-1;?>')">
&nbsp;&nbsp;<input type="submit" value="砍掉" name="D1">&nbsp;&nbsp;
<input type="button" value="＞" onClick="forward('index.php?d=hellovotes&c=votes&a=del&p=<?php echo $tid+1;?>')">
</p> 
</form> 

<?php  
    //分頁頁碼  
   /* echo '共 '.$data_nums.' 筆-在 '.$page.' 頁-共 '.$pages.' 頁';  
    echo "<br /><a href=?page=1>首頁</a> ";  
    echo "第 ";  
    for( $i=1 ; $i<=$pages ; $i++ ) {  
        if ( $page-3 < $i && $i < $page+3 ) {  
            echo "<a href=?page=".$i.">".$i."</a> ";  
        }  
    }   
    echo " 頁 <a href=?page=".$pages.">末頁</a><br /><br />";  */
?>

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