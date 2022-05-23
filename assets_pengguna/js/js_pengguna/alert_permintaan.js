"use strict";

// Class Definition
var PermintaanLayanan = function() {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _addpermintaanlayanan = function() {
		// Base elements
		var form = KTUtil.getById('kt_add_permintaan_layanan_form');
        var validationAddPermintaanLayanan;

		if (!form) {
			return;
		}

        validationAddPermintaanLayanan = FormValidation.formValidation(
			form,
			{
				fields: {             
                    permintaan: {
                        validators: {
                            notEmpty: {
                                message: 'Layanan Permintaan diperlukan'
                            } 
                        }
                    },
                    judul_permintaan: {
                        validators: {
                            notEmpty: {
                                message: 'Judul Permintaan diperlukan'
                            } 
                        }
                    },
                    jenis_permintaan_layanan: {
                        validators: {
                            notEmpty: {
                                message: 'Jenis Layanan Permintaan diperlukan'
                            } 
                        }
                    },
                    deskripsi: {
                        validators: {
                            notEmpty: {
                                message: 'Deskripsi Permintaan diperlukan'
                            } 
                        }
                    },
                    nm_atasan: {
                        validators: {
                            notEmpty: {
                                message: 'Nama Atasan Permintaan diperlukan'
                            } 
                        }
                    },
                    em_atasan: {
                        validators: {
                            notEmpty: {
                                message: 'Email Atasan Permintaan diperlukan'
                            } 
                        }
                    },
                    no_atasan: {
                        validators: {
                            notEmpty: {
                                message: 'No Atasan Permintaan diperlukan'
                            } 
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					}),
				},
			}
		);

		$('#simpan_add_permintaan_layanan').on('click', function (e) {
            e.preventDefault();
    
            validationAddPermintaanLayanan.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Data permintaan layanan berhasil ditambahkan!",
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
        });
    };

    var _editpermintaanlayanan = function() {
		// Base elements
		var form = KTUtil.getById('kt_edit_permintaan_layanan_form');
        var validationEditPermintaanLayanan;

		if (!form) {
			return;
		}

        validationEditPermintaanLayanan = FormValidation.formValidation(
			form,
			{
				fields: {             
                    edit_permintaan: {
                        validators: {
                            notEmpty: {
                                message: 'Layanan Permintaan diperlukan'
                            } 
                        }
                    },
                    edit_judul_permintaan: {
                        validators: {
                            notEmpty: {
                                message: 'Judul Permintaan diperlukan'
                            } 
                        }
                    },
                    edit_jenis_permintaan_layanan: {
                        validators: {
                            notEmpty: {
                                message: 'Jenis Layanan Permintaan diperlukan'
                            } 
                        }
                    },
                    edit_deskripsi: {
                        validators: {
                            notEmpty: {
                                message: 'Deskripsi Permintaan diperlukan'
                            } 
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					}),
				},
			}
		);

		$('#simpan_edit_permintaan_layanan').on('click', function (e) {
            e.preventDefault();
    
            validationEditPermintaanLayanan.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Data permintaan layanan berhasil diedit!",
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
        });
    };

    // Public Functions
    return {
        init: function() {
			_addpermintaanlayanan();
			_editpermintaanlayanan();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    PermintaanLayanan.init();
});
