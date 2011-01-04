function ShowGoldPrice()
{
	function AddGoldPrice(Currency, Rate)
	{
		document.writeln('<tr bgcolor="#E2E2E2"><td class=BoxItem>&nbsp;', Currency, '</td><td class=BoxItem align=right>', Rate, '&nbsp;</td></tr>');
	}
	if (!AddHeader('Gold', 'Gi&#225; v&#224;ng 9999', 3, PageHost.concat('/Service/i_Stock.gif')))
		return;
	if (typeof(vGoldBuy) !='undefined') AddGoldPrice('Mua', vGoldBuy);
	if (typeof(vGoldSell)!='undefined') AddGoldPrice('B&#225;n', vGoldSell);
	AddFooter();
}
ShowGoldPrice();