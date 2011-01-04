<table border="0" width="100%" id="table32" cellpadding="0"  height="22">
<?
	$result = mysql_query("select * from link_websites where link_websites_status=0 and link_websites_categoriesid=5 order by link_websites_sortorder, link_websites_dateadded",$con);
	while(($row=mysql_fetch_assoc($result)))
	{
?>
<? if($row['link_websites_img']!=''){?>
<tr>
	<td height="10">&nbsp;</td>
</tr>

<tr>
<td>
	<p align="center">
	<div align="center">
<table border="1" width="130" id="table643">
                   <tr>
                      <td height="24" align="center">
<? if ($row['link_websites_address']!='') { ?>                      
                      <a target="_blank" href="<? echo $row['link_websites_address']; ?>">
                      <img border="0" src="<? echo $row['link_websites_img']; ?>" width="130"></a>
<? } 
else
{
?>                    
                      <img border="0" src="<? echo $row['link_websites_img']; ?>" width="130">
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
