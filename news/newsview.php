




<link rel="stylesheet" type="text/css" href="news/vietnextnews.css">

<?
	$news=GetNewsInfo($_REQUEST['id']);
	$cat=GetNewsCategoryInfo($news['categories_id']);
?>
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
														<td style="line-height: 200%">
                            <? if ($news['news_image']!='') { ?> 
										<table id="table14" cellSpacing="3" cellPadding="0" width="1" align="left" border="0">
										                           
										<tr>
											<td vAlign="top" align="left">
										<img src="../<? echo $news['news_image']; ?>" border="0" align="left" vspace="10" hspace="5" >
										</a>

											</td>
										</tr>
										<tr >
											<td vAlign="top" align="center">
											<span style="FONT-SIZE: 8pt; FONT-STYLE: italic; FONT-FAMILY: Arial">
											<? echo $news['last_modified']; ?></span></td>
										</tr>
									</table>
<? } ?>                               

                            </font> </span>
                            <? echo $news['news_content']; ?>
                            </td>
													</tr>
												</table>
											</div>
											</td>
										</tr>
<tr>
                    <td height="22" style="line-height: 200%">
                    <table border="0" style="border-collapse: collapse" width="100%" id="table131" cellpadding="0">
                      <tr>
                        <td>
                        </td>
                      </tr>
                      <tr>
                        <td colspan=2>
                        <table border="0" style="border-collapse: collapse" width="100%" id="table132" cellpadding="0">
                          <tr>
                            <td width="316" colspan=2>
                            <b>&nbsp;<font color="#FF3300">NH&#7918;NG TIN KHÁC</font></b></td>
                          </tr>
                        </table>
                        </td>
                      </tr>
					<?
$news=GetListNews("date_added<='".$news['date_added']."' and categories_id=".$news['categories_id'],"10");
foreach ($news as $n)
{
?>                    
                      <tr>
                        <td class="lnkNewsS" vAlign="top" width="10" align="center">
                        <img src="../images/icon1.png" width="12" height="9"></td>
                        <td>
                        <font face="Arial" style="font-size: 8.5pt">
                        <a href="./?frame=newsview&id=<? echo $n['news_id']; ?>">
                        <? echo $n['news_subject']; ?>
                        </a>
                        <font color="#c60000">
                        <span class="datesmall">&nbsp;(<? echo date('d/m',strtotime($n['date_added'])); ?>)</span></font></font>
                        </td>
                      </tr>
<?
}
?>
                    </table>
                    </td>
                  </tr>
										<tr>
											<td>
											&nbsp;</td>
										</tr>
									</table>
								</div>
								</td>
							</tr>
