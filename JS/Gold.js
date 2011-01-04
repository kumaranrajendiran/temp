function ShowGoldPrice()
{
	function AddGoldPrice(Currency, Rate)
	{
		document.writeln('<tr bgcolor="#FFFFFF"><td class=BoxItem>&nbsp;', Currency, '</td><td class=BoxItem align=right>', Rate, '&nbsp;</td></tr>');
	}
	if (!AddHeader('Gold', '<font color=#0066ff><b>GI&Aacute; V&Agrave;NG 9999</b></font>', 3, PageHost.concat('../Service/i_Stock.gif')))
		return;
	if (typeof(vGoldBuy) !='undefined') AddGoldPrice('Mua', vGoldBuy);
	if (typeof(vGoldSell)!='undefined') AddGoldPrice('B&#225;n', vGoldSell);
	AddFooter();
}
ShowGoldPrice();