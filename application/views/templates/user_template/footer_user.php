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
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/wizard.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/imagecustom.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->
<script src="<?= base_url('assets_pengguna/') ?>js/pages/widgets.js"></script>
<script src="<?= base_url('assets_pengguna/') ?>js/pages/custom/profile/profile.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(Alert Form)-->
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/requirement_alert.js"></script>
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/complain.js"></script>
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_workpermit.js"></script>
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_manage.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(Alert Form)-->
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_button.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatabledetail.js"></script>
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/lightbox.js"></script>
<!--end::Page Scripts-->

<script src="<?= base_url('assets_pengguna/') ?>galery/js/gallery.js"></script>

<script>
	$('.custom-file-input').on('change', function() {
		let filename = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(filename);
	});
</script>

<script>
	$(document).ready(function() {
		$('#lightgallery').lightGallery();
	});
	$(document).ready(function() {
		$('#lightgallery2').lightGallery();
	});
	$(document).ready(function() {
		$('#lightgallery3').lightGallery();
	});
</script>

<script>
	function showPreview(event) {
		if (event.target.files.length > 0) {
			var src = URL.createObjectURL(event.target.files[0]);
			var preview = document.getElementById("file-ip-1-preview");
			preview.src = src;
			preview.style.display = "block";
		}
	}

	function showPreview2(event) {
		if (event.target.files.length > 0) {
			var src = URL.createObjectURL(event.target.files[0]);
			var preview = document.getElementById("file-ip-2-preview");
			preview.src = src;
			preview.style.display = "block";
		}
	}

	function showPreview3(event) {
		if (event.target.files.length > 0) {
			var src = URL.createObjectURL(event.target.files[0]);
			var preview = document.getElementById("file-ip-3-preview");
			preview.src = src;
			preview.style.display = "block";
		}
	}
</script>

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
		cols: 3,
		style: {
			border: '0 solid #fff',
			height: '240px',
			borderRadius: '5px',
		}
	})
</script>

</body>
<!--end::Body-->


</html>