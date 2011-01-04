<table border="0" width="100%" id="table32" cellpadding="0" >
<?
	$result = mysql_query("select * from adv where adv_status=0 and language='vn' order by adv_ordered,adv_date_modified desc limit 0,3",$con);
	while(($row=mysql_fetch_assoc($result)))
	{
?>
<? if($row['adv_image']!='')
	{	?>

<tr>
<td>
<div align="center">
<table border="0" width="180" id="table643">
                   <tr>
                      <td align="center">
                      
                      <a title="<?=$row['adv_name']?>" href="./?frame=quangcao&id=<?=$row['adv_id']?>">
                      <img border="0" src="<?=$row['adv_image']?>" width="180"></a>

                     
                      </td>
                    </tr>

</table>
</div>
</td>
</tr>
<?                    
	}
}
?>
</table>
