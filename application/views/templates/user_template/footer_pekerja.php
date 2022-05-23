					<!--begin::Footer-->
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2021©</span>
								<a href="#" class="text-dark-75 text-hover-primary">PT INTI</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
					</div>
					<!--end::Wrapper-->
					</div>
					<!--end::Page-->
					</div>
					<!--end::Main-->


					<script>
						var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
					</script>
					<!--begin::Global Config(global config for global JS scripts)-->
					<script>
						var KTAppSettings = {
							"breakpoints": {
								"sm": 576,
								"md": 768,
								"lg": 992,
								"xl": 1200,
								"xxl": 1200
							},
							"colors": {
								"theme": {
									"base": {
										"white": "#ffffff",
										"primary": "#6993FF",
										"secondary": "#E5EAEE",
										"success": "#1BC5BD",
										"info": "#8950FC",
										"warning": "#FFA800",
										"danger": "#F64E60",
										"light": "#F3F6F9",
										"dark": "#212121"
									},
									"light": {
										"white": "#ffffff",
										"primary": "#E1E9FF",
										"secondary": "#ECF0F3",
										"success": "#C9F7F5",
										"info": "#EEE5FF",
										"warning": "#FFF4DE",
										"danger": "#FFE2E5",
										"light": "#F3F6F9",
										"dark": "#D6D6E0"
									},
									"inverse": {
										"white": "#ffffff",
										"primary": "#ffffff",
										"secondary": "#212121",
										"success": "#ffffff",
										"info": "#ffffff",
										"warning": "#ffffff",
										"danger": "#ffffff",
										"light": "#464E5F",
										"dark": "#ffffff"
									}
								},
								"gray": {
									"gray-100": "#F3F6F9",
									"gray-200": "#ECF0F3",
									"gray-300": "#E5EAEE",
									"gray-400": "#D6D6E0",
									"gray-500": "#B5B5C3",
									"gray-600": "#80808F",
									"gray-700": "#464E5F",
									"gray-800": "#1B283F",
									"gray-900": "#212121"
								}
							},
							"font-family": "Poppins"
						};
					</script>

					<!--end::Global Config-->
					<!--begin::Global Theme Bundle(used by all pages)-->
					<script src="<?= base_url('assets_pengguna/') ?>plugins/global/plugins.bundle.js"></script>
					<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/prismjs/prismjs.bundle.js"></script>
					<script src="<?= base_url('assets_pengguna/') ?>js/scripts.bundle.js"></script>
					<!--end::Global Theme Bundle-->
					<!--begin::Page Vendors(used by this page)-->
					<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
					<!--end::Page Vendors-->
					<!--begin::Page Scripts(used by this page)-->
					<script src="<?= base_url('assets_pengguna/') ?>js/pages/widgets.js"></script>
					<!--end::Page Scripts-->

					<!--begin::Page Vendors(used by this page)-->
					<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
					<!--end::Page Vendors-->

					<!--begin::Page Scripts(used by this page)-->
					<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables.js"></script>
					<!--end::Page Scripts-->

					<!--begin::Page Scripts(used by this page)-->
					<script src="<?= base_url('assets_pengguna/') ?>js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
					<!--end::Page Scripts-->

					<!--begin::Page Scripts(used by this page)-->
					<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/minimize.js"></script>
					<!--end::Page Scripts-->

					<!--begin::Page Scripts(used by this page)-->
					<script src="<?= base_url('assets_pengguna/') ?>js/pages/custom/wizard/wizard-6.js"></script>
					<!--end::Page Scripts-->

					<!--begin::Page Scripts(used by this page)-->
					<script src="<?= base_url('assets_pengguna/') ?>js/pages/widgets.js"></script>
					<script src="<?= base_url('assets_pengguna/') ?>js/pages/custom/profile/profile.js"></script>
					<!--end::Page Scripts-->

					<!--begin::Page Scripts(used by this page)-->
					<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/requirement_alert.js"></script>
					<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/lightbox.js"></script>
					<script src="<?= base_url('assets_pengguna/') ?>galery/js/gallery.js"></script>
					<!--end::Page Scripts-->

					<script>
						var a = new FgGallery('.fg-gallery', {
							cols: 4,
							style: {
								border: '10px solid #fff',
								height: '180px',
								borderRadius: '5px',
								boxShadow: '0 2px 10px -5px #858585',
							}
						})

						var a = new FgGallery('.ns', {
							cols: 4,
							style: {
								border: '0 solid #fff',
								height: '240px',
								borderRadius: '5px',
							}
						})
					</script>

					<!-- Tombol Tambah Banyak-->
					<?php foreach ($izin as $izn) : ?>
						<script>
							$('.tomboltambahbanyak').click(function(e) {
								e.preventDefault();
								$.ajax({
									type: 'ajax',
									url: "<?= base_url('workpermit/formtambahbanyak/' . $izn['id'] . "/" . $izn['id_complain'] . "/" . $izn['lokasi_pekerjaan']); ?>",
									dataType: "json",
									beforeSend: function() {
										$('.viewdata').html('<i class="fa fa-spin fa-spinner"></i>')
									},
									success: function(response) {
										$('.viewdata').html(response.data).show();
									},
									error: function(xhr, ajaxOptions, thrownError) {
										alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
									}
								});
							});
						</script>
					<?php endforeach; ?>
					</body>
					<!--end::Body-->


					</html>