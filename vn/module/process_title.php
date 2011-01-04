
<head>
<meta http-equiv="Content-Language" content="en-us">
</head>

<? 
switch ($_REQUEST['frame'])
{
	case "content":
		switch ($_REQUEST['name'])
		{
			case "tintuc":
				$title="TIN T&#7912;C & S&#7920; KI&#7878;N";
				break;
			case "dichvu":
				$title="D&#7882;CH V&#7908;";
				break;
			case "phuongthuc":
				$title="PH&#431;&#416;NG TH&#7912;C MUA BÁN";
				break;

		}
		break;
	case "newscat":
		$title="TIN T&#7912;C & S&#7920; KI&#7878;N";
		break;
	case "sodo":
		$title="S&#416; &#272;&#7890; WEBSITE";
		break;
	case "newsview":
		$title="CHI TI&#7870;T TOUR &#272;&#7862;C BI&#7878;T";
		break;
	case "newscat_kt":
		$title="B&#7842;N TIN K&#7928; THU&#7852;T";
		break;
	case "newsview_kt":
		$title="CHI TI&#7870;T B&#7842;N TIN K&#7928; THU&#7852;T";
		break;

	case "edoc" :
		$title="DOWNLOAD DRIVERS";
		break;
	case "album_view" :
		$title="XEM FILES CHI TI&#7870;T";
		break;
	case "intro" :
		$title="GI&#7898;I THI&#7878;U CÔNG TY ";
		break;
	case "pro_new" :
		$title="S&#7842;N PH&#7848;M M&#7898;I <img border=0 src='images/new.gif' width=28 height=11>";
		break;
	case "pro_good" :
		$title="S&#7842;N PH&#7848;M &#272;&#7862;C TR&#431;NG";
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
		$title="CHI TI&#7870;T D&#7882;CH V&#7908;";
		break;
	case "login" :
	case "login_down" :
	case "login_kt" :
		$title="&#272;&#258;NG NH&#7852;P"; 
		break;
	case "tintuc" :
		$title="TIN T&#7912;C & S&#7920; KI&#7878;N"; 
		break;
	case "cart" :
		$title="CH&#7884;N MUA";
		break;
	case "checkout" :
		$title="THANH TOÁN"; 
		break;
	case "search" :
		$title="TÌM KI&#7870;M"; 
		break;	
	case "contact" :
		$title="LIÊN H&#7878;";
		break;
	case "register" :
		$title="&#272;&#258;NG KÝ THÀNH VIÊN";
		break;
	case "changepass" :
		$title="THAY &#272;&#7892;I M&#7852;T KH&#7848;U";
		break;
	case "forgotpassword" :
		$title="QUÊN M&#7852;T KH&#7848;U";
		break;
	default :
		$title="TOUR &#272;&#7862;C BI&#7878;T"; 
		break;
}
echo $title;
?>


 