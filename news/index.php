<table border="0" style="border-collapse: collapse" width="100%" id="table30" cellpadding="2" cellspacing="5">
<?
$news=GetListNews("status=0",10);
foreach ($news as $new)
{
?>
                                  <tr>
                                    <td height="22" align="center">
                                    <img border="0" src="images/icon_rec.gif" width="5" height="5"></td>
                                    <td width="399" height="22">
                           			<a href="./?frame=newsview&id=<? echo $new['news_id']; ?>">
                                    <b>
                                    <font face="Tahoma" color="#000088"><? echo $new['news_subject']; ?></font></b></a><font face="Tahoma">
                                    </font>
                                    <font face="Tahoma" color="#808000" style="font-size: 8.5pt">
                                    &nbsp;</font><font face="Tahoma" style="font-size: 8.5pt" color="#D20000">[<? echo date('d/m/Y',strtotime($new['date_added'])); ?>]</font></td>
                                  </tr>
<? if (trim($new['news_shortcontent'])!='') { ?>
                                  <tr>
                                    <td height="22" align="center">&nbsp;</td>
                                    <td width="399" height="22">
                                    <p align="justify">
                                    <font face="Tahoma"><? echo $new['news_shortcontent']; ?></font></td>
                                  </tr>
<? } ?>                                  
<?
}
?>                                  
                                </table>