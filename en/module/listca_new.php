<?
$total=CountRecord("pro_new","language='vn'");
$row=1;
$col=$total;
$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from pro_new where language ='vn' order by pro_sortorder desc limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql,$con);
?>
<table border="0" style="border-collapse: collapse" id="table86" cellpadding="0" width="130">
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
		<td >
          <a href="./?frame=product&p=<? echo $pro['products_id']; ?>">
			<img border="0" src="<? echo $pro['products_image']; ?>" width="120" height="90" align="left" ></a>
		</td>
<?
}
while($j<$col) {
	echo "<td width=10></td>";
	$j=$j+1;
}
?>

                    </tr>
<?
}
?>

                  </table>
