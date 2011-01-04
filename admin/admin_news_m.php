<?
$pathdb="news/upload";
$path = "../news/upload";
if (isset($_POST['butSaveLoai'])) {
	$subject=$_POST['txtName'];
	$shortdesc=$_POST['txtShortDesc'];
	$desc=$_POST['txtDesc'];
	$date=$_POST['txtdate'];
	$tt=$_POST['txtTT'];
	$nguon=$_POST['txtnguon'];
	$status=($_POST['chkShow']!=''?1:0);
	$categories_id=$_POST['ddCat'];
	$source=$_POST['txtSource'];
	$page = $_POST['page'];

	$imageSmall=$_FILES['txtImage'];
			
	$uploadfile = "";
	$fileSmall = "";
	$extsmall="";

	if(($imageSmall["type"] == "image/gif" ) || ($imageSmall["type"] == "image/pjpeg"))	
	{
		$fileSmall = $imageSmall["tmp_name"];
		if ($imageSmall["type"] == "image/gif") $extsmall="gif";
		else $extsmall="jpg";
	}

	$err="";
	if($subject=="")
		$err =  "Xin nh&#7853;p tiêu &#273;&#7873;";
	if ($err=='')
	{
		// validate data
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update news set news_subject='".$subject."',news_shortcontent='".$shortdesc."',news_content='".$desc."',news_ordered='".$tt."',date_added='".$date."',status='".$status."', categories_id='".$categories_id."', news_source='".$source."', last_modified='".$nguon."' where news_id='".$oldid."'";
		}else {
			$sql = "insert into news (news_subject,news_image,news_shortcontent,news_content,status,news_ordered,categories_id,date_added,news_source,last_modified) values ('".$subject."','','".$shortdesc."','".$desc."','".$status."','".$tt."','".$categories_id."',SYSDATE(),'".$source."','".$nguon."')";
		}
		//upload image
		
		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) {
					$oldid = mysql_insert_id();
			}		
			$sqlUpdateField = "";
			
			if ($_POST['chkClear']=='')
			{
				$sqlUpdateField = "";
				if ($fileSmall!='')
					if($fileSmall && move_uploaded_file($fileSmall,"$path/news_s$oldid.$extsmall")) {
						$sqlUpdateField = " news_image='$pathdb/news_s".$oldid.".$extsmall' ";
						@chmod("$path/news_s$id.$extsmall",0777);
					}
			}
			else 
				$sqlUpdateField = " news_image='' ";
				
			if($sqlUpdateField)
			{
				$sqlUpdate = "update news set $sqlUpdateField where news_id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
			
			//echo $sqlUpdateField." ".$oldid;exit(0);
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}
  	if ($err=='') echo '<script>window.location="index.php?act=news&cat='.$_REQUEST['cat'].'&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo "<p align=center class='err'>".$err."</p>";
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from news where news_id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$subject=$row['news_subject'];
			$image=$row['news_image'];
			$categories_id = $row['categories_id'];
			$shortdesc=$row['news_shortcontent'];
			$desc=$row['news_content'];
			$tt=$row['news_ordered'];
			$nguon=$row['last_modified'];

			$status=$row['status'];
			$source=$row['news_source'];
			$date=date('Y/m/d',strtotime($row['date_added']));
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

<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="act" value="news_m">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">S&#7917;a &#273;&#7893;i / C&#7853;p nh&#7853;t 
	: Tours &#273;&#7863;c bi&#7879;t</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
<?  
if ($image!='')
{
	echo '<tr><td colspan=3 align="center"><img border="0" src="../'.$image.'"></td></tr>';
}
?>		
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tiêu &#273;&#7873;</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $subject; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="99"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình &#7843;nh</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"><input type="checkbox" name="chkClear" value="ON">Xóa 
		b&#7887; hình</td>
      </tr>

      <tr>
        <td width="15%" class="smallfont" align="right">
        N&#7897;i dung ng&#7855;n</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<textarea style="width:100%" rows="4" name="txtShortDesc" cols="4"><? echo $shortdesc; ?></textarea>
<script language="javascript1.2" defer>
		var config = new Object();    // create new config object

		config.width = "100%";
		config.height = "200px";
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
 			['justifyleft','justifycenter','justifyright','justifyfull','separator'],
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
		
		//editor_generate('txtShortDesc', config);
     </script>
	
		</td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        N&#7897;i dung chi ti&#7871;t</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<textarea rows="6" name="txtDesc" cols="28"><? echo $desc; ?></textarea>

<script language="javascript1.2" defer>
		editor_generate('txtDesc', config);
     </script>
		
		</td>
      </tr>
      <!--
      <tr>
        <td width="15%" class="smallfont" align="right">
        Ngu&#7891;n tin</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $source; ?>" TYPE="text" NAME="txtSource" CLASS=textbox size="53"></td>
      </tr>
      
      <tr>
        <td width="15%" class="smallfont" align="right">
        S&#7889; th&#7913; t&#7921;</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $tt; ?>" TYPE="text" NAME="txtTT" CLASS=textbox size="17"></td>
      </tr>-->
      <tr>
        <td width="15%" class="smallfont" align="right">
        Không hi&#7879;n</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Ngày &#273;&#259;ng</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $date; ?>" TYPE="text" NAME="txtdate" CLASS=textbox size="17"> 
		(yyyy/mm/dd)</td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddCat">
<?
		$cats=GetListNewsCategoryAll();
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
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont" align="center">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>