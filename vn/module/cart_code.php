<?
function checkexist()
{
	$cart=$_SESSION['cart'];
	foreach ($cart as $product)
		if ($product[0]==$_REQUEST['p']) return true;
	return false;
}

	if ($_REQUEST['act']=='del')
	{
		if (count($_SESSION['cart'])==1)
			unset($_SESSION['cart']);
		else
		{
			$cart=$_SESSION['cart'];
			unset($cart[$_REQUEST['pos']]);
			$_SESSION['cart']=$cart;
		}
	}

	if (isset($_POST['butUpdate'])||isset($_POST['butCheckout']))
	{
		$cart=$_SESSION['cart'];
		$t=0;
		foreach ($_POST['txtQuantity'] as $quantity)
		{
			if (is_numeric($quantity) && $quantity>0 && strlen($quantity)<5)
				$cart[$t][1]=(int)$quantity;
			if ($quantity<=0)
			{
				unset($cart[$t]);
				$t=$t-1;
			}
			$t=$t+1;
		}
		if (count($cart)<=0) unset($cart);
		$_SESSION['cart']=$cart;
		
		if (isset($_POST['butCheckout'])) echo "<script>window.location='./?frame=checkout'</script>";
	}
	
	if (isset($_POST['butClear']))
		unset($_SESSION['cart']);

	if (isset($_REQUEST['p']))
	{
		{
			if (!isset($_SESSION['cart']))
			{
				$pro=$_REQUEST['p'];
				$cart=array();
				$cart[] = array($pro,1);
				$_SESSION['cart']=$cart;
			}
			else
			{
				$pro=$_REQUEST['p'];
				$cart=$_SESSION['cart'];
				if (count_record("products","products_id='".$_REQUEST['p']."'")>0 && checkexist()==false)
				{
					$cart[]=array($pro,1);
					$_SESSION['cart']=$cart;
				}
			}
		}
	}
	else
	{
		$cart=$_SESSION['cart'];
	}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>

<p align="center">
<font face="Tahoma" style="font-size: 8.5pt" color="#FF0000">
<? 
   if (!isset($_SESSION['cart'])) {
   		echo "B&#7841;n ch&#432;a ch&#7885;n b&#7845;t k&#7923; s&#7843;n ph&#7849;m nào";
   }
   else
{
?>
						</font>
</p>
<TABLE border="0" cellpadding="10" cellspacing="1" width="100%" id="table1">
<TR><TD class="DialogBox">
<FORM action="index.php" method="POST" name="cartform">
<table border="1" width="100%" cellspacing="0" cellpadding="4" id="table7" style="border-collapse: collapse" bordercolor="#000000">
	<tr>
		<td align="center" nowrap width="100">&nbsp;</td>
		<td align="center" nowrap><font face="Tahoma" style="font-size: 8.5pt">S&#7843;n ph&#7849;m</font></td>
		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">S&#7889; l&#432;&#7907;ng</font></td>
		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">&#272;&#417;n giá</font></td>
		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">Thành 
		ti&#7873;n</font></td>
		<td align="center" nowrap width="60">
		&nbsp;</td>
	</tr>
<?
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
		<td align="center" width="60"><span style="font-size: 8.5pt"><input type="text" name="txtQuantity[]" size="5" value="<? echo $product[1]; ?>"></span></td>
		<td align="center" width="60"><span style="font-size: 8.5pt">$<? echo number_format($pro['products_price']); ?></span></td>
		<td align="center" width="60"><span style="font-size: 8.5pt">$<? echo number_format(($pro['products_price']*$product[1])); ?></span></td>
		<td align="center" width="60"><font face="Verdana" size="1">
        <span style="font-size: 8.5pt">
        <input type=submit class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" style="height: 18; width:30" name=butXoa value="Xóa" onclick="window.location='./?frame=cart&act=del&pos=<? echo ($cnt) ?>';return false;"></span></font></td>
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
<font face="Verdana" size="1">
                <input type=submit class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" style="height: 18; width:66" name=butUpdate value="C&#7853;p nh&#7853;t"></font><a href="javascript: document.cartform.submit()"><font face="Tahoma" style="font-size: 8.5pt"> </font>
</a><font face="Verdana" size="1">
                <input type=submit class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" style="height: 18; width:66" name=butClear value="Xóa h&#7871;t"></font></TD>
<TD align="right">
<font face="Verdana" size="1">
                <input type=submit class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" style="height: 18; width:70" name=butCheckout value="Thanh toán"></font></TD>
</TR>
</TABLE>
<input type="hidden" name="frame" value="cart">
</FORM>

<font face="Tahoma" style="font-size: 8.5pt">&nbsp; </font>
</TD></TR>
</TABLE>
<?
}
?>