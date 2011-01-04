
<table cellspacing="0" cellpadding="0" width="98%" align="center">
	<tr>
		<td valign="top" align="left" style="line-height: 150%">
<br>
<?
$cont=GetContentNameInfo("dichvu");

if ($cont['contents_image']!='') { 
?>											
					<img align="left" src="../<? echo $cont['contents_image']; ?>" border="0" hspace="8" vspace="2" > </img>
					
<? } ?>											
					<? echo $cont['contents_content']; ?>
		</td>
	</tr>
</table>

<br>