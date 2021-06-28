<?= form_open('workpermit/simpandatabanyak', ['class' => 'formsimpanbanyak']) ?>

<button type="submit" class="btn btn-sm btn-primary float-right btnsimpanbanyak">
    <i class="fa fa-save"></i> Simpan Data
</button>
<br>
<div class="table-responsive">
    <table class="table table-sm table-hover table-bordered mt-3">
        <thead>
            <tr>
                <th class="align-middle" style="text-align: center;" hidden>ID Izin Keja</th>
                <th class="align-middle" style="text-align: center;">Nama Pekerja</th>
                <th class="align-middle" style="text-align: center;">Jenis Pekerjaan</th>
                <th class="align-middle" style="text-align: center;">Lokasi Pekerjaan</th>
                <th class="align-middle" style="text-align: center;">Tindakan</th>
            </tr>
        </thead>
        <tbody class="formtambah">
            <tr>
                <td class="align-middle" style="text-align: center;" hidden>
                    <input type="text" name="id_izin_kerja[]" value="<?= $id_izin ?>" class="form-control">
                </td>
                <td class="align-middle" style="text-align: center;">
                    <input type="text" name="nama_pekerja[]" class="form-control" required autocomplete="off">
                </td>
                <td class="align-middle" style="text-align: center;">
                    <input type="text" name="jenis_pekerja[]" class="form-control" required autocomplete="off">
                </td>
                <td class="align-middle" style="text-align: center;">
                    <input type="text" name="lokasi_pekerja[]" class="form-control" required autocomplete="off">
                </td>
                <td class="align-middle" style="text-align: center;">
                    <button type="button" class="btn btn-success btn-sm btnaddform">
                        <i class="fa fa-plus"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    </divc>

    <?= form_close(); ?>

    <script>
        $(document).ready(function(e) {

            $('.formsimpanbanyak').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin ingin mengirim data ini sekarang?',
                    showDenyButton: true,
                    confirmButtonText: 'Kirim',
                    denyButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            dataType: "json",
                            beforeSend: function() {
                                $('.btnsimpanbanyak').attr('disable', 'disabled');
                                $('.btnsimpanbanyak').html('<i class="fa fa-spin fa-spinner"></i>');
                            },
                            complete: function() {
                                $('.btnsimpanbanyak').removeAttr('disable');
                                $('.btnsimpanbanyak').html('Simpan');
                            },
                            success: function(response) {
                                if (response.sukses) {
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
                                        window.location.href = ("<?= base_url('workpermit/adddetailizin/' . $id_complain); ?>");
                                    });
                                }
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


            $('.btnaddform').click(function(e) {
                e.preventDefault();

                $('.formtambah').append('<tr><td class="align-middle" style="text-align: center;" hidden><input type="text" name="id_izin_kerja[]" class="form-control" value="<?= $id_izin ?>"></td><td class="align-middle" style="text-align: center;"><input type="text" name="nama_pekerja[]" class="form-control" required autocomplete="off"></td><td class="align-middle" style="text-align: center;"><input type="text" name="jenis_pekerja[]" class="form-control" required autocomplete="off"></td><td class="align-middle" style="text-align: center;"><input type="text" name="lokasi_pekerja[]" class="form-control" required autocomplete="off"></td><td class="align-middle" style="text-align: center;"><button type="button" class="btn btn-sm btn-danger btnhapus"><i class="fa fa-trash"></i></button></td></tr>');
            });
        });

        $(document).on('click', '.btnhapus', function(e) {
            e.preventDefault();

            $(this).parents('tr').remove();
        });
    </script>