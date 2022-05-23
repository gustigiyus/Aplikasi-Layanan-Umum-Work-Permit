"use strict";

// Class Definition
var PeminjamanRuangan = function() {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _addpeminjamanruangan = function() {
		// Base elements
		var form = KTUtil.getById('kt_add_peminjaman_ruangan_form');
        var validationAddPeminjamanRuangan;

		if (!form) {
			return;
		}

        validationAddPeminjamanRuangan = FormValidation.formValidation(
			form,
			{
				fields: {             
                    kegiatan_pinjam: {
                        validators: {
                            notEmpty: {
                                message: 'Judul Kegiatan diperlukan'
                            }, 
                            stringLength: {
                                min: 5,
                                max: 40,
                                message: 'Judul Kegiatan tidak kurang dari 5 karakter dan tidak lebih dari 40 karakter'
                            },
                        }
                    },
                    ruang_pinjaman: {
                        validators: {
                            notEmpty: {
                                message: 'Ruangan diperlukan'
                            }, 
                        }
                    },
                    jenis_layout: {
                        validators: {
                            notEmpty: {
                                message: 'Jenis layout ruangan diperlukan'
                            }, 
                        }
                    },
                    waktu_mulai: {
                        validators: {
                            notEmpty: {
                                message: 'Waktu mulai peminjaman diperlukan'
                            }, 
                        }
                    },
                    waktu_selesai: {
                        validators: {
                            notEmpty: {
                                message: 'Waktu selesai peminjaman diperlukan'
                            }, 
                        }
                    },
                    tanggal_mulai: {
                        validators: {
                            notEmpty: {
                                message: 'Jenis mulai peminjaman diperlukan'
                            }, 
                        }
                    },
                    tanggal_selesai: {
                        validators: {
                            notEmpty: {
                                message: 'Tanggal selesai peminjaman diperlukan'
                            }, 
                        }
                    },
                    jml_orang: {
                        validators: {
                            notEmpty: {
                                message: 'Jumlah orang diperlukan'
                            },
                            digits: {
                                message: 'Format harus berupa digit'
                            } 
                        }
                    },
                    'perlengkapan[]': {
                        validators: {
                            choice: {
                                min:2,
                                message: 'Pilih minimal 2 jenis perlengkapan ruangan yang akan digunakan'
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

		$('#simpan_add_peminjaman_ruangan').on('click', function (e) {
            e.preventDefault();

            validationAddPeminjamanRuangan.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Data peminjaman rungan berhasil ditambahkan!",
                        icon: "success",
                        buttonsStyling: true,
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

    var _editpeminjamanruangan = function() {
		// Base elements
		var form_edit_peminjaman = KTUtil.getById('kt_edit_peminjaman_ruangan_form');
        var validationEditPeminjamanRuangan;
        var formEditButton = KTUtil.getById('simpan_edit_peminjaman_ruangan');

		if (!form_edit_peminjaman) {
			return;
		}

        validationEditPeminjamanRuangan = FormValidation.formValidation(
			form_edit_peminjaman,
			{
				fields: {             
                    edit_kegiatan_pinjam: {
                        validators: {
                            notEmpty: {
                                message: 'Judul Kegiatan diperlukan'
                            }, 
                            stringLength: {
                                min: 5,
                                max: 40,
                                message: 'Judul Kegiatan tidak kurang dari 5 karakter dan tidak lebih dari 40 karakter'
                            },
                        }
                    },
                    edit_ruang_pinjaman: {
                        validators: {
                            notEmpty: {
                                message: 'Ruangan diperlukan'
                            }, 
                        }
                    },
                    edit_jenis_layout: {
                        validators: {
                            notEmpty: {
                                message: 'Jenis layout ruangan diperlukan'
                            }, 
                        }
                    },
                    edit_waktu_mulai: {
                        validators: {
                            notEmpty: {
                                message: 'Waktu mulai peminjaman diperlukan'
                            }, 
                        }
                    },
                    edit_waktu_selesai: {
                        validators: {
                            notEmpty: {
                                message: 'Waktu selesai peminjaman diperlukan'
                            }, 
                        }
                    },
                    edit_tanggal_mulai: {
                        validators: {
                            notEmpty: {
                                message: 'Jenis mulai peminjaman diperlukan'
                            }, 
                        }
                    },
                    edit_tanggal_selesai: {
                        validators: {
                            notEmpty: {
                                message: 'Tanggal selesai peminjaman diperlukan'
                            }, 
                        }
                    },
                    edit_jml_orang: {
                        validators: {
                            notEmpty: {
                                message: 'Jumlah orang diperlukan'
                            },
                            digits: {
                                message: 'Format harus berupa digit'
                            } 
                        }
                    },
                    'edit_perlengkapan[]': {
                        validators: {
                            choice: {
                                min:2,
                                message: 'Pilih minimal 2 jenis perlengkapan ruangan yang akan digunakan'
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

		$('#simpan_edit_peminjaman_ruangan').on('click', function (e) {
            e.preventDefault();
    
            validationEditPeminjamanRuangan.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Data peminjaman ruangan berhasil diedit!",
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
    }

    // Public Functions
    return {
        init: function() {
			_addpeminjamanruangan();
			_editpeminjamanruangan();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    PeminjamanRuangan.init();
});
