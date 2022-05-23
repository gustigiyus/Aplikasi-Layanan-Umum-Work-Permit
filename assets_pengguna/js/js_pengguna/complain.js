document.addEventListener('DOMContentLoaded', function(e) {
    var validationAddComplain;
    validationAddComplain = FormValidation.formValidation(
        document.getElementById('kt_add_complain_form'),
        {
            fields: {
                judul_complain: {
                    validators: {
                        notEmpty: {
                            message: 'Judul Complain Tidak Boleh Kosong'
                        }
                    }
                },
                keadaan: {
                    validators: {
                        notEmpty: {
                            message: 'Pilih Minimal 1 Option'
                        }
                    }
                },
                deskripsi: {
                    validators: {
                        notEmpty: {
                            message: 'Deskripsi Tidak Boleh Kosong'
                        }
                    }
                },
                lokasi_pekerjaan: {
                    validators: {
                        notEmpty: {
                            message: 'Lokasi Pekerjaan Tidak Boleh Kosong'
                        }
                    }
                },
                tanggal_ajukan: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal tidak boleh kosong'
                        }
                    }
                },
                tingkat_bahaya: {
                    validators: {
                        notEmpty: {
                            message: 'Pilih Minimal 1 Option'
                        }
                    }
                },
                gambar: {
                    validators: {
                        notEmpty: {
                            message: 'Tolong masukan gambar'
                        },
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png,image/jpg',
                            maxSize: 1048576,   // 1024 * 1024
                            message: 'Ukuran gambar yang dimasukan maximal 1 MB'
                        },
                    }
                },
                gambar2: {
                    validators: {
                        notEmpty: {
                            message: 'Tolong masukan gambar'
                        },
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png,image/jpg',
                            maxSize: 1048576,   // 1024 * 1024
                            message: 'Ukuran gambar yang dimasukan maximal 1 MB'
                        },
                    }
                },
                gambar3: {
                    validators: {
                        notEmpty: {
                            message: 'Tolong masukan gambar'
                        },
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png,image/jpg',
                            maxSize: 1048576,   // 1024 * 1024
                            message: 'Ukuran gambar yang dimasukan maximal 1 MB'
                        },
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),

            },
        }
    );
    $('#kt_izin_submit').on('click', function (e) {
        e.preventDefault();

        validationAddComplain.validate().then(function(status) {
            if (status == 'Valid') {
                swal.fire({
                    text: "Data Complain and berhasil di tambahkan!",
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
});




