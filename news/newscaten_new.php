<?
	$cat1=killInjection($_REQUEST['cat1']);
	if ($cat1=='') $cat1=4;
	$news_per_page=5;
	$p=0;
	if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);
?>
			<?					
			$sql = "select * from news where status=0 and categories_id=".$cat1." order by date_added desc limit ".$news_per_page*$p.",".$news_per_page;
			$result = @mysql_query($sql,$con);
			while(($news=mysql_fetch_assoc($result))){?>
<tr>
	<td style="border-style: solid; border-width: 1px" bordercolor="#6BBE88">
	<div align="center">
		<table border="0" width="95%" id="table31" cellspacing="0" cellpadding="0">
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<div align="center">
					<table border="0" width="95%" id="table32" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<? if ($news['news_image']!='') { ?>
								<a href="./?frame=newsview&id=<? echo $news['news_id']; ?>">
								<img src="../<? echo $news['news_image']; ?>" border=0 width="127" height="95" align="right" hspace="5" vspace="5" title="<? echo $news['news_tile']; ?>"></a>
								<?}?>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<? echo $news['news_shortcontent']; ?>
														</td>
													</tr>
												</table>
											</div>
											</td>
										</tr>
										<tr>
											<td>
											<p align="right">
											<a href="./?frame=newsview&id=<? echo $news['news_id']; ?>">More&nbsp;»</a></td>
										</tr>
										<tr>
											<td>
											&nbsp;</td>
										</tr>
									</table>
								</div>
								</td>
</tr>
		<?}?>	
