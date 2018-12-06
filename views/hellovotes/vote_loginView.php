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
     <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!--
/*********************************************************************/
/*************How to Create Login Form with CSS3 and jQuery************/
/*********參考至http://designmodo.com/login-form-css3-jquery/************/
/*************************日期:2015/7/16 W*****************************/
/********************************************************************/
-->    
    
<style rel=stylesheet type="text/css">
	/*Step 2 – General CSS Styles*/
	.login-form,
	.login-form h1,
	.login-form span,
	.login-form input,
	.login-form label {
		margin: 0;
		padding: 0;
		border: 0;
		outline: 0;
	}
	
.login-form {
    position: relative;
    width: 200px;
    height: 200px;
    padding: 15px 25px 0 25px;
    margin-top: 15px;
    cursor: default;
 
    background-color: #141517;
 
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
 
    -webkit-box-shadow: 0px 1px 1px 0px rgba(255,255,255, .2), inset 0px 1px 1px 0px rgb(0,0,0);
    -moz-box-shadow: 0px 1px 1px 0px rgba(255,255,255, .2), inset 0px 1px 1px 0px rgb(0,0,0);
    box-shadow: 0px 1px 1px 0px rgba(255,255,255, .2), inset 0px 1px 1px 0px rgb(0,0,0);
}

.login-form:before {
    position: absolute;
    top: -12px;
    left: 10px;
 
    width: 0px;
    height: 0px;
    content: '';
 
    border-bottom: 10px solid #141517;
    border-right: 10px solid #141517;
    border-top: 10px solid transparent;
    border-left: 10px solid transparent;
}
.login-form h1 {
    line-height: 40px;
    font-family: 'Myriad Pro', sans-serif;
    font-size: 22px;
    font-weight: normal;
    color: #e4e4e4;
}

/*Step 3 – General Input Styles*/
.login-form input[type=text],
.login-form input[type=password],
.login-form input[type=submit] {
    line-height: 14px;
    margin: 10px 0;
    padding: 6px 15px;
    border: 0;
    outline: none;
 
    font-family: Helvetica, sans-serif;
    font-size: 12px;
    font-weight: bold;
    text-shadow: 0px 1px 1px rgba(255,255,255, .2);
 
    -webkit-border-radius: 26px;
    -moz-border-radius: 26px;
    border-radius: 26px;
 
    -webkit-transition: all .15s ease-in-out;
    -moz-transition: all .15s ease-in-out;
    -o-transition: all .15s ease-in-out;
    transition: all .15s ease-in-out;
}

.login-form input[type=text],
.login-form input[type=password],
.js .login-form span {
    color: #686868;
    width: 170px;
 
    -webkit-box-shadow: inset 1px 1px 1px 0px rgba(255,255,255, .6);
    -moz-box-shadow: inset 1px 1px 1px 0px rgba(255,255,255, .6);
    box-shadow: inset 1px 1px 1px 0px rgba(255,255,255, .6);
 
    background: #989898;
    background: -moz-linear-gradient(top,  #ffffff 0%, #989898 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#989898));
    background: -webkit-linear-gradient(top,  #ffffff 0%,#989898 100%);
    background: -o-linear-gradient(top,  #ffffff 0%,#989898 100%);
    background: -ms-linear-gradient(top,  #ffffff 0%,#989898 100%);
    background: linear-gradient(top,  #ffffff 0%,#989898 100%);
}

.login-form input[type=text]:hover,
.login-form input[type=password]:hover {
    -webkit-box-shadow: inset 1px 1px 1px 0px rgba(255,255,255, .6), 0px 0px 5px rgba(255,255,255, .5);
    -moz-box-shadow: inset 1px 1px 1px 0px rgba(255,255,255, .6), 0px 0px 5px rgba(255,255,255, .5);
    box-shadow: inset 1px 1px 1px 0px rgba(255,255,255, .6), 0px 0px 5px rgba(255,255,255, .5);
}

.login-form input[type=text]:focus,
.login-form input[type=password]:focus {
    background: #e1e1e1;
    background: -moz-linear-gradient(top,  #ffffff 0%, #e1e1e1 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#e1e1e1));
    background: -webkit-linear-gradient(top,  #ffffff 0%,#e1e1e1 100%);
    background: -o-linear-gradient(top,  #ffffff 0%,#e1e1e1 100%);
    background: -ms-linear-gradient(top,  #ffffff 0%,#e1e1e1 100%);
    background: linear-gradient(top,  #ffffff 0%,#e1e1e1 100%);
}

/*Step 4 – Submit Button*/
.login-form input[type=submit] {
    float: right;
    cursor: pointer;
 
    color: #445b0f;
 
    -webkit-box-shadow: inset 1px 1px 1px 0px rgba(255,255,255, .45), 0px 1px 1px 0px rgba(0,0,0, .3);
    -moz-box-shadow: inset 1px 1px 1px 0px rgba(255,255,255, .45), 0px 1px 1px 0px rgba(0,0,0, .3);
    box-shadow: inset 1px 1px 1px 0px rgba(255,255,255, .45), 0px 1px 1px 0px rgba(0,0,0, .3);
}
.login-form input[type=submit]:hover {
    -webkit-box-shadow: inset 1px 1px 3px 0px rgba(255,255,255, .8), 0px 1px 1px 0px rgba(0,0,0, .6);
    -moz-box-shadow: inset 1px 1px 3px 0px rgba(255,255,255, .8), 0px 1px 1px 0px rgba(0,0,0, .6);
    box-shadow: inset 1px 1px 3px 0px rgba(255,255,255, .8), 0px 1px 1px 0px rgba(0,0,0, .6);
} 
.login-form input[type=submit]:active {
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
.login-form input[type=submit],
.js .login-form span.checked:before {
    background: #a5cd4e;
    background: -moz-linear-gradient(top,  #a5cd4e 0%, #6b8f1a 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a5cd4e), color-stop(100%,#6b8f1a));
    background: -webkit-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%);
    background: -o-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%);
    background: -ms-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%);
    background: linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%);
}

/*Step 5 – Checkbox Styling*/
.js .login-form input[type=checkbox] {
    position: fixed;
    left: -9999px;
}
.login-form span {
    position: relative;
    margin-top: 55px;
    float: left;
}
.js .login-form span {
    width: 16px;
    height: 16px;
    cursor: pointer;
 
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
}
.js .login-form span.checked:before {
    content: '';
    position: absolute;
    top: 4px;
    left: 4px;
    width: 8px;
    height: 8px;
 
    -webkit-box-shadow: 0px 1px 1px 0px rgba(255,255,255, .45), inset 0px 1px 1px 0px rgba(0,0,0, .3);
    -moz-box-shadow: 0px 1px 1px 0px rgba(255,255,255, .45), inset 0px 1px 1px 0px rgba(0,0,0, .3);
    box-shadow: 0px 1px 1px 0px rgba(255,255,255, .45), inset 0px 1px 1px 0px rgba(0,0,0, .3);
}
.login-form label {
    position: absolute;
    top: 1px;
    left: 25px;
    font-family: sans-serif;
    font-weight: bold;
    font-size: 12px;
    color: #e4e4e4;
}

</style>

<!--Step 6 – jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
 
    // Check if JavaScript is enabled
    $('body').addClass('js');
 
    // Make the checkbox checked on load
    $('.login-form span').addClass('checked').children('input').attr('checked', true);
 
    // Click function
    $('.login-form span').on('click', function() {
 
        if ($(this).children('input').attr('checked')) {
            $(this).children('input').attr('checked', false);
            $(this).removeClass('checked');
        }
 
        else {
            $(this).children('input').attr('checked', true);
            $(this).addClass('checked');
        }
 
    });
 
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

<!--Step 1 – HTML Markup-->
	   <div align="center">
 
    <h1>Login Form 1</h1>
 
    <form action="" class='login-form' method='post'>
 
 
        <input type="text" name="username" placeholder="username">
 
        <input type="password" name="password" placeholder="password">
 
        <span>
            <input type="checkbox" name="checkbox">
            <label for="checkbox"><?php echo $message;?></label>
        </span>
 
        <input type="submit" value="log in">
 
    </form>
 
		</div>
        
        
        			<br><br><br><br>
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