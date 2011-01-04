<table border="0" width="98%" id="table17" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="100%"> <p style="margin-top: 0; margin-bottom: 0"><font color="#003366"><b> 
                          S&#416; &#272;&#7890; TITIEN</b></font></p>
                        <hr color="#32609D" size="1"> 
                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="70%" id="AutoNumber1">
                          <tr> 
                            <td width="100%"> <link rel="StyleSheet" type="text/css" href="../map/dtree.css"> 
                              <script type="text/javascript" src="../map/dtree.js"></script> 
                              <div class="dtree"> 
                                
                                <script type="text/javascript">
		<!--

		d = new dTree('d');

		d.add(0,-1,'TITIEN');
		d.add(2,0,'Trang ch&#7911;','./');
		d.add(1,0,'Gi&#7899;i Thi&#7879;u','./?frame=intro');
		d.add(3,0,'D&#7883;ch v&#7909;','./?frame=content&name=dichvu');
		d.add(4,0,'Liên h&#7879;','./?frame=contact');
		d.add(5,0,'Ph&#432;&#417;ng th&#7913;c mua bán','./?frame=content&name=phuongthuc');
		d.add(30,0,'S&#417; &#273;&#7891; website','./?frame=sodo');
		d.add(33,0,'Ngôn ng&#7919;','#');
		d.add(34,33,'Ti&#7871;ng Vi&#7879;t','./');
		d.add(35,33,'Ti&#7871;ng Anh','../en');

		d.add(6,0,'Danh m&#7909;c s&#7843;n ph&#7849;m','#');
			<?
			$result = mysql_query("select * from categories where categories_status=0 and parent_id=0 and language='vn'",$con);
			$lang=mysql_fetch_assoc($result);
			
			$result = mysql_query("select * from categories where categories_status=0 and parent_id=".$lang['categories_id']."  order by sort_order",$con);
			$cn=50;
			while (($row=mysql_fetch_assoc($result)))
			{
			?>

			d.add(''+'<? echo $cn; ?>'+'',6,''+'<? echo $row['categories_name']; ?>'+'',''+'./?frame=category&cat=<? echo $row['categories_id']; ?>'+'');
				<?
					$result1 = mysql_query("select * from categories where categories_status=0 and parent_id=".$row['categories_id']." order by sort_order",$con);
					$cnn=100*$cn;
					while (($row1=mysql_fetch_assoc($result1)))
					{
				?>         

				d.add(''+'<? echo $cnn; ?>'+'',''+'<? echo $cn; ?>'+'',''+'<? echo $row1['categories_name']; ?>'+'',''+'./?frame=category&cat=<? echo $row1['categories_id']; ?>'+'');
					<?
					$cnnn=200*$cnn;
					$result2 = mysql_query("select * from categories where categories_status=0 and parent_id=".$row1['categories_id']." order by sort_order",$con);
					while (($row2=mysql_fetch_assoc($result2)))
					{
					?>
						d.add(''+'<? echo $cnnn; ?>'+'',''+'<? echo $cnn; ?>'+'',''+'<? echo $row2['categories_name']; ?>'+'',''+'./?frame=category&cat=<? echo $row2['categories_id']; ?>'+'');
					<?  
			    	$cnnn+=1;
			    	}
				$cnn+=1;
				}
				$cn+=1;
			}
			?>

		d.add(9,0,'Tìm ki&#7871;m','./?frame=search');
		d.add(10,0,'&#272;&#259;ng nh&#7853;p','./?frame=login');


		d.add(12,0,'Tin t&#7913;c s&#7921; ki&#7879;n','#');
		d.add(13,12,'Tin t&#7913;c','./?frame=newscat&cat1=3');
		d.add(14,12,'B&#7843;n tin k&#7929; thu&#7853;t','./?frame=newscat_kt&cat1=5');

		//d.add(16,0,'','');

		document.write(d);
	    d.openAll();
		//-->
	                            </script>

                              </div></td>
                          </tr>
                        </table></td>
      </tr>
      </TABLE>
      