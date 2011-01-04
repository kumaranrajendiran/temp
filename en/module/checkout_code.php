<?
if (!isset($_SESSION['user']) || $_SESSION['user']=='')
{
	unset($_SESSION['user']);
	echo "<script>window.location='./?frame=login'</script>";
}
if (count($_SESSION['cart'])<=0)
{
	echo "<script>window.location='./?frame=cart'</script>";
}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<?
	function send_mail_order()
	{
		global $con;
		global $adminemail;
		$sql = "select * from customers where customers_username='".$_SESSION['user']."'";
		$result = mysql_query($sql,$con);
		$cust=mysql_fetch_assoc($result);
		
		$name=$cust['customers_name'];
		$address=$cust['customers_address'];
		$phone=$cust['customers_phone'];
		$email=$cust['customers_email'];

		$dathang="";
		$cart=$_SESSION['cart'];
	
		$tongcong=0;
		$cnt=0;
		foreach ($cart as $product){
			$sql = "select * from products where products_id='".$product[0]."'";
			$result = mysql_query($sql,$con);
			$pro=mysql_fetch_assoc($result);
			
			$dathang.="Ma san pham : ".$pro['products_code']."<br>"; 
			$dathang.="Ten san pham : ".$pro['products_name']."<br>"; 
			$dathang.="So luong : ".$product[1]."<br>"; 
			$dathang.="Don gia : ".$pro['products_price']."<br>";
			$dathang.="Thanh tien : ".$pro['products_price']*$product[1]."<br><br>";
			
			$tongcong=$tongcong+$pro['products_price']*$product[1];
			$cnt=$cnt+1;
		} 
		$dathang.="<hr>Tong cong : ".$tongcong."<br>";

		$m2=sendmail($email,$adminemail, "Thong tin dat hang cua : ".$name, "Ho ten : ".$name."<br>Dia chi : ".$address."<br>Dien thoai : ".$phone."<br>Email : ".$email."<BR><hr><b>Don hang :</b><br>".$dathang);
		if (m2)
		{
			return "";
		}
		else
			return "Không th&#7875; g&#7903;i thông tin.";
	}

?>
<?	if (!isset($_SESSION['user'])) echo "<script>window.location='./?frame=register'</script>";
	if (count($_SESSION['cart'])<=0) echo "<script>window.location='./?frame=cart'</script>";
	$cart=$_SESSION['cart'];
	
	$sql = "select * from customers where customers_username='".$_SESSION['user']."'";
	$result = mysql_query($sql,$con);
	$cust=mysql_fetch_assoc($result);
?>    

<?
	if (isset($_POST['butSub']))
	{
		$tongcong=0;
		$cnt=0;
		$sqlorder="insert into orders (orders_customer_id,orders_date) values (".$cust['customers_id'].",SYSDATE())";		
		mysql_query($sqlorder,$con);
		$newid=mysql_insert_id();
		foreach ($cart as $product){
			$sql = "select * from products where products_id='".$product[0]."'";
			$result = mysql_query($sql,$con);
			$pro=mysql_fetch_assoc($result);
			$sqlorder="insert into orderdetail (ordersdetail_product_id,ordersdetail_quantity,ordersdetail_price,ordersdetail_ordersid) values (".$product[0].",".$product[1].",".$pro['products_price'].",".$newid.")";
			mysql_query($sqlorder,$con);
			$tongcong=$tongcong+$pro['products_price']*$product[1];
			$cnt=$cnt+1;
		} 
		if (send_mail_order()=="")
			echo "<script>window.location='./?frame=checkout&code=1'</script>";
		else
			{
				echo "<p align='center' class='err'><font color=red>Không th&#7875; g&#7903;i thông tin</font></p>";
			}
	}
?>
<p align="center" style="line-height: 150%" class="err">
<font face="Tahoma" style="font-size: 8.5pt">
<? 
	if ($_REQUEST['code']=='1') {
   		echo "Thông tin &#273;&#7863;t hàng c&#7911;a b&#7841;n &#273;ã &#273;&#432;&#7907;c g&#7903;i &#273;&#7871;n chúng tôi<br>";
   		echo "<a href='../index.php'>Nh&#7845;n &#273;ây &#273;&#7875; tr&#7903; v&#7873; trang chính</a>";
   		unset($_SESSION['cart']);
	}
	else
{
?>
</font>
</p>
<TABLE border="0" cellspacing="1" cellpadding="2" width="100%" id="table8">

<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">H&#7885; và tên :</font></TD>
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $cust['customers_name']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>
<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">Công ty :</font></TD>
<TD width="6">&nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $cust['customers_company']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>


<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">&#272;&#7883;a ch&#7881; :</font></TD>
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $cust['customers_address']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>

<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">T&#7881;nh :</font></TD>
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $cust['customers_state']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>



<TR height="22">
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">Thành ph&#7889; :</font></TD> 
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt; font-weight:700">
                                <? echo $cust['customers_city']; ?></span></font></TD>
</TR>

<TR valign="middle" height="22">
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">Qu&#7889;c gia :</font></TD>
<TD width="6">
</TD>
<TD nowrap>
<font color="#000000" style="font-size: 8.5pt"> <b> <? echo $cust['customers_country']; ?></b></font></TD>
</TR>

<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">&#272;i&#7879;n th&#7885;ai 
:</font></TD>
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $cust['customers_phone']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>
<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">E-mail :</font></TD>
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $cust['customers_email']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>

</TABLE>

<TABLE border="0" cellpadding="10" cellspacing="1" width="100%" id="table1">
<TR><TD class="DialogBox">
<FORM action="index.php" method="POST" name="cartform">
<table border="1" width="100%" cellspacing="0" cellpadding="4" id="table7" style="border-collapse: collapse">
	<tr>
		<td align="center" nowrap width="100">&nbsp;</td>
		<td align="center" nowrap><font face="Tahoma" style="font-size: 8.5pt">S&#7843;n ph&#7849;m</font></td>
		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">S&#7889; l&#432;&#7907;ng</font></td>
		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">&#272;&#417;n giá</font></td>
		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">Thành 
		ti&#7873;n</font></td>
	</tr>
<?
$cart=$_SESSION['cart'];
$cnt=0;
$tongcong=0;
foreach ($cart as $product){
$sql = "select * from products where products_id='".$product[0]."'";
$result = mysql_query($sql,$con);
if (mysql_num_rows($result)>0)
{
$pro=mysql_fetch_assoc($result);
?>	
	<tr>
		<td align="center" width="100">
		<font face="Tahoma" style="font-size: 8.5pt">
<A href="./?frame=product&p=<? echo $pro['products_id']; ?>"><IMG id="" src="<? echo $pro['products_image']; ?>" alt="<? echo $pro['products_name']; ?>" border="0" width="100"></A></font></td>
		<td align="left"><span style="font-size: 8.5pt"><? echo $pro['products_name']; ?></span></td>
		<td align="center" width="60"><span style="font-size: 8.5pt"><? echo $product[1]; ?></span></td>
		<td align="center" width="60"><span style="font-size: 8.5pt">$<? echo number_format($pro['products_price']); ?></span></td>
		<td align="center" width="60"><span style="font-size: 8.5pt">$<? echo number_format(($pro['products_price']*$product[1])); ?></span></td>
	</tr>
<?
}
$tongcong=$tongcong+$pro['products_price']*$product[1];
$cnt=$cnt+1;
} 
?>
</table>

<TABLE border="0" width="100%" id="table2">
<TR><TD>
	<p align="right"><font face="Tahoma" style="font-size: 8.5pt"><b>T&#7893;ng c&#7897;ng : $<? echo number_format($tongcong); ?>
	</b></font></TD></TR>
</TABLE>
<HR align="left" noshade size="1">
<TABLE border="0" cellpadding="0" cellspacing="0" width="100%" id="table5">
<TR>
<TD>
<p align="center"><font face="Verdana" size="1">
<input type=submit class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" style="height: 18; width:130" name=butSub value="G&#7903;i thông tin &#273;&#259;ng ký"></font></TD>
</TR>
</TABLE>
<input type="hidden" name="frame" value="checkout">
</FORM>

<font face="Tahoma" style="font-size: 8.5pt">&nbsp; </font>
</TD></TR>
</TABLE>
<?
}
?>