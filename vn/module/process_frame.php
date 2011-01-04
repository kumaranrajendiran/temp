<?
switch ($_REQUEST['frame'])
{
	case "intro" :
		include("module/intro_code.php"); 
		break;
	case "service" :
		include("module/service_code.php"); 
		break;
	case "content" :
		include("module/content_code.php"); 
		break;
/****************************************
	case "sodo" :
		include("module/sodo_code.php"); 
		break;	
	case "listca_new" :
		include("module/listca_new.php"); 
		break;
	
	case "newscat" :
		include("../news/newscat.php"); 
		break;
	case "newsview_kt" :
		include("../news/newsview_kt.php"); 
		break;
	case "login_down" :
		include("module/login_down_code.php"); 
		break;
	case "login_kt" :
		include("module/login_kt_code.php"); 
		break;
	case "cart" :
		include("module/cart_code.php"); 
		break;
	case "checkout" :
		include("module/checkout_code.php"); 
		break;
	case "provider" :
		include("module/provider_code.php"); 
		break;
	case "listcategories" :
		include("module/listcategories.php"); 
		break;
*********************/	
	case "newsview" :
		include("../news/newsview.php"); 
		break;
	case "category" :
		include("module/category_code.php"); 
		break;
	case "login" :
		include("module/login_code.php"); 
		break;
	case "search" :
		include("module/search_code.php"); 
		break;	
	case "contact" :
		include("module/contact_code.php"); 
		break;
	case "register" :
		include("module/register_code.php"); 
		break;
	case "forgotpassword" :
		include("module/forgotpassword_code.php"); 
		break;
	case "changpass" :
		include("module/changepass_code.php"); 
		break;
	case "logout":
		unset($_SESSION['user']);
		echo "<script>window.location='./?frame=login'</script>";
		break;
	case "product" :
		include("module/product_code.php"); 
		break;
		
	case "quangcao" :
		include("module/quangcao_code.php"); 
		break;
		
	default :
		include("module/pro_good.php"); 
		break;

}
?>