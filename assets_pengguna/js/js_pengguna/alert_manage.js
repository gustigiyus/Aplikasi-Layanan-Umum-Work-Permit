"use strict";

// Class Definition
var JPotensi = function() {

    // ADD POTENSI SINGLE //
    var _handlePotensi = function() {
        var validation_add_potensi;
        validation_add_potensi = FormValidation.formValidation(
            document.getElementById('add_potensi_form'),
            {
                fields: {
                    'jenis_potensi[]': {
                        validators: {
                            notEmpty: {
                                message: 'Setidaknya pilih salah satu option.'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),

                },
            }
        );
        $('#add_potensi_button').on('click', function (e) {
            e.preventDefault();

            validation_add_potensi.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Data Jenis Potensi berhasil di tambahkan!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "OK, mengerti!",
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
                        confirmButtonText: "OK, mengerti!",
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


    // ADD POTENSI SINGLE //
    var _handleTindak = function() {
        var validation_add_tindak;
        validation_add_tindak = FormValidation.formValidation(
            document.getElementById('add_tindak_form'),
            {
                fields: {
                    'tindak_pencegahan[]': {
                        validators: {
                            notEmpty: {
                                message: 'Setidaknya pilih salah satu option.'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),

                },
            }
        );
        $('#add_tindak_button').on('click', function (e) {
            e.preventDefault();

            validation_add_tindak.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Data Tindak Pencegahan berhasil di tambahkan!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "OK, mengerti!",
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
                        confirmButtonText: "OK, mengerti!",
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


        // ADD POTENSI SINGLE //
        var _handleApd = function() {
            var validation_add_apd;
            validation_add_apd = FormValidation.formValidation(
                document.getElementById('add_apd_form'),
                {
                    fields: {
                        idapd: {
                            validators: {
                                notEmpty: {
                                    message: 'Setidaknya pilih salah satu option.'
                                }
                            }
                        },
                        gambar2: {
                            validators: {
                                notEmpty: {
                                    message: 'Tolong masukan gambar.'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
    
                    },
                }
            );
            $('#add_apd_button').on('click', function (e) {
                e.preventDefault();
    
                validation_add_apd.validate().then(function(status) {
                    if (status == 'Valid') {
                        swal.fire({
                            text: "Data APD berhasil di tambahkan!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "OK, mengerti!",
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
                            confirmButtonText: "OK, mengerti!",
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
        // public functions
        init: function() {
            _handlePotensi();
            _handleTindak();
            _handleApd();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    JPotensi.init();
});
