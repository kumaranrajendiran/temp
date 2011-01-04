<?
if (isset($_POST['butSaveLoai'])) {
	$image = $_POST['txtImage'];
	$parent = $_POST['txtParent'];
	$sort = $_POST['txtSortOrder'];
	$status=($_POST['chkShow']!=''?1:0);
	$notsub=($_POST['chknotsub']!=''?1:0);
				
	$ten = trim($_POST['txtName']);
	if ($ten=="")
	{
		echo "<p align=center class='err'>B&#7841;n ch&#432;a nh&#7853;p tên danh m&#7909;c</p>";
	}
	else
	{
		$catinfo=GetCategoryInfo($parent);
		$language=$catinfo['language'];
		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
			$sql = "update categories set categories_name='".$ten."', categories_image='".$image."', parent_id='".$parent."', sort_order='".$sort."', categories_status=".$status.", categories_notsub=".$notsub.", language='".$language."' where categories_id='".$oldid."'";
		}
		else 
			$sql = "insert into categories (categories_name,categories_image,parent_id,sort_order, categories_status, categories_notsub,language) values ('".$ten."','".$image."','".$parent."','".$sort."',".$status.",".$notsub.",'".$language."')";
		if (mysql_query($sql,$con)) {
			echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p><br>";
			echo "<script>window.location='index.php?act=category&cat=".$_REQUEST['cat']."&page=".$_REQUEST['page']."'</script>";
		}
		else echo "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
	}
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from categories where categories_id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$CategoryName=$row['categories_name'];
			$image=$row['categories_image'];
			$parent=$row['parent_id'];
			$order=$row['sort_order'];
			$status=$row['categories_status'];
			$notsub=($row['categories_notsub']);
			$date=$row['date_add'];
			$language=$row['language'];
		}
	}
?>

<form method="POST" name="FormLoaiSP" action="index.php">
<input type=hidden name="act" value="category_m">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">
<input type=hidden name="cat" value="<? echo $_REQUEST['cat']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t : Danh m&#7909;c 
	d&#7883;ch v&#7909;</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
<? if (GetConfig('multilanguage')==1)
{
?>
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Ch&#7885;n ngôn ng&#7919;</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddlLanguage">
<?
if ($language=='')
	echo '<option value="" selected>[Dùng cho t&#7845;t c&#7843; ngôn ng&#7919;]</option>';
else
	echo '<option value="">[Dùng cho t&#7845;t c&#7843; ngôn ng&#7919;]</option>';
$langs=GetListLanguage();
foreach ($langs as $lang)
{
	if ($lang[0]==$language)
		echo '<option value="'.$lang[0].'" selected>'.$lang[1].'</option>';
	else
		echo '<option value="'.$lang[0].'">'.$lang[1].'</option>';
}
?>
					</select>
		</td>
      </tr>
<?
}
?>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $CategoryName; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
        <select size="1" name="txtParent">
<?
		//echo "<option value='0'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListCategory();
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
        Không hi&#7875;n th&#7883;</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Không có danh m&#7909;c con</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chknotsub" value="ON" <? if ($notsub>0) echo 'checked' ?>></td>
      </tr> 
      <tr>
        <td width="15%" class="smallfont" align="right">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $order; ?>" TYPE="text" NAME="txtSortOrder" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>
