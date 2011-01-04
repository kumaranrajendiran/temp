<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<link rel="stylesheet" type="text/css" href="../news/vietnextnews.css">
<?
	$keywords=killInjection($_REQUEST['keywords']);
	$news_per_page=20;
	$p=0;
	if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);
	$where="1=1";
	if ($keywords!='') $where.=" and (news_subject like '%".$keywords."%' or news_shortcontent like '%".$keywords."%' or news_content like '%".$keywords."%' or news_source like '%".$keywords."%')";

	
?>

<?					
	$sql = "select * from news where $where and status=0 order by date_added desc limit ".$news_per_page*$p.",".$news_per_page;
	$result = @mysql_query($sql,$con);
	while(($new=mysql_fetch_assoc($result)))	
	{
?>

<table id="table155" style="BORDER-COLLAPSE: collapse" cellPadding="0" width="100%" border="0">
	<tr>
		<td colSpan="2" height="22"><a href="./?frame=newsview&id=<? echo $new['news_id']; ?>"><b><font color="#ff690d" size="2"><? echo $new['news_subject']; ?></font></b></a></td>
	</tr>
	<tr>
		<td style="LINE-HEIGHT: 150%" height="22" align="center">
<? if ($new['news_image']!='') { ?>                            
                            <img style="BORDER-RIGHT: #b2b2b2 1px solid; BORDER-TOP: #b2b2b2 1px solid; BORDER-LEFT: #b2b2b2 1px solid; BORDER-BOTTOM: #b2b2b2 1px solid" vspace="4" hspace="4" src="<? echo $new['news_image']; ?>" width="120" border="0">
<? } ?>   
		</td>
		
		<td style="LINE-HEIGHT: 150%" vAlign="top" height="22">
		<table id="table156" style="BORDER-COLLAPSE: collapse" cellPadding="0" width="100%" border="0">
			<tr>
				<td style="LINE-HEIGHT: 150%" height="22">
				<font color="#b2b2b2"><? echo GetNewsDate($new); ?></font><font color="#b2b2b2">
				</font></td>
			</tr>
			<tr>
				<td style="LINE-HEIGHT: 150%">
				<p align="justify"><? echo $new['news_shortcontent']; ?></td>
			</tr>
			<tr>
				<td height="22" align="right">
				<a href="./?frame=newsview&id=<? echo $new['news_id']; ?>">[Chi ti&#7871;t<font face="Tahoma"> »</font>]</a>&nbsp;&nbsp;&nbsp; </td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colSpan="2" height="22"><hr color="#e6e6e6" SIZE="1"></td>
	</tr>	
</table>
<? 
}
?>

<?
$total=CountRecord("news",$where." and status=0");
if ($total>0) ListPaging($total,count_page($total,$news_per_page),$p,"./?frame=".$_REQUEST['frame']."&keywords=".$_REQUEST['keywords']."&menuid=".$_REQUEST['menuid']."&p=","m&#7909;c");
?>