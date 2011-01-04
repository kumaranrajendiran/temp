<script type="text/javascript" src="../jscripts/FCKeditor/fckeditor.js"></script>
    <script type="text/javascript">
      window.onload = function()
      {
        var oFCKeditor = new FCKeditor( 'txtcontent1' ) ;
        oFCKeditor.BasePath = "../jscripts/FCKeditor/" ;
		oFCKeditor.Width = "720" ; 
		oFCKeditor.Height = "500" ; 
        oFCKeditor.ReplaceTextarea() ;
		
	/*	var oFCKeditor = new FCKeditor( 'txtDetail' ) ;
        oFCKeditor.BasePath = "../jscripts/FCKeditor/" ;
		oFCKeditor.Width = "720" ; 
		oFCKeditor.Height = "500" ; 
        oFCKeditor.ReplaceTextarea() ;*/
		
		/*var oFCKeditor = new FCKeditor( 'txtSubject' ) ;
        oFCKeditor.BasePath = "../jscripts/FCKeditor/" ;
		oFCKeditor.Width = "720" ; 
		oFCKeditor.Height = "200" ; 
        oFCKeditor.ReplaceTextarea() ;	*/
      }
</script>

<?
$path="../upload";
$pathdb="upload";

if (isset($_POST['butSaveLoai'])) {
	$id=$_POST['ddContent'];
	$content=$_POST['txtcontent1'];
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
	
	$fsizesmall = $_FILES["txtImage"]["size"];
	if ($fsizesmall > 100*1024 || $fsizelarge > 100*1024) $err .=  "Kích th&#432;&#7899;c hình ph&#7843;i nh&#7887; h&#417;n 100KB";
		
	$err="";
	if ($fsizesmall > 100*1024) $err .=  "Kích th&#432;&#7899;c hình ph&#7843;i nh&#7887; h&#417;n 100KB";

	if ($err=="") 
	{
		if (mysql_query("update contents set contents_content='".$content."' where contents_id='".$id."'",$con)) {
			if ($_POST['chkClear']=='')
			{
				$sqlUpdateField = "";
				if ($fileSmall!='')
					if($fileSmall && move_uploaded_file($fileSmall,"$path/content_s$id.$extsmall")) {
						$sqlUpdateField = " contents_image='$pathdb/content_s".$id.".$extsmall' ";
						@chmod("$path/content_s$id.$extsmall",0755);
					}
			}
			else 
				$sqlUpdateField = " contents_image='' ";
				
			if($sqlUpdateField)
			{
				$sqlUpdate = "update contents set $sqlUpdateField where contents_id='".$id."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
		if ($err=='') echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p>";
	  	//if ($err=='') echo '<script>window.location="index.php?act=content&id='.$_REQUEST['id'].'&code=1"</script>';
	 }
	if ($err!="") echo "<p align=center class='err'>".$err."</p>"; 
}
$id=1;
if ($_REQUEST['id']!='') $id=$_REQUEST['id'];
$cont=GetContentInfo($id);
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
<input type="hidden" name="act" value="content">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">S&#7917;a &#273;&#7893;i / C&#7853;p nh&#7853;t 
	: N&#7897;i dung</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="99%" class="smallfont" colspan="4" align="center">
<? if ($cont['contents_image']!='') { ?>
		<img border="0" src="../<? echo $cont['contents_image']; ?>">
<? } ?>
        </td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Ch&#7885;n n&#7897;i dung</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="4%" class="smallfont">
		<select size="1" name="ddContent">
<?
$list=GetListContent();
$id=$_REQUEST['id'];
foreach ($list as $c)
{
	if ($id=="") $id=$c[0];
	if ($c[0]!==$_REQUEST['id'])
		echo '<option value="'.$c[0].'">'.$c[1].'</option>';
	else
		echo '<option selected value="'.$c[0].'">'.$c[1].'</option>';
}
?>
		</select></td>
        <td width="79%" class="smallfont">
		<input type="button" value="Chuy&#7875;n" name="B1" class="button" onclick="javascript:window.location='./?act=content&id='+ddContent.value"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Hình &#7843;nh</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont" colspan="2">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"><input type="checkbox" name="chkClear" value="ON">Xóa 
		b&#7887; hình</td>
      </tr>

      <tr>
        <td width="15%" class="smallfont" align="right">
        N&#7897;i dung</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont" colspan="2">
		<textarea rows="6" name="txtcontent1" cols="70"><? echo GetContent($id); ?></textarea>

<script language="javascript1.2" defer>
		var config = new Object();    // create new config object

		config.width = "600";
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
		
		editor_generate('txtcontent', config);
     </script>
		
		</td>
      </tr>

      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
		</td>
        <td width="83%" class="smallfont" colspan="2"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>