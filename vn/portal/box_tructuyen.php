<?
if(!isset($_SESSION['online'])){ 
    mysql_query("INSERT INTO visitors (session_id, activity, ip_address, refurl, user_agent) VALUES ('".session_id()."', now(), '{$_SERVER['REMOTE_ADDR']}', '{$_SERVER['HTTP_REFERER']}', '{$_SERVER['HTTP_USER_AGENT']}')",$con); 
    $_SESSION['online']=true; 
	$v=GetConfig("visitors")+1;
	mysql_query("UPDATE config SET config_value='".$v."' WHERE config_name='visitors'",$con);
} else { 
    if(islogin())
        mysql_query("UPDATE visitors SET activity=now(), member='y' WHERE session_id='".session_id()."'",$con); 
    else
		mysql_query("UPDATE visitors SET activity=now(), member='n' WHERE session_id='".session_id()."'",$con); 
} 

$maxtime = $visitortimeout; // 5 Minute time out. 60 * 5 = 300 
$sql = mysql_query("DELETE FROM visitors WHERE UNIX_TIMESTAMP(activity) < UNIX_TIMESTAMP(now())-$maxtime",$con); 
?>
<table border="1" style="border-collapse: collapse" width="100%" id="table641" cellpadding="0" bordercolor="#FFFFFF">
	<tr>
		<td width="123" bgcolor="#CCCCCC">
		<p align="left">
		&nbsp;
		<font face="Tahoma" style="font-size: 8.5pt; font-weight: 700">
		&nbsp;&#272;ang 
		Online 
		:</font></td>
		<td height="20" bgcolor="#000000">
		<p align="center">
		<font color="#FF0000" face="Tahoma" style="font-size: 8.5pt; font-weight: 700">
		<? echo CountRecord("visitors"); ?>
</font></td>
	</tr>
	<tr>
		<td width="123" bgcolor="#CCCCCC">
		<font face="Tahoma" style="font-size: 8.5pt; font-weight: 700">&nbsp;&nbsp; 
		T&#7893;ng 
		L&#432;&#7907;t 
		Online 
		:</font></td>
		<td height="20" bgcolor="#000000">
		<p align="center">
		<font color="#FF0000" face="Tahoma" style="font-size: 8.5pt; font-weight: 700">
		<? echo GetConfig("visitors"); ?></font></td>
	</tr>
</table>
