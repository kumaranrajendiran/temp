<link rel="stylesheet" type="text/css" href="news/vietnextnews.css">
<?
	$news=GetNewsInfo($_REQUEST['id']);
	$cat=GetNewsCategoryInfo($news['categories_id']);
?>
<table border="0" style="border-collapse: collapse" width="100%" id="table1" cellpadding="0" align="center">
    <tr>
      <td style="line-height: 150%" height="22">
                           <font color="#1A76B7" face="Arial" style="font-size: 10pt"><b> 
                            <? echo $news['news_subject']; ?></b></font></td>
      </tr>
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
                           <tr>
										<td >
										<p align="center">
										<hr align="center" color="#1A76B7" size="1"></td>
									</tr>
                          </table>

<table border="0" style="border-collapse: collapse" width="100%" id="table130" cellpadding="0" align="center">
                  <tr>
                    <td height="22" style="line-height: 200%">
                    <table border="0" style="border-collapse: collapse" width="100%" id="table131" cellpadding="0">
                      <tr>
                        <td>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <table border="0" style="border-collapse: collapse" width="100%" id="table132" cellpadding="0">
                          <tr>
                            <td width="316">
                            <b>&nbsp;<font color="#FF3300">READ ON</font></b></td>
                            <td background="../images/title_bgbar.gif">&nbsp;</td>
                            <td width="14">
                            <p align="right">
                            </td>
                          </tr>
                        </table>
                        </td>
                      </tr>
                       <tr>
						<td >
						<p align="center">
						<hr align="center" color="#1A76B7" size="1"></td>
					</tr>
                    </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="22" style="line-height: 200%">
                    <table cellSpacing="4" cellPadding="2" width="100%" border="0" id="table133">
<?
$news=GetListNews("date_added<='".$news['date_added']."' and categories_id=".$news['categories_id'],"10");
foreach ($news as $n)
{
?>                    
                      <tr>
                        <td class="lnkNewsS" vAlign="top" width="10" align="center">
                        <img src="../images/arrow_den.gif"></td>
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
                  </table>