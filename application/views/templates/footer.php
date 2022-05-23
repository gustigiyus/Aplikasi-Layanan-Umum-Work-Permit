<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Layanan Umum & Properti 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin akan keluar dari aplikasi?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-primary" id="keluarAdmin">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Page level plugins (Datatables) -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level plugins (Export) -->
<script src="<?= base_url('assets/'); ?>js/cetak/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/cetak/dataTables.button.js"></script>
<script src="<?= base_url('assets/'); ?>js/cetak/buttons.flash.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/cetak/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/cetak/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/cetak/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/cetak/vfs_fonts.js"></script>

<!-- Page level custom scripts -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>

<script src="<?= base_url('assets_pengguna/') ?>galery/js/dotgallery.js"></script>
<script src="<?= base_url('assets_pengguna/') ?>galery/js/gallery.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //Auth Logout
    document.querySelector("#keluarAdmin").addEventListener("click", function() {
        let timerInterval
        Swal.fire({
            title: 'Tunggu Sebentar!',
            html: 'Anda akan keluar dalam <b></b> milliseconds.',
            timer: 2500,
            animation: true,
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
        }).then((result) => {
            window.location.href = ("<?= base_url('auth/logoutInternal'); ?>");
        })
    });
</script>


<?php if ($title == "Kelola Izin Kerja") : ?>
    <script>
        //Data Tables
        $(document).ready(function() {
            $('#kelola-data-izin-kerja').DataTable({
                scrollX: true
            });
        });
    </script>

<?php elseif ($title == "Laporan Izin Kerja Officer Umum") : ?>
    <script>
        $(document).ready(function() {
            $('#kelola-laporan-izin-kerja-officer').DataTable({
                "searching": true,
                "scrollX": true,
                dom: 'Bfrtip',
                buttons: [{
                        text: '<i class="fa fa-lg fa-clipboard"></i> Copy',
                        extend: 'copyHtml5',
                        className: 'btn btn-sm btn-secondary',
                        footer: true,
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        text: '<i class="fa fa-file-excel"></i> Excel',
                        extend: 'excelHtml5',
                        className: 'btn btn-sm btn-success',
                        footer: true,
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        text: '<i class="fa fa-file-csv"></i> CSV',
                        extend: 'csvHtml5',
                        className: 'btn btn-sm btn-info',
                        footer: true,
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        text: '<i class="fa fa-print"></i> Print',
                        extend: 'print',
                        className: 'btn btn-sm btn-primary',
                        footer: true,
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    }
                ]
            });
        });
    </script>

<?php elseif ($title == "Laporan Complain") : ?>

    <script>
        $(document).ready(function() {
            $('#kelola-laporan-complain').DataTable({
                "searching": true,
                "scrollX": true,
                dom: 'Bfrtip',
                buttons: [{
                        text: '<i class="fa fa-lg fa-clipboard"></i> Copy',
                        extend: 'copyHtml5',
                        className: 'btn btn-sm btn-secondary',
                        footer: true,
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        text: '<i class="fa fa-file-excel"></i> Excel',
                        extend: 'excelHtml5',
                        className: 'btn btn-sm btn-success',
                        footer: true,
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        text: '<i class="fa fa-file-csv"></i> CSV',
                        extend: 'csvHtml5',
                        className: 'btn btn-sm btn-info',
                        footer: true,
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        text: '<i class="fa fa-print"></i> Print',
                        extend: 'print',
                        className: 'btn btn-sm btn-primary',
                        footer: true,
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    }
                ]
            });
        });
    </script>

<?php elseif ($title == "Data Complain") : ?>
    <script>
        $(document).ready(function() {
            $('#data-complain-officer_umum').DataTable({
                scrollX: true
            });
        });
    </script>

<?php else : ?>
    <script>
        var a = new FgGallery('.fg-gallery', {
            cols: 4,
            style: {
                border: '10px solid #fff',
                height: '180px',
                borderRadius: '5px',
                boxShadow: '0 2px 10px -5px #858585',
            }
        })

        var a = new FgGallery('.ns', {
            cols: 3,
            style: {
                border: '0 solid #fff',
                height: '240px',
                borderRadius: '5px',
            }
        })
    </script>

    <script>
        //Lihat Judul text
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        //Data Tables
        $(document).ready(function() {
            $('#data-complain').DataTable({
                responsive: true
            });
        });

        //Custom Seelcted 
        $('.custom-file-input').on('change', function() {
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
        });

        $('.form-check-access').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: "post",
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                }
            });
        });
    </script>

    <script>
        document.querySelector("#keluarAdmin").addEventListener("click", function() {
            let timerInterval
            Swal.fire({
                title: 'Tunggu Sebentar!',
                html: 'Anda akan keluar dalam <b></b> milliseconds.',
                timer: 2500,
                animation: true,
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
            }).then((result) => {
                window.location.href = ("<?= base_url('auth/logoutInternal'); ?>");
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#menu_id').change(function() {
                var menu_id = $(this).val();
                $.ajax({
                    url: "<?= base_url("menu/get_idmenu"); ?>",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        menu_id: menu_id
                    },
                    success: function(array) {
                        var html = "";
                        for (let index = 0; index < array.length; index++) {
                            const element = array[index];
                            html += "<option value='" + array[index].id + "'>" + array[index].title + "</option>"
                        }
                        $('#ssmenu_id').html(html);
                    }
                })
            })
        })
    </script>


<?php endif; ?>


</body>

</html>