<?
$adv_id=$_REQUEST['id'];

$pro=GetQuangcaoenInfo($adv_id);
if ($pro)
{
?>
<tr>
								<td style="border-style: solid; border-width: 1px" bordercolor="#6BBE88">
								<div align="center">
									<table border="0" width="95%" id="table31" cellspacing="0" cellpadding="0">
										<tr>
											<td><br><b><? echo $pro['adv_name'];?></b>&nbsp;<small style="color:#CCCCCC;">(<?=$pro['dateModify']?>)</small></td>
										</tr>
										<tr><td>&nbsp;</td></tr>
										<tr>
											<td>
											<div align="center">
												<table border="0" width="95%" id="table32" cellspacing="0" cellpadding="0">
													<tr>
														<td>
														<? if (($pro['adv_image_large']!='') || ($pro['adv_image']!=''))
														{ ?>
														<img border="0" src="<? if ($pro['adv_image_large']!='') echo $pro['adv_image_large']; else echo $pro['adv_image']; ?>" width="127" height="95" align="left" hspace="5" vspace="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<? }?>
														<? echo $pro['adv_description'];?><br>
														</td>
													</tr>
												</table>
											</div>
											</td>
										</tr>
										<tr>
											<td>&nbsp;
											</td>
										</tr>
									</table>
								</div>
								</td>
							</tr>




<?
}
?>
<br>