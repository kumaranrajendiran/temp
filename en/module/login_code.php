<tr><td><?
if ($_REQUEST['act']=='logout')
{
	unset($_SESSION['user']);
	echo "<script>window.location='./?frame=login'</script>";
}

function checkdata($checkall=0)
{
	$err="";

	if (strlen(trim($_POST['txtUser']))<1) $err=$err.'Please enter your username<br>';
	if ($checkall==0 && $err) return $err;
	
	if (strlen($_POST['txtPassword'])<1) $err=$err.'Please enter your password<br>';
	if ($checkall==0 && $err) return $err;
	
	if (count_record("customers","customers_username='".trim($_POST['txtUser'])."' and customers_password='".$_POST['txtPassword']."'")<=0) $err=$err.'No match for Username and/or Password<br>';
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
		echo "<script>window.location='./?frame=cart'</script>";
	}
}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<br>
<? if (!islogin()){?>
						<div align="center">
						<table border="0" id="table35" cellpadding="0" width="98%" style="border-collapse: collapse">
						<td style="LINE-HEIGHT: 150%" height="20">
						<table id="table143" style="BORDER-COLLAPSE: collapse" cellPadding="0" width="100%" border="0">
						<tr>
						<td width="0" bgColor="#f4f4f4" height="22">
						<span style="FONT-WEIGHT: 700; FONT-SIZE: 8.5pt">&nbsp;&nbsp; New Customer</span></td>
						</tr>
						<tr>
						<td width="0" bgColor="#ffffff" height="25">
						<div align="center">
							<table id="table144" style="BORDER-COLLAPSE: collapse" cellPadding="0" width="98%" border="0">
								<tr>
									<td style="LINE-HEIGHT: 150%" bgColor="#ffffff" height="25">
									<font style="FONT-SIZE: 8.5pt" face="Verdana" color="#000000">
									<p align="justify">I am a new customer.

By creating an account at Computers Enabled you will be able to shop faster, be up to date on an orders status, and keep track of the orders you have previously made.</font></td>
								</tr>
								<tr>
									<td bgColor="#ffffff" height="25">&nbsp;</td>
								</tr>
								<tr>
									<td bgColor="#ffffff" height="25">
									<p align="center">
									<font style="FONT-SIZE: 8.5pt" face="Verdana" color="#666666">
									<span style="BACKGROUND-COLOR: #efa937">
									<font color="#000000">
									<a href="./?frame=search">
									<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" type="submit" value="Sign Up" name="login3" onclick="window.location='./?frame=register'"></font></span></font></td>
								</tr>
								<tr>
									<td height="25">&nbsp;</td>
								</tr>
							</table>
						</div>
						</td>
						</tr>
						</table>
						<table id="table145" style="BORDER-COLLAPSE: collapse" borderColor="#e6e6e6" cellPadding="0" width="100%" border="1">
						<tr>
						<td bgColor="#f4f4f4" height="22">
						<span style="FONT-WEIGHT: 700; FONT-SIZE: 8.5pt">&nbsp;&nbsp; Returning Customer</span></td>
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
											Username:&nbsp;&nbsp; </font></td>
											<td width="261" bgColor="#ffffff">
											<font face="Tahoma">
											<span style="FONT-SIZE: 8.5pt">
											<input class="fieldKey" size="22" name="txtUser"></span></font></td>
										</tr>
										<tr>
											<td align="right" width="199" bgColor="#ffffff">
											<font style="FONT-SIZE: 8.5pt" face="Tahoma" color="#000000">
											Password:&nbsp;&nbsp; </font></td>
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
													<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" type="submit" value="Login" name="butSub"></span><font face="Verdana" size="1"> 
													|<font color="#000000"> </font><b>
													<a href="./?frame=forgotpassword">
													Forgot Password</a></b></font></td>
												</tr>
												<tr>
													<td>&nbsp;</td>
												</tr>
											</table>
											</td>
										</tr>
									</table>
									<input type="hidden" name="frame" value="login">
									</form>
								</div>
								</td>
							</tr>
						</table>
						
								</font>
						  	</td>
						  </tr>
						    </table>
							<input type="hidden" name="frame" value="login">
						</form>
						
						</td>
						</tr>
						</table>
						</div>
<?}else{?>
<table align=center>
	<tr><td align=center>&nbsp;</td></tr>
	<tr><td align=center>You are logoned</td></tr>
	<tr><td align=center><a href="./?frame=logout">[Logout]</a></td></tr>
</table>
<?}?></td></tr>