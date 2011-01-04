<?
$id=killInjection($_REQUEST['id']);

$sql = "select * from link_websites where link_websites_id=".$id." limit 1";
$result = mysql_query($sql,$con);
$webinfo=mysql_fetch_assoc($result);
if ($webinfo)
{
	$sql = "update link_websites set link_websites_view=link_websites_view+1 where link_websites_id=$id";
	$result = mysql_query($sql,$con);
	echo "<script>window.location='".$webinfo['link_websites_address']."';</script>";
}
?>