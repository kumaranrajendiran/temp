<?

function checkdata($checkall=0)

{

	$err="";



	if (strlen(trim($_POST['txtEmail']))<1) $err=$err.'B&#7841;n ch&#432;a nh&#7853;p email<br>';

	if ($checkall==0 && $err) return $err;

	

	if (checkemail(trim($_POST['txtEmail']))==false) $err=$err.'&#272;&#7883;a ch&#7881; email không h&#7907;p l&#7879;<br>';

	if ($checkall==0 && $err) return $err;

	

	return $err;

}



$err="";

if (isset($_POST['butSub'])) {

	$err=checkdata(0);

	$email=trim($_POST['txtEmail']);

	if ($err=='')

	{

		$sql = "select * from customers where customers_email='".$email."' limit 1";

		$result = mysql_query($sql,$con);

		if (mysql_num_rows($result)>0)

		{

			$cust=mysql_fetch_assoc($result);

			if (sendmail1($adminemail,$email,"Thong tin dang nhap","Username : ".$cust['customers_username']."<br>Password : ".$cust['customers_password']))

			{	

				echo "<script>window.location='./?frame=forgotpassword&code=1'</script>";

			}

			else

				$err="Không th&#7875; g&#7903;i thông tin";

		}

		else

			$err="&#272;&#7883;a ch&#7881; email không t&#7891;n t&#7841;i";

	}

}



?>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

</head>

<p align="center">

<font face="Tahoma" style="font-size: 8.5pt" color="#FF0000">

<? echo $err; 

   if ($_REQUEST['code']=='1') echo "&#272;ã g&#7903;i thông tin v&#7873; cho b&#7841;n";

?>

</font>

</p>

            <div align="center">

            <form action="index.php" method="post">

            	  <input type="hidden" name="frame" value="forgotpassword">

                  <table border="0" style="border-collapse: collapse; line-height: 150%" width="98%" id="table34" cellpadding="0" cellspacing="10">

                    <tr>

                      <td>

                      <div align="center">

                  <table border="0" style="border-collapse: collapse; line-height: 150%" width="300" id="table35" cellpadding="0">

                    <tr>

                                <TD width="106" bgcolor="#FFFFFF" align="left">

                                <font color="#666666" face="Verdana" style="font-size: 8.5pt">

                                <img border="0" src="images/bullet_body.gif" width="7" height="7"> </font>

                                <font color="#666666" face="Tahoma" style="font-size: 8.5pt">

                                &nbsp;Email c&#7911;a b&#7841;n: 

                                </font>

                                </TD>

                                <TD bgcolor="#FFFFFF" width="140">

                                <font face="Tahoma">

                                <span style="font-size: 8.5pt">

                                <INPUT class=fieldKey size=26 

                                name=txtEmail value="<? echo $email; ?>"></span></font></TD>

                    </tr>

                    <tr>

                                <TD vAlign=top colSpan=2 height=5 bgcolor="#FFFFFF"></TD>

                    </tr>

                    <tr>

                                <TD vAlign=top colSpan=2 height=21 bgcolor="#FFFFFF">

                                <HR class=fieldKey SIZE=1>

                                </TD>

                    </tr>

                    <tr>

                                <TD bgcolor="#FFFFFF" colspan="2">

                                <table border="0" style="border-collapse: collapse" width="100%" id="table36" cellpadding="0">

                                  <tr>

                                    <td>

                                    <p align="center">

                                    <font face="Verdana" size="1">

                <input type=submit class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" name=butSub value="G&#7903;i thông tin"></font></td>

                                  </tr>

                                  <tr>

                                    <td>&nbsp;</td>

                                  </tr>

                                </table>

              </TD>

                                </tr>

                  </table>

                  </form>

                </div>

                      </td>

                    </tr>

                  </table>

                </div>

                

            

            