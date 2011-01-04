<tr><td>
<?
if (isset($_REQUEST['act']))
{
?>
<TABLE cellSpacing=0 cellPadding=10 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<?
	$where="1=1";
	$keywords=killInjection($_REQUEST['keywords']);
	if ($keywords!='')
	{
		$where.=" and (products_shortdescription like '%".$keywords."%' or products_description like '%".$keywords."%'";
		if ($_REQUEST['search_in_description']=='') 
			$where.=" or products_name like '%".$keywords."%' or products_code like '%".$keywords."%'"; 
		$where.=") ";
	}
	if ($_REQUEST['categories_id']!='')	$where.=" and categories_id=".$_REQUEST['categories_id'];
	if ($_REQUEST['manufacturers_id']!='')	$where.=" and providers_id=".$_REQUEST['manufacturers_id'];
	if ($_REQUEST['pfrom']!='')	$where.=" and products_price>=".$_REQUEST['pfrom'];
	if ($_REQUEST['pto']!='') $where.=" and products_price<=".$_REQUEST['pto'];
	if ($_REQUEST['dfrom']!='')	$where.=" and products_date_added>=".$_REQUEST['dfrom'];
	if ($_REQUEST['dto']!='') $where.=" and products_date_added<=".$_REQUEST['dto'];
	
	$MAXPAGE=5;
	$p=0;
	if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
	
	$result = mysql_query("select count(*) from products where $where and language ='vn'",$con);
	$total=mysql_fetch_row($result);

	$sql="select * from products where $where and language ='vn' limit ".$p*$MAXPAGE.",".$MAXPAGE;
	$result = mysql_query($sql,$con);
	while (($row=mysql_fetch_assoc($result)))
	{?>



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
					<tr><td><b><? echo $row['products_name']?></b></td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td>
							<? if ($row['products_image']!=''){ ?>
							<img border="0" src="<? echo $row['products_image']?>" width="127" height="95" align="right" hspace="5" vspace="5">
							<?}?>
							<? echo $row['products_shortdescription']?>
						</td>
					</tr>
				</table>
				</div>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td align=right><INPUT onclick="window.location.href='./?frame=product&p=<? echo $row['products_id']; ?>'" class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" type=submit value="Chi ti&#7871;t" name=login36 style="height: 18; width:58"></td>
			</tr>
		</table>
	</div>
	</td>
</tr>	
	<?}
	settype($total[0],int);
?>
</table>
<?
	$s="frame=search&act=search&keywords=$keywords&search_in_description=".$_REQUEST['search_in_description']."&categories_id=".$_REQUEST['categories_id']."&manufacturers_id=".$_REQUEST['manufacturers_id']."&pfrom=".$_REQUEST['pfrom']."&pto=".$_REQUEST['pto']."&dfrom=".$_REQUEST['dfrom']."&dto=".$REQUEST['dto'];
?>

<form id="search1" name="search1" style="word-spacing: 0; margin: 0" method="GET" action="index.php?<? echo $s; ?>">
<input type="hidden" name="frame" value="<? echo $_REQUEST['frame']; ?>">
<input type="hidden" name="act" value="<? echo $_REQUEST['act']; ?>">
<input type="hidden" name="keywords" value="<? echo $_REQUEST['keywords']; ?>">
<input type="hidden" name="search_in_description" value="<? echo $_REQUEST['search_in_description']; ?>">
<input type="hidden" name="categories_id" value="<? echo $_REQUEST['categories_id']; ?>">
<input type="hidden" name="manufacturers_id" value="<? echo $_REQUEST['manufacturers_id']; ?>">
<input type="hidden" name="pfrom" value="<? echo $_REQUEST['pfrom']; ?>">
<input type="hidden" name="pto" value="<? echo $_REQUEST['pto']; ?>">
<input type="hidden" name="dfrom" value="<? echo $_REQUEST['dfrom']; ?>">
<input type="hidden" name="dto" value="<? echo $_REQUEST['dto']; ?>">
<input type="hidden" id="trang" name="p" value="1">
<TABLE cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<?
$pages=count_page($total[0],$MAXPAGE);
echo '<tr><td colspan="2" align="center"><hr class="fieldkey" width="100%" SIZE=1></td></tr>';
echo '<tr><td class="smallfont" align="left">Trình bày <b>'.($p+1).'</b> &#273;&#7871;n <b>'.(int)($total[0]/$MAXPAGE+1).'</b> (trong <b>'.$total[0].'</b> thông tin)</td>';
echo '<td class="smallfont" align="right">K&#7871;t qu&#7843;: ';
//$param="act=search&keywords=$keywords&search_in_description=".$_REQUEST['search_in_description']."&categories_id=".$_REQUEST['categories_id']."&manufacturers_id=".$_REQUEST['manufacturers_id']."&pfrom=".$_REQUEST['pfrom']."&pto=".$_REQUEST['pto']."&dfrom=".$_REQUEST['dfrom']."&dto=".$REQUEST['dto'];
if ($p>1) echo '<a title="&#272;&#7847;u tiên" href="#" onclick="javascript:changepage(0);return false;">[&lt;]</a> ';
if ($p>0) echo '<a title="V&#7873; tr&#432;&#7899;c" href="#" onclick="javascript:changepage('.($p-1).');return false;">[&lt;&lt;]</a> ';
$from=($p-10>0?$p-10:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	//if ($i!=$p) echo '<a href="./?frame=search&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	if ($i!=$p) echo '<a href="#" onclick="javascript:changepage('.$i.');return false;">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($p<$i-1) echo '<a title="Ti&#7871;p theo" href="#" onclick="javascript:changepage('.($p+1).');return false;">[&gt;&gt;]</a> ';
if ($p<$pages-1) echo '<a title="Cu&#7889;i cùng" href="#" onclick="javascript:changepage('.($pages-1).');return false;">[&gt;]</a> '; 
echo '</td></tr></table>';
?>
</form>

<script>
	function changepage(num)
	{	
		document.all.trang.value=num;
		search1.submit();
	}
</script>

<?
}
else
{
?>            
<TABLE border="0" cellpadding="10" cellspacing="1" width="100%" id="table1" align="center">
<TR><TD class="DialogBox">
<FORM name="searchform" action="./" method="GET">
<table cellSpacing="0" cellPadding="2" width="100%" border="0" id="table2">
	<tr>
		<td width="124"><font face="Tahoma"><span style="font-size: 8.5pt">T&#7915; khóa:</span></font></td>
		<td class="fieldValue">
		<span style="font-size: 8.5pt"><font size="1" face="Tahoma">
		<input name="keywords" size="255" style="width: 200; height:22"></font></span></td>
	</tr>
	<tr>
		<td width="124">&nbsp;</td>
		<td class="fieldValue">
		<span style="font-size: 8.5pt"><font face="Tahoma">
		<input type="checkbox" value="1" name="search_in_description"> Ch&#7881; tìm 
		trong ph&#7847;n mô t&#7843; s&#7843;n ph&#7849;m</font></span></td>
	</tr>
	<tr>
		<td width="124">&nbsp;</td>
		<td class="fieldValue">
                                    <font face="Verdana" size="1">
                					<span style="font-size: 8.5pt">
									<font face="Tahoma">
                <input type=submit value="Tìm ki&#7871;m" class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'"></font></span></font></td>
	</tr>
	<tr>
		<td width="124">&nbsp;</td>
		<td class="fieldValue">&nbsp;</td>
	</tr>
	<tr>
		<td width="124"><font face="Tahoma"><span style="font-size: 8.5pt">Trong danh m&#7909;c:</span></font></td>
		<td class="fieldValue">
		<span style="font-size: 8.5pt"><font face="Tahoma">
		<select name="categories_id" size="1" style="width: 200">
		<option selected value="">[Toàn b&#7897; danh m&#7909;c]</option>
<? 
	$cats=GetListCategory();
	foreach ($cats as $cat)
	{
		echo '<option value="'.$cat[0].'">'.$cat[1].'</option>';
	}
?>		
		</select></font></span></td>
	</tr>
	<tr style="display: none;">
		<td width="124"><font face="Tahoma"><span style="font-size: 8.5pt">Giá (&gt;=):</span></font></td>
		<td class="fieldValue"><span style="font-size: 8.5pt">
		<font face="Tahoma"><input name="pfrom"></font></span></td>
	</tr>
	<tr style="display: none;">
		<td width="124"><font face="Tahoma"><span style="font-size: 8.5pt">Giá (&lt;=):</span></font></td>
		<td class="fieldValue"><span style="font-size: 8.5pt">
		<font face="Tahoma"><input name="pto"></font></span></td>
	</tr>
	<tr style="display: none;">
		<td width="124"><font face="Tahoma"><span style="font-size: 8.5pt">Ngày (&gt;=):</span></font></td>
		<td class="fieldValue">
		<span style="font-size: 8.5pt"><font face="Tahoma">
		<input name="dfrom"> (tháng/ngày/n&#259;m)</font></span></td>
	</tr>
	<tr style="display: none;">
		<td width="124"><font face="Tahoma"><span style="font-size: 8.5pt">Ngày (&lt;=):</span></font></td>
		<td class="fieldValue">
		<span style="font-size: 8.5pt"><font face="Tahoma">
		<input name="dto"> (tháng/ngày/n&#259;m)</font></span></td>
	</tr>
</table>

<input type="hidden" name="act" value="search">

<input type="hidden" name="frame" value="search">

</FORM>
	</TD></TR>
</TABLE>
<?
}
?></td></tr>