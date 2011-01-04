<SCRIPT language=javascript>
    var theoldcell = ""
    function showhide(thecell,nosub)
    {	
    	if (nosub==1) return true;
/*
	    if(theoldcell == thecell){
		    eval('document.all.'+thecell).style.display = 'none';
		    theoldcell = "";
	    }else{
	        if(theoldcell != thecell){
	            if(theoldcell != "")
		            eval('document.all.'+theoldcell).style.display = 'none';
		        eval('document.all.'+thecell).style.display = '';
		        theoldcell = thecell;
	        }
	    }
*/
		if (eval('document.all.'+thecell).style.display!=''){
			eval('document.all.'+thecell).style.display = '';
			}
		else
			eval('document.all.'+thecell).style.display = 'none';
	    return false;
    }
</SCRIPT>


<?
$result = mysql_query("select * from categories where categories_status=0 and parent_id=0 and language='en'",$con);
$lang=mysql_fetch_assoc($result);

$result = mysql_query("select * from categories where categories_status=0 and parent_id=".$lang['categories_id']."  order by sort_order",$con);
while (($row=mysql_fetch_assoc($result)))
{
?>
   <tr tyle="CURSOR: hand" onclick="return showhide('menu_cat'+<? echo $row['categories_id']; ?>,<? echo $row[categories_notsub]; ?>);">
	<td>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0 id="table4">
              <TR>
                <TD class=leftmenu align=left height=23 bgcolor="#FFCC99">
				&nbsp;&nbsp;<font color="#000000">&nbsp;</font><img border="0" src="../images/icon1.png" width="12" height="9"><font color="#A80000">
						<a href="./?frame=category&cat=<? echo $row['categories_id']; ?>" class="a1"><? echo $row['categories_name']; ?></a></b></font></td>
					</tr>
				</table>
				</td>
			</tr>
         <tr id="menu_cat<? echo $row['categories_id']; ?>" style="DISPLAY: none">
          	<td>
          		<table cellspacing="0" cellpadding="0" width="100%" align="right">
<?
	$result1 = mysql_query("select * from categories where categories_status=0 and parent_id=".$row['categories_id']." order by sort_order",$con);
	while (($row1=mysql_fetch_assoc($result1)))
	{
?>         
         			<tr style="CURSOR: hand" onclick="return showhide('menu_cat<? echo $row1['categories_id']; ?>',<? echo $row1[categories_notsub]; ?>);">
					   <td align="right">
					    <table border="0" width="98%" id="table668" cellspacing="0" cellpadding="0">
						<tr>
							<td height="20">&nbsp;&nbsp;&nbsp;&nbsp; +
						<font color="#FFFFFF"><a href="./?frame=category&cat=<? echo $row1['categories_id']; ?>" class="a1"><? echo $row1['categories_name']; ?></a></font></td>
						</tr>
						</table>
					</td></tr>
		<tr>
			<td height="2"></td>
		</tr>

          <tr id="menu_cat<? echo $row1['categories_id']; ?>" style="DISPLAY: none">
          	<td>
          		<table cellspacing="0" cellpadding="0" width="100%" align="right">
<?
		$result2 = mysql_query("select * from categories where categories_status=0 and parent_id=".$row1['categories_id']." order by sort_order",$con);
		while (($row2=mysql_fetch_assoc($result2)))
		{
?>
			<tr><td>
			<table border="0" width="98%" id="table668" cellspacing="0" cellpadding="0" align="right">
				<tr>
					<td height="20">
					<a class="topmenub1" href="./?frame=category&cat=<? echo $row2['categories_id']; ?>"> <font face="Wingdings">&nbsp; 
					l</font><font color="#FFFFFF"> <? echo $row2['categories_name']; ?></font></a></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#000000">
					</td>
				</tr>
			</table>
			</td></tr>
<?
		}

?>
			</table>
          	</td>
          </tr>

<?
	}
?>
			</table>
          	</td>
          </tr>
<?
}
function OpenMenu($cat)
{
    global $lang;
	$catinfo=GetCategoryInfo($cat);
	if ($catinfo['parent_id']!=$lang['categories_id'])
	{
		echo "<script>showhide('menu_cat".$catinfo['parent_id']."');</script>";
		OpenMenu($catinfo['parent_id']);
	}
}

if ($_REQUEST['cat']!='')
{
	$cat=killInjection($_REQUEST['cat']);
	OpenMenu($cat);
}
?>