
<head>
<meta http-equiv="Content-Language" content="en-us">
</head>

<? 
switch ($_REQUEST['frame'])
{
	case "content":
		switch ($_REQUEST['name'])
		{
			case "tintucen":
				$title="NEWS & EVENTS";
				break;
			case "dichvuen":
				$title="SERVICE";
				break;
		}
		break;
	case "newscat":
		$title="NEWS & EVENTS";
		break;
	case "newsview":
		$title="SPECIAL TOURS";
		break;
	case "intro" :
		$title="A BOUT US";
		break;
	case "pro_new" :
		$title="NEW TOURS <img border=0 src='images/new.gif' width=28 height=11>";
		break;
	case "pro_good" :
		$title="GOOD TOURS";
		break;
	case "category" :
		$cat=0;
		if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
		$catinfo=GetCategoryInfo($cat);	
		$title=$catinfo['categories_name'];
		break;
	case "provider":
		$manufacturers_id=0;
		if ($_REQUEST['manufacturers_id']!='') $manufacturers_id=killInjection($_REQUEST['manufacturers_id']);
		$provider=GetProviderInfo($manufacturers_id);	
		$title="S&#7842;N PH&#7848;M C&#7910;A : ".$provider['providers_name'];
		break;
	case "product" :
		$title="DETAIL";
		break;
	case "login" :
		$title="LOGIN"; 
		break;
	case "tintuc" :
		$title="NEWS & EVENTS"; 
		break;
	case "search" :
		$title="SEARCH"; 
		break;	
	case "contact" :
		$title="CONTACT";
		break;
	case "register" :
		$title="REGISTER";
		break;
	case "changepass" :
		$title="CHANGE PASSWORD";
		break;
	case "forgotpassword" :
		$title="FORGOT PASSWORD";
		break;
	default :
		$title="SPECIAL TOURS"; 
		break;
}
echo $title;
?>
