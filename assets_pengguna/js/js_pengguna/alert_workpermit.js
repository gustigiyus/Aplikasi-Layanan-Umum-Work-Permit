// EDIT IZIN KERJA
document.addEventListener('DOMContentLoaded', function(e) {
    var validation_edit_izin;
    validation_edit_izin = FormValidation.formValidation(
        document.getElementById('edit_izin_form'),
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
                            message: 'Nomer Telepon tidak boleh kosong.'
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
                bootstrap: new FormValidation.plugins.Bootstrap(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),

            },
        }
    );
    $('#edit_izin_button').on('click', function (e) {
        e.preventDefault();

        validation_edit_izin.validate().then(function(status) {
            if (status == 'Valid') {
                swal.fire({
                    text: "Data Izin Kerja berhasil di edit!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
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
                    confirmButtonText: "Ok, got it!",
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


// ADD PEKERJA SINGLE //
document.addEventListener('DOMContentLoaded', function(e) {
    var validation_add_pekerja_single;
    validation_add_pekerja_single = FormValidation.formValidation(
        document.getElementById('add_pekerja_form_single'),
        {
            fields: {
                nama_pekerja: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Pekerja tidak boleh kosong'
                        }
                    }
                },
                jenis_pekerjaan: {
                    validators: {
                        notEmpty: {
                            message: 'Jenis Pekerjaan tidak boleh kosong'
                        }
                    }
                },
                lokasi_pekerjaan: {
                    validators: {
                        notEmpty: {
                            message: 'Lokasi Pekerjaan tidak boleh kosong'
                        }
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
    $('#add_pekerja_button_single').on('click', function (e) {
        e.preventDefault();

        validation_add_pekerja_single.validate().then(function(status) {
            if (status == 'Valid') {
                swal.fire({
                    text: "Data Pekerja berhasil di tambahkan!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
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
                    confirmButtonText: "Ok, got it!",
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


// Confirm Delete Pekerja //
function confirm_modal(delete_url)
{
    $('#modal_delete').modal('show', {backdrop: 'static'});
    document.getElementById('delete_pekerja').setAttribute('href' , delete_url);
}

// Confirm Delete Potensi //
function confirm_modal(delete_url)
{
    $('#modal_delete_potensi').modal('show', {backdrop: 'static'});
    document.getElementById('delete_potensi').setAttribute('href' , delete_url);
}

// Confirm Delete Tindak //
function confirm_modal(delete_url)
{
    $('#modal_delete_tindak').modal('show', {backdrop: 'static'});
    document.getElementById('delete_tindak').setAttribute('href' , delete_url);
}








