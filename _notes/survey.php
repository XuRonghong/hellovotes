<? 
$data="data.txt"; 
$votes="survey.txt"; 
$dataf=file($data); /*讀出調查項目文件中的項目*/ 
$file_votes=fopen($votes, "r"); 
$line_votes=fgets($file_votes, 255); /*讀出已經記錄的調查結果*/ 
fclose($file_votes); 
$single_vote=explode("|", $line_votes); /* 并將數據按指定的字串切開,再將字串傳回到數組變量中 */ 
if ($result!=1) /*如果已經接受了調查*/ 
{ 
$file_votes=file($votes, "r"); 
if ($REMOTE_ADDR == $file_votes[1]) /*檢查是不是同一個人*/ 
{ 
echo "<center><font color=red>您已投過票了，謝謝您的參與！</font></center>"; 
exit; 
} 
/*如果IP不重復,則執行以下程序*/ 
$ficdest=fopen($votes, "w"); 
for ($i=0; $i<=count($dataf)-1; $i ) 
{ 
if ($i == $vote) 
{ /*判斷選擇了哪個項目*/ 
$single_vote[$i] =1; 
} 
fputs($ficdest, "$single_vote[$i]|"); /*將數據寫回文件*/ 
} 
fputs($ficdest, "\n$REMOTE_ADDR");/* //寫入投票者IP*/ 
fclose($ficdest); 
$result=1; /*投票成功*/ 
} 
/*寫入投票結果后并顯示投票結果*/ 
if ($result==1) 
{ 
echo "<table cellpadding=10>"; 
for ($i=0; $i<=count($dataf)-1; $i ) 
{ 
/*取得投票總數*/ 
$tot_votes =$single_vote[$i]; 
} 
for ($i=0; $i<=count($dataf)-1; $i ) 
{ 
$imag=strval($i).".gif";/*判斷用哪種條形圖片來顯示統計結果*/ 
$stat[$i]=$single_vote[$i]/$tot_votes*100; /*計算百分比*/ 
$scla=$stat[$i]*5;/*條形圖和放大倍數,這里是安百分數的5倍的相素的寬度來顯示的*/ 
echo "<tr><td><li><font face=Verdana size=2>"; 
echo "$dataf[$i]</font></td><td align=left><font face=Verdana size=2>"; 
echo "<img src=\"$imag\" height=20 width=$scla align=middle>&nbsp;";/*輸出條形碼圖*/ 
printf("%.1f", "$stat[$i]"); 
echo "%</font></td><td align=center><font face=Verdana size=2>"; 
/*輸出本欄目投票數*/ 
echo "$single_vote[$i]</font>"; 
echo "</td></tr>"; 
} 
echo "</table><p>"; 
echo "<font face=Verdana size=2>總投票數：$tot_votes </font>"; 
} 
?>