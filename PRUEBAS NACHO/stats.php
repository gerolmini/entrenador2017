// Database Structure 
CREATE TABLE 'total_visitors' (
 'id' int NOT NULL,
 'session' text NOT NULL,
 'time' int NOT NULL,
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1

CREATE TABLE 'pageviews' (
 'id' int NOT NULL,
 'page' text NOT NULL,
 'ip' text NOT NULL,
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1

CREATE TABLE 'articles' (
 'id' int NOT NULL,
 'title' text NOT NULL,
 'link' int NOT NULL,
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1

<?php
session_start();
$_SESSION['session']=session_id();

$host="localhost";
$username="root";
$password="";
$databasename="sample";
$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

function total_online()
{
 $current_time=time();
 $timeout = $current_time - (60);

 $session_exist = mysql_query("SELECT session FROM total_visitors WHERE session='".$_SESSION['session']."'");
 $session_check = mysql_num_rows($session_exist);

 if($session_check==0 && $_SESSION['session']!="")
 {
  mysql_query("INSERT INTO total_visitors values ('','".$_SESSION['session']."','".$current_time."')");
 }
 else
 {
  $sql = mysql_query("UPDATE total_visitors SET time='".time()."' WHERE session='".$_SESSION['session']."'");
 }

 $select_total = mysql_query("SELECT * FROM total_visitors WHERE time>= '$timeout'");
 $total_online_visitors = mysql_num_rows($select_total);
 return $total_online_visitors;
}

if(isset($_POST['get_online_visitor']))
{
 $total_online=total_online();
 echo $total_online;
 exit();
}
?>

<html>
<head>
<link href="statistics_style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
setInterval(function()
{ 
 $.ajax
 ({
 type:'post',
 url:'',
 data:{
  get_online_visitor:"online_visitor",
 },
 success:function(response) {
 if(response!="")
 {
  $("#online_visior_val").html(response);
 }
 }
 });
}, 10000)
}); 
</script>
</head>
<body>
<div id="wrapper">

<?php

// To Get Total Online Visitors
$total_online_visitors=total_online();

// To Get Total Visitors
$total_visitors = mysql_query("SELECT * FROM total_visitors");
$total_visitors = mysql_num_rows($total_visitors);

// To Insert Page View And Select Total Pageview
$user_ip=$_SERVER['REMOTE_ADDR'];
$page=$_SERVER['PHP_SELF'];
mysql_query("insert into pageviews values('','$page','$user_ip')");
$pageviews = mysql_query("SELECT * FROM pageviews");
$total_pageviews = mysql_num_rows($pageviews);

//To Get Total Articles
$articles = mysql_query("SELECT * FROM articles");
$total_articles = mysql_num_rows($articles);
?>

<div id="stat_div">
<li><p>Total Visitors</p><br><span><?php echo $total_visitors;?></span></li>
<li><p>Visitors Online</p><br><span id="online_visior_val"><?php echo $total_online_visitors;?></span></li>
<li><p>Total Pageviews</p><br><span><?php echo $total_pageviews;?></span></li>
<li><p>Total Articles</p><br><span><?php echo $total_articles;?></span></li>
</div>

</div>
</body>
</html>