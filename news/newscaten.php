<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<link rel="stylesheet" type="text/css" href="news/vietnextnews.css">
<?
	$cat1=killInjection($_REQUEST['cat1']);
	if ($cat1=='') $cat1=4;
	$news_per_page=5;
	$p=0;
	if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);
?>
	<table cellSpacing="0" cellPadding="0" width="98%" border="0" id="table2" align="center">
	<tr>
		<td vAlign="top" width="100%">
		<table cellSpacing="1" cellPadding="0" width="100%" border="0" id="table3">
	<?					
	$sql = "select * from news where status=0 and categories_id=".$cat1." order by date_added desc limit ".$news_per_page*$p.",".$news_per_page;
	$result = @mysql_query($sql,$con);
	while(($news=mysql_fetch_assoc($result)))	
	{
?>
							<tr>
								<td class="newstitle" height="16">
								<a href="./?frame=newsview&id=<? echo $news['news_id']; ?>" class="topmenub">
								<u><? echo $news['news_subject']; ?></u></a></td>
							</tr>
							<tr><td height="16">
								<font color="#c60000">
								<span style="font-weight: 400"><i><? echo GetNewsDateen($news); ?></i></span></font>&nbsp;</td>
							</tr>
							<tr>
								<td >
								<table cellSpacing="6" cellPadding="0" width="100%" align="left" border="0" id="table4">
									<tr>
										<? if ($news['news_image']!='') { ?>
										<td style="line-height: 150%">
										<table id="table14" cellSpacing="3" cellPadding="0" width="1" align="left" border="0">
										<tr>
											<td vAlign="top" align="left">
											<a href="./?frame=newsview&id=<? echo $news['news_id']; ?>">
										<img src="../<? echo $news['news_image']; ?>" border="0" align="left" vspace="5" hspace="0" width="120" title="<? echo $news['news_tile']; ?>" style="position :relative;top:-5;left:-5;">
										</a>

											</td>
										</tr>
										<tr >
											<td vAlign="top" align="center">
											<span style="FONT-SIZE: 8pt; FONT-STYLE: italic; FONT-FAMILY: Arial">
											<? echo $news['last_modified']; ?></span></td>
										</tr>
									</table>
									<p align="justify">
									<span align="justify">
							            <font face="Arial" style="font-size: 8.5pt"><? echo $news['news_shortcontent']; ?></font>
							            </span>
										</td>
										<?
											}
											else
											{
										?>
											<td valign="top" style="line-height: 150%">
											<p align="justify">
											<font face="Arial" style="font-size: 8.5pt"><? echo $news['news_shortcontent']; ?></font>
										
											</td>
										<?
											}
										?>
									</tr>
									
									<tr>
										<td align="right"><a href="./?frame=newsview&id=<? echo $news['news_id']; ?>">
										Detail&nbsp;�</a> </td>
									</tr>
								</table>
								</td>
							</tr>
							<tr>
							<td align="left" valign="top" background="../images/dot.gif"></td>
						</tr>
							<tr>
							<td height="10"></td>
						</tr>
<?
	}
?>	
	</tr>
	</tr>
	</table>
</table>

<TABLE cellSpacing=0 cellPadding=0 width="98%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?
$total=CountRecord("news","status=0 and categories_id=".$cat);
$pages=count_page($total,$news_per_page);
echo '<tr><td colspan="2" align="center"></td></tr>';
echo '<tr></td>';
echo '<td class="smallfont" align="right">Page: ';
$param="";
if ($p>1) echo '<a title="First" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p=0">[&lt;]</a> ';
if ($p>0) echo '<a title="Previous" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p-1).'">[&lt;&lt;]</a> ';
$from=($p-10>0?$p-10:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($p<$i-1) echo '<a title="Next" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p+1).'">[&gt;&gt;]</a> ';
if ($p<$pages-1) echo '<a title="Last" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($pages-1).'">[&gt;]</a>'; 
echo '</td></tr></table>';
?><br>