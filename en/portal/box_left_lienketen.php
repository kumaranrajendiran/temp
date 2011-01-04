<table border="0" width="100%" id="table32" cellpadding="0">
<?
	$result = mysql_query("select * from link_websites where link_websites_status=0 order by link_websites_sortorder, link_websites_modified desc limit 0,3",$con);
	while(($row=mysql_fetch_assoc($result)))
	{
?>
<? if($row['link_websites_img']!=''){?>

<tr>
<td>
	
	<div align="center">
<table border="0" width="180" id="table643">
                   <tr>
                      <td align="center">
<? if ($row['link_websites_address']!='') { ?>                      
                      <a target="_blank" title="<?=$row['link_websites_name']?>" href="http://<? echo $row['link_websites_address']; ?>">
                      <img border="0" src="<?=$row['link_websites_img']?>" width="180"></a>
<? } 
else
{
?>                    
                      <img border="0" title="<?=$row['link_website_name']?>" src="<? echo $row['link_websites_img']; ?>" width="180">
<? } ?>                      
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
