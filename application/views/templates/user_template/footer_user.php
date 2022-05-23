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

<!----------------------------------------------- FOOTER BAGIAN HALAMAN UTAMA ---------------------------------------------->

<?php if ($title == "Beranda") : ?>
	<!-- Jika berada di halaman Beranda -->

<?php elseif ($title == "My Profile") : ?>
	<!-- Jika berada di halaman My Profile -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#cari_nama_atasan').on('input', function() {

				var cari_nama_atasan = $(this).val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('profile/proses_pencarian_nama_atasan') ?>",
					dataType: "JSON",
					data: {
						nama_atasan: cari_nama_atasan
					},
					cache: false,
					success: function(data) {
						$.each(data, function(nama_atasan, email, kode_atasan) {
							$('[name="nm_atasan"]').val(data.nama_atasan);
							$('[name="em_atasan"]').val(data.email);
							$('[name="divisi"]').val(data.divisi);
							$('[name="no_atasan"]').val(data.kode_atasan);
						});

					}
				});
				return false;
			});

		});
	</script>

<?php elseif ($title == "Change Password") : ?>
	<!-- Jika berada di halaman Change Password -->

	<!--begin::Page Scripts(Alert Form)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_change_password.js"></script>
	<!--end::Page Scripts-->


<?php elseif ($title == "Permintaan Layanan Karyawan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN KARYAWAN ---------------------------------------------->
	<!-- Jika berada di halaman Permintaan Layanan  Karyawan-->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables.js"></script>
	<!--end::Page Scripts-->
	<!--begin::Page Scripts(Alert)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_permintaan.js"></script>
	<!--end::Page Scripts-->

	<script>
		// Class definition

		var KTAutosize = function() {

			// Private functions
			var autosizetexarea = function() {
				// basic demo
				var txtarea = $('#kt_autosize_deskripsi');
				autosize(txtarea);
			}

			return {
				// public functions
				init: function() {
					autosizetexarea();
				}
			};
		}();

		jQuery(document).ready(function() {
			KTAutosize.init();
		});

		// Function Notifikasi Permintaan Layanan (ADD, EDIT)
		const flashDataPermintaanLayananKaryawan = $('.flash-DataPermintaanLayananKaryawan').data('flashdata');

		if (flashDataPermintaanLayananKaryawan) {
			const Toast = Swal.mixin({
				toast: true,
				timer: 6000,
				animation: true,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				position: 'top-end',
				showConfirmButton: false,
				html: '<div style="text-align: left; margin-left: 10px"><strong>Data Permintaan Layanan!</strong><br>' + flashDataPermintaanLayananKaryawan + '</div>'
			})
		};
	</script>

	<!--
	<script type="text/javascript">
		$("#permintaan").change(function() {
			var selected_option = $('#permintaan').val();

			// Jika Memilih Permintaan Baru, maka akan menghilangkan Atribut
			if (selected_option === 'Permintaan Baru') {
				$("#judul_permintaan").removeAttr('disabled');
				$(".sembunyiJudul").removeAttr('hidden');
			}
			// Jika Tidak Memilih Permintaan Baru, maka akan muncul Atribut
			if (selected_option != 'Permintaan Baru') {
				$("#judul_permintaan").attr('disabled', 'disabled');
				$(".sembunyiJudul").attr('hidden', 'hidden');
			}

			// Jika Memilih Permintaan Penanganan Gangguan, maka akan menghilangkan Atribut 
			if (selected_option === 'Penanganan Gangguan') {
				$("#jenis_permintaan_layanan").removeAttr('disabled');
				$(".sembunyiJenisPermintaan").removeAttr('hidden');
			}
			// Jika Tidak Memilih Permintaan Penanganan Gangguan, maka akan muncul Atribut
			if (selected_option != 'Penanganan Gangguan') {
				$("#jenis_permintaan_layanan").attr('disabled', 'disabled');
				$(".sembunyiJenisPermintaan").attr('hidden', 'hidden');
			}

		})
	</script>
-->

<?php elseif ($title == "Edit Permintaan Layanan Karaywan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN KARYAWAN ---------------------------------------------->
	<!-- Jika berada di halaman Edit Permintaan Layanan  Karyawan-->
	<!--begin::Page Scripts(Alert)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_permintaan.js"></script>
	<!--end::Page Scripts-->

	<script>
		// textarea example
		var KTAutosizeeditpermintaan = function() {

			// Private functions
			var autosizetexarea = function() {
				// basic demo
				var txtarea = $('#kt_autosize_editdeskripsi');
				autosize(txtarea);
			}

			return {
				// public functions
				init: function() {
					autosizetexarea();
				}
			};
		}();

		jQuery(document).ready(function() {
			KTAutosizeeditpermintaan.init();
		});
	</script>

	<script>
		// Class definition
		var KTBootstrapMaxlength = function() {

			// Private functions
			var maxlengthtextarea = function() {

				// textarea example
				$('#kt_autosize_editdeskripsi').maxlength({
					threshold: 180,
					warningClass: "label label-danger label-rounded label-inline",
					limitReachedClass: "label label-primary label-rounded label-inline",
					separator: ' dari ',
					postText: ' maximal karakter.'
				});
			}

			return {
				// public functions
				init: function() {
					maxlengthtextarea();
				}
			};
		}();

		jQuery(document).ready(function() {
			KTBootstrapMaxlength.init();
		});
	</script>

<?php elseif ($title == "Laporan Permintaan Layanan Karyawan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN KARYAWAN ---------------------------------------------->
	<!-- Jika berada di halaman Laporan permintaan Layanan Karyawan-->
	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables/datatables_laporan_permintaan_karyawan.js"></script>
	<!--end::Page Scripts-->

<?php elseif ($title == "Detail Permintaan Layanan Karyawan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN KARYAWAN ---------------------------------------------->
	<!-- Jika berada di halaman Detail permintaan Layanan  Karyawan-->

	<!-------------------------------------------------------------- BAGIAN UPLOAD TTD PENEMRIMA LAYANAN --------------------------------------------------------->
	<script>
		//Event ketika upload foto TTD
		Dropzone.autoDiscover = false;

		var foto_upload_ttd_penerima_layanan = new Dropzone("#file_upload_ttd_penerima_layanan", {
			url: "<?php echo base_url("permintaan_layanan/properti/upload_ttd_penerima_layanan/" . $no_permintaan_ttd_penerima_layanan); ?>",
			method: "post",
			acceptedFiles: "image/*",
			paramName: "ttd_penerima_layanan",
			dictInvalidFileType: "Tipe file ini tidak dizinkan",
			addRemoveLinks: true,
			autoProcessQueue: false,
			maxFiles: 1,
			maxFilesize: 1, //max file size in MB
			init: function() {
				this.on("error", function(file, message) {
					Swal.fire({
						title: message,
						timer: 1500,
						animation: true,
						showConfirmButton: false,
						position: 'top',
						showClass: {
							popup: 'animate__animated animate__fadeInDown'
						},
						hideClass: {
							popup: 'animate__animated animate__fadeOutUp'
						}
					});
					this.removeFile(file);
				});

				var submitButtonttdPenerimaLayanan = document.querySelector("#upload_ttd_penerima_layanan");
				myDropzonettdPenrimaLayanan = this;
				submitButtonttdPenerimaLayanan.addEventListener("click", function() {
					if (myDropzonettdPenrimaLayanan.getQueuedFiles().length == 1) {
						myDropzonettdPenrimaLayanan.processQueue();
						$("a").removeClass("disabled");
						$('#upload_ttd_penerima_layanan').attr("disabled", true);
						$('#upload_ttd_penerima_layanan').css({
							"opacity": 0.65,
							"cursor": "not-allowed"
						});
					} else {
						Swal.fire({
							title: 'Masukan Foto Tanda tangan yang telah anda buat'
						});
					}
				});
			}
		});

		//Event ketika Memulai mengupload TTD
		foto_upload_ttd_penerima_layanan.on("sending", function(a, b, c) {
			a.token = Math.random();
			c.append("token_TTD_penerima_layanan", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//Event ketika foto dihapus TTD
		foto_upload_ttd_penerima_layanan.on("removedfile", function(a) {
			var token_pmrm_lyn = a.token;
			$.ajax({
				type: "post",
				data: {
					token_penerima_layanan: token_pmrm_lyn
				},
				url: "<?php echo base_url("permintaan_layanan/properti/remove_foto_TTD_penerima_layanan"); ?>",
				cache: false,
				dataType: 'json',
				success: function() {
					Swal.fire({
						toast: true,
						icon: 'success',
						title: 'Tanda tangan berhasil dihapus',
						animation: true,
						position: 'top-right',
						showConfirmButton: false,
						timer: 1500,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					});
					$("a").addClass("disabled");
					$('#upload_ttd_penerima_layanan').attr("disabled", false);
					$('#upload_ttd_penerima_layanan').css({
						"opacity": '',
						"cursor": ''
					});
				},
				error: function() {
					console.log("Error");

				}
			});
		});

		//Alert ketika Submit Form
		document.querySelector("#selesaikan").addEventListener('click',
			function() {
				Swal.fire({
					icon: 'question',
					title: 'Apakah anda yakin ingin mengirim data ini sekarang?',
					showDenyButton: true,
					confirmButtonText: 'Kirim',
					denyButtonText: 'Batal',
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire({
							title: 'Sedang diproses!',
							html: 'Anda akan dialihkan dalam <b></b> milliseconds.',
							timer: 2500,
							timerProgressBar: true,
							didOpen: () => {
								Swal.showLoading()
								timerInterval = setInterval(() => {
									const content = Swal.getHtmlContainer()
									if (content) {
										const b = content.querySelector('b')
										if (b) {
											b.textContent = Swal.getTimerLeft()
										}
									}
								}, 100)
							},
							willClose: () => {
								clearInterval(timerInterval)
							}
						}).then(function(result) {
							window.location = "<?= base_url('workpermit/pekerjaan_emailsend') ?>";
						})
					} else if (result.isDenied) {
						Swal.fire('Data tidak dikirim', '', 'info')
					}
				})
			});
	</script>
	<!--end::Page Scripts-->


<?php elseif ($title == "Detail Laporan Permintaan Layanan Karyawan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN KARYAWAN ---------------------------------------------->
	<!-- Jika berada di halaman Detail Laporan Permintaan Layanan Karyawan -->

<?php elseif ($title == "Peminjaman Ruangan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN KARYAWAN ---------------------------------------------->
	<!-- Jika berada di halaman Peminjaman Ruangan -->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables.js"></script>
	<!--end::Page Scripts-->
	<!--begin::Page Scripts(Alert)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_peminjaman.js"></script>
	<!--end::Page Scripts-->

	<script>
		// Class definition
		var KTnoUiSliderDemos = function() {

			// Private functions
			var addnouisilder = function() {
				// init slider
				var slider = document.getElementById('kt_addnouislider_1');

				noUiSlider.create(slider, {
					start: [0],
					step: 1,
					range: {
						'min': [0],
						'max': [200]
					},
					format: wNumb({
						decimals: 0
					})
				});

				// init slider input
				var sliderInput = document.getElementById('kt_addnouislider_1_input');

				slider.noUiSlider.on('update', function(values, handle) {
					sliderInput.value = values[handle];
				});

				sliderInput.addEventListener('change', function() {
					slider.noUiSlider.set(this.value);
				});
			}

			return {
				// public functions
				init: function() {
					addnouisilder();
				}
			};
		}();

		jQuery(document).ready(function() {
			KTnoUiSliderDemos.init();
		});
	</script>

	<script>
		const flashDataPeminjaman = $('.flash-datapeminjaman').data('flashdata');

		if (flashDataPeminjaman) {
			const Toast = Swal.mixin({
				toast: true,
				timer: 6000,
				animation: true,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				position: 'top-end',
				showConfirmButton: false,
				html: '<div style="text-align: left; margin-left: 10px"><strong>Data Peminjaman!</strong><br>' + flashDataPeminjaman + '</div>'
			})
		}
	</script>

<?php elseif ($title == "Edit Peminjaman Ruangan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN KARYAWAN ---------------------------------------------->
	<!-- Jika berada di halaman Edit Peminjaman Ruangan Karyawan-->

	<!--begin::Page Scripts(Alert)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_peminjaman.js"></script>
	<!--end::Page Scripts-->

	<script>
		// Class definition
		var KTKBootstrapTouchspin = function() {

			// Private functions
			var edit_jmlh_orang = function() {
				// minimum setup
				$('#kt_touchspin_1').TouchSpin({
					buttondown_class: 'btn btn-secondary',
					buttonup_class: 'btn btn-secondary',

					min: 0,
					max: 200,
					step: 1,
					decimals: 0,
					boostat: 5,
					maxboostedstep: 10,
				});
			}

			return {
				// public functions
				init: function() {
					edit_jmlh_orang();
				}
			};
		}();

		jQuery(document).ready(function() {
			KTKBootstrapTouchspin.init();
		});
	</script>

<?php elseif ($title == "Laporan Peminjaman Ruangan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN KARYAWAN ---------------------------------------------->
	<!-- Jika berada di halaman Laporan Peminjaman Ruangan Karyawan-->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables/datatables_laporan_peminjaman_karyawan.js"></script>
	<!--end::Page Scripts-->

<?php elseif ($title == "Detail Data Peminjaman") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN KARYAWAN ---------------------------------------------->
	<!-- Jika berada di halaman Detail Laporan Data Peminjaman Ruangan Karyawan-->


<?php elseif ($title == "Laporan Permintaan Layanan Atasan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN ATASAN ---------------------------------------------->
	<!-- Jika berada di halaman Data Laporan Permintaan Layanan (Atasan) -->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables/datatables_laporan_permintaan_atasan.js"></script>
	<!--end::Page Scripts-->

<?php elseif ($title == "Laporan Charts") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN ATASAN ---------------------------------------------->
	<!-- Jika berada di halaman Data Laporan Chart Permintaan Layanan (Atasan) -->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables.js"></script>
	<!--end::Page Scripts-->

	<script>
		// Shared Colors Definition
		const primary = '#6993FF';
		const success = '#1BC5BD';
		const info = '#8950FC';
		const warning = '#FFA800';
		const danger = '#F64E60';

		var KTApexChartsDemo = function() {
			// Private functions

			var _chart_area1_banyak_permintaan = function() {
				const apexChart = "#chart_area1_banyak_permintaan";
				var options = {
					series: [{
						name: 'Banyak Permintaan',
						data: [
							<?php for ($i = 1; $i <= 12; $i++) :
								$nama_bulan = date('m', strtotime('+' . $i . 'month', strtotime('2020-12-01')));
								$bulan_akhir = date('Y-m-d', strtotime('+' . $i . 'month', strtotime('2020-12-30')));
								$bulan_awal = date('Y-m-d', strtotime('+' . $i . 'month', strtotime('2020-12-01')));

								$hasil = $this->db->select('*')

									->where('tanggal_ajukan >=', $bulan_awal)

									->where('tanggal_ajukan <=', $bulan_akhir)

									->get("tb_permintaan_layanan")

									->num_rows();
							?>

								'<?php if ($nama_bulan == '01') {
										echo $hasil;
									} elseif ($nama_bulan == '02') {
										echo $hasil;
									} elseif ($nama_bulan == '03') {
										echo $hasil;
									} elseif ($nama_bulan == '04') {
										echo $hasil;
									} elseif ($nama_bulan == '05') {
										echo $hasil;
									} elseif ($nama_bulan == '06') {
										echo $hasil;
									} elseif ($nama_bulan == '07') {
										echo $hasil;
									} elseif ($nama_bulan == '08') {
										echo $hasil;
									} elseif ($nama_bulan == '09') {
										echo $hasil;
									} elseif ($nama_bulan == '10') {
										echo $hasil;
									} elseif ($nama_bulan == '11') {
										echo $hasil;
									} elseif ($nama_bulan == '12') {
										echo $hasil;
									} ?>',
							<?php endfor; ?>
						]
					}],
					chart: {
						height: 350,
						type: 'line'
					},
					dataLabels: {
						enabled: false
					},
					stroke: {
						curve: 'smooth'
					},
					xaxis: {
						categories: [
							<?php for ($i = 1; $i <= 12; $i++) :
								$bulan = date('m', strtotime('+' . $i . 'month', strtotime('2020-12-01'))); ?>

								'<?php if ($bulan == '01') {
										echo "Januari";
									} elseif ($bulan == '02') {
										echo "Febuari";
									} elseif ($bulan == '03') {
										echo "Maret";
									} elseif ($bulan == '04') {
										echo "April";
									} elseif ($bulan == '05') {
										echo "Mei";
									} elseif ($bulan == '06') {
										echo "Juni";
									} elseif ($bulan == '07') {
										echo "Juli";
									} elseif ($bulan == '08') {
										echo "Agustus";
									} elseif ($bulan == '09') {
										echo "September";
									} elseif ($bulan == '10') {
										echo "Oktober";
									} elseif ($bulan == '11') {
										echo "November";
									} elseif ($bulan == '12') {
										echo "Desember";
									} ?>',
							<?php endfor; ?>
						],
					},
					colors: [primary, success]
				};

				var chart = new ApexCharts(document.querySelector(apexChart), options);
				chart.render();
			}

			var _demo11 = function() {
				const apexChart = "#chart_11";
				var options = {
					series: [<?= $layanan_mekanikal_elektrikal; ?>, <?= $layanan_kebersihan ?>, <?= $layanan_bangunan_gedung ?>],
					chart: {
						width: 510,
						type: 'donut',
					},
					labels: ['Layanan Mekanikal Elektrikal', 'Layanan Kebersihan', 'Layanan Bangunan Gedung'],
					responsive: [{
						breakpoint: 480,
						options: {
							chart: {
								width: 200
							},
							legend: {
								position: 'bottom'
							}
						}
					}],
					colors: [primary, success, warning, danger, info]
				};

				var chart = new ApexCharts(document.querySelector(apexChart), options);
				chart.render();
			}

			var _demo12 = function() {
				const apexChart = "#chart_12";
				var options = {
					series: [<?= $layanan_mekanikal_elektrikal; ?>, <?= $layanan_kebersihan ?>, <?= $layanan_bangunan_gedung ?>],
					chart: {
						width: 510,
						type: 'pie',
					},
					labels: ['Layanan Mekanikal Elektrikal', 'Layanan Kebersihan', 'Layanan Bangunan Gedung'],
					responsive: [{
						breakpoint: 480,
						options: {
							chart: {
								width: 300
							},
							legend: {
								position: 'bottom'
							}
						}
					}],
					colors: [primary, success, warning, danger, info]
				};

				var chart = new ApexCharts(document.querySelector(apexChart), options);
				chart.render();
			}
			return {
				// public functions
				init: function() {
					_chart_area1_banyak_permintaan();
					_demo11();
					_demo12();
				}
			};
		}();

		jQuery(document).ready(function() {
			KTApexChartsDemo.init();
		});
	</script>

<?php elseif ($title == "Data Permintaan Baru" or $title == "Data Penanganan Gangguan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN ATASAN ---------------------------------------------->
	<!-- Jika berada di halaman Data Permintaan Layanan Atasan-->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables.js"></script>
	<!--end::Page Scripts-->

<?php elseif ($title == "Laporan Detail Permintaan Layanan Atasan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN ATASAN ---------------------------------------------->
	<!-- Jika berada di halaman Laporan Detail Permintaan Layanan Atasan -->

<?php elseif ($title == "Kelola Permintaan Close Proses") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN ATASAN ---------------------------------------------->
	<!-- Jika berada di halaman Laporan Detail Permintaan Layanan Atasan -->

	<script>
		$('#form_close_permintan').on('submit', function(event) {
			event.preventDefault();
			Swal.fire({
				icon: 'question',
				title: 'Apakah anda yakin ingin menyimpan data ini?',
				showDenyButton: true,
				confirmButtonText: 'Kirim',
				denyButtonText: 'Batal',
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?= base_url('permintaan_layanan/properti/proses_kelola_permintaan_close'); ?>",
						method: "POST",
						data: $(this).serialize(),
						success: function(data) {
							$("html, body").animate({
								scrollTop: 0
							}, "slow", function() {
								Swal.fire({
									toast: true,
									icon: 'success',
									title: 'Data Permintaan Layanan berhasil ditutup',
									animation: true,
									position: 'top-right',
									showConfirmButton: false,
									timer: 3000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								});
							});
							setTimeout(function() { // Menunggu 3,8 detik kemudian relod halaman
								window.location = "<?= base_url('permintaan_layanan/laporan/atasan/') ?>";
							}, 3800);
						},
						error: function(xhr, ajaxOptions, thrownError) {
							alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
						}
					});
				} else if (result.isDenied) {
					Swal.fire('Data tidak dikirim', '', 'info')
				}
			})
			return false;
		});
	</script>

<?php elseif ($title == "Kelola Permintaan") : ?>
	<!-- Jika berada di halaman Kelola Data Permintaan Layanan Atasan -->

	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/repeater.js"></script>
	<!--end::Page Scripts-->

	<script>
		$(document).ready(function() {

			$("#repeater").createRepeater();

			$('#repeater_form').on('submit', function(event) {
				event.preventDefault();
				Swal.fire({
					icon: 'question',
					title: 'Apakah anda yakin ingin menyimpan data ini?',
					showDenyButton: true,
					confirmButtonText: 'Kirim',
					denyButtonText: 'Batal',
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: "<?= base_url('permintaan_layanan/properti/kelola_distribusi_pekerja'); ?>",
							method: "POST",
							data: $(this).serialize(),
							success: function(data) {
								window.location = "<?= base_url('permintaan_layanan/properti/kelola_permintaan/' . $no_permintaan . '#flashdatascroll') ?>";
								$(document).ready(function() {
									refreshTable();
								});

								function refreshTable() {
									$('#myTable').load('<?= base_url('permintaan_layanan/properti/getdatatable/' . $no_permintaan . '#flashdatascroll') ?>?time=' + new Date().getTime(), function() {
										setTimeout(refreshTable, 1000);
									});
								}
								setTimeout(function() {
									Swal.fire({
										toast: true,
										icon: 'success',
										title: 'Data Pekerja berhasil ditambahkan',
										animation: true,
										position: 'top-right',
										showConfirmButton: false,
										timer: 2000,
										timerProgressBar: true,
										didOpen: (toast) => {
											toast.addEventListener('mouseenter', Swal.stopTimer)
											toast.addEventListener('mouseleave', Swal.resumeTimer)
										}
									})
								}, 1000);
							},
							error: function(xhr, ajaxOptions, thrownError) {
								alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
							}
						});
					} else if (result.isDenied) {
						Swal.fire('Data tidak dikirim', '', 'info')
					}
				})
				return false;
			});

		});

		// Function Notifikasi Pekerja
		const flashData = $('.flash-data').data('flashdata');
		const flashDataHistori = $('.flash-datahistori').data('flashdata');

		if (flashData) {
			Swal.fire({
				title: 'Nasabah Gagal Ditambahkan',
				text: 'Mohon Maaf!' + flashData,
				icon: 'error'
			});
		}

		if (flashDataHistori) {
			Swal.fire({
				toast: true,
				icon: 'success',
				title: 'Data ' + flashDataHistori,
				animation: true,
				position: 'top-right',
				showConfirmButton: false,
				timer: 5000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			});
		}

		$('.hapus-distribusiPekejra').on('click', function(e) {

			e.preventDefault();
			const href = $(this).attr('href');

			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "akan menghapus data pekerja ini!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Iya, hapus'
			}).then((result) => {
				if (result.isConfirmed) {
					document.location.href = href;
				}
			})

		});
	</script>

	<!-------------------------------------------------------------- BAGIAN UPLOAD PEMERIKSAAN --------------------------------------------------------->
	<script>
		//Event ketika upload foto TTD
		Dropzone.autoDiscover = false;

		var foto_upload_ttd_pemeriksaan = new Dropzone("#file_upload_ttd_pemeriksaan", {
			url: "<?php echo base_url("permintaan_layanan/properti/upload_ttd_pemeriksaan/" . $no_permintaan); ?>",
			method: "post",
			acceptedFiles: "image/*",
			paramName: "ttd_pemeriksaan",
			dictInvalidFileType: "Tipe file ini tidak dizinkan",
			addRemoveLinks: true,
			autoProcessQueue: false,
			maxFiles: 1,
			maxFilesize: 1, //max file size in MB
			init: function() {
				this.on("error", function(file, message) {
					Swal.fire({
						title: message,
						timer: 1500,
						animation: true,
						showConfirmButton: false,
						position: 'top',
						showClass: {
							popup: 'animate__animated animate__fadeInDown'
						},
						hideClass: {
							popup: 'animate__animated animate__fadeOutUp'
						}
					});
					this.removeFile(file);
				});

				var submitButtonttdPemeriksaan = document.querySelector("#upload_ttd_pemeriksaan");
				myDropzonettdPemeriksaan = this;
				submitButtonttdPemeriksaan.addEventListener("click", function() {
					if (myDropzonettdPemeriksaan.getQueuedFiles().length == 1) {
						myDropzonettdPemeriksaan.processQueue();
						$('#tombol_data_pemeriksaan').removeAttr("disabled");
						$('#tombol_data_pemeriksaan').removeAttr("style");

						$('#upload_ttd_pemeriksaan').attr("disabled", true);
						$('#upload_ttd_pemeriksaan').css({
							"opacity": 0.65,
							"cursor": "not-allowed"
						});
					} else {
						Swal.fire({
							title: 'Masukan Foto Tanda tangan yang telah anda buat'
						});
					}
				});
			}
		});

		//Event ketika Memulai mengupload TTD
		foto_upload_ttd_pemeriksaan.on("sending", function(a, b, c) {
			a.token = Math.random();
			c.append("token_TTD_Pemeriksaan", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//Event ketika foto dihapus TTD
		foto_upload_ttd_pemeriksaan.on("removedfile", function(a) {
			var token = a.token;
			$.ajax({
				type: "post",
				data: {
					token: token
				},
				url: "<?php echo base_url("permintaan_layanan/properti/remove_foto_TTD_pemeriksaan/" . $no_permintaan); ?>",
				cache: false,
				dataType: 'json',
				success: function() {
					Swal.fire({
						toast: true,
						icon: 'success',
						title: 'Tanda tangan berhasil dihapus',
						animation: true,
						position: 'top-right',
						showConfirmButton: false,
						timer: 1500,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					});
					$('#tombol_data_pemeriksaan').attr("disabled", true);
					$('#tombol_data_pemeriksaan').css({
						"opacity": '0.5',
						"cursor": 'not-allowed'
					});

					$('#upload_ttd_pemeriksaan').attr("disabled", false);
					$('#upload_ttd_pemeriksaan').css({
						"opacity": '',
						"cursor": ''
					});
				},
				error: function() {
					console.log("Error");

				}
			});
		});
	</script>


	<script>
		$('#cencel_request_permintaan').on('click', function(event) {
			event.preventDefault();
			const url = $(this).attr('href');
			Swal.fire({
				title: 'Apakah anda yakin akan menolak permintaan layanan ini?',
				text: "Anda tidak dapat mengembalikan data ini!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				showDenyButton: true,
				confirmButtonText: 'Ya, Tolak Permintaan!',
				denyButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$("html, body").animate({
						scrollTop: 0
					}, "slow", function() {
						Swal.fire({
							toast: true,
							icon: 'success',
							title: 'Data Permintaan berhasil ditolak',
							animation: true,
							position: 'top-right',
							showConfirmButton: false,
							timer: 3000,
							timerProgressBar: true,
							didOpen: (toast) => {
								toast.addEventListener('mouseenter', Swal.stopTimer)
								toast.addEventListener('mouseleave', Swal.resumeTimer)
							}
						});
					});
					setTimeout(function() { // Menunggu 3,8 detik kemudian relod halaman
						window.location.href = url;
					}, 4000);
				} else if (result.isDenied) {
					Swal.fire('Data tidak dikirim', '', 'info')
				}
			})
		});
	</script>
	<!--end::Page Scripts-->

<?php elseif ($title == "Laporan Peminjaman Ruangan Atasan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN ATASAN ---------------------------------------------->
	<!-- Jika berada di halaman Laporan Peminjaman Ruangan Atasan-->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables/datatables_laporan_peminjaman_atasan.js"></script>
	<!--end::Page Scripts-->

<?php elseif ($title == "Detail Data Peminjaman Atasan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN ATASAN ---------------------------------------------->
	<!-- Jika berada di halaman Detail Laporan Peminjaman Ruangan Atasan-->

<?php elseif ($title == "Kelola Peminjaman") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN ATASAN ---------------------------------------------->
	<!-- Jika berada di halaman Kelola Peminjaman Ruangan Atasan-->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables.js"></script>
	<!--end::Page Scripts-->

<?php elseif ($title == "Edit Persetujuan Peminjaman Ruangan Atasan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN ATASAN ---------------------------------------------->
	<!-- Jika berada di halaman Edit Persetujuan Peminjaman Ruangan Atasan -->

	<!-------------------------------------------- BAGIAN UPLOAD PEMINJAMAN RUANGAN --------------------------------------------->
	<script>
		//Event ketika upload foto TTD Peminjaman
		Dropzone.autoDiscover = false;

		var foto_upload_ttd_peminjaman = new Dropzone("#file_upload_ttd_peminjaman_ruangan", {
			url: "<?php echo base_url("peminjaman_ruangan/peminjaman/upload_ttd_peminjaman/" . $no_peminjaman); ?>",
			method: "post",
			acceptedFiles: "image/*",
			paramName: "ttd_peminjaman",
			dictInvalidFileType: "Tipe file ini tidak dizinkan",
			addRemoveLinks: true,
			autoProcessQueue: false,
			maxFiles: 1,
			maxFilesize: 1, //max file size in MB
			init: function() {
				this.on("error", function(file, message) {
					Swal.fire({
						title: message,
						timer: 1500,
						animation: true,
						showConfirmButton: false,
						position: 'top',
						showClass: {
							popup: 'animate__animated animate__fadeInDown'
						},
						hideClass: {
							popup: 'animate__animated animate__fadeOutUp'
						}
					});
					this.removeFile(file);
				});

				var submitButtonttdPeminjaman = document.querySelector("#upload_btn_ttd_peminjaman_ruangan");
				myDropzonettdPeminjaman = this;
				submitButtonttdPeminjaman.addEventListener("click", function() {
					if (myDropzonettdPeminjaman.getQueuedFiles().length == 1) {
						myDropzonettdPeminjaman.processQueue();
						$('#tombol_data_setujui_peminjaman').removeAttr("disabled");
						$('#tombol_data_setujui_peminjaman').removeAttr("style");

						$('#upload_btn_ttd_peminjaman_ruangan').attr("disabled", true);
						$('#upload_btn_ttd_peminjaman_ruangan').css({
							"opacity": 0.65,
							"cursor": "not-allowed"
						});
					} else {
						Swal.fire({
							title: 'Masukan Foto Tanda tangan yang telah anda buat'
						});
					}
				});
			}
		});

		//Event ketika Memulai mengupload TTD
		foto_upload_ttd_peminjaman.on("sending", function(a, b, c) {
			a.token = Math.random();
			c.append("token_TTD_Peminjaman", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//Event ketika foto dihapus TTD
		foto_upload_ttd_peminjaman.on("removedfile", function(a) {
			var token_peminjaman = a.token;
			$.ajax({
				type: "post",
				data: {
					token: token_peminjaman
				},
				url: "<?php echo base_url("peminjaman_ruangan/peminjaman/remove_foto_TTD_peminjaman/" . $no_peminjaman); ?>",
				cache: false,
				dataType: 'json',
				success: function() {
					Swal.fire({
						toast: true,
						icon: 'success',
						title: 'Tanda tangan berhasil dihapus',
						animation: true,
						position: 'top-right',
						showConfirmButton: false,
						timer: 1500,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					});
					$('#tombol_data_setujui_peminjaman').attr("disabled", true);
					$('#tombol_data_setujui_peminjaman').css({
						"opacity": '0.5',
						"cursor": 'not-allowed'
					});

					$('#upload_btn_ttd_peminjaman_ruangan').attr("disabled", false);
					$('#upload_btn_ttd_peminjaman_ruangan').css({
						"opacity": '',
						"cursor": ''
					});
				},
				error: function() {
					console.log("Error");

				}
			});
		});
	</script>

	<script>
		$('#form_close_peminjaman').on('submit', function(event) {
			event.preventDefault();
			Swal.fire({
				icon: 'question',
				title: 'Apakah anda yakin ingin menyetujui data peminjaman ruangan ini?',
				showDenyButton: true,
				confirmButtonText: 'Setujui',
				denyButtonText: 'Batal',
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?= base_url('peminjaman_ruangan/peminjaman/proses_kelola_peminjaman_close'); ?>",
						method: "POST",
						data: $(this).serialize(),
						success: function(data) {
							$("html, body").animate({
								scrollTop: 0
							}, "slow", function() {
								Swal.fire({
									toast: true,
									icon: 'success',
									title: 'Data Peminjaman Ruangan berhasil disetujui',
									animation: true,
									position: 'top-right',
									showConfirmButton: false,
									timer: 3000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								});
							});
							setTimeout(function() { // Menunggu 3,8 detik kemudian relod halaman
								window.location = "<?= base_url('peminjaman_ruangan/peminjaman/kelola_peminjaman') ?>";
							}, 3800);
						},
						error: function(xhr, ajaxOptions, thrownError) {
							alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
						}
					});
				} else if (result.isDenied) {
					Swal.fire('Data tidak dikirim', '', 'info')
				}
			})
			return false;
		});

		$('#cencel_request').on('click', function(event) {
			event.preventDefault();
			const url = $(this).attr('href');
			Swal.fire({
				title: 'Apakah anda yakin akan menolak peminjaman ruangan ini?',
				text: "Anda tidak dapat mengembalikan data ini!",
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				showDenyButton: true,
				confirmButtonText: 'Ya, Tolak Peminjaman!',
				denyButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$("html, body").animate({
						scrollTop: 0
					}, "slow", function() {
						Swal.fire({
							toast: true,
							icon: 'success',
							title: 'Data Peminjaman berhasil ditolak',
							animation: true,
							position: 'top-right',
							showConfirmButton: false,
							timer: 3000,
							timerProgressBar: true,
							didOpen: (toast) => {
								toast.addEventListener('mouseenter', Swal.stopTimer)
								toast.addEventListener('mouseleave', Swal.resumeTimer)
							}
						});
					});
					setTimeout(function() { // Menunggu 3,8 detik kemudian relod halaman
						window.location.href = url;
					}, 4000);
				} else if (result.isDenied) {
					Swal.fire('Data tidak dikirim', '', 'info')
				}
			})
		});
	</script>
	<!--end::Page Scripts-->

<?php elseif ($title == "Data Complain") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN COMPLAIN & WORKPERMIT ---------------------------------------------->
	<!-- Jika berada di halaman Complain -->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables/datatables_complain.js"></script>
	<!--end::Page Scripts-->
	<!--begin::Page Scripts(Alert)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/complain.js"></script>
	<!--end::Page Scripts-->

	<!--begin::Page Scripts(Gallery)-->
	<script src="<?= base_url('assets_pengguna/') ?>galery/js/gallery.js"></script>

	<script>
		$('.custom-file-input').on('change', function() {
			let filename = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass("selected").html(filename);
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
			cols: 3,
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
	<!--end::Page Scripts-->

<?php elseif ($title == "Laporan Complain") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN COMPLAIN & WORKPERMIT ---------------------------------------------->
	<!-- Jika berada di halaman Complain -->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables/datatables_laporan_complain.js"></script>
	<!--end::Page Scripts-->

	<!--begin::Page Scripts(Gallery)-->
	<script src="<?= base_url('assets_pengguna/') ?>galery/js/gallery.js"></script>

	<script>
		var a = new FgGallery('.fg-gallery', {
			cols: 3,
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
	<!--end::Page Scripts-->

<?php elseif ($title == "Pengajuan Izin Kerja") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN COMPLAIN & WORKPERMIT ---------------------------------------------->
	<!-- Jika berada di halaman Wrokpermit -->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables/datatables_izin_kerja.js"></script>
	<!--end::Page Scripts-->

	<!--begin::Page Scripts(Gallery)-->
	<script src="<?= base_url('assets_pengguna/') ?>galery/js/gallery.js"></script>

	<script>
		var a = new FgGallery('.fg-gallery', {
			cols: 3,
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
	<!--end::Page Scripts-->

<?php elseif ($title == "Data Pekerjaan") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN COMPLAIN & WORKPERMIT ---------------------------------------------->
	<!-- Jika berada di halaman Wrokpermit -->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables/datatables_data_pekerjaan.js"></script>
	<!--end::Page Scripts-->

	<!--begin::Page Scripts(Gallery)-->
	<script src="<?= base_url('assets_pengguna/') ?>galery/js/gallery.js"></script>

	<script>
		var a = new FgGallery('.fg-gallery', {
			cols: 3,
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
	<!--end::Page Scripts-->

<?php elseif ($title == "Laporan Workpermit") : ?>
	<!----------------------------------------------- FOOTER BAGIAN HALAMAN COMPLAIN & WORKPERMIT ---------------------------------------------->
	<!-- Jika berada di halaman Wrokpermit -->

	<!--begin::Page Datatables-->
	<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors-->
	<!--begin::Page Scripts(Datatable)-->
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatables/datatables_laporan_izin_kerja_tenant.js"></script>
	<!--end::Page Scripts-->

<?php else : ?>

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
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_workpermit.js"></script>
	<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/alert_manage.js"></script>
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

<?php endif ?>

</body>
<!--end::Body-->


</html>