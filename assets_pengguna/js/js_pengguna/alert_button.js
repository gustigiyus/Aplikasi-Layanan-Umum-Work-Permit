"use strict";

// Class Definition
var ChangePassword = function() {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _handlechangepassword = function() {
		// Base elements
		var form = KTUtil.getById('kt_change_password_form');
        var validationAddComplain;

		if (!form) {
			return;
		}

        validationAddComplain = FormValidation.formValidation(
			form,
			{
				fields: {
					current_password: {
						validators: {
							notEmpty: {
								message: 'Kata sandi diperlukan'
							}
						}
					},             
                    new_password1: {
                        validators: {
                            notEmpty: {
                                message: 'Kata sandi diperlukan'
                            }, 
                            stringLength: {
                                min: 8,
                                max: 20,
                                message: 'Kata sandi tidak kurang dari 8 karakter dan tidak lebih dari 20 karakter'
                            },
                            different: {
                                message: 'Kata sandi tidak boleh sama dengan Kata sandi saat ini',
                                compare: function() {
                                    return form.querySelector('[name="current_password"]').value;
                                }
                            },
                            regexp: {
                                regexp: /[!%&*\s@#]/,
                                message: 'Kata sandi harus menggunakan paling tidak 1 spesial karakter',
                            }
                        }
                    },
                    new_password2: {
                        validators: {
                            notEmpty: {
                                message: 'Kata sandi konfirmasi diperlukan'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="new_password1"]').value;
                                },
                                message: 'Kata sandi baru dan Kata sandi konfirmasi tidak sama'
                            }
                        }
                    }
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    icon: new FormValidation.plugins.Icon({
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh'
                    }),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					}),
				},
			}
		);

		$('#simpan_change_password').on('click', function (e) {
            e.preventDefault();
    
            validationAddComplain.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Kata Sandi anda berhasil di ubah!",
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
			_handlechangepassword();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    ChangePassword.init();
});
