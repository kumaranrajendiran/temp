<p align="center">
<select  size="1" name="weblink" style="border:1px solid #FF9600; width: 145; font-weight:none; text-align:center" onchange="if (weblink.value!='') {window.open(weblink.value);weblink.options[0].selected=true}">
<option value=""><p align="center"><font color="">Liên k&#7871;t website</font></p></option>
<?
	$result1 = mysql_query("select * from link_websites_categories where link_websites_categories_status=0 and link_websites_categories_parentid=3 order by date_added",$con);
	while(($row1=mysql_fetch_assoc($result1)))
	{
		echo '<option value="">--- '.$row1['link_websites_categories_name'].' ---</option>';
?>																	
<?
	$result = mysql_query("select * from link_websites where link_websites_status=0 and link_websites_categoriesid=".$row1['link_websites_categories_id']." order by link_websites_sortorder, link_websites_dateadded",$con);
	while(($row=mysql_fetch_assoc($result)))
	{
		echo '<option value="'.$row['link_websites_address'].'">'.$row['link_websites_name'].'</option>';
	}
}
?>																	
</select></p>
