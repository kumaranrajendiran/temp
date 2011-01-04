<?
$row=4;
$col=1;
$MAXPAGE=10;

$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);

$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from products where categories_id=".$cat." order by products_date_added desc limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql,$con);
$total=CountRecord("products","categories_id=".$cat);
?>
<?
for ($i=0;$i<$row;$i++)
{
?>
<?
	for($j=0;$j<$col&&$products=mysql_fetch_assoc($result);$j++)
	{
		$pro=GetProductInfo($products['products_id']);
?>


<tr>
	<td style="border-style: solid; border-width: 1px" bordercolor="#6BBE88">
	<div align="center">
		<table border="0" width="95%" id="table31" cellspacing="0" cellpadding="0">
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
				<div align="center">
				<table border="0" width="95%" id="table32" cellspacing="0" cellpadding="0">
					<tr>
						<td>
							<b><? echo $pro['products_name']; ?></b>
						</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td>
							<? if ($pro['products_image']!=''){ ?>
							<img border="0" src="<? echo $pro['products_image']; ?>" width="127" height="95" align="right" hspace="5" vspace="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?}?>
							<? echo $pro['products_shortdescription']; ?>
						</td>
					</tr>
					<tr><td align=right><INPUT onclick="window.location.href='./?frame=product&p=<? echo $pro['products_id']; ?>'" class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" type=submit value="Chi ti&#7871;t" name=login36 style="height: 18; width:58"></td></tr>
				</table>
				</div>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
	</div>
	</td>
</tr>

<?
}
while($j<$col) {
	echo "";
	$j=$j+1;
}
?>
<?
}
?>
<? if ($total>0) { ?>
<tr><td>
<hr color="#E7E7E7" width="100%" SIZE=1>
<TABLE cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<?
$pages=count_page($total,($row*$col));
echo '<tr><td class="smallfont" align="left" ><font face="Tahoma" >
Trình bày <b>'.($p+1).'</b> &#273;&#7871;n <b>'.$pages.'</b> (trong <b>'.$total.'</b> thông tin)</font></td>';
echo '<td class="smallfont" align="right"><font face="Tahoma" >
Trang: ';
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
?>
<hr color="#E9E9E9" width="100%" SIZE=1 align="center">
<?
}
?></td></tr>