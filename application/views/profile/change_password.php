					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Mobile Toggle-->
									<button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
										<span></span>
									</button>
									<!--end::Mobile Toggle-->
									<!--begin::Heading-->
									<div class="d-flex flex-column">
										<!--begin::Title-->
										<h2 class="text-white font-weight-bold my-2 mr-5">PROFIL</h2>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<div class="d-flex align-items-center font-weight-bold my-2">
											<!--begin::Item-->
											<a href="#" class="opacity-75 hover-opacity-100">
												<i class="flaticon2-shelter text-white icon-1x"></i>
											</a>
											<!--end::Item-->
											<!--begin::Item-->
											<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
											<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Profil</a>
											<!--end::Item-->
											<!--begin::Item-->
											<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
											<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Ganti kata sandi</a>
											<!--end::Item-->
										</div>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Heading-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<?php foreach ($user2 as $usr) : ?>
									<?php
									$password_hash = $usr['password'];
									$password = "1234";
									if (password_verify($password, $password_hash)) : ?>
										<div class="d-flex align-items-center">
											<!--begin::Button-->
											<button disabled style="opacity: 0.65; cursor: not-allowed;" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Beranda</button>
											<!--end::Button-->
										</div>
									<?php else : ?>
										<div class="d-flex align-items-center">
											<!--begin::Button-->
											<a href="<?= base_url('beranda'); ?>" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Beranda</a>
											<!--end::Button-->
										</div>
									<?php endif ?>
								<?php endforeach; ?>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile Change Password-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
										<!--begin::Profile Card-->
										<div class="card card-custom card-stretch">
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::User-->
												<div class="d-flex align-items-center">
													<div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
														<div class="symbol-label" style="background-image:url('<?= base_url('assets/img/profile/') . $user['image']; ?>')"></div>
														<i class="symbol-badge bg-success"></i>
													</div>
													<div>
														<a style="cursor: pointer;" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"><?= $user['name']; ?></a>
														<div class="text-muted"><?= $role_user[0]['role']; ?></div>
													</div>
												</div>
												<!--end::User-->
												<!--begin::Contact-->
												<div class="py-9">
													<div class="d-flex align-items-center justify-content-between mb-2">
														<span class="font-weight-bold mr-2">Email:</span>
														<a style="cursor: pointer;" class="text-muted text-hover-primary"><?= $user['email']; ?></a>
													</div>
													<div class="d-flex align-items-center justify-content-between mb-2">
														<span class="font-weight-bold mr-2">Telepon:</span>
														<span class="text-muted"><?php if ($detail_user == '') {
																						echo "belum diisi";
																					} elseif ($detail_user != '') {
																						echo $detail_user[0]['nomer_telepon'];
																					} ?></span>
													</div>
												</div>
												<!--end::Contact-->
												<!--begin::Nav-->
												<div class="navi navi-bold navi-hover navi-active navi-link-rounded">
													<div class="navi-item mb-2">
														<a href="<?= base_url('profile/myprofile'); ?>" class="navi-link py-4">
															<span class="navi-icon mr-2">
																<span class="svg-icon svg-icon-success">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24" />
																			<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																			<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</span>
															<span class="navi-text font-size-lg">Informasi pribadi</span>
														</a>
													</div>
													<div class="navi-item mb-2">
														<a href="<?= base_url('profile/changepassword'); ?>" class="navi-link py-4 active">
															<span class="navi-icon mr-2">
																<span class="svg-icon svg-icon-danger">
																	<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Chat-locked.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5" />
																			<path d="M16,10 L16,9.5 C16,8.11928813 14.8807119,7 13.5,7 C12.1192881,7 11,8.11928813 11,9.5 L11,10 C10.4477153,10 10,10.4477153 10,11 L10,14 C10,14.5522847 10.4477153,15 11,15 L16,15 C16.5522847,15 17,14.5522847 17,14 L17,11 C17,10.4477153 16.5522847,10 16,10 Z M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M13.5,8 L13.5,8 C14.3284271,8 15,8.67157288 15,9.5 L15,10 L12,10 L12,9.5 C12,8.67157288 12.6715729,8 13.5,8 Z" fill="#000000" />
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</span>
															<span class="navi-text font-size-lg">Ganti kata sandi akun</span>
															<span class="navi-label">
																<span class="label label-light-danger label-rounded font-weight-bold">!</span>
															</span>
														</a>
													</div>
												</div>
												<!--end::Nav-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Profile Card-->
									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-8">
										<!--begin::Card-->
										<div class="card card-custom">
											<!--begin::Header-->

											<!--end::Header-->
											<form action="<?= base_url('profile/changepassword'); ?>" method="POST" novalidate="novalidate" id="kt_change_password_form">
												<div class="card-header py-3">
													<div class="card-title align-items-start flex-column">
														<h3 class="card-label font-weight-bolder text-dark">Ganti kata sandi</h3>
														<span class="text-muted font-weight-bold font-size-sm mt-1">Ubah kata sandi akun Anda</span>
														<div class="card-toolbar float-right">
															<button type="submit" id="simpan_change_password" class="btn btn-success mr-2">Simpan</button>
															<button type="reset" class="btn btn-secondary">Batal</button>
														</div>
													</div>
												</div>

												<!--begin::Form-->
												<div class="card-body">
													<!--begin::Alert-->
													<?= $this->session->flashdata('message'); ?>
													<!--end::Alert-->
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label text-alert" for="current_password">kata sandi saat ini</label>
														<div class="col-lg-9 col-xl-6">
															<input type="password" class="form-control form-control-lg form-control-solid" name="current_password" placeholder="kata sandi saat ini">
															<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
															<a href="#" class="text-sm font-weight-bold float-right">Tidak ingat kata sandi ?</a>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label text-alert" for="new_password1">kata sandi baru</label>
														<div class="col-lg-9 col-xl-6">
															<input type="password" class="form-control form-control-lg form-control-solid" name="new_password1" placeholder="kata sandi baru">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label text-alert" for="new_password2">Konfirmasi Kata Sandi</label>
														<div class="col-lg-9 col-xl-6">
															<input type="password" class="form-control form-control-lg form-control-solid" name="new_password2" placeholder="Verifikasi Kata Sandi">
														</div>
													</div>
												</div>
											</form>
											<!--end::Form-->


										</div>
									</div>
									<!--end::Content-->
								</div>
								<!--end::Profile Change Password-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->