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

<?
$path = "../links";
$pathdb = "../links";
if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['txtName'];
	$address=$_POST['txtAddress'];
	$desc=$_POST['txtShortDesc'];
	$status=($_POST['chkShow']!=''?1:0);
	$sortorder=(int)$_POST['txtSortorder'];
	$categories_id=$_POST['ddCat'];

	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên website<br>";
	$ret.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp;.swf",500*1024,0)."<br>";
	
	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update link_websites set link_websites_name='".$name."',link_websites_address='".$address."',link_websites_description='".$desc."',link_websites_status='".$status."',link_websites_categoriesid='".$categories_id."', link_websites_sortorder='".$sortorder."',link_websites_modified=now() where link_websites_id='".$oldid."'";
		}else {
			$sql = "insert into link_websites (link_websites_name,link_websites_address,link_websites_description,link_websites_status,link_websites_dateadded,link_websites_categoriesid,link_websites_sortorder,link_websites_modified) values ('".$name."','".$address."','".$desc."','".$status."',now(),'".$categories_id."','".$sortorder."',now())";
		}
		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();

			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/link_web$oldid$extsmall"))
			{
				@chmod("$path/link_$oldid$extsmall", 0777);
				$sqlUpdateField = " link_websites_img='$pathdb/link_web$oldid$extsmall' ";
			}
			if($sqlUpdateField)
			{
				$sqlUpdate = "update link_websites set $sqlUpdateField where link_websites_id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}
  	if ($err=='') echo '<script>window.location="index.php?act=link_website&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo '<p align=center class="err" style="line-height: 150%">'.$err.'</p>';
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from link_websites where link_websites_id='".$oldid."' limit 1";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['link_websites_name'];
			$address=$row['link_websites_address'];
			$desc=$row['link_websites_description'];
			$image=$row['link_websites_img'];
			//$imagelarge=$row['link_websites_imglarge'];
			$status=$row['link_websites_status'];
			$sortorder=$row['link_websites_sortorder'];
			$categories_id = $row['link_websites_categoriesid'];
		}
	}
?>

<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="act" value="link_website_m">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<? 
if ($image!='')
{
?>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td align="center">
	<img border="0" src="<? echo $image; ?>">
	</td>
</tr>
</table>
<?
}
?>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t 
	: Liên k&#7871; website</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên website</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">&#272;&#7883;a ch&#7881; website</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $address; ?>" TYPE="text" NAME="txtAddress" CLASS=textbox size="34"></td>
      </tr>
<!--
      <tr>
        <td width="15%" class="smallfont" align="right">
        N&#7897;i dung gi&#7899;i thi&#7879;u</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
<textarea style="width:462; height:99" name="txtShortDesc" cols="4" cols="28"><? echo $desc; ?></textarea>
<script language="javascript1.2">
		var config = new Object();    // create new config object

		config.width = "100%";
		config.height = "300px";
		config.bodyStyle = 'background-color: white; font-family: "Verdana"; font-size: x-small;';
		config.debug = 0;

		// NOTE:  You can remove any of these blocks and use the default config!

		config.toolbar = [
    			['fontname'],
		     ['fontsize'],
    			['fontstyle'],
    			['linebreak'],
		     ['bold','italic','underline','separator'],
			['strikethrough','subscript','superscript','separator'],
 			['justifyleft','justifycenter','justifyright','separator'],
		     ['OrderedList','UnOrderedList','Outdent','Indent','separator'],
		     ['forecolor','backcolor','separator'],
		     ['HorizontalRule','Createlink','InsertImage','htmlmode','separator'],
		     ['popupeditor'],
		];

		config.fontnames = {
		    "Arial":           "arial, helvetica, sans-serif",
    		    "Courier New":     "courier new, courier, mono",
		    "Georgia":         "Georgia, Times New Roman, Times, Serif",
		    "Tahoma":          "Tahoma, Arial, Helvetica, sans-serif",
		    "Times New Roman": "times new roman, times, serif",
		    "Verdana":         "Verdana, Arial, Helvetica, sans-serif",
		    "impact":          "impact",
		    "WingDings":       "WingDings"
		};
		
		config.fontsizes = {
		    "1 (8 pt)":  "1",
		    "2 (10 pt)": "2",
		    "3 (12 pt)": "3",
		    "4 (14 pt)": "4",
		    "5 (18 pt)": "5",
		    "6 (24 pt)": "6",
		    "7 (36 pt)": "7"
		};

		//config.stylesheet = "http://www.domain.com/sample.css";
  
		config.fontstyles = [   // make sure classNames are defined in the page the content is being display as well in or they won't work!
		  	{ name: "headline",     className: "headline",  classStyle: "font-family: arial black, arial; font-size: 28px; letter-spacing: -2px;" },
  			{ name: "arial red",    className: "headline2", classStyle: "font-family: arial black, arial; font-size: 12px; letter-spacing: -2px; color:red" },
  			{ name: "verdana blue", className: "headline4", classStyle: "font-family: verdana; font-size: 18px; letter-spacing: -2px; color:blue" }

			// leave classStyle blank if it's defined in config.stylesheet (above), like this:
			// { name: "verdana blue", className: "headline4", classStyle: "" }  
		];
		
		editor_generate('txtShortDesc', config);
     </script>
		</td>
      </tr>
      -->
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình (logo)</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">&nbsp;
        </td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<font color="#FF0000">(N&#7871;u danh m&#7909;c qu&#7843;ng cáo thì ph&#7843;i nh&#7853;p hình)</font></td>
      </tr>

      <tr>
        <td width="15%" class="smallfont" align="right">
        Không cho hi&#7879;n</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont" align="right">
        Thu&#7897;c m&#7909;c</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddCat">
<?
		//echo "<option value='0'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListlinkweb();
		foreach ($cats as $cat)
		{
			if ($cat[0]==$categories_id)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $sortorder; ?>" TYPE="text" NAME="txtSortorder" CLASS=textbox size="8"> 
		</td>
      </tr>

      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
		</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>