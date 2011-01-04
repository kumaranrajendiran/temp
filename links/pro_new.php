<?
$row=5;
$col=1;
$MAXPAGE=10;

$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);

$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from link_websites_new  order by pro_dateadded desc limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql,$con);
$total=CountRecord("link_websites_new");
?>
<? echo '<a href="./?frame=pro_new">Website do VietNext thi&#7871;t k&#7871;</a>'.'  »  '?>
<hr color="#CCCCCC" noShade SIZE="1">
<table border="0" style="border-collapse: collapse" width="100%" id="table86" cellpadding="0">
<?
for ($i=0;$i<$row;$i++)
{
?>
	<tr>
<?
	for($j=0;$j<$col&&$products=mysql_fetch_assoc($result);$j++)
	{
		$pro=GetlinkInfo($products['products_id']);
?>
		<td>
		<table cellSpacing="0" cellPadding="0" width="100%" align="center" border="0" id="table8">
													<tr>
														<td width="26%">
														<table height="160" cellSpacing="0" cellPadding="1" width="195" bgColor="#c0c0c0" border="0" id="table9">
															<tr>
																<td>
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																<a target="_blank" href="./?frame=linksview&id=<? echo $pro['link_websites_id']; ?>">
																<img height="160" src="<? echo $pro['link_websites_img']; ?>" width="195" align="absMiddle" border="0">
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
																<strong><? echo $pro['link_websites_name']; ?></strong></font></td>
															</tr>
															<tr>
																<td height="22" width="79">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																•  
																&#272;&#7883;a ch&#7881; URL</font></td>
																<td height="22">
																<font face="Tahoma" style="font-size: 8.5pt">
																<a target="_blank" href="./?frame=linksview&id=<? echo $pro['link_websites_id']; ?>">
																<b><? echo $pro['link_websites_address']; ?></b></a></font></td>
															</tr>
															<tr>
																<td height="22" width="79" valign="top">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																• 
																Mô t&#7843;</font></td>
																<td height="22">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																<? echo $pro['link_websites_description']; ?></font></td>
															</tr>
															<tr>
																<td height="22" width="79" valign="top">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																• 
																Th&#7889;ng kê</font></td>
																<td height="22">
																<font face="Tahoma" style="font-size: 8.5pt" color="#5B5B5B">
																Xem : <? echo $pro['link_websites_view']; ?></font></td>
															</tr>
														</table>
														</td>
													</tr>
													<tr>
														<td colSpan="2" height="10">
														</td>
													</tr>
												</table>
		</td>
<?
}
while($j<$col) {
	echo "<td></td>";
	$j=$j+1;
}
?>

                    </tr>
<?
}
?>

                  </table>
<? if ($total>0) { ?>
<hr color="#E7E7E7" width="100%" SIZE=1>
<TABLE cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<?
$pages=count_page($total,($row*$col));
echo '<tr><td class="smallfont" align="left" ><font face="Tahoma" color="#000000">
Trình bày t&#7915; trang <b>'.($p+1).'</b> &#273;&#7871;n <b>'.$pages.'</b> (trong <b>'.$total.'</b> website)</font></td>';
echo '<td class="smallfont" align="right"><font face="Tahoma" color="#000000">
K&#7871;t qu&#7843;: ';
$param="";
if ($p>1) echo '<a title="&#272;&#7847;u tiên" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p=0">[&lt;]</a> ';
if ($p>0) echo '<a title="V&#7873; tr&#432;&#7899;c" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p-1).'">[&lt;&lt;]</a> ';
$from=($p-10>0?$p-10:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($p<$i-1) echo '<a title="Ti&#7871;p theo" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p+1).'">[&gt;&gt;]</a> ';
if ($p<$pages-1) echo '<a title="Cu&#7889;i cùng" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($pages-1).'">[&gt;]</a>'; 
echo '</font></td></tr></table>';
?><?
}
?>