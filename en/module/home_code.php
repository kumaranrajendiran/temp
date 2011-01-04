<?
$row=5;
$col=3;
$MAXPAGE=10;

$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);

$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$result = mysql_query("select * from categories where parent_id=0 and language='vn' limit 1",$con);
$langid=mysql_fetch_assoc($result);

$sql = "select * from categories where parent_id=".$langid['categories_id']." order by sort_order limit ".$row*$col*$p.",".$row*$col;
$result1 = @mysql_query($sql,$con);
$total=CountRecord("categories", "parent_id=".$langid['categories_id']);

?><br>
<table border="0" style="border-collapse: collapse" width="100%" id="table86" cellpadding="0" align="center">
<?
for ($i=0;$i<$row;$i++)
{
?>
	<tr>
<?
	for($j=0;$j<$col&&$categorie=mysql_fetch_assoc($result1);$j++)
	{
		$pro=GetCategoryInfo($categorie['categories_id']);
?>
		<td valign="bottom">
               <table border="0" style="border-collapse: collapse" width="95%" id="table25" cellpadding="0">
                       
			      	<tr>
					<td align="center"><a href="./?frame=category&cat=<? echo $pro['categories_id']; ?>">
					<img border="0" src="<?echo $pro['categories_image'];?>" width="114"></a></td>
				</tr>
				<tr>
					<td align="center" height="50" width="200"> 
					 <table border="0" style="border-collapse: collapse" width="100%" id="table25" cellpadding="0" align="center">
						<tr><td align="center"><img border="0" src="../images/icon1.gif" width="12" height="9"> &nbsp;<a href="./?frame=category&cat=<? echo $pro['categories_id']; ?>">
					<b><font color="#ff0000"><?echo $pro['categories_name'];?></b></font></a>
					</td></tr>
					</table>
					</td>
				</tr>

				</table>
					</td>
											
<?
}
while($j<$col) {
	echo "<td ></td>";
	$j=$j+1;
}
?>
 </tr>
<?
}
?>

                  </table>
<? 
$pages=count_page($total,($row*$col));
if ($total>0 and $pages>1) { ?>
<hr color="#E7E7E7" width="100%" SIZE=1>
<TABLE cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<?
echo '<tr><td class="smallfont" align="left" ><font face="Tahoma" color="#000000">
Trình bày t&#7915; trang <b>'.($p+1).'</b> &#273;&#7871;n <b>'.$pages.'</b> (trong <b>'.$total.'</b> danh m&#7909;c)</font></td>';
echo '<td class="smallfont" align="right"><font face="Tahoma" color="#000000">
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
?><?
}
?><br>