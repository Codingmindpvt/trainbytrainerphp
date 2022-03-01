<!DOCTYPE html>
<html>
<body>
	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#f9f9f9" id="bodyTable">
	<tbody>
		<tr>
			<td style="padding-right:10px;padding-left:10px;" align="center" valign="top" id="bodyCell">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperBody" style="max-width:600px">
					<tbody>
						<tr>
							<td align="center" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard" style="background-color:#fff;border-color:#e5e5e5;border-style:solid;border-width:0 1px 1px 1px;">
									<tbody>
										<tr>
											<td style="background-color:#002395;font-size:1px;line-height:3px" class="topBorder" height="5">&nbsp;</td>
										</tr>
										<!-- logo -->
										<tr>
											<td style="padding-top: 60px; padding-bottom: 20px;" align="center" valign="middle" class="emailLogo">
												<a href="#" style="text-decoration:none" target="_blank">
													<img alt="" border="0" src="{{ asset('public/images/logo.png') }}" style="width:100%;max-width:150px;height:auto;display:block" width="150">
												</a>
											</td>
										</tr>
									<!-- full name -->
										<tr>
											<td style="padding-bottom: 5px; padding-left: 20px; padding-right: 20px;" align="center" valign="top" class="mainTitle">
												<h2 class="text" style="color:#474646;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0">Hi "{{ $full_name }}"</h2>
											</td>
										</tr>

										<!-- sub heading -->
										<tr>
											<td style="padding-bottom: 30px; padding-left: 20px; padding-right: 20px;" align="center" valign="top" class="subTitle">
												<h4 class="text" style="color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0">Verification Request of Coach Profile</h4>
											</td>
										</tr>
										<tr>
											<td style="padding-left:20px;padding-right:20px" align="center" valign="top" class="containtTable ui-sortable">

												<!-- content -->
												<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableDescription" style="">
													<tbody>
														<tr>
															<td style="padding-bottom: 20px;" align="center" valign="top" class="description">
																<p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;text-align:center;padding:0;margin:0">
																	{{ $content }}
																</p>
															</td>
														</tr>
													</tbody>
												</table>

												<!-- button -->
												<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableButton" style="">
													<tbody>
														<tr>
															<td style="padding-top:20px;padding-bottom:20px" align="center" valign="top">
																<table border="0" cellpadding="0" cellspacing="0" align="center">
																	<tbody>
																		<tr>
																			<td style="background-color: rgb(26, 203, 170); padding: 12px 35px; border-radius: 50px;" align="center" class="ctaButton"> <a href="{{ $link }}" style="color:#fff;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:13px;font-weight:600;font-style:normal;letter-spacing:1px;line-height:20px;text-transform:uppercase;text-decoration:none;display:block" target="_blank" class="text">GO TO DASHBOARD</a>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td style="font-size:1px;line-height:1px" height="20">&nbsp;</td>
										</tr>
										<tr>
											<td align="center" valign="middle" style="padding-bottom: ;" class="emailRegards">
												<!-- email Link // -->
												<p style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;text-align:center;padding:0;margin:0">If you have any questions, do contact us at <a href="mailto:{{ env('INFO_MAIL', FROM_EMAIL_ADDRESS)}}"  target="_blank" style="color:#1acbaa; text-decoration:none;">{{ env('INFO_MAIL', 'phpteam366@gmail.com')}}</a>. </p>
												<p align="left" style="color: #909090; padding: 10px;  font-size: 12px;">Kind Regards,<br>TrainByTrainer Team</p>

												<p style="color: #909090; padding: 10px; background-color: #d2f2eb; font-size: 12px;">This is an auto-generated email, please do not reply to this mail.</p>
											</td>

										</tr>
									</tbody>
								</table>
								<table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
									<tbody>
										<tr>
											<td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>