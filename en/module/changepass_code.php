<?
if (isset($_POST['butSub'])) {
	$old = $_POST['txtOld'];
	$new1 = $_POST['txtNew'];
	$new2 = $_POST['txtNew2'];
	if ($new1!=$new2 || $old=="" || $new1=="") echo "<p align=center class=err><font  color=red>M&#7853;t kh&#7849;u ch&#432;a &#273;úng</font></p>";
	else
	{	$sql = "update customers set customers_password='".$new1."' where customers_username='".$_SESSION['user']."' and customers_password='".$old."'";
		if (mysql_query($sql,$con)) echo "<p align=center class=err><font color=red>&#272;ã c&#7853;p nh&#7853;t thành công</font></p><br>";
		else echo "<p align=center class=err><font color=red>Không th&#7875; c&#7853;p nh&#7853;t</font></p>";
	}
} 
?>

<body style="text-align: center">

<form method="POST" action="index.php">
<input type="hidden" name="frame" value="changpass">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1" align="center">
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0" align="center">
      <tr>
        <td width="33%" class="smallfont">
        <p align="right">Old password</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="password" NAME="txtOld" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="33%" class="smallfont">
        <p align="right">New Password</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="password" NAME="txtNew" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="33%" class="smallfont">
        <p align="right">Retype New Password</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="password" NAME="txtNew2" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="96%" class="smallfont" colspan="2">
		<p align="center">
		<INPUT TYPE="submit" NAME="butSub" VALUE="Update" class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'">&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>
