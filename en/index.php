<? 
if ($_REQUEST['frame']=='edocdown') include("../edoc/down.php");
?>
<? require("../config.php") ?>
<? require("../common_start.php") ?>
<? require("module/module_func.php") ?>
<? require("../news/news_func.php") ?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<LINK href="../images/vietnextco.css" type=text/css rel=stylesheet>
<SCRIPT src="../images/topnav.js"></SCRIPT>
<title>DongKhoi Travel</title>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" style="background-color: #ECE9D8">

<div align="center">
	<table border="0" width="955" id="table1" cellspacing="0" cellpadding="0">
		<tr>
			<td>
			<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="0">
				<tr>
			<td valign="top" height="130">
			<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="955" height="130">
				<param name="movie" value="../images/banneren.swf">
				<param name="quality" value="High">
				<embed src="../images/banneren.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="955" height="130" quality="High"></object>
			</td>
		</tr>
						<tr>
						<td height="30" bgcolor="#CC0000">
			<table id="table35" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody><tr>
					<td valign="top" class="style1"><b><a class="A3" href="./">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME &nbsp;&nbsp;&nbsp;</a> |
					<a class="A3" href="./?frame=introen">&nbsp;&nbsp;&nbsp; INTRO &nbsp;&nbsp;&nbsp;</a> |
					<a class="A3" href="./?frame=contact">&nbsp;&nbsp;&nbsp; CONTACT &nbsp;&nbsp;&nbsp;</a>|
					<a class="A3" href="./?frame=content&amp;name=dichvuen">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SERVICE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> |
					<a class="A3" href="./?frame=login">&nbsp;&nbsp;&nbsp;MEMBER &nbsp;&nbsp;&nbsp;</a> | 
					<a class="A3" href="./?frame=content&amp;name=tintucen">&nbsp;&nbsp;&nbsp;NEW &amp; EVENTS </a></b></td>
					<td valign="top" width="127"><b>English</b> - <a href="http://www.dongkhoitravel.com/vn" style="font-weight: bold;">Vietnamese</a></td>
				</tr>
			</tbody></table>			</td>
			<!--<td background="../images/cell_3ner.png" height="30">
			<table border="0" width="100%" id="table35" cellspacing="0" cellpadding="0">
				<tr>
					<td width="191">&nbsp;</td>
					<td valign="top"><b><a class="A1" href="./">HOME</a>&nbsp; |&nbsp;
					<a class="A1" href="./?frame=introen">INTRO</a>&nbsp; |&nbsp;
					<a class="A1" href="./?frame=contact">CONTACT </a>&nbsp;|&nbsp;
					<a class="A1" href="./?frame=content&name=dichvuen">SERVICE</a>&nbsp; |&nbsp;
					<a class="A1" href="./?frame=login">MEMBER</a>&nbsp; | &nbsp;
					<a class="A1" href="./?frame=content&name=tintucen">NEWS & EVENTS</a></b></td>
					<td valign="top" width="127"><b>English</b> - <a href="../vn" style="font-weight: bold;">Vietnamese</a></td>
				</tr>
			</table>
			</td>-->
		</tr>
		<tr>
			<td valign="top" class="style4"><img src="../images/cellcenter.gif" width="778" height="10"></td>
			<!--<td colspan="2" valign="top" background="../images/cellcenter.gif" height="10"></td>-->
		</tr>

				<tr>
					<td background="../images/nen1.gif" valign="top">
			<table border="0" width="100%" id="table2" cellspacing="0" cellpadding="0">
						<tr>
					<td valign="top" width="184" height="25" bgcolor="#E2E2E2">
					<table border="0" width="100%" id="table3" cellspacing="0" cellpadding="0" bgcolor="#E2E2E2">
<tr>
							<td style="border-style: solid; border-width: 1px" valign="top" height="25" bordercolor="#C0C0C0">&nbsp;</td>
						</tr>					
			<tr>
					<td valign="top" width="184" height="25" bgcolor="#E2E2E2">
									<div align="left">
										<table border="0" width="100%" id="table618" cellspacing="0" cellpadding="0">
											<tr>
							<td style="border-style: solid; border-width: 1px" valign="top" bordercolor="#6BBE88">
					<div align="center">
					
					<table border="0" width="100%" id="table3" cellspacing="0" cellpadding="0" bgcolor="#E2E2E2">			
							<tr><td>							

								<? include("module/listcategories.php");?>
								</td>
							</tr>
							<tr><td height=1></td></tr>
<tr>
							<td>
							<form method="POST" action="index.php">
							<input type="hidden" name="frame" value="login">
							<table border="0" width="100%" id="table5" cellspacing="0" cellpadding="0">
								<tr>
									<td background="../images/button2.gif" height="25">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
									<a href="./?frame=register" style="color: #A80000">Register</a></td>
								</tr>
								<tr>
									<td valign="top">
							
								
									<table border="0" style="border:0px solid #EEEEEE; border-collapse: collapse" width="100%" id="table6" cellpadding="0">
										<tr>
											<TD class=loginpad colSpan=2 style="border-style:none; border-width:medium; background-color: #E2E2E2">
											<p align="left"><font face="Tahoma">
											<span style="font-size: 8.5pt">
											Username:<font color="#FFFFFF"><br>
											&nbsp;</font><input class="fieldKey" maxLength=30 name=txtUser size="22" style="color: #FFB38E; border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"><font color="#FFFFFF">
											</font> 
											</span></font> </TD>
										</tr>
										<tr>
											<TD class=loginpad colSpan=2 style="border-style:none; border-width:medium; background-color: #E2E2E2">
											<font face="Tahoma">
											<span style="font-size: 8.5pt">
											Password:<font color="#FFFFFF"><br>
											&nbsp;</font><input type=password class="fieldKey" maxLength=30 name=txtPassword size="22" style="color: #000000; border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"><font color="#FFFFFF">
											</font> 
											</span></font> </TD>
										</tr>
										<tr>
											<TD align=middle colSpan=2 bgcolor="#E2E2E2" style="border-style: none; border-width: medium">
											<a href="http://www.viendongcomputer.com/?frame=login">
											<font face="Tahoma">
											<span style="font-size: 8.5pt">
											<font color="#FFFFFF">
											<INPUT class=bordergreen  type=submit value="Login" name=butSub style="height: 22; width:95"></font></span></font></a><font face="Tahoma" style="font-size: 8.5pt" color="#FFFFFF">
											</font>
											</TD>
										</tr>
										<tr>
											<TD width="13%" bgcolor="#E2E2E2" style="border-style: none; border-width: medium">
											<font face="Tahoma" style="font-size: 8.5pt" color="#FFFFFF">&nbsp;
											</font></TD>
											<TD id=graylink3 width="88%" bgcolor="#E2E2E2" style="border-style: none; border-width: medium">
											<font face="Tahoma" style="font-size: 8.5pt">&nbsp;
											</font></TD>
										</tr>
										<tr>
										<td height=3 style="border-style: none; border-width: medium"></td>
										</tr>
									</table>
										</td>
								</tr>
							</table></form>
							</td>
						</tr>
<tr>
							<td style="border-style: solid; border-width: 1px" valign="top" bordercolor="#6BBE88">
							<table border="0" width="100%" id="table7" cellspacing="0" cellpadding="0">
								<tr>
									<td background="../images/button2.gif" height="25">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
									<a href="./?frame=search" style="color: #A80000">Search</a></td>
								</tr>
								<tr>
                <TD style="PADDING-LEFT: 3px; PADDING-TOP: 4px" align=middle 
                bgColor=#e2e2e2>
					<form style="word-spacing: 0; margin-top: 0; margin-bottom: 0" method="GET" action="index.php" name="search">
					<table border="0" width="100%" id="table8" cellspacing="0" cellpadding="0">
						<tr>
							<td width="133">
							<p align="right">
                        <INPUT class=select maxLength=30 name="keywords" size="100" style="float: left; height: 20; border: 1px solid #3E80B0; width:126" ></td>
							<td width="35">
							<img border="0" src="../images/iconsearch.gif" width="20" height="20" onClick="search.submit()"> </td>
							<input type="hidden" name="act" value="search">
							<input type="hidden" name="frame" value="search">
							<td>&nbsp;
                        </td>
						</tr>
					</table>
					</form>
					</TD>
								</tr>
								<tr>
									<td height="5" bgcolor="#E2E2E2"></td>
								</tr>
							</table>
							</td>
						</tr>					
							</table>
					</div>
					</td>
					</tr>
											
											
											<tr>
								<td>	
								<table border="0" width="100%" id="table639" cellspacing="0" cellpadding="0">
							<tr bgcolor=#580a09>
								<td bgcolor=#580a09 height="21">
								<table border="0" width="100%" id="table640" cellspacing="0" cellpadding="0">
									<tr>
							<td style="border-style: solid; border-width: 1px" valign="top" bordercolor="#6BBE88">
							<table border="0" width="100%" id="table9" cellspacing="0" cellpadding="0">
								<tr>
									<td height="25" background="../images/button2.gif"><font color="#A80000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
									Visited</font></td>
								</tr>
								<tr>
									<td height="25" valign="top" bgcolor="#E2E2E2"><? include("portal/box_tructuyen.php");?></td>
								</tr>
							</table>
							</td>
						</tr>
								</table>
								</td>
							</tr>
							<tr>
								<td>
									<script language="javascript" src="../JSEN/Library.js"></script>
     							   <Script language="JavaScript" src="http://vnexpress.net/Service/Weather_Content.js"></Script>
									<script language="javascript" src="../JSEN/Weather.js"></script>
								</td>
							</tr>
							<tr>
								<td>
									<script language="JavaScript" src="http://vnexpress.net/Service/Gold_Content.js"></script>
									<SCRIPT language=JavaScript src="../JSEN/Gold.js"></SCRIPT>
								</td>
							</tr>
							<tr>
								<td>
									<script language="JavaScript" src="http://vnexpress.net/Service/Forex_Content.js"></script>        
									<SCRIPT language=JavaScript src="../JSEN/Forex.js"></SCRIPT>
								</td>
							</tr>
							</table></td>
											</tr>
											<tr>
								<td>
								
								</td>
											</tr>
											
											</table>
									</div>
									<p></td>
								</tr>
								</table>
							</td>
					<td width="580" valign="top" bgcolor="#FFFFFF">
					<div align="center">
						<table border="0" width="580" id="table28" cellspacing="0" cellpadding="0">
							<tr>
								<td style="border-style: solid; border-width: 1px" bordercolor="#6BBE88" background="../images/center.gif" height="30">
								<font size="3" color="#FF0000" face="VNI-Aptima">
								<b>
								<marquee direction=left onMouseOver="this.stop()" onMouseOut="this.start()" scrollamount="2" scrolldelay="1">YOUR SATISFACTION IS OUR HAPPINESS</marquee></b></font></td>
							</tr>
							<tr>
								<td style="border-style: solid; border-width: 1px" bordercolor="#6BBE88" height="123" align="center">
				<SCRIPT>
				var photos=new Array()
				var which=0
				var pause=4000;
				var image_path="../images/"
				photos[0]= image_path + "1.jpg";
				photos[1]= image_path + "2.jpg";
				photos[2]= image_path + "3.jpg";
				photos[3]= image_path + "4.jpg";
        </SCRIPT>
 <SCRIPT language=javascript src="../images/$slide.js">
	 	</SCRIPT>
 <SCRIPT language=javascript>
		document.write('<img src="'+photos[0]+'" name="photoslider" id="photoslider" style="filter:revealTrans(duration=2,transition=23)" border=0>')
		setInterval("doSlideShow()",pause)	
	</SCRIPT></td>
							</tr>								
<tr>
								<td style="border-style: solid; border-width: 1px" bordercolor="#6BBE88" background="../images/center.gif" height="30">
								<p align="center"><b><font color="#A80000">
								<? include("module/process_title.php");?></font></b></td>
							</tr>
							<? include("module/process_frame.php");?>
											<tr><td>&nbsp;</td></tr>
											<tr>
												<td>
									<p align="right">
									<img border="0" src="../images/b_top.gif" width="9" height="9">&nbsp; <a href="#top" class="topmenub">Go to Top</a></td>
											</tr>
											</table>
									</div>
									</td>
									
									<td width="184" align="center" valign="top" class="style2" bgcolor="#ffffff">
					  	<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td class="style3">Weblinks</td>
                                      </tr>
                                      <tr>
                                        <td class="style5"><? require("portal/box_left_lienketen.php"); ?></td>
                                      </tr>
                                      
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td class="style3"><span id="result_box" lang="en"><span title="">Advertisements</span></span></td>
                                      </tr>
                                      <tr>
                                        <td class="style5"><? require("portal/box_left_quangcaoen.php"); ?></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>					  </td>
									
								</tr>
							</table><!--</div>
							</td>
							
						</tr>-->
					</table>
					</td>
				</tr>
				<tr>
			<td valign="top">
			<table border="0" width="100%" id="table16" cellspacing="0" cellpadding="0">
				<tr>
    <TD class=copyright align=middle bgColor=#74D286 
      height=86 style="background-color: #74D286"><? echo GetContentName('addressen'); ?> <BR></TD>
				</tr>
				<tr>
					<td>
			<div align="center">
				<table id="table17" style="border-width: 0" cellSpacing="0" cellPadding="0" width="955" border="1">
					<tr>
						<td style="BORDER-RIGHT: 1px solid; BORDER-TOP: medium none; BORDER-LEFT: 1px solid; BORDER-BOTTOM: 1px solid" vAlign="top" bgColor="#E2E2E2">
						<p align="center"><font color="#008000">Copyright � 2007 
						DongKhoi llc - Designed by </font>
						<a href="http://www.vietnextco.com">
						<font color="#008000">VietNextco</font></a></td>
					</tr>
				</table>
			</div>
					</td>
				</tr>
			</table>
			</td>
		</tr>
			</table>
			</td>
		</tr>
	</table>
</div>
</body>

</html>
<? require("../common_end.php") ?>