<?
if(!session_id()) session_start();

if(!isset($_SESSION["session_message"])){
//	session_register("session_message");
	$_SESSION["session_message"] = "";
}	

if(isset($_GET['page']))
$page = $_GET['page'];
if ($_REQUEST['act']=='logout') session_unregister('log');
if (!session_is_registered('log'))
{
header("Location: login.php");
}

?>
<?  

require("../config.php");
require("../common_start.php");
require("../vn/module/module_func.php");
require_once("../news/news_func.php");

include("admin_func.php");
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<LINK href="style.css" rel="stylesheet" type="text/css">
<title>Control Panel</title>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table1">
	<tr>
		<td colspan="3">
<!-- Start Top -->							
	<? include("admin_panel_top.php"); ?>							
<!-- End Top -->		
		</td>
	</tr>
	<tr>
		<td width="16%" valign="top">
<!-- Start Left -->							
<? include("admin_panel_left.php"); ?>							
<!-- End left -->		
		</td>
		<td valign="top">
<!-- Start Content -->							
<table border="0" cellpadding="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
<tr>
<td width="10"></td>
<td>
<?
	switch ($_REQUEST['act'])
	{
		case "donvi":
			include("admin_donvi.php");
			break;
		case "donvi_m":
			include("admin_donvi_m.php");
			break;
		case "news":
			include("admin_news.php");
			break;
		case "news_m":
			include("admin_news_m.php");
			break;	
		case "album_category":
			include("admin_album_category.php");
			break;
		case "album_category_m":
			include("admin_album_category_m.php");
			break;
		case "album_image":
			include("admin_album_image.php");
			break;
		case "album_image_m":
			include("admin_album_image_m.php");
			break;
		case "content":
			include("admin_content.php");
			break;
		case "customer":
			include("admin_customer.php");
			break;
		case "customer_m":
			include("admin_customer_m.php");
			break;
		case "edoc":
			include("admin_edoc.php");
			break;			
		case "edoc_m":
			include("admin_edoc_m.php");
			break;
		case "link_website_category":
			include("admin_link_website_category.php");
			break;
		case "link_website_category_m":
			include("admin_link_website_category_m.php");
			break;	
		case "link_website":
			include("admin_link_website.php");
			break;
		case "link_website_m":
			include("admin_link_website_m.php");
			break;		

		case "pro_good":
			include("admin_pro_good.php");
			break;
		case "pro_new":
			include("admin_pro_new.php");
			break;
		case "pro_saleoff":
			include("admin_pro_saleoff.php");
			break;
		case "pro_good_m":
			include("admin_pro_good_m.php");
			break;
		case "pro_new_m":
			include("admin_pro_new_m.php");
			break;
		case "pro_saleoff_m":
			include("admin_pro_saleoff_m.php");
			break;			
		case "category":
			include("admin_category.php");
			break;
		case "category_m":
			include("admin_category_m.php");
			break;
		case "provider":
			include("admin_provider.php");
			break;
		case "provider_m":
			include("admin_provider_m.php");
			break;
		case "new":
			include("admin_pro_new.php");
			break;
		case "new_m":
			include("admin_pro_new_m.php");
			break;	
		case "product":
			include("admin_product.php");
			break;
		case "product_m":
			include("admin_product_m.php");
			break;
		case "order":
			include("admin_order.php");
			break;
		case "login":
			include("admin_login.php");
			break;
		case "changepass":
			include("admin_changepass.php");
			break;
		case "customer":
			include("admin_customer.php");
			break;
		case "order":
			include("admin_order.php");
			break;
		case "orderdetail":
			include("admin_orderdetail.php");
			break;
		case "special":
			include("admin_special.php");
			break;
		case "special_m":
			include("admin_special_m.php");
			break;
		
		case "adv":
			include("admin_quangcao.php");
			break;
		case "adv_m":
			include("admin_quangcao_m.php");
			break;
	}
?>
</td></tr></table>

<!-- End Content -->		
		</td>
		<td width="0%" valign="top">
<!-- Start Right -->							
<? include("admin_panel_right.php"); ?>							
<!-- End Right -->		
		</td>
	</tr>
	<tr>
		<td colspan="3">
<!-- Start Bottom -->							
<? include("admin_panel_bottom.php"); ?>							
<!-- End Bottom -->		
		</td>
	</tr>
</table>

</body>

</html>
<? require("../common_end.php") ?>