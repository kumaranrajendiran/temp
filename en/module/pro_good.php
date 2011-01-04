<?
$row=4;
$col=1;
$MAXPAGE=10;

$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);

$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from pro_good where language ='en' order by pro_sortorder desc limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql,$con);
$total=CountRecord("pro_good","language='en'");
if($total>0){
	for ($i=0;$i<$row;$i++){
		for($j=0;$j<$col&&$products=mysql_fetch_assoc($result);$j++){
			$pro=GetProductInfo($products['products_id']);?>
			<tr>
				<td style="border-style: solid; border-width: 1px" bordercolor="#6BBE88">
				<div align="center">
				<table border="0" width="95%" id="table31" cellspacing="0" cellpadding="0">
					<tr>
						<td><br><b><a href="./?frame=product&p=<? echo $pro['products_id']; ?>"><?echo $pro['products_name'];?></a></b></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td>
						<div align="center">
						<table border="0" width="95%" id="table32" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<?if ($pro['products_image'] !=''){?>
									<a href="./?frame=product&p=<? echo $pro['products_id']; ?>"><img border="0" src="<? echo $pro['products_image']; ?>" width="127" height="95" align="right" hspace="5" vspace="5"></a>
									<?}?>
									<?echo $pro['products_shortdescription'];?>
								</td>
							</tr>
							<tr>
								<td align=right>
									<INPUT onclick="window.location.href='./?frame=product&p=<? echo $pro['products_id']; ?>'" class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" type=submit value="More" name=login36 style="height: 18; width:58"></td>
							</tr>
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
		<?}
		while($j<$col){
			$j=$j+1;}
	}
}else{?>
	<tr>
		<td>
		<p align="center"><font color="#CC3300" size="2"><b>Infomation updating..</b></font></td>
	</tr>
<?}?>