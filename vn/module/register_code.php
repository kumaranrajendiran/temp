<tr><td>
<?
function checkdata($checkall=0)
{
	$err="";
	if (trim($_POST['txtHoten'])=='') $err=$err.'B&#7841;n ch&#432;a nh&#7853;p h&#7885; tên<br>';
	if ($checkall==0 && $err) return $err;
	
	if (trim($_POST['txtDiachi'])=='') $err=$err.'B&#7841;n ch&#432;a nh&#7853;p &#273;&#7883;a ch&#7881;<br>';
	if ($checkall==0 && $err) return $err;
	
	if (trim($_POST['txtTinh'])=='') $err=$err.'B&#7841;n ch&#432;a nh&#7853;p t&#7881;nh / hành ph&#7889;<br>';
	if ($checkall==0 && $err) return $err;
	
	if (trim($_POST['txtDienthoai'])=='') $err=$err.'B&#7841;n ch&#432;a nh&#7853;p &#273;i&#7879;n th&#7885;ai<br>';
	if ($checkall==0 && $err) return $err;
	
	if (trim(is_numeric($_POST['txtDienthoai']))==0) $err=$err.'&#272;i&#7879;n tho&#7841;i ph&#7843;i là s&#7889;<br>';
	if ($checkall==0 && $err) return $err;
	
	if ((trim($_POST['txtFax'])!='')&&(trim(is_numeric($_POST['txtFax']))==0)) $err=$err.'Fax ph&#7843;i là s&#7889;<br>';
	if ($checkall==0 && $err) return $err;

	if (trim($_POST['txtEmail'])=='') $err=$err.'B&#7841;n ch&#432;a nh&#7853;p email<br>';
	else if (checkemail(trim($_POST['txtEmail']))==false) $err=$err.'&#272;&#7883;a ch&#7881; email không h&#7907;p l&#7879;<br>';
	if ($checkall==0 && $err) return $err;
	
	if (strlen(trim($_POST['txtUser']))<4) $err=$err.'B&#7841;n ch&#432;a nh&#7853;p tên truy c&#7853;p ho&#7863;c tên truy c&#7853;p quá ng&#7855;n<br>';
	if ($checkall==0 && $err) return $err;
	
	if (strlen($_POST['txtPassword'])<4) $err=$err.'B&#7841;n ch&#432;a nh&#7853;p m&#7853;t kh&#7849;u ho&#7863;c m&#7853;t kh&#7849;u quá ng&#7855;n<br>';
	if ($checkall==0 && $err) return $err;
	
	if ($_POST['txtRePassword']=='') $err=$err.'B&#7841;n ch&#432;a nh&#7853;p m&#7853;t kh&#7849;u xác nh&#7853;n<br>';
	if ($checkall==0 && $err) return $err;
	
	if (strlen($_POST['txtPassword'])>=4 && $_POST['txtRePassword']!='' && $_POST['txtRePassword']!=$_POST['txtPassword']) $err=$err.'M&#7853;t kh&#7849;u xác nh&#7853;n không &#273;úng<br>';
	if ($checkall==0 && $err) return $err;
	
	if (count_record("customers","customers_username='".trim($_POST['txtUser'])."'")>0) $err=$err.'Tên truy c&#7853;p này &#273;ã có ng&#432;&#7901;i &#273;&#259;ng ký, xin hãy ch&#7885;n l&#7841;i tên khác<br>';
	if ($checkall==0 && $err) return $err;

	if (count_record("customers","customers_email='".trim($_POST['txtEmail'])."'")>0) $err=$err.'Email &#273;ã &#273;&#432;&#7907;c dùng, m&#7895;i email ch&#7881; &#273;&#432;&#7907;c dùng cho m&#7897;t tài kh&#7887;an<br>';
	if ($checkall==0 && $err) return $err;
	
	return $err;
}

$err="";
if (isset($_POST['butSub'])) {
	$err=checkdata(0);
	$gioitinh=$_POST['ddGioitinh'];
	$hoten=trim($_POST['txtHoten']);
	$quyen=0;
	$congty=trim($_POST['txtCongty']);
	$diachi=trim($_POST['txtDiachi']);
	$tinh=trim($_POST['txtTinh']);
	$thanhpho=trim($_POST['txtThanhpho']);
	$quocgia=trim($_POST['ddQuocgia']);
	$dienthoai=trim($_POST['txtDienthoai']);
	$email=trim($_POST['txtEmail']);
	$fax=trim($_POST['txtFax']);
	$website=trim($_POST['txtWebsite']);
	$user=trim($_POST['txtUser']);
	$password=trim($_POST['txtPassword']);
	$repassword=trim($_POST['txtRePassword']);
	$news1=0;
	if($_POST['chkNews1']!='') $news1=$_POST['chkNews1'];
	$news2=0;
	if($_POST['chkNews2']!='') $news2=$_POST['chkNews2'];
	
	if ($err=='')
	{
		$fields_arr= array("customers_name" => "'$hoten'","customers_sex" => "$gioitinh","customers_company"=>"'$congty'", "customers_address"=>"'$diachi'","customers_test"=>"'$quyen'","customers_city"=>"'$tinh'","customers_state"=>"'$thanhpho'","customers_country"=>"'$quocgia'","customers_phone"=>"'$dienthoai'","customers_email"=>"'$email'","customers_fax"=>"'$fax'","customers_website"=>"'$website'","customers_username"=>"'$user'","customers_password"=>"'$password'","customers_recieve_newproduct"=>"'$news1'","customers_recieve_newspecial"=>"'$news2'","customers_date_added"=>"SYSDATE()");
		$result = insert("customers",$fields_arr);
		if($result) {
			$_SESSION['user']=$user;
			echo "<script>window.location='./?frame=register&code=1'</script>";
			//header("Location :register.php?code=1");
			//echo "&#272;ã &#273;&#259;ng ký thành công";
		}
	}
}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>

<?
   if ($_REQUEST['code']=='1') {
   		echo "<p class='err'>&#272;ã &#273;&#259;ng ký thành công<br><br>";
   		echo "<a href='./?frame=cart'>Nh&#7845;n &#273;ây &#273;&#7875; xem gi&#7887; hàng c&#7911;a b&#7841;n</a></p>";
   }
   else
   {
?>
<div align="center">            
<TABLE border="0" cellspacing="5" cellpadding="0" width="100%" id="table40" align="center">
<FORM method="POST" name="registerform" action="index.php">
<TR>
<TD height="20" colspan="3" align="center" class="err"><font color="red">
<? echo $err; 
   if ($_REQUEST['code']=='1') {
   		echo "&#272;ã &#273;&#259;ng ký thành công<br><br>";
   		echo "<a href='cart.php'>Nh&#7845;n &#273;ây &#273;&#7875; xem gi&#7887; hàng c&#7911;a b&#7841;n</a>";
   }
?>
</font></TD>
</TR>

<TR>
<TD height="20" colspan="3" class="normalfont">
                                <p align="right">
                                <font color="#FF0000">* </font><font color="#3D3D3D">Thông tin ph&#7843;i 
								nh&#7853;p&nbsp;&nbsp;&nbsp; </font></TD>
</TR>



<TR>
<TD height="20" colspan="3" class="titlenormalfontbold"><b>Thông tin cá nhân</b><HR size="1" noshade></TD>
</TR>

<TR>
<TD align="right" class="normalfontbold" width="40%">Gi&#7899;i tính</TD>
<TD width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
<SELECT name="ddGioitinh" id="title" size="1" style="border: 1px solid #3EB444">
<option value="0" <? if ($gioitinh=='0') echo 'selected'; ?> >Nam</option>
<option value="1" <? if ($gioitinh=='1') echo 'selected'; ?>>N&#7919;</option>
</SELECT>
</TD>
</TR>
<TR>
<TD align="right" class="normalfontbold" width="40%">H&#7885; và tên</TD>
<TD width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtHoten value="<? echo $hoten; ?>">
</TD>
</TR>
<TR>
<TD align="right" class="normalfontbold" width="40%">Công ty</TD>
<TD width="5">&nbsp;</TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtCongty value="<? echo $congty; ?>">
</TD>
</TR>


<TR>
<TD height="20" colspan="3" class="titlenormalfontbold"><b>&#272;&#7883;a ch&#7881;</b><HR size="1" noshade></TD>
</TR>


<TR>
<TD align="right" class="normalfontbold" width="40%">&#272;&#7883;a ch&#7881;</TD>
<TD width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtDiachi value="<? echo $diachi; ?>">
</TD>
</TR>

<TR>
<TD align="right" class="normalfontbold" width="40%">T&#7881;nh / Thành ph&#7889;</TD>
<TD width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtTinh value="<? echo $tinh; ?>">
</TD>
</TR>



<TR valign="middle" height="22">
<TD align="right" class="normalfontbold" width="40%">Qu&#7889;c gia</TD>
<TD width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
<SELECT name="ddQuocgia" id="b_country" size="1" style="border: 1px solid #00AE4D">
<OPTION value="AF">Afghanistan</OPTION>
<OPTION value="AL">Albania</OPTION>
<OPTION value="DZ">Algeria</OPTION>
<OPTION value="AS">American Samoa</OPTION>
<OPTION value="AD">Andorra</OPTION>
<OPTION value="AO">Angola</OPTION>
<OPTION value="AI">Anguilla</OPTION>
<OPTION value="AQ">Antarctica</OPTION>
<OPTION value="AG">Antigua and Barbuda</OPTION>
<OPTION value="AR">Argentina</OPTION>
<OPTION value="AM">Armenia</OPTION>
<OPTION value="AW">Aruba</OPTION>
<OPTION value="AU">Australia</OPTION>
<OPTION value="AT">Austria</OPTION>
<OPTION value="AZ">Azerbaijan</OPTION>
<OPTION value="BS">Bahamas</OPTION>
<OPTION value="BH">Bahrain</OPTION>
<OPTION value="BD">Bangladesh</OPTION>
<OPTION value="BB">Barbados</OPTION>
<OPTION value="BY">Belarus</OPTION>
<OPTION value="BE">Belgium</OPTION>
<OPTION value="BZ">Belize</OPTION>
<OPTION value="BJ">Benin</OPTION>
<OPTION value="BM">Bermuda</OPTION>
<OPTION value="BT">Bhutan</OPTION>
<OPTION value="BO">Bolivia</OPTION>
<OPTION value="BA">Bosnia and Herzegowina</OPTION>
<OPTION value="BW">Botswana</OPTION>
<OPTION value="BV">Bouvet Island</OPTION>
<OPTION value="BR">Brazil</OPTION>
<OPTION value="IO">British Indian Ocean Territory</OPTION>
<OPTION value="VG">British Virgin Islands</OPTION>
<OPTION value="BN">Brunei Darussalam</OPTION>
<OPTION value="BG">Bulgaria</OPTION>
<OPTION value="BF">Burkina Faso</OPTION>
<OPTION value="BI">Burundi</OPTION>
<OPTION value="KH">Cambodia</OPTION>
<OPTION value="CM">Cameroon</OPTION>
<OPTION value="CA">Canada</OPTION>
<OPTION value="CV">Cape Verde</OPTION>
<OPTION value="KY">Cayman Islands</OPTION>
<OPTION value="CF">Central African Republic</OPTION>
<OPTION value="TD">Chad</OPTION>
<OPTION value="CL">Chile</OPTION>
<OPTION value="CN">China</OPTION>
<OPTION value="CX">Christmas Island</OPTION>
<OPTION value="CC">Cocos (Keeling) Islands</OPTION>
<OPTION value="CO">Colombia</OPTION>
<OPTION value="KM">Comoros</OPTION>
<OPTION value="CG">Congo</OPTION>
<OPTION value="CK">Cook Islands</OPTION>
<OPTION value="CR">Costa Rica</OPTION>
<OPTION value="CI">Cote D'ivoire</OPTION>
<OPTION value="HR">Croatia</OPTION>
<OPTION value="CU">Cuba</OPTION>
<OPTION value="CY">Cyprus</OPTION>
<OPTION value="CZ">Czech Republic</OPTION>
<OPTION value="DK">Denmark</OPTION>
<OPTION value="DJ">Djibouti</OPTION>
<OPTION value="DM">Dominica</OPTION>
<OPTION value="DO">Dominican Republic</OPTION>
<OPTION value="TP">East Timor</OPTION>
<OPTION value="EC">Ecuador</OPTION>
<OPTION value="EG">Egypt</OPTION>
<OPTION value="SV">El Salvador</OPTION>
<OPTION value="GQ">Equatorial Guinea</OPTION>
<OPTION value="ER">Eritrea</OPTION>
<OPTION value="EE">Estonia</OPTION>
<OPTION value="ET">Ethiopia</OPTION>
<OPTION value="FK">Falkland Islands (Malvinas)</OPTION>
<OPTION value="FO">Faroe Islands</OPTION>
<OPTION value="FJ">Fiji</OPTION>
<OPTION value="FI">Finland</OPTION>
<OPTION value="FR">France</OPTION>
<OPTION value="FX">France, Metropolitan</OPTION>
<OPTION value="GF">French Guiana</OPTION>
<OPTION value="PF">French Polynesia</OPTION>
<OPTION value="TF">French Southern Territories</OPTION>
<OPTION value="GA">Gabon</OPTION>
<OPTION value="GM">Gambia</OPTION>
<OPTION value="GE">Georgia</OPTION>
<OPTION value="DE">Germany</OPTION>
<OPTION value="GH">Ghana</OPTION>
<OPTION value="GI">Gibraltar</OPTION>
<OPTION value="GR">Greece</OPTION>
<OPTION value="GL">Greenland</OPTION>
<OPTION value="GD">Grenada</OPTION>
<OPTION value="GP">Guadeloupe</OPTION>
<OPTION value="GU">Guam</OPTION>
<OPTION value="GT">Guatemala</OPTION>
<OPTION value="GN">Guinea</OPTION>
<OPTION value="GW">Guinea-Bissau</OPTION>
<OPTION value="GY">Guyana</OPTION>
<OPTION value="HT">Haiti</OPTION>
<OPTION value="HM">Heard and McDonald Islands</OPTION>
<OPTION value="HN">Honduras</OPTION>
<OPTION value="HK">Hong Kong</OPTION>
<OPTION value="HU">Hungary</OPTION>
<OPTION value="IS">Iceland</OPTION>
<OPTION value="IN">India</OPTION>
<OPTION value="ID">Indonesia</OPTION>
<OPTION value="IQ">Iraq</OPTION>
<OPTION value="IE">Ireland</OPTION>
<OPTION value="IR">Islamic Republic of Iran</OPTION>
<OPTION value="IL">Israel</OPTION>
<OPTION value="IT">Italy</OPTION>
<OPTION value="JM">Jamaica</OPTION>
<OPTION value="JP">Japan</OPTION>
<OPTION value="JO">Jordan</OPTION>
<OPTION value="KZ">Kazakhstan</OPTION>
<OPTION value="KE">Kenya</OPTION>
<OPTION value="KI">Kiribati</OPTION>
<OPTION value="KP">Korea</OPTION>
<OPTION value="KR">Korea, Republic of</OPTION>
<OPTION value="KW">Kuwait</OPTION>
<OPTION value="KG">Kyrgyzstan</OPTION>
<OPTION value="LA">Laos</OPTION>
<OPTION value="LV">Latvia</OPTION>
<OPTION value="LB">Lebanon</OPTION>
<OPTION value="LS">Lesotho</OPTION>
<OPTION value="LR">Liberia</OPTION>
<OPTION value="LY">Libyan Arab Jamahiriya</OPTION>
<OPTION value="LI">Liechtenstein</OPTION>
<OPTION value="LT">Lithuania</OPTION>
<OPTION value="LU">Luxembourg</OPTION>
<OPTION value="MO">Macau</OPTION>
<OPTION value="MK">Macedonia</OPTION>
<OPTION value="MG">Madagascar</OPTION>
<OPTION value="MW">Malawi</OPTION>
<OPTION value="MY">Malaysia</OPTION>
<OPTION value="MV">Maldives</OPTION>
<OPTION value="ML">Mali</OPTION>
<OPTION value="MT">Malta</OPTION>
<OPTION value="MH">Marshall Islands</OPTION>
<OPTION value="MQ">Martinique</OPTION>
<OPTION value="MR">Mauritania</OPTION>
<OPTION value="MU">Mauritius</OPTION>
<OPTION value="YT">Mayotte</OPTION>
<OPTION value="MX">Mexico</OPTION>
<OPTION value="FM">Micronesia</OPTION>
<OPTION value="MD">Moldova, Republic of</OPTION>
<OPTION value="MC">Monaco</OPTION>
<OPTION value="MN">Mongolia</OPTION>
<OPTION value="MS">Montserrat</OPTION>
<OPTION value="MA">Morocco</OPTION>
<OPTION value="MZ">Mozambique</OPTION>
<OPTION value="MM">Myanmar</OPTION>
<OPTION value="NA">Namibia</OPTION>
<OPTION value="NR">Nauru</OPTION>
<OPTION value="NP">Nepal</OPTION>
<OPTION value="NL">Netherlands</OPTION>
<OPTION value="AN">Netherlands Antilles</OPTION>
<OPTION value="NC">New Caledonia</OPTION>
<OPTION value="NZ">New Zealand</OPTION>
<OPTION value="NI">Nicaragua</OPTION>
<OPTION value="NE">Niger</OPTION>
<OPTION value="NG">Nigeria</OPTION>
<OPTION value="NU">Niue</OPTION>
<OPTION value="NF">Norfolk Island</OPTION>
<OPTION value="MP">Northern Mariana Islands</OPTION>
<OPTION value="NO">Norway</OPTION>
<OPTION value="OM">Oman</OPTION>
<OPTION value="PK">Pakistan</OPTION>
<OPTION value="PW">Palau</OPTION>
<OPTION value="PA">Panama</OPTION>
<OPTION value="PG">Papua New Guinea</OPTION>
<OPTION value="PY">Paraguay</OPTION>
<OPTION value="PE">Peru</OPTION>
<OPTION value="PH">Philippines</OPTION>
<OPTION value="PN">Pitcairn</OPTION>
<OPTION value="PL">Poland</OPTION>
<OPTION value="PT">Portugal</OPTION>
<OPTION value="PR">Puerto Rico</OPTION>
<OPTION value="QA">Qatar</OPTION>
<OPTION value="RE">Reunion</OPTION>
<OPTION value="RO">Romania</OPTION>
<OPTION value="RU">Russian Federation</OPTION>
<OPTION value="RW">Rwanda</OPTION>
<OPTION value="LC">Saint Lucia</OPTION>
<OPTION value="WS">Samoa</OPTION>
<OPTION value="SM">San Marino</OPTION>
<OPTION value="ST">Sao Tome and Principe</OPTION>
<OPTION value="SA">Saudi Arabia</OPTION>
<OPTION value="SN">Senegal</OPTION>
<OPTION value="YU">Serbia and Montenegro</OPTION>
<OPTION value="SC">Seychelles</OPTION>
<OPTION value="SL">Sierra Leone</OPTION>
<OPTION value="SG">Singapore</OPTION>
<OPTION value="SK">Slovakia</OPTION>
<OPTION value="SI">Slovenia</OPTION>
<OPTION value="SB">Solomon Islands</OPTION>
<OPTION value="SO">Somalia</OPTION>
<OPTION value="ZA">South Africa</OPTION>
<OPTION value="ES">Spain</OPTION>
<OPTION value="LK">Sri Lanka</OPTION>
<OPTION value="SH">St. Helena</OPTION>
<OPTION value="KN">St. Kitts and Nevis</OPTION>
<OPTION value="PM">St. Pierre and Miquelon</OPTION>
<OPTION value="VC">St. Vincent and the Grenadines</OPTION>
<OPTION value="SD">Sudan</OPTION>
<OPTION value="SR">Suriname</OPTION>
<OPTION value="SJ">Svalbard and Jan Mayen Islands</OPTION>
<OPTION value="SZ">Swaziland</OPTION>
<OPTION value="SE">Sweden</OPTION>
<OPTION value="CH">Switzerland</OPTION>
<OPTION value="SY">Syrian Arab Republic</OPTION>
<OPTION value="TW">Taiwan</OPTION>
<OPTION value="TJ">Tajikistan</OPTION>
<OPTION value="TZ">Tanzania, United Republic of</OPTION>
<OPTION value="TH">Thailand</OPTION>
<OPTION value="TG">Togo</OPTION>
<OPTION value="TK">Tokelau</OPTION>
<OPTION value="TO">Tonga</OPTION>
<OPTION value="TT">Trinidad and Tobago</OPTION>
<OPTION value="TN">Tunisia</OPTION>
<OPTION value="TR">Turkey</OPTION>
<OPTION value="TM">Turkmenistan</OPTION>
<OPTION value="TC">Turks and Caicos Islands</OPTION>
<OPTION value="TV">Tuvalu</OPTION>
<OPTION value="UG">Uganda</OPTION>
<OPTION value="UA">Ukraine</OPTION>
<OPTION value="AE">United Arab Emirates</OPTION>
<OPTION value="GB">United Kingdom (Great Britain)</OPTION>
<OPTION value="US">United States</OPTION>
<OPTION value="VI">United States Virgin Islands</OPTION>
<OPTION value="UY">Uruguay</OPTION>
<OPTION value="UZ">Uzbekistan</OPTION>
<OPTION value="VU">Vanuatu</OPTION>
<OPTION value="VA">Vatican City State</OPTION>
<OPTION value="VE">Venezuela</OPTION>
<OPTION value="VN" selected>Vietnam</OPTION>
<OPTION value="WF">Wallis And Futuna Islands</OPTION>
<OPTION value="EH">Western Sahara</OPTION>
<OPTION value="YE">Yemen</OPTION>
<OPTION value="ZR">Zaire</OPTION>
<OPTION value="ZM">Zambia</OPTION>
<OPTION value="ZW">Zimbabwe</OPTION>
</SELECT><font color="#000000"> </font>
</TD>
</TR>
<TR>
<TD height="20" colspan="3" class="titlenormalfontbold"><b>Thông tin liên h&#7879;</b><HR size="1" noshade></TD>
</TR>

<TR>
<TD align="right" class="normalfontbold" width="40%">&#272;i&#7879;n th&#7885;ai</TD>
<TD width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtDienthoai value="<? echo $dienthoai; ?>">
</TD>
</TR>
<TR>
<TD align="right" class="normalfontbold" width="40%">E-mail</TD>
<TD width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtEmail value="<? echo $email; ?>">
</TD>
</TR>
<TR>
<TD align="right" class="normalfontbold" width="40%">Fax</TD>
<TD width="5">&nbsp;</TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtFax value="<? echo $fax; ?>">
</TD>
</TR>
<TR>
<TD align="right" class="normalfontbold" width="40%">Website</TD>
<TD width="5">&nbsp;</TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtWebsite value="<? echo $website; ?>">
</TD>
</TR>





<TR>
<TD height="20" colspan="3" class="titlenormalfontbold"><B>Tên truy c&#7853;p &amp; m&#7853;t mã</B><HR size="1" noshade></TD>
</TR>





<TR>
<TD align="right" class="normalfontbold" width="40%">Tên truy c&#7853;p</TD>
<TD class="Star" width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtUser value="<? echo $user; ?>">
								<font color="#3D3D3D">(t&#7889;i thi&#7875;u 4 ký t&#7921;)</font></TD>
</TR>

<TR>
<TD align="right" class="normalfontbold" width="40%">M&#7853;t mã</TD>
<TD width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtPassword type="password"> 
								<font color="#3D3D3D">(t&#7889;i thi&#7875;u 4 ký t&#7921;)</font></TD>
</TR>

<TR>
<TD align="right" class="normalfontbold" width="40%">Nh&#7853;p l&#7841;i m&#7853;t mã</TD>
<TD class="Star" width="5">
                                <font color="#FF0000">*</font></TD>
<TD nowrap width="60%">
                                <INPUT class=fieldKey size=33 
                                name=txtRePassword type="password"> 
								<font color="#3D3D3D">(t&#7889;i thi&#7875;u 4 ký t&#7921;)</font></TD>
</TR>






<TR>
<TD height="20" colspan="3" class="titlenormalfontbold"><HR size="1" noshade></TD>
</TR>

<TR>
<TD colspan="2">&nbsp;</TD>
<TD width="336">
&nbsp;</TD>
</TR>


<TR>
<TD colspan="2">&nbsp;</TD>
<TD width="336">
<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" type="submit" value="&#272;&#259;ng ký" name="butSub">
<input type=reset class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" name=butReset value="Nh&#7853;p l&#7841;i"></TD>
</TR>


<TR>
<TD colspan="2">&nbsp;</TD>
<TD width="336">
&nbsp;</TD>
</TR>

<input type="hidden" name="frame" value="register">

</FORM>

</TABLE>
        </div>
<?
}
?></td></tr>