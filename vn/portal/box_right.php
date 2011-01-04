<table border="0" width="100%" id="table32" cellpadding="0" >
 <tr>
							<td height="5">
							</td>
						</tr>

<tr>
<td>
<?
	$result = mysql_query("select * from link_websites where link_websites_status=0 and link_websites_categoriesid=7 order by link_websites_sortorder, link_websites_dateadded",$con);
	while(($row=mysql_fetch_assoc($result)))
	{
?>	
<table id="table94" style="BORDER-COLLAPSE: collapse" borderColor="#9f8783" cellSpacing="1" width="100%" border="0">
                    <tr>
                      <td height="24" align="center">
<? if ($row['link_websites_address']!='') { ?>                      
                      <a target="_blank" href="<? echo $row['link_websites_address']; ?>">
                      <img border="0" src="<? echo $row['link_websites_img']; ?>" width="130"></a>
<? } 
else
{
?>                    <img border="0" src="<? echo $row['link_websites_img']; ?>" width="130"></a>
<? } ?>                      
                      </td>
                    </tr>
                    <tr>
							<td height="5">
							</td>
						</tr>

</table>
<?                    
	}
?>
</td>
</tr>
</table>