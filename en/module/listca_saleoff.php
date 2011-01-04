<?
$sql = "select * from pro_saleoff n,products p where n.products_id=p.products_id and n.language='vn' order by pro_dateadded desc";
$result = @mysql_query($sql,$con);
$cnt=0;
while(($products=mysql_fetch_assoc($result)))
{
	if ($cnt % $col==0) echo "";
	$pro=GetProductInfo($products['products_id']);
	if ($pro['language']!='vn') continue;
	$cnt++;
?>
    <tr>
		<td >
          <p align="center"><a href="./?frame=product&p=<? echo $pro['products_id']; ?>">
			<img border="0" src="<? echo $pro['products_image']; ?>" width="120" style="border: 1px solid #D8D8D8"></a></td>
					</tr>
					<tr>
						<td height="10" >
          </td>
					</tr>


<?
	if ($cnt % $col==0) echo "";
}
?>