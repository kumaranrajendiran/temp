<form id="frm" action="index.php?<? echo $_ENV['QUERY_STRING']; ?>" method="POST" style="word-spacing: 0; margin: 0">
<table border="0" style="border-collapse: collapse" width="100%" id="table1" cellpadding="10">
                <tr>
                  <td width="50%" height="20" bgcolor="#0069A8" class="midtitle" align="left">
                  <a href="./">
					<font color="#FFFFFF"><span style="font-weight: 700">Control 
					Panel - VietNext Co. </span></font></a></td>
                  <td width="42%" height="20" bgcolor="#0069A8" class="midtitle" align="right" style="display: none;">

                  <font face="Tahoma" style="font-size: 8.5pt; font-weight: 700">L&#7921;a ch&#7885;n ngôn ng&#7919; :</font>&nbsp;
                  </td>
                  <td width="4%" height="20" bgcolor="#0069A8" class="midtitle" align="right" style="display: none;">
					<select size="1" name="ddlLanguage" onchange="javascript:frm.submit()">
<?
if (isset($_POST['ddlLanguage']))
{
	$_SESSION['lang']=$_POST['ddlLanguage'];
}

$langs=GetListLanguage();
foreach ($langs as $lang)
{
	if ($lang[0]==$_SESSION['lang'])
		echo '<option value="'.$lang[0].'" selected>'.$lang[1].'</option>';
	else
		echo '<option value="'.$lang[0].'">'.$lang[1].'</option>';
}
?>
					</select></td>
                </tr>
                <tr>
                	<td bgcolor="#ffffff" width="100%" height="1" colspan="3">
                	</td>
                </tr>
                </table>
</form>