"use strict";

// Class Definition
var KTLogin = function() {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _handleFormSignin = function() {
		var form = KTUtil.getById('kt_login_singin_form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('kt_login_singin_form_submit_button');

		if (!form) {
			return;
		}

		FormValidation
		    .formValidation(
		        form,
		        {
		            fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'Email diperlukan'
                                },
                                emailAddress: {
                                    message: 'Data harus berupa email format'
                                }
                            }
                        },
						password: {
							validators: {
								notEmpty: {
									message: 'Password diperlukan'
								}
							}
						}
		            },
		            plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
	            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						bootstrap: new FormValidation.plugins.Bootstrap({
						//	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
						//	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
						})
		            }
		        }
		    )
		    .on('core.form.valid', function() {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Mohon tunggu");

				// Simulate Ajax request
				setTimeout(function() {
					KTUtil.btnRelease(formSubmitButton);
				}, 2000);
		    })
			.on('core.form.invalid', function() {
				Swal.fire({
					text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, harap coba lagi.",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "OK mengerti!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
					KTUtil.scrollTop();
				});
		    });
    }

	var _handleFormForgot = function() {
		var form = KTUtil.getById('kt_login_forgot_form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('kt_login_forgot_form_submit_button');

		if (!form) {
			return;
		}

		FormValidation
		    .formValidation(
		        form,
		        {
		            fields: {
						email: {
							validators: {
								notEmpty: {
									message: 'Email is required'
								},
								emailAddress: {
									message: 'The value is not a valid email address'
								}
							}
						}
		            },
		            plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
	            		//defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						bootstrap: new FormValidation.plugins.Bootstrap({
						//	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
						//	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
						})
		            }
		        }
		    )
		    .on('core.form.valid', function() {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");

				// Simulate Ajax request
				setTimeout(function() {
					KTUtil.btnRelease(formSubmitButton);
				}, 2000);
		    })
			.on('core.form.invalid', function() {
				Swal.fire({
					text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, harap coba lagi.",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "OK mengerti!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
					KTUtil.scrollTop();
				});
		    });
    }

	var _handleFormSignup = function() {
		// Base elements
		var wizardEl = KTUtil.getById('kt_login');
		var form = KTUtil.getById('kt_login_signup_form');
		var wizardObj;
		var validations = [];

		if (!form) {
			return;
		}

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'Nama lengkap diperlukan'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Alamat email diperlukan'
							},
							emailAddress: {
								message: 'Data harus berupa email format'
							}
						}
					},                
                    password1: {
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
                                message: 'Kata sandi tidak boleh sama dengan Username',
                                compare: function() {
                                    return form.querySelector('[name="name"]').value;
                                }
                            },
                            regexp: {
                                regexp: /[!%&*\s@#]/,
                                message: 'Kata sandi harus menggunakan paling tidak 1 spesial karakter',
                            }
                        }
                    },
                    password2: {
                        validators: {
                            notEmpty: {
                                message: 'Kata sandi konfirmasi diperlukan'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password1"]').value;
                                },
                                message: 'Kata sandi dan Kata sandi konfirmasi tidak sama'
                            }
                        }
                    }
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					}),
				}
			}
		));

		// Step 2
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					alm1: {
						validators: {
							notEmpty: {
								message: 'Alamat 1 diperlukan'
							}
						}
					},
					alm2: {
						validators: {
							notEmpty: {
								message: 'Alamat 2 diperlukan'
							}
						}
					},
					nm_perushaan: {
						validators: {
							notEmpty: {
								message: 'Nama perusahaan diperlukan'
							}
						}
					},
					nm_kota: {
						validators: {
							notEmpty: {
								message: 'Nama kota diperlukan'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					tgl_lahir: {
						validators: {
							notEmpty: {
								message: 'Tanggal lahir diperlukan'
							}
						}
					},
					tmp_lahir: {
						validators: {
							notEmpty: {
								message: 'Tempat lahirdiperlukan'
							}
						}
					},
					js_kelamin: {
						validators: {
							notEmpty: {
								message: 'Jenis kelamin diperlukan'
							}
						}
					},
					no_tlp: {
						validators: {
							notEmpty: {
								message: 'Nomer telepon diperlukan'
							}
						}
					},
					no_ktp: {
						validators: {
							notEmpty: {
								message: 'Nomer ktp diperlukan'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Initialize form wizard
		wizardObj = new KTWizard(wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, harap coba lagi.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "OK mengerti!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		wizardObj.on('submit', function (wizard) {
			Swal.fire({
				text: "Semua baik! Harap konfirmasi pengiriman formulir.",
				icon: "success",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Ya, kirimkan!",
				cancelButtonText: "Tidak, batalkan",
				customClass: {
					confirmButton: "btn font-weight-bold btn-primary",
					cancelButton: "btn font-weight-bold btn-default"
				}
			}).then(function (result) {
				if (result.value) {
					form.submit(); // Submit form
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "Formulir Anda belum dikirim!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "OK mengerti!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-primary",
						}
					});
				}
			});
		});
    }

    // Public Functions
    return {
        init: function() {
            _handleFormSignin();
			_handleFormForgot();
			_handleFormSignup();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
