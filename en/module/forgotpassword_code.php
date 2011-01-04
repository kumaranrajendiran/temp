<tr><td>

<?

function checkdata($checkall=0)

{

	$err="";



	if (strlen(trim($_POST['txtEmail']))<1) $err=$err.'Please enter your email<br>';

	if ($checkall==0 && $err) return $err;

	

	if (checkemail(trim($_POST['txtEmail']))==false) $err=$err.'Your email is invalid<br>';

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

				$err="Can't send information";

		}

		else

			$err="Your email is invalid";

	}

}



?>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

</head>

<br>

<p align="center">

<font face="Tahoma" style="font-size: 8.5pt" color="#FF0000">

<? echo $err; 

   if ($_REQUEST['code']=='1') echo "Have sent an email";

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

                                &nbsp;Your Email: 

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

                <input type=submit class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" name=butSub value="Send"></font></td>

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

</td></tr>