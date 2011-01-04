<? include ("../news/news_func.php"); ?>
<?
if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['txtName'];
	$status=($_POST['chkShow']!=''?1:0);
	$parent=$_POST['txtParent'];
	$sortorder=$_POST['txtSortorder'];
	$content=$_POST['txtContent'];
			
	$name = trim($_POST['txtName']);
	if ($name=="")
	{
		echo "<p align=center class='err'>B&#7841;n ch&#432;a nh&#7853;p tên danh m&#7909;c</p>";
	}
	else
	{
		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
			$sql = "update newscategories set categories_name='".$name."', status='".$status."', parent_id='".$parent."', categories_description='".$content."' where categories_id='".$oldid."'";
		}
		else 
			$sql = "insert into newscategories (categories_name,parent_id,status,categories_description,date_added) values ('".$name."',".$parent.",".$status.",'".$content."',SYSDATE())";
		if (mysql_query($sql,$con)) {
			echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p><br>";
			echo "<script>window.location='index.php?act=news_category&page=".$_REQUEST['page']."&code=1'</script>";
		}
		else echo "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		
	}
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from newscategories where categories_id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['categories_name'];
			$status=$row['status'];
			$parent=$row['parent_id'];
			$sortorder=$row['sort_order'];
			$content=$row['categories_description'];
		}
	}
?>
<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "htmlarea/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>

<form method="POST" action="index.php?">
<input type=hidden name="act" value="news_category_m">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" height="20" class="title" align="center">Thêm m&#7899;i / C&#7853;p nh&#7853;t 
	: Danh m&#7909;c</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
    
	 <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
        <select size="1" name="txtParent">
<?
		echo "<option value='0'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListNewsCategoryAll();
		foreach ($cats as $cat)
		{
			if ($cat[0]==$parent)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
		
</td>
      </tr>
       <tr>
        <td width="15%" class="smallfont" align="right">
		Không cho hi&#7875;n th&#7883;</td>
        <td width="1%" class="smallfont">
		&nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
	 <tr>
        <td width="15%" class="smallfont" align="right" valign="top">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $sortorder; ?>" TYPE="text" NAME="txtSortorder" CLASS=textbox size="4"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
		<p align="right"><INPUT TYPE="submit" NAME="butSaveLoai" VALUE=" L&#432;u " CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button></td>
      </tr>
      
    </table>
    </td>
  </tr>
  </table>
</form>