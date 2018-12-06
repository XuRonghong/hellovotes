<?php		

class votes{
	
	function index($tid){	
		include("./models/dbModel.php");	
		$db = new DB();	
	
		if(isset($_POST['vote'])){
			$vote=$_POST['vote'];
			$totalCount=0;	//統計該題目總共有得到幾票
			if(is_array($vote)){
				foreach($vote as $val){					
					$result=$db->query("UPDATE answer SET   answer.aCount=aCount+1 WHERE aId=".$val);
					$totalCount++;
				}
			}else{
					$result=$db->query("UPDATE answer SET   answer.aCount=aCount+1 WHERE aId=".$vote);
					$totalCount++;
			}
			$result=$db->query("UPDATE title SET   tCountTotal=tCountTotal+".$totalCount." WHERE tId=".$_POST['tid']);			//寫進資料庫，該題全部答案得到總票數
		}
		if(isset($_POST['new_ans']) && trim($_POST['new_ans'])!='' ){
			$new_ans=$_POST['new_ans'];
			$result=$db->query("INSERT INTO answer(aName,aCount,aTid) VALUES('".trim($new_ans)."',1,'".$_POST['tid']."')");
			$result=$db->query("UPDATE title SET   tCountTotal=tCountTotal+1 WHERE tId=".$_POST['tid']);			//寫進資料庫，該題全部答案得到總票數+1	
		}

			if(!empty($tid))$where_add_tid="WHERE tId=".trim($tid);   //假設有指定tid就顯該id題目$where_add_tid
			else	$where_add_tid='';
		$result=$db->query("SELECT title.*,answer.*  FROM title LEFT JOIN questionnaire ON tQid=qId 
		LEFT JOIN answer ON title.tId=answer.aTid ".$where_add_tid." ORDER BY aTid DESC ");	
		
		$row=$db->get_array($result);
		
			//取亂數因子，TID
			$result=$db->query("SELECT title.tId  FROM title LEFT JOIN questionnaire ON tQid=qId ".$where_add_tid);	
			while($randrow=mysql_fetch_assoc($result))
				$rand_id[]=$randrow['tId'];
				
				
				
			$que_result=$db->query("SELECT * FROM questionnaire ORDER BY qId DESC ");
			$que_result=$db->get_array($que_result);
		
		include("./views/hellovotes/vote_indexView.php");	
	}
	
		
	function add(){ob_start();			
		
		if(isset($_SESSION['quest']['count']) && $_SESSION['quest']['count'] <1){
					
			session_destroy();
			
			header("Location:".$_SERVER['PHP_SELF']."?d=hellovotes&c=votes&a=index");	
			ob_flush();
		}
	
		include("./views/hellovotes/vote_addView.php");	
	}	
	
	
	function add_quest(){
		if(isset($_POST['qName'])){
			include("./models/dbModel.php");	
			$db = new DB();	
			
			$qname=strip_tags($_POST['qName']);
			$qname=trim($qname);
			
			$qamount=strip_tags($_POST['qAmount']);
			$qamount=trim($qamount);
			
			$result=$db->query("INSERT INTO questionnaire(qName,qAmount) VALUES('".$qname."','".$qamount."')");		
			$insert_id=$db->get_insert_id();
			
			//session_register($_SESSION['quest']['qid']);
			//session_register($_SESSION['quest']['count']);
			$_SESSION['quest']['qid']=$insert_id;
			$_SESSION['quest']['count']=$qamount;
			
			header("Location:".$_SERVER['PHP_SELF']."?d=hellovotes&c=votes&a=add");	
		}
		
		include("./views/hellovotes/vote_addquestView.php");	
	}
	
	
	function add_vote(){	
		if(isset($_SESSION['quest']['qid']))
			$qid=$_SESSION['quest']['qid'];

		include("./models/dbModel.php");	
		$db = new DB();		
		if(isset($_POST['tName'])&&trim($_POST['tName'])!=""){
			$result=$db->query("INSERT INTO title(tName,tType,tQid) VALUES('".trim($_POST['tName'])."','".$_POST['tType']."','".$qid."')");		
			$insert_id=$db->get_insert_id($result);
			
			if(isset($_POST['answer'])){
				foreach($_POST['answer'] as $v){
					$result=$db->query("INSERT INTO answer(aName,aTid) VALUES('".trim($v)."','".$insert_id."')");		
				}
			}			
		}		
				
			
		ob_start();		
		$_SESSION['quest']['count']--;
		
		header("Location:".$_SERVER['PHP_SELF']."?d=hellovotes&c=votes&a=add");	
		ob_flush();
	}
	
	
	function del($tid=0){	
		if(!isset($_SESSION['member']))
		/*echo "<script>history.go(-1)</script>";*/
		header("Location:".$_SERVER['PHP_SELF']."?d=hellovotes&c=votes&a=login");
		
		include("./models/dbModel.php");	
		$db = new DB();		
		$result=$db->query("SELECT * FROM title LEFT JOIN answer ON title.tId=answer.aTid ORDER BY tId DESC ");		
		$row=$db->get_array($result);
		
		//取亂數因子，TID
			$result=$db->query("SELECT title.tId  FROM title ");	
			while($randrow=mysql_fetch_assoc($result))
				$rand_id[]=$randrow['tId'];
		//若tid大於最大資料數則以最大資料數為主
		if($tid>=count($rand_id))$tid=count($rand_id)-1;
		if($tid<0)$tid=0;
		
		
		/*//製作分頁
		$sql="SELECT * FROM title ORDER BY tId DESC ";
		$db->query($sql);
   		$data_nums = mysql_num_rows($result); //統計總比數 	
		$per = 5; //每頁顯示項目數量  
    	$pages = ceil($data_nums/$per); //取得不小於值的下一個整數  	
		if (!isset($_GET["page"])){ //假如$_GET["page"]未設置  
			$page=1; //則在此設定起始頁數  
		} else {  
			$page = intval($_GET["page"]); //確認頁數只能夠是數值資料  
		}
		$start = ($page-1)*$per; //每一頁開始的資料序號  
    	$result = $db->query($sql.' LIMIT '.$start.', '.$per,$conn); */
		
		
		include("./views/hellovotes/vote_delView.php");	
	}
	
	function del_vote(){	

		include("./models/dbModel.php");	
		$db = new DB();		
		if(isset($_POST['vote_del_id'])){
			$result=$db->query("DELETE FROM title WHERE tId=".$_POST['vote_del_id']);
			
			$result=$db->query("DELETE FROM answer WHERE aTid=".$_POST['vote_del_id']);	
		}				
	
		/*ob_start();
		header("Location:".$_SERVER['PHP_SELF']."?d=hellovotes&c=votes&a=del");	
		ob_end_flush();*/
		echo "<script>history.go(-2)</script>";
	}
	
	
	function del_vote_answer(){
		if(isset($_POST['vote_del_id'])){
			include("./models/dbModel.php");	
			$db = new DB();		
			$result=$db->query("DELETE FROM answer WHERE aId=".$_POST['vote_del_id']);
			
			$result=$db->query("UPDATE title SET tCountTotal=tCountTotal-".$_POST['vote_count']." WHERE tId=".$_POST['vote_del_vid']);	
		}				
	}
	
	
	function login(){
		if(isset($_SESSION['member']))header("Location:".$_SERVER['PHP_SELF']."?d=hellovotes&c=votes&a=del");
		
		$message="Unable Forgot your password?";
		if(isset($_POST['username'])&&isset($_POST['password'])){
			$us=trim($_POST['username']);
			$pw=trim($_POST['password']);
			if(!empty($us)&&!empty($pw)){			
				$mem=array( array("us"=>"rh","pw"=>"123") );
				foreach($mem as $v){
					$v['pw']=md5($v['pw']);
					if($v['us']==$us)
						if($v['pw']==md5($pw)){
							$_SESSION['member']['uid']=0;
							$_SESSION['member']['username']=$us;
							$_SESSION['member']['password']=md5($pw);
							$message="Login success!";
							header("Location:".$_SERVER['PHP_SELF']."?d=hellovotes&c=votes&a=del");	
							echo $_SESSION['member']['username'];
						}
				}
				$message="Username or password error!!";
			}else{			
				$message="There are field nulls!!";
			}
		}
		
		include("./views/hellovotes/vote_loginView.php");	
	}
	
	function logout(){
		session_destroy();
		echo "<script>history.go(-1)</script>";
		//header("Location:".$_SERVER['PHP_SELF']."?d=hellovotes&c=votes&a=del");
	}
	
	
	function result($qid=''){	

		include("./models/dbModel.php");	
		$db = new DB();		
		
		if(!empty($qid))$where_add_tid="WHERE qId=".trim($qid);   //假設有指定tid就顯該id題目$where_add_tid
			else	$where_add_tid='';
		
		$result=$db->query("SELECT *  FROM title LEFT JOIN questionnaire ON tQid=qId 
		 LEFT JOIN answer ON title.tId=answer.aTid  ".$where_add_tid." ORDER BY aTid,aCount DESC ");	
		$row=$db->get_array($result);
				
		
		
		$que_result=$db->query("SELECT * FROM questionnaire ORDER BY qId DESC ");
			$que_result=$db->get_array($que_result);
			
		
		include("./views/hellovotes/vote_resultView.php");	
	}
	
	
	function quest($qid){	
		include("./models/dbModel.php");	
		$db = new DB();	
	
		if(isset($_POST['vote'])){
			$vote=$_POST['vote'];
			$totalCount=0;	//統計該題目總共有得到幾票
			if(is_array($vote)){
				foreach($vote as $val){					
					$result=$db->query("UPDATE answer SET   answer.aCount=aCount+1 WHERE aId=".$val);
					$totalCount++;
				}
			}else{
					$result=$db->query("UPDATE answer SET   answer.aCount=aCount+1 WHERE aId=".$vote);
					$totalCount++;
			}
			$result=$db->query("UPDATE title SET   tCountTotal=tCountTotal+".$totalCount." WHERE tId=".$_POST['tid']);			//寫進資料庫，該題全部答案得到總票數
		}
		if(isset($_POST['new_ans']) && trim($_POST['new_ans'])!='' ){
			$new_ans=$_POST['new_ans'];
			$result=$db->query("INSERT INTO answer(aName,aCount,aTid) VALUES('".trim($new_ans)."',1,'".$_POST['tid']."')");
			$result=$db->query("UPDATE title SET   tCountTotal=tCountTotal+1 WHERE tId=".$_POST['tid']);			//寫進資料庫，該題全部答案得到總票數+1	
		}

			if(!empty($qid))$where_add_tid="WHERE qId=".trim($qid);   //假設有指定tid就顯該id題目$where_add_tid
			else	$where_add_tid='';
		$result=$db->query("SELECT *  FROM title JOIN questionnaire ON tQid=qId 
		 LEFT JOIN answer ON title.tId=answer.aTid ".$where_add_tid." ORDER BY aTid DESC ");	
		
		$row=$db->get_array($result);
		
			//TID
			$result=$db->query("SELECT title.tId  FROM title JOIN questionnaire ON tQid=qId ".$where_add_tid);	
			while($randrow=mysql_fetch_assoc($result))
				$rand_id[]=$randrow['tId'];
		
		include("./views/hellovotes/vote_questView.php");	
	}
	
}

?>