<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<?
error_reporting(0);
$sql = "select * from link_websites_categories where link_websites_categories_id=".$cat." limit 1";
$result = mysql_query($sql,$con);
$catinfo=mysql_fetch_assoc($result);
?>
<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td>
<? echo $catinfo['link_websites_categories_desc']; ?>
		</td>
	</tr>
</table>
<?
$col=3;

$cat=0;
if ($_REQUEST['cat']!='') $cat=$_REQUEST['cat'];

function getpath($cat)
{
	if ($cat==0) return "";
	global $con;
	$sql = "select * from link_websites_categories where link_websites_categories_id=$cat limit 1";
	$result = mysql_query($sql,$con);
	$row=mysql_fetch_assoc($result);
	$ret='<a href="./?frame=links&cat='.$row['link_websites_categories_id'].'">'.$row['link_websites_categories_name'].'</a>';
	if ($row['link_websites_categories_parentid']!=0) $ret=getpath($row['link_websites_categories_parentid'])."  »  ".$ret;
	return $ret;
}
?>
<? echo '<a href="./?frame=links">Website do VietNext thi&#7871;t k&#7871;</a>'.'  »  '.getpath($cat); ?>
<hr color="#CCCCCC" noShade SIZE="1">
<table border="0" style="border-collapse: collapse" width="100%" id="table72" cellpadding="0">
<tr>
<?
$maxrow=5;
$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];

$total=CountRecord("link_websites","link_websites_categoriesid=".$cat);

$sql = "select * from link_websites where link_websites_status=0 and link_websites_categoriesid=".$cat." order by link_websites_dateadded desc limit ".$maxrow*$p.",".$maxrow;
$result = mysql_query($sql,$con);
$cnt=0;
while($row=mysql_fetch_assoc($result))
{
	echo "<tr><td>";
?>
<table cellSpacing="0" cellPadding="0" width="100%" align="center" border="0" id="table8">
													<tr>
														<td width="26%">
														<table height="160" cellSpacing="0" cellPadding="1" width="195" bgColor="#c0c0c0" border="0" id="table9">
															<tr>
																<td>
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																<a target="_blank" href="./?frame=linksview&id=<? echo $row['link_websites_id']; ?>">
																<img height="160" src="<? echo $row['link_websites_img']; ?>" width="195" align="absMiddle" border="0">
																</a>
																</font></td>
															</tr>
														</table>
														</td>
														<td vAlign="top" width="74%">
														<table cellSpacing="2" cellPadding="2" width="100%" border="0" id="table10">
															<tr>
																<td height="22" width="79">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																•  
																Tên website</font></td>
																<td height="22">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																<strong><? echo $row['link_websites_name']; ?></strong></font></td>
															</tr>
															<tr>
																<td height="22" width="79">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																•  
																&#272;&#7883;a ch&#7881; URL</font></td>
																<td height="22">
																<font face="Tahoma" style="font-size: 8.5pt">
																<a target="_blank" href="./?frame=linksview&id=<? echo $row['link_websites_id']; ?>">
																<b><? echo $row['link_websites_address']; ?></b></a></font></td>
															</tr>
															<tr>
																<td height="22" width="79" valign="top">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																• 
																Mô t&#7843;</font></td>
																<td height="22">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																<? echo $row['link_websites_description']; ?></font></td>
															</tr>
															<tr>
																<td height="22" width="79" valign="top">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																• 
																Th&#7889;ng kê</font></td>
																<td height="22">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																Xem : <? echo $row['link_websites_view']; ?></font></td>
															</tr>
														</table>
														</td>
													</tr>
													<tr>
														<td style="BACKGROUND-POSITION: left bottom; BACKGROUND-REPEAT: repeat-x" background="http://www.tkwvietweb.com/vietweb/images/rep_line.jpg" colSpan="2" height="10">&nbsp;</td>
													</tr>
													<tr>
														<td colSpan="2" height="10">
														</td>
													</tr>
												</table>
<?	
	echo "</td></tr>";
}
?>
</tr></table>

<? if ($total>0){ ?>

<hr color="#CCCCCC" noShade SIZE="1">
<TABLE cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<?
echo '<tr><td class="smallfont" align="left">Trình bày <b>'.($p+1).'</b> &#273;&#7871;n <b>'.count_page($total,($maxrow)).'</b> (trong <b>'.$total.'</b> website)</td>';
echo '<td class="smallfont" align="right">K&#7871;t qu&#7843;: ';
$param="";
if ($p>0) echo '<a href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p-1).'">[&lt;&lt;]</a> ';
for ($i=0;$i<count_page($total,($maxrow));$i++)
{
	if ($i!=$p) echo '<a href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	else echo ($i+1).' ';
}
if ($p<$i-1) echo '<a href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p+1).'">[&gt;&gt;] </a> ';
echo '</td></tr></table>';
?><? } ?>