<?

function ListPaging($nitem,$maxpage,$curpage,$link,$name="s&#7843;n ph&#7849;m")
{
?>
          
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<tr>
	<td height="10"></td>
</tr>
<?
$pages=$maxpage;
echo '<tr><td class="smallfont" align="left">Trình bày '.($curpage+1).' &#273;&#7871;n '.$maxpage.' (trong <b>'.$nitem.'</b> '.$name.')</td>';
echo '<td class="smallfont" align="right">K&#7871;t qu&#7843;: ';
$param="";
if ($curpage>1) echo '<a title="&#272;&#7847;u tiên" href="'.$link.'0">[&lt;]</a> ';
if ($curpage>0) echo '<a title="V&#7873; tr&#432;&#7899;c" href="'.$link.($p-1).'">[&lt;&lt;]</a> ';
$from=($curpage-10>0?$curpage-10:0);
$to=($curpage+10<$pages?$curpage+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="'.$link.$i.'">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($curpage<$i-1) echo '<a title="Ti&#7871;p theo" href="'.$link.($p+1).'">[&gt;&gt;]</a> ';
if ($curpage<$pages-1) echo '<a title="Cu&#7889;i cùng" href="'.$link.($pages-1).'">[&gt;]</a>'; 
?>
</td></tr></table>
<?
}

function CountRecord($table,$where="")
{
	global $con;
    if ($table=="") return false;
    if ($where=="") $where="1=1";
	$result = mysql_query("select count(*) as cnt from $table where $where",$con);
	$row=@mysql_fetch_assoc($result);
	return $row['cnt'];
}

//Count Page
function count_page($total, $n)
{
	if ($total%$n==0) return (int)($total/$n);
	return (int)($total/$n)+1;
}

//HAM NAY LOAI BO CAC LENH INJECTION
function killInjection($str){
	$bad = array("\\","=",":");
	$good = str_replace($bad,"", $str);
	return $good;
}

function GetCategoryInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from categories where categories_id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}


function GetDonviInfo($id)
{
    global $con;
    if ($id=="") return false;
	$result = mysql_query("select * from donvi where dv_id=$id limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetProviderInfo($id)
{
    global $con;
    if ($id=="") return false;
	$result = mysql_query("select * from providers where providers_id=$id limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetProductInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from products where products_id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}


function GetQuangcaoInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select *,DATE_FORMAT(adv_date_modified,'%d/%m/%Y %h:%i') as dateModify from adv where language='vn' and adv_id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetQuangcaoenInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select *,DATE_FORMAT(adv_date_modified,'%d/%m/%Y %h:%i') as dateModify from adv where language='en' adv_id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetListCategory($catid="",$split="==")
{
    global $con;
    $hide="categories_status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from categories where $hide and parent_id=$catid",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['categories_id'],($catid==0?"":$split).$row['categories_name']);
		$getsub=GetListCategory($row['categories_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}

function GetListProvider()
{
    global $con;
    $hide="providers_status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
	$result = mysql_query("select * from providers where $hide order by providers_name",$con);
	while (($row=mysql_fetch_assoc($result)))
		$ret[]=array($row['providers_id'],$row['providers_name']);
	return $ret;
}
function GetListlinkweb($catid="",$split="==")
{
    global $con;
    $hide="link_websites_categories_status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from link_websites_categories where $hide and link_websites_categories_parentid=$catid",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['link_websites_categories_id'],($catid==0?"":$split).$row['link_websites_categories_name'],$row['link_websites_categories_parentid']);
		$getsub=GetListlinkweb($row['link_websites_categories_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1],$sub[2]);
	}
	return $ret;
}
function GetListWebCategory($catid="",$split="==")
{
    global $con;
    $hide="link_websites_categories_status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from link_websites_categories where $hide and link_websites_categories_parentid=$catid",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['link_websites_categories_id'],($catid==0?"":$split).$row['link_websites_categories_name']);
		$getsub=GetListWebCategory($row['link_websites_categories_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}

function GetConfig($name)
{
    global $con;
	$result = mysql_query("select * from config where config_name='$name'",$con);
	$row=mysql_fetch_assoc($result);
	return $row['config_value'];
}

function SetConfig($name,$value)
{
    global $con;
    $result = mysql_query("update config set config_value='".$value."' where config_name='$name'",$con);
    return $value;
}

function islogin()
{
if (isset($_SESSION['user']) && $_SESSION['user']!='') return $_SESSION['user'];
return false;
}
function islogin_down()
{
if (isset($_SESSION['user']) && $_SESSION['user']!=''&& $_SESSION['test']==1) return $_SESSION['user'];
return false;
}

function price_in_cart()
{
if (!isset($_SESSION['cart'])) return 0;
global $con;
$cart=$_SESSION['cart'];
$tongcong=0;
foreach ($cart as $product){
	$sql = "select * from products where products_id='".$product[0]."'";
	$result = mysql_query($sql,$con);
	if (mysql_num_rows($result)>0)
	{
	$pro=mysql_fetch_assoc($result);
	$tongcong=$tongcong+$pro['products_price']*$product[1];
	$cnt=$cnt+1;
	} 
}
return $tongcong;
}

function GetContent($id)
{
    global $con;
    if ($id=='') return false;
	$result = mysql_query("select * from contents where contents_id=$id limit 1",$con);
	$row=mysql_fetch_assoc($result);
	return $row['contents_content'];
}

function GetContentInfo($id)
{
    global $con;
    if ($id=='') return false;
	$result = mysql_query("select * from contents where contents_id=$id limit 1",$con);
	$row=mysql_fetch_assoc($result);
	return $row;
}

function GetContentName($name)
{
    global $con;
    if ($name=='') return false;
	$result = mysql_query("select * from contents where contents_name='".$name."' limit 1",$con);
	$row=mysql_fetch_assoc($result);
	return $row['contents_content'];
}

function GetContentNameInfo($name)
{
    global $con;
    if ($name=='') return false;
	$result = mysql_query("select * from contents where contents_name='".$name."' limit 1",$con);
	$row=mysql_fetch_assoc($result);
	return $row;
}

function GetListContent()
{
    global $con;
    $ret=array();
	$result = mysql_query("select * from contents",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['contents_id'],$row['contents_note']);
	}
	return $ret;
}
function GetlinkInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from link_websites_categories where link_websites_categories_id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}

?>