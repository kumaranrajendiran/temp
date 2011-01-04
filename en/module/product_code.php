<?
$products_id=$_REQUEST['p'];

$pro=GetProductInfo($products_id);
if ($pro)
{
?>
<tr>
								<td style="border-style: solid; border-width: 1px" bordercolor="#6BBE88">
								<div align="center">
									<table border="0" width="95%" id="table31" cellspacing="0" cellpadding="0">
										<tr>
											<td><br><b><? echo $pro['products_name'];?></b></td>
										</tr>
										<tr><td>&nbsp;</td></tr>
										<tr>
											<td>
											<div align="center">
												<table border="0" width="95%" id="table32" cellspacing="0" cellpadding="0">
													<tr>
														<td>
														<? if (($pro['products_image']!='')||($pro['products_image_large']!='')){ ?>
															<img border="0" src="<? if ($pro['products_image_large']!='') echo $pro['products_image_large']; else echo $pro['products_image']; ?>" width="127" height="95" align="right" hspace="5" vspace="5">
														<?}?>
														<? echo $pro['products_description'];?><br>
														</td>
													</tr>
												</table>
											</div>
											</td>
										</tr>
										<tr>
											<td>
											&nbsp;</td>
										</tr>
									</table>
								</div>
								</td>
							</tr>




<?
}
?>
<br>