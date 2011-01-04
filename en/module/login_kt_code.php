<?
if ($_REQUEST['act']=='logout')
{
	unset($_SESSION['user']);
	unset($_SESSION['test']);
	echo "<script>window.location='./?frame=login_kt'</script>";
}

function checkdata($checkall=0)
{
	$err="";

	if (strlen(trim($_POST['txtUser']))<1) $err=$err.'B&#7841;n ch&#432;a nh&#7853;p tên truy c&#7853;p<br>';
	if ($checkall==0 && $err) return $err;
	
	if (strlen($_POST['txtPassword'])<1) $err=$err.'B&#7841;n ch&#432;a nh&#7853;p m&#7853;t kh&#7849;u<br>';
	if ($checkall==0 && $err) return $err;
	
	if (count_record("customers","customers_username='".trim($_POST['txtUser'])."' and customers_password='".$_POST['txtPassword']."'")<=0) $err=$err.'Tên truy c&#7853;p ho&#7863;c m&#7853;t kh&#7849;u không &#273;úng<br>';
	if ($checkall==0 && $err) return $err;

	return $err;
}

$err="";
if (isset($_POST['butSub'])) {
	$err=checkdata(0);
	$user=trim($_POST['txtUser']);
	$password=trim($_POST['txtPassword']);
	
	if ($err=='')
	{
		$_SESSION['user']=$user;
		$sql="select * from customers where customers_username='".$_SESSION['user']."' ";
        $result=mysql_query($sql,$con);
       	while($row=mysql_fetch_assoc($result))
		{ 
		 $_SESSION['test']=$row['customers_test'];
		}

		echo "<script>window.location='./?frame=newscat_kt&cat1=5'</script>";
	}
}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<br>
<? if (!islogin_down())
{
?>
<div align="center">
<table border="0" id="table35" cellpadding="0" width="98%" style="border-collapse: collapse">
		<td style="LINE-HEIGHT: 150%" height="20">
		<table id="table145" style="BORDER-COLLAPSE: collapse" borderColor="#e6e6e6" cellPadding="0" width="100%" border="1">
			<tr>
				<td bgColor="#f4f4f4" height="22">
				<span style="FONT-WEIGHT: 700; FONT-SIZE: 8.5pt">&nbsp;&nbsp; B&#7841;n &#273;ã là 
				thành viên</span></td>
			</tr>
			<tr>
				<td width="0">
				<table id="table146" style="LINE-HEIGHT: 150%; BORDER-COLLAPSE: collapse" cellPadding="0" width="100%" border="0">
					<tr>
						<td vAlign="top">
						<div align="center">
							<form method="POST" action="index.php">
							<table id="table147" style="LINE-HEIGHT: 150%; BORDER-COLLAPSE: collapse" cellPadding="0" width="100%" border="0">
								<tr>
				                  	<td colspan=2 align="center">
				                  		<font face="Tahoma" style="font-size: 8.5pt" color="#FF0000">
<? 
echo $err; 
?>
										</font>
				                  	</td>
				                  </tr>

								<tr>
									<td align="right" width="199" bgColor="#ffffff">
									&nbsp;</td>
									<td width="261" bgColor="#ffffff">&nbsp;</td>
								</tr>
								<tr>
									<td align="right" width="199" bgColor="#ffffff">
									<font style="FONT-SIZE: 8.5pt" face="Tahoma" color="#000000">
									Tên &#273;&#259;ng nh&#7853;p:&nbsp;&nbsp; </font></td>
									<td width="261" bgColor="#ffffff">
									<font face="Tahoma">
									<span style="FONT-SIZE: 8.5pt">
									<input class="fieldKey" size="22" name="txtUser"></span></font></td>
								</tr>
								<tr>
									<td align="right" width="199" bgColor="#ffffff">
									<font style="FONT-SIZE: 8.5pt" face="Tahoma" color="#000000">
									M&#7853;t kh&#7849;u:&nbsp;&nbsp; </font></td>
									<td width="261" bgColor="#ffffff">
									<font face="Tahoma">
									<span style="FONT-SIZE: 8.5pt">
									<input class="fieldKey" type="password" size="22" value name="txtPassword"></span></font></td>
								</tr>
								<tr>
									<td vAlign="top" bgColor="#ffffff" colSpan="2" height="5">&nbsp;</td>
								</tr>
								<tr>
									<td vAlign="top" bgColor="#ffffff" colSpan="2" height="21">
									<hr color="#fefefe" SIZE="1"></td>
								</tr>
								<tr>
									<td bgColor="#ffffff" colSpan="2">
									<table id="table148" style="BORDER-COLLAPSE: collapse" cellPadding="0" width="100%" border="0">
										<tr>
											<td>
											<p align="center">
											<span style="BACKGROUND-COLOR: #efa937">
											<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" type="submit" value="&#272;&#259;ng nh&#7853;p" name="butSub"></span><font face="Verdana" size="1"> 
											|<font color="#000000"> </font><b>
											<a href="./?frame=forgotpassword" >
											Quên m&#7853;t kh&#7849;u</a></b></font></td>
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
									</table>
									</td>
								</tr>
							</table>
							<input type="hidden" name="frame" value="login_kt">
							</form>
						</div>
						</td>
					</tr>
				</table>
				
						</font>
                  	</td>
                  </tr>
                    </table>
					<input type="hidden" name="frame" value="login_kt">
</form>

</td>
</tr>
</table>
</div>
<?
}
else
{
?>
<?
}
?>