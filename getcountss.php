<?
include 'included2.php'; 


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$topicidraw = mysql_real_escape_string($_GET['posts']);
$topicid = preg_replace($saturated,"",$topicidraw);

$topicidraws = mysql_real_escape_string($_GET['topicid']);
$tits = preg_replace($saturated,"",$topicidraws);


$editsql = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$tits' AND type = 'e'");
$editarray = mysql_fetch_array($editsql);
$sjs= mysql_num_rows($editsql);
$posttits = $editarray['posts'];
$news = $posttits - $topicid;


if($sjs <= '0'){echo"<table width=100%><tr><td bgcolor=444444 height=35 align=center valign=middle style='border: silver 1px solid;-moz-border-radius-topleft:7px;-moz-border-radius-bottomright:25px;'><u><font color=red face=verdana size=1>Topic has been removed</font></td></tr></table>";}else{


if($topicid != $posttits){echo"<table width=100%><tr><td bgcolor=444444 height=35 align=center valign=middle style='border: silver 1px solid;-moz-border-radius-topleft:25px;-moz-border-radius-bottomright:25px;'><a href=eviewtopic.php?topicid=$tits><b><u><font color=khaki face=verdana size=1>$news new posts,</font><font color=white face=verdana size=1> click to view</u>!</font></b></a></td></tr></table>";}}
?>