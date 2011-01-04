							<table border="0" width="100%" id="table293" cellspacing="0" cellpadding="0" align="center" >
								
								<tr>
														<td height="20" bgcolor="#580A09">
														<p align="left">
														<b>&nbsp;&nbsp;
												<img border="0" src="../images/icon_rec.gif" width="7" height="7">&nbsp;
														<font color="#FFFFFF">
														&nbsp;DOWNLOAD B&#7842;NG GIÁ</font></b></td>
													</tr>
													
								<tr>
																<td height="3" bgcolor="#B50103">
																<table border="0" width="100%" id="table294" cellspacing="0" cellpadding="0" >
																	<tr>
																		<td>
																		<table border="0" width="100%" id="table295" cellspacing="0" cellpadding="0">
																			<tr><td height="5"></td></tr>
																			<tr>
																			<td width="1"></td>
																				<td width="99%" valign="middle">
																	<p align="left">
																	<select size="1" name="webdown" style="width: 130">
																	<?
																		$result = mysql_query("select * from doc_files where doc_files_status=0 and doc_files_categoriesid=1 order by doc_files_dateadded desc",$con);
																		while(($row=mysql_fetch_assoc($result)))
																		{
																			echo '<option value="'.$row['doc_files_id'].'">'.$row['doc_files_name'].'</option>';
																		}
																	?>																	
																	</select>&nbsp;
																	<img border="0" src="../images/ZA101776221033.gif" width="20" height="28" align="middle" onclick="window.location='./?frame=edocdown&id='+webdown.value" style="CURSOR:hand" title="Download"></td>
																				</tr>
																			<tr><td height="5"></td></tr>
																		</table>
																		</td>
																	</tr>
																</table>
									</td>
															</tr>
							</table>
							