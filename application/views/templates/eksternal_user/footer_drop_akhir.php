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

<!--begin::Page Scripts(used by this page)-->
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/requirement_alert.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->
<script src="<?= base_url('assets_pengguna/') ?>js/js_pengguna/datatabledetail.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->

<script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>

<!--dropzone-->
<script>
  //Event ketika upload foto
  Dropzone.autoDiscover = false;

  var foto_upload = new Dropzone("#file_upload_akhir", {
    url: "<?php echo base_url("Pekerjaan/upload_akhir"); ?>",
    method: "post",
    acceptedFiles: "image/*",
    paramName: "userfile",
    dictInvalidFileType: "Tipe file ini tidak dizinkan",
    addRemoveLinks: true,
    parallelUploads: 6,
    autoProcessQueue: false,
    maxFiles: 6,
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

      var submitButton = document.querySelector("#upload_btn");
      myDropzone = this;
      submitButton.addEventListener("click", function() {
        if (myDropzone.getQueuedFiles().length >= 1) {
          myDropzone.processQueue();
        } else {
          Swal.fire({
            title: 'Tolong masukan gambar sebelum menekan tombol unggah',

          });
        }
      });
    }
  });

  //Event ketika Memulai mengupload
  foto_upload.on("sending", function(a, b, c) {
    a.token = Math.random();
    c.append("token_foto", a.token); //Menmpersiapkan token untuk masing masing foto
  });

  //Event ketika foto dihapus
  foto_upload.on("removedfile", function(a) {
    var token = a.token;
    $.ajax({
      type: "post",
      data: {
        token: token
      },
      url: "<?php echo base_url("Pekerjaan/remove_foto_akhir"); ?>",
      cache: false,
      dataType: 'json',
      success: function() {
        Swal.fire({
          toast: true,
          icon: 'success',
          title: 'Gambar berhasil dihapus',
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
        $('#upload_btn').removeClass("disabled");
      },
      error: function() {
        console.log("Error");
      }
    });
  });
</script>

<script>
  //Event ketika upload foto TTD
  Dropzone.autoDiscover = false;

  var foto_upload_ttd = new Dropzone("#file_upload_ttd", {
    url: "<?php echo base_url("Pekerjaan/upload_ttd"); ?>",
    method: "post",
    acceptedFiles: "image/*",
    paramName: "ttd",
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

      var submitButtonttd = document.querySelector("#upload_ttd");
      myDropzonettd = this;
      submitButtonttd.addEventListener("click", function() {
        if (myDropzonettd.getQueuedFiles().length == 1) {
          myDropzonettd.processQueue();
          $("a").removeClass("disabled");
          $('#upload_ttd').attr("disabled", true);
          $('#upload_ttd').css({
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
  foto_upload_ttd.on("sending", function(a, b, c) {
    a.token = Math.random();
    c.append("token_foto_TTD", a.token); //Menmpersiapkan token untuk masing masing foto
  });

  //Event ketika foto dihapus TTD
  foto_upload_ttd.on("removedfile", function(a) {
    var token = a.token;
    $.ajax({
      type: "post",
      data: {
        token: token
      },
      url: "<?php echo base_url("Pekerjaan/remove_foto_TTD"); ?>",
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
        $('#upload_ttd').attr("disabled", false);
        $('#upload_ttd').css({
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

</body>
<!--end::Body-->


</html>