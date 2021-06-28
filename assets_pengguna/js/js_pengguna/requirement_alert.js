"use strict";

// Class Definition
var KTLogin = function() {

    var _handleSignInForm = function() {
        var validation;

        validation = FormValidation.formValidation(
			KTUtil.getById('kt_izin_kerja_form'),
			{
				fields: {
					nama_penanggung_jawab: {
						validators: {
							notEmpty: {
								message: 'Nama Penanggung jawab tidak boleh kosong.'
							}
						}
					},
					desk_kerja: {
						validators: {
							notEmpty: {
								message: 'Deskripsi Pekerjaan tidak boleh kosong.'
							}
						}
					},
					no_telp: {
						validators: {
							notEmpty: {
								message: 'No Telepon tidak boleh kosong.'
							},
							stringLength: {
								min: 10,
								message: 'Nomer Telepon tidak kurang dari 10 digit.'
							},
							digits: {
								message: 'Data harus berupa digit.'
							}
						}
					},
					tanggal: {
						validators: {
							notEmpty: {
								message: 'Tanggal tidak boleh kosong.'
							}
						}
					},
					waktu_mulai: {
						validators: {
							notEmpty: {
								message: 'Waktu Mulai tidak boleh kosong.'
							}
						}
					},
					waktu_akhir: {
						validators: {
							notEmpty: {
								message: 'Waktu Akhir tidak boleh kosong.'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_izin_submit').on('click', function (e) {
            e.preventDefault();
			Swal.fire({
				title: 'Apakah Anda ingin menyimpan perubahan?',
				showDenyButton: true,
				confirmButtonText: `Simpan`,
				denyButtonText: `Batal`,
			  }).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					validation.validate().then(function(status) {
						if (status == 'Valid') {
							swal.fire({
								text: "Data Izin kerja berhasil di tambahkan!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "OK mengerti!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function() {
								KTUtil.scrollTop();
							});
						} else {
							swal.fire({
								text: "Maaf, sepertinya ada beberapa data yang belum terisi, Coba lagi.",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "OK mengerti!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function() {
								KTUtil.scrollTop();
							});
						}
					});
				} else if (result.isDenied) {
				  Swal.fire('Perubahan tidak disimpan', '', 'info')
				}
			  })

        });
    };

    // Public Functions
    return {
        // public functions
        init: function() {

            _handleSignInForm();
        }
    };
}();


// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
