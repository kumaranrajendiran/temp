<?
function GetNewsDate($news)
{
$arr=array('Ch&#7911; nh&#7853;t','Th&#7913; hai','Th&#7913; ba','Th&#7913; t&#432;','Th&#7913; n&#259;m','Th&#7913; sáu','Th&#7913; b&#7843;y');
$date = strtotime($news['date_added']);
return $arr[date('w',$date)].', '.date('d/m/Y',$date);
}
function GetNewsDateen($news)
{
$today = getdate();
return $today['weekday'].', '.$today['month'].' '.$today['mday'].', '.$today['year'];
}

function GetNewsCategoryInfo($id,$status=0)
{
    global $con;
    $id=killInjection($id);
    if ($id=="") return false;
	$result = mysql_query("select * from newscategories where status=$status and categories_id=$id limit 1",$con);
	return mysql_fetch_assoc($result);
}

function GetNewsInfo($id,$status=0)
{
    global $con;
    $id=killInjection($id);
    if ($id=="") return false;
	$result = mysql_query("select * from news where status=$status and news_id=$id limit 1",$con);
	return mysql_fetch_assoc($result);
}

function GetListNewsCategory($where="1=1",$limit="1000",$status=0)
{
    global $con;
    $ret=array();
	$result = mysql_query("select * from newscategories where status=$status and $where order by date_added desc limit $limit",$con);
	while (($row=mysql_fetch_assoc($result)))
		$ret[]=$row;
	return $ret;
}

function GetListNewsCategoryAll($id="",$split="==")
{
    global $con;
    $ret=array();
    if ($id=="") $id=0;
	$result = mysql_query("select * from newscategories where parent_id=$id",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['categories_id'],($id==0?"":$split).$row['categories_name']);
		$getsub=GetListNewsCategoryAll($row['categories_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}

function GetListNews($where="1=1",$limit="1000",$status="0")
{
    global $con;
    $ret=array();
	$result = mysql_query("select * from news where status=$status and $where order by date_added desc limit $limit",$con);
	while (($row=mysql_fetch_assoc($result)))
		$ret[]=$row;
	return $ret;
}
?>