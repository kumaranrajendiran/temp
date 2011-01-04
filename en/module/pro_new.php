<?
$row=4;
$col=2;
$MAXPAGE=10;

$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);

$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from pro_new where language ='vn' order by pro_sortorder desc limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql,$con);
$total=CountRecord("pro_new","language='vn'");
?>
<? if($total>0) {?>
<table border="0" style="border-collapse: collapse" width="100%" id="table86" cellpadding="0">
<?
for ($i=0;$i<$row;$i++)
{
?>
	<tr>
<?
	for($j=0;$j<$col&&$products=mysql_fetch_assoc($result);$j++)
	{
		$pro=GetProductInfo($products['products_id']);
?>
                      <td>
                      <table border="0" width="100%" id="table158" cellspacing="0" cellpadding="0">
					<tr>
						<td  align="center">
						<table border="1" width="158" id="table159" cellspacing="0" cellpadding="0" style="border-collapse: collapse" bordercolor="#AAC6FF">
							<tr>
								<td valign="top">
								<p>
								<a href="./?frame=product&p=<? echo $pro['products_id']; ?>">
								<img border="0" src="<? echo $pro['products_image']; ?>" width="158"></a></td>
							</tr>
						</table>
						</td>
						</tr>
					<tr>
						<td width="50%" height="35">
						<p align="center">
						<font color="#CC3300"><b>
						<a class="A1" href="./?frame=product&p=<? echo $pro['products_id']; ?>"><?echo $pro['products_name'];?></a></b></font><img border="0" src="../images/new[1].gif" width="33" height="16"></td>
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
<hr color="#248FDF" width="100%" SIZE=1>
<TABLE cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<?
$pages=count_page($total,($row*$col));
echo '<tr><td class="smallfont" align="left" ><font face="Tahoma" color="#000000">
Trình bày t&#7915; trang <b>'.($p+1).'</b> &#273;&#7871;n <b>'.$pages.'</b> (trong <b>'.$total.'</b> s&#7843;n ph&#7849;m)</font></td>';
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
}
else
{
?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table1">
	<tr>
		<td>
		<p align="center"><font color="#CC3300" size="2"><b>S&#7843;n ph&#7849;m &#273;ang c&#7853;p 
		nh&#7853;t</b></font></td>
	</tr>
</table>
<?}
?>