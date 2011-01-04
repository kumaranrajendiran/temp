<script type="text/javascript" src="../jscripts/FCKeditor/fckeditor.js"></script>
    <script type="text/javascript">
      window.onload = function()
      {
        var oFCKeditor = new FCKeditor( 'txtShortDesc' ) ;
        oFCKeditor.BasePath = "../jscripts/FCKeditor/" ;
		oFCKeditor.Width = "720" ; 
		oFCKeditor.Height = "200" ; 
        oFCKeditor.ReplaceTextarea() ;
		
		var oFCKeditor = new FCKeditor( 'txtDesc1' ) ;
        oFCKeditor.BasePath = "../jscripts/FCKeditor/" ;
		oFCKeditor.Width = "720" ; 
		oFCKeditor.Height = "300" ; 
        oFCKeditor.ReplaceTextarea() ;
		
		/*var oFCKeditor = new FCKeditor( 'txtSubject' ) ;
        oFCKeditor.BasePath = "../jscripts/FCKeditor/" ;
		oFCKeditor.Width = "720" ; 
		oFCKeditor.Height = "200" ; 
        oFCKeditor.ReplaceTextarea() ;	*/
      }
</script>

<?
$path = "../products";
$pathdb = "../products";
if (isset($_POST['butSaveLoai'])) {
	$code=$_POST['txtCode'];
	$name=$_POST['txtName'];
	$price=$_POST['txtPrice'];
	$baohanh=$_POST['txtBaohanh'];
	$shortdesc=$_POST['txtShortDesc'];
	$desc=$_POST['txtDesc1'];
	$ungdung=$_POST['txtUngdung'];
	$categories_id=$_POST['ddCat'];
	$provider_id=$_POST['ddProvider'];
	$donvi=$_POST['ddDonvi'];
	$page = $_POST['page'];
	$sort = $_POST['txtSortOrder'];

	$catinfo=GetCategoryInfo($categories_id);
	$language=$catinfo['language'];

	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên s&#7843;n ph&#7849;m <br>";
	//$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp",500*1024,$_POST['id']==''?1:0);
	$err.=CheckUpload($_FILES["txtImageLarge"],".jpg;.gif;.bmp",500*1024,0);

	if ($err=='')
	{
	if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update products set products_code='".$code."',products_name='".$name."',products_price='".$price."',products_shortdescription='".$shortdesc."',products_description='".$desc."', categories_id='".$categories_id."', providers_id='".$provider_id."', language='".$language."', donvi_id='".$donvi."',products_ordered='".$sort."' ,products_baohanh='".$baohanh."',products_ungdung='".$ungdung."' where products_id='".$oldid."'";
		}else {
			$sql = "insert into products (products_code,products_name,products_price,products_shortdescription,products_description,categories_id,providers_id, products_date_added,language,donvi_id,products_ordered,products_baohanh,products_ungdung) values ('".$code."','".$name."','".$price."','".$shortdesc."','".$desc."','".$categories_id."','".$provider_id."',SYSDATE(),'".$language."','".$donvi."','".$sort."','".$baohanh."','".$ungdung."')";
		}
		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
		
			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/product_s$oldid$extsmall"))
			{
				@chmod("$path/product_s$oldid$extsmall", 0777);
				$sqlUpdateField = " products_image='$pathdb/product_s$oldid$extsmall' ";
			}

			$extlarge=GetFileExtention($_FILES['txtImageLarge']['name']);
			if (MakeUpload($_FILES['txtImageLarge'],"$path/product_l$oldid$extlarge"))
			{
				@chmod("$path/product_l$oldid$extlarge", 0777);
				if($sqlUpdateField != "") $sqlUpdateField .= ",";
				$sqlUpdateField .= " products_image_large='$pathdb/product_l$oldid$extlarge' ";
			}
			if($sqlUpdateField!='')
			{
				$sqlUpdate = "update products set $sqlUpdateField where products_id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	

		else {
			$err =  "Không th&#7875; c&#7853;p nh&#7853;t";
		}
  	}

  	if ($err=='') echo '<script>window.location="index.php?act=product&cat='.$_REQUEST['cat'].'&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo "<p align=center class='err'>".$err."</p>";
} else {
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from products where products_id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$code=$row['products_code'];
			$name=$row['products_name'];
			$image=$row['products_image'];
			$categories_id = $row['categories_id'];
			$imagelarge=$row['products_image_large'];
			$price=$row['products_price'];
			$baohanh=$row['products_baohanh'];
			$shortdesc=$row['products_shortdescription'];
			$desc=$row['products_description'];
			$ungdung=$row['products_ungdung'];
			$provider_id=$row['providers_id'];
			$donvi=$row['donvi_id'];
			$language=$row['language'];
			$sort = $row['products_ordered']; 
		}
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
<input type="hidden" name="act" value="product_m">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center">S&#7917;a / C&#7853;p nh&#7853;t : D&#7883;ch v&#7909;</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
<?    
if ($image!='')
{
	echo '<tr><td colspan="3" align="center"><img border="0" src="'.$image.'"></td></tr>';
}
?>		
      <tr><td>&nbsp;</td></tr>
      <tr style="display: none;">
        <td width="15%" class="smallfont">
        <p align="right">Mã</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $code; ?>" TYPE="text" NAME="txtCode" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên d&#7883;ch v&#7909;</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình &#7843;nh (kích th&#432;&#7899;c nh&#7887;)</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình &#7843;nh (kích th&#432;&#7899;c l&#7899;n)</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImageLarge" CLASS=textbox size="34"></td>
      </tr>
      <tr style="display: none;">
        <td width="15%" class="smallfont" align="right">
        Giá</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000"></font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $price; ?>" TYPE="text" NAME="txtPrice" CLASS=textbox size="34"></td>
      </tr>
     <tr style="display: none;">
        <td width="15%" class="smallfont" align="right">
        B&#7843;o hành</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000"></font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $baohanh; ?>" TYPE="text" NAME="txtBaohanh" CLASS=textbox size="34"></td>
      </tr>
     <tr>
        <td width="15%" class="smallfont" align="right">
        Mô t&#7843; ng&#7855;n</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<textarea  rows="4" name="txtShortDesc" cols="70"><? echo $shortdesc; ?></textarea></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Thông tin chi ti&#7871;t</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<textarea rows="6" name="txtDesc1" cols="70"><? echo $desc; ?></textarea>

<script language="javascript1.2" defer>
		var config = new Object();    // create new config object

		config.width = "100%";
		config.height = "150px";
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
		
		editor_generate('txtDesc', config);
     </script>
		
		</td>
      </tr>
            <tr style="display: none;">
        <td width="15%" class="smallfont" align="right">
        &#7912;ng d&#7909;ng</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<textarea rows="6" name="txtUngdung" cols="70"><? echo $ungdung; ?></textarea>

		<script language="javascript1.2" defer>
		editor_generate('txtUngdung', config);
     </script>
		
		</td>
      </tr>

      <tr>
        <td width="15%" class="smallfont" align="right">
        Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddCat">
<?
		$cats=GetListCategory();
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
      <!--
      <tr>
        <td width="15%" class="smallfont" align="right">
        Thu&#7897;c nhà cung c&#7845;p</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddProvider">
<?
		echo "<option value=''>[Không ch&#7885;n]</option>";
		$providers=GetListProvider();
		foreach ($providers as $provider)
		{
			if ($provider[0]==$providers_id)
				echo "<option value=".$provider[0]." selected>".$provider[1]."</option>";
			else
				echo "<option value=".$provider[0].">".$provider[1]."</option>";
		}
?>		
		</select></td>
      </tr>
      -->
     <tr>
        <td width="15%" class="smallfont" align="right">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont" align="right">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $sort; ?>" TYPE="text" NAME="txtSortOrder" CLASS=textbox size="34"></td>
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