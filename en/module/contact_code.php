<tr>
								<td style="border-style: solid; border-width: 1px" bordercolor="#6BBE88">
								<div align="center">
									<table border="0" width="95%" id="table31" cellspacing="0" cellpadding="0">
										<tr>
											<td>
											<div align="center">
												<table border="0" width="95%" id="table32" cellspacing="0" cellpadding="0">
													<tr>
														<td valign=top><?
function check()
{
	$name=trim($_POST['txtHoten']);
	$email=trim($_POST['txtEmail']);
	$note=trim($_POST['txtNoidung']);
	
	if (strlen($name)==0) return "Please enter your name";
	if (strlen($email)==0) return "Please enter your email";
	else {
		if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) 
		return "Your email is invalid";
	}
	if (strlen($note)==0) return "Please enter your enquiry";
	return "";
}


if (isset($_POST['butSub']))
{
	$name=trim($_POST['txtHoten']);
	$chucvu=trim($_POST['txtChucvu']);
	$congty=trim($_POST['txtCongty']);
	$address=trim($_POST['txtDiachi']);
	$email=trim($_POST['txtEmail']);
	$website=trim($_POST['txtWebsitel']);
	$dienthoai=trim($_POST['txtDienthoai']);
	$didong=trim($_POST['txtDidong']);
	$fax=trim($_POST['txtFax']);
	$note=trim($_POST['txtNoidung']);
	
	if (($ret=check())=='')
	{
		$body ="Ho ten : ".$name."<br>\n";
		$body .="Chuc vu : ".$chucvu."<br>\n";
		$body .="Cong ty : ".$congty."<br>\n";
		$body .="Dia chi : ".$address."<br>\n";
		$body .="Email : ".$email."<br>\n";
		$body .="Website : ".$website."<br>\n";
		$body .="Dien thoai : ".$dienthoai."<br>\n";
		$body .="Di dong : ".$didong."<br>\n";
		$body .="Fax : ".$fax."<br>\n";
		$body .="Noi dung : ".$note."<br>\n";
		if (sendmail($email,$adminemail,"Lien he tu : ".$name, $body))
			echo "<script>window.location='./?frame=contact&code=1'</script>";
		else
			$ret="Can't send information. Please contact to addminister keeping help";
	}
}?>

<form method="POST" action="index.php">
  <div align="center">
  
		<table border="0" style="border-collapse: collapse" width="98%" id="table170" cellpadding="0">
                          <tr>
                            <td>

		<table id="table20" style="BORDER-COLLAPSE: collapse" cellPadding="0" width="100%" border="0">
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="8">&nbsp;</td>
				<td>
				<font style="FONT-WEIGHT: 700; FONT-SIZE: 10pt" face="Tahoma" color="#ff0000">
				<? echo GetContentName("contact_info"); ?>
				</font>
				</td>
		<td width="8">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="10">&nbsp;</td>
				<td>
				<p align="right">
				<font color="#ff0000" style="font-size: 8.5pt" face="Tahoma">&nbsp;* </font>
				<font class="normalfontbold">Required information </font></td>
				<td width="10">&nbsp;</td>
			</tr>
			<tr>
				<td width="10">&nbsp;</td>
				<td>
				<table id="table36" style="BORDER-COLLAPSE: collapse" cellPadding="0" width="100%" border="0">
					<tr>
						<td align="center" class="err"><font color='red'>
<?
	if ($_REQUEST['code']==1)
		echo "Thông tin c&#7911;a b&#7841;n &#273;ã &#273;&#432;&#7907;c g&#7903;i cho chúng tôi.";
	else
		echo $ret;
?>
						</font></td>
					</tr>
				</table>
				</td>
				<td width="10">&nbsp;

				</td>
			</tr>
			<tr>
				<td width="10">&nbsp;</td>
				<td>
				<div align="center">
					<table id="table35" style="BORDER-COLLAPSE: collapse" borderColor="#e6e6e6" cellSpacing="1" width="100%" border="1">
						<tr>
							<td align="right" width="35%" bgColor="#f4f4f4">
							<font face="Tahoma" style="font-size: 8.5pt">Full 
							name</font><font style="FONT-SIZE: 8.5pt" face="Tahoma"> :<font color="#ff0000">*&nbsp;&nbsp; </font></font></td>
							<td bgColor="#f4f4f4" colSpan="2">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">&nbsp;
							<INPUT size=30 name=txtHoten value="<? echo $name; ?>"></span></font></td>
						</tr>
						<tr>
							<td align="right" width="35%" bgColor="#f4f4f4">
							<font style="FONT-SIZE: 8.5pt" face="Tahoma">
							Position:&nbsp;&nbsp;&nbsp;&nbsp; </font></td>
							<td bgColor="#f4f4f4" colSpan="2">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">&nbsp;
							<INPUT size=30 name=txtChucvu value="<? echo $chucvu; ?>"></span></font></td>
						</tr>
						<tr>
							<td align="right" width="35%" bgColor="#f4f4f4">
							<font face="Tahoma" style="font-size: 8.5pt">Company</font><font style="FONT-SIZE: 8.5pt" face="Tahoma">:&nbsp;&nbsp;&nbsp;&nbsp; </font></td>
							<td bgColor="#f4f4f4" colSpan="2">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">&nbsp;
							<INPUT size=30 name=txtCongty value="<? echo $congty; ?>">
							</span></font></td>
						</tr>
						<tr>
							<td align="right" width="35%" bgColor="#f4f4f4">
							<font face="Tahoma" style="font-size: 8.5pt">Address</font><font style="FONT-SIZE: 8.5pt" face="Tahoma">:&nbsp;&nbsp;&nbsp;&nbsp; </font></td>
							<td bgColor="#f4f4f4" colSpan="2">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">&nbsp;
							<INPUT size=30 name=txtDiachi value="<? echo $address; ?>">
							</span></font></td>
						</tr>
						<tr>
							<td align="right" width="35%" bgColor="#f4f4f4">
							<font style="FONT-SIZE: 8.5pt" face="Tahoma">Email:<font color="#ff0000">*&nbsp;&nbsp;
							</font></font></td>
							<td bgColor="#f4f4f4" colSpan="2">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">&nbsp;
							<INPUT size=30 name=txtEmail value="<? echo $email; ?>">
							</span></font></td>
						</tr>
						<tr>
							<td align="right" width="35%" bgColor="#f4f4f4">
							<font style="FONT-SIZE: 8.5pt" face="Tahoma">
							Website:&nbsp;&nbsp;&nbsp;&nbsp; </font></td>
							<td bgColor="#f4f4f4" colSpan="2">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">&nbsp;
							<INPUT size=30 name=txtWebsite value="<? echo $website; ?>">
							</span></font></td>
						</tr>
						<tr>
							<td align="right" width="35%" bgColor="#f4f4f4">
							<font face="Tahoma" style="font-size: 8.5pt">Number 
							Phone</font><font style="FONT-SIZE: 8.5pt" face="Tahoma">:<font color="#ff0000">*</font>&nbsp;&nbsp; </font></td>
							<td width="22%" bgColor="#f4f4f4">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">&nbsp;
							<INPUT size=10 name=txtDienthoai value="<? echo $dienthoai; ?>">
							</span></font></td>
							<td width="41%" bgColor="#f4f4f4">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">
							&nbsp;&nbsp; Mobile:
							<INPUT size=10 name=txtDidong value="<? echo $didong; ?>">
							</span></font></td>
						</tr>
						<tr>
							<td align="right" width="35%" bgColor="#f4f4f4">
							<font face="Tahoma" style="font-size: 8.5pt">F</font><font style="FONT-SIZE: 8.5pt" face="Tahoma">ax:&nbsp;&nbsp;&nbsp;&nbsp; </font></td>
							<td bgColor="#f4f4f4" colSpan="2">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">&nbsp;
							<INPUT size=10 name=txtFax value="<? echo $fax; ?>">
							</span></font></td>
						</tr>
						<tr>
							<td vAlign="top" align="right" width="35%" bgColor="#f4f4f4" height="100">
							<font style="FONT-SIZE: 8.5pt" face="Tahoma">
							Enquiry:<font color="#ff0000">*&nbsp;</font></font><font color="#ff0000" style="font-size: 8.5pt" face="Tahoma">&nbsp;&nbsp; </font>
							<p align="left">&nbsp;</td>
							<td bgColor="#f4f4f4" colSpan="2" height="100">
							<font face="Tahoma"><span style="FONT-SIZE: 8.5pt">&nbsp;
							<TEXTAREA class=field name=txtNoidung rows=7 cols=31 style="position: relative; width: 100%; border: 1px solid #C3C3C3"><? echo $note; ?></TEXTAREA>
							</span></font></td>
						</tr>
					</table>
				</div>
				</td>
				<td width="10">&nbsp;</td>
			</tr>
			<tr>
				<td width="10">&nbsp;</td>
				<td>&nbsp;</td>
				<td width="10">&nbsp;</td>
			</tr>
			<tr>
				<td width="10">&nbsp;</td>
				<td>
				<p align="center"><span style="BACKGROUND-COLOR: #f4f4f4">
				<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" type=submit name=butSub value="Send">				
				</span><font color="#ffffff">&nbsp;
				</font><span style="BACKGROUND-COLOR: #efa937">
				<input type=reset  class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" name=butReset value="Reset"></span></td>
				<td width="10">&nbsp;</td>
			</tr>
		</table>
		</td>

			</tr>
		</table>
		
  </div>
  <p>&nbsp;</p>
	<input type="hidden" name="frame" value="contact">
</form></td>
													</tr>
												</table>
											</div>
											</td>
										</tr>
										
										<tr>
											<td>
											&nbsp;</td>
										</tr>
									</table>
								</div>
								</td>
							</tr>
<tr></tr>