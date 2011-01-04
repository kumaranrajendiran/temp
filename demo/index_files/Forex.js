function ShowForexRate()
{
	function AddCurrencyRate(Currency, Rate)
	{
		document.writeln('<tr bgcolor="#ffffff"><td class=BoxItem>&nbsp;', Currency, '</td><td class=BoxItem align=right>', Rate, '&nbsp;</td></tr>');
	}
	if (!AddForexHeader('Forex', '<font color=#0066ff><b>T&#7927; gi&#225;</b></font>', 3, PageHost.concat('../Service/i_Stock.gif')))
		return;
	if (typeof(vForex1) !='undefined' && typeof(vCost1) !='undefined') AddCurrencyRate(vForex1, vCost1);
	if (typeof(vForex2) !='undefined' && typeof(vCost2) !='undefined') AddCurrencyRate(vForex2, vCost2);
	if (typeof(vForex3) !='undefined' && typeof(vCost3) !='undefined') AddCurrencyRate(vForex3, vCost3);
	if (typeof(vForex4) !='undefined' && typeof(vCost4) !='undefined') AddCurrencyRate(vForex4, vCost4);
	if (typeof(vForex5) !='undefined' && typeof(vCost5) !='undefined') AddCurrencyRate(vForex5, vCost5);
	if (typeof(vForex6) !='undefined' && typeof(vCost6) !='undefined') AddCurrencyRate(vForex6, vCost6);
	if (typeof(vForex7) !='undefined' && typeof(vCost7) !='undefined') AddCurrencyRate(vForex7, vCost7);
	if (typeof(vForex8) !='undefined' && typeof(vCost8) !='undefined') AddCurrencyRate(vForex8, vCost8);
	if (typeof(vForex9) !='undefined' && typeof(vCost9) !='undefined') AddCurrencyRate(vForex9, vCost9);
	if (typeof(vForex10)!='undefined' && typeof(vCost10)!='undefined') AddCurrencyRate(vForex10, vCost10);
	if (typeof(vForex11)!='undefined' && typeof(vCost11)!='undefined') AddCurrencyRate(vForex11, vCost11);
	if (typeof(vForex12)!='undefined' && typeof(vCost12)!='undefined') AddCurrencyRate(vForex12, vCost12);
	if (typeof(vForex13)!='undefined' && typeof(vCost13)!='undefined') AddCurrencyRate(vForex13, vCost13);
	if (typeof(vForex14)!='undefined' && typeof(vCost14)!='undefined') AddCurrencyRate(vForex14, vCost14);
	AddForexFooter();
}
ShowForexRate();

function AddForexHeader(Name, Header, Buttons, Symbol, AddChildTable)
{
	document.writeln('<table width="100%" border=0 cellspacing=0 cellpadding=1 background="../images/bg_khung_R.gif"><tr><td>');

	if (Header!='')
	{
		document.writeln('<table width="100%" border=0 cellspacing=0 cellpadding=0>');
		document.writeln('<tr>');

		if (typeof(Symbol)!='undefined')
		{
			document.writeln('<td height=16 class=BoxHeader><img src="', Symbol, '" border=0></td>');
		}

		document.writeln('<td height=16 width="100%" align=left class=BoxHeader>&nbsp;', Header, '</td>');

		if ((Buttons & 1) && fDSp)
		{
			document.write('<td width=15 align=right>');
			document.write('<a href="JavaScript:ItemMinimize(\x27', Name, '\x27)">');
			document.write('<img src="../Service/min.gif" name="IDI_', Name, '" border=0 alt="Minimize | Maximize">');
			document.write('</a></td>');
		}

		document.writeln('</tr></table>');
	}

	//document.writeln('<table width="100%" border=0 cellspacing=0 cellpadding=0 id="tIDM_', Name, '"><tr><td><div class=BreakLine id="IDM_', Name, '">');
	document.writeln('<table width="100%" border=0 cellspacing=0 cellpadding=0><tr><td id="IDM_', Name, '">');
	document.writeln('<table width="100%" border=0 cellspacing=0 cellpadding=0><tr><td>');
	if (typeof(AddChildTable)=='undefined')
	{
		document.writeln('<div style="position:related;height:100%;width:100%;">');
		document.writeln('<table align=center width="100%" cellspacing=0 cellpadding=0 style="border-collapse: collapse" bordercolor="#CCCCCC" border=1>');
		LastChild = 1;
	}
	else
	{
		LastChild = 0;
	}
	return true;
}

function AddForexFooter()
{
	document.writeln('</table>');
	document.writeln('</div>');
	document.writeln('</td></tr>');
	document.writeln('<tr bgcolor="#ffffff"><td colspan=1 class=BoxItem align=center><i>(Ngu&#7891;n: Ng&#226;n h&#224;ng<br> Ngo&#7841;i th&#432;&#417;ng VN)</td></tr>');
	document.writeln('</table>');
	document.writeln('</td></tr></table>');
	document.writeln('</td></tr></table>');
}
