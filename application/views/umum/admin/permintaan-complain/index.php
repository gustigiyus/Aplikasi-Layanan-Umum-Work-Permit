<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-2 text-gray-800">Data Komplain</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Permintaan Komplain</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Komplain</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="font-weight-bold text-primary">Tables<b> Data Komplain</b></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-complain-officer_umum" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="text-align: center;">#</th>
                                    <th class="align-middle" style="text-align: center;">Email</th>
                                    <th class="align-middle" style="text-align: center;">Nama Lengkap</th>
                                    <th class="align-middle" style="text-align: center;">Judul Komplain</th>
                                    <th class="align-middle" style="text-align: center;">Deskripsi</th>
                                    <th class="align-middle" style="text-align: center;">Lokasi Pekerjaan</th>
                                    <th class="align-middle" style="text-align: center;">Keadaan</th>
                                    <th class="align-middle" style="text-align: center;">Tingkat Bahaya</th>
                                    <th class="align-middle" style="text-align: center;">Tanggal Diajukan</th>
                                    <th class="align-middle" style="text-align: center;">Gambar</th>
                                    <th class="align-middle" style="text-align: center;">Status Komplain</th>
                                    <th class="align-middle" style="text-align: center;">Status Izin Kerja</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($complain as $comp) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $i; ?></td>

                                        <!-- Lihat data Email & Nama Buat Admin Complain -->
                                        <td class="align-middle"><?= $comp['email']; ?></td>
                                        <td class="align-middle"><?= $comp['nama']; ?></td>
                                        <td class="align-middle"><?= $comp['judul_complain']; ?></td>
                                        <td class="align-middle"><?= $comp['deskripsi']; ?></td>
                                        <td class="align-middle"><?= $comp['lokasi_pekerjaan']; ?></td>
                                        <td class="align-middle"><?= $comp['keadaan']; ?></td>
                                        <td class="align-middle"><?= $comp['tingkat_bahaya']; ?></td>
                                        <td class="align-middle"><?= $comp['tanggal_ajukan']; ?></td>
                                        <td class="align-middle">
                                            <div class="float-right">
                                                <button class="btn btn-info" data-toggle="modal" data-target="#myModaldetailfoto<?PHP echo $comp['id']; ?>">
                                                    Detail
                                                </button>
                                            </div>
                                        </td>

                                        <td class="align-middle" style="text-align: center;">
                                            <!-- Ubah Status Admin Complain -->
                                            <?php if ($this->session->userdata('role_id') == 3) : ?>
                                                <?php if ($comp['status_complain'] == "Pending") : ?>
                                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $comp['id']; ?>"><?= $comp['status_complain']; ?></a>
                                                <?php elseif ($comp['status_complain'] == "Meminta Izin Kerja") : ?>
                                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $comp['id']; ?>"><?= $comp['status_complain']; ?></a>
                                                <?php elseif ($comp['status_complain'] == "Selesai Dikerjakan") : ?>
                                                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $comp['id']; ?>"><?= $comp['status_complain']; ?></a>
                                                <?php else : ?>
                                                    <div class="d-flex flex-column w-100 mr-2">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                            <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Selesai" class="badge badge-success">Komplain Disetujui</span>
                                                        </div>
                                                        <div class="progress progress-xs w-100">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <!-- Ubah Status Admin Tenant -->
                                            <?php elseif ($this->session->userdata('role_id') == 4) : ?>
                                                <?php if ($comp['status_complain'] == "Complain Disetujui") : ?>
                                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $comp['id']; ?>"><?= $comp['status_complain']; ?></a>
                                                <?php elseif ($comp['status_complain'] == "Izin Kerja Disetujui") : ?>
                                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $comp['id']; ?>"><?= $comp['status_complain']; ?></a>
                                                <?php elseif ($comp['status_complain'] == "Sedang Dikerjakan") : ?>
                                                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModaleditStatus<?PHP echo $comp['id']; ?>"><?= $comp['status_complain']; ?></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>

                                        <td class="align-middle" style="text-align: center;">
                                            <?php if ($comp['status_kerja'] == 'Pending') : ?>
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">0%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Pending" class="badge badge-warning">Pending</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            <?php elseif ($comp['status_kerja'] == "Izin Kerja Disetujui") : ?>
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">25%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Izin Kerja Disetujui" class="badge badge-primary"><?= $comp['status_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            <?php elseif ($comp['status_kerja'] == "Sedang Dikerjakan") : ?>
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">50%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Sedang Dikerjakan" class="badge badge-primary"><?= $comp['status_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            <?php elseif ($comp['status_kerja'] == "Selesai Dikerjakan") : ?>
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">75%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Selesai Dikerjakan" class="badge badge-primary"><?= $comp['status_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            <?php elseif ($comp['status_kerja'] == "Selesai") : ?>
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Selesai" class="badge badge-success"><?= $comp['status_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<?php foreach ($complain as $comp) : ?>

    <!-- Modal edit Status ADMIN -->
    <div class="modal fade" id="myModaleditStatus<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaleditStatusLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModaleditStatusLabel">Ubah Status Komplain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('permintaan/editStatusComplain'); ?>" method="post">
                    <div class="modal-body">
                        <div class="row justify-content-around">
                            <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalView<?PHP echo $comp['id']; ?>">Detail Komplain</a>
                            <?php if ($comp['status_complain'] == "Meminta Izin Kerja") : ?>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewIzin<?PHP echo $comp['id']; ?>">Detail Izin Kerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewPekerja<?PHP echo $comp['id']; ?>">Detail Pekerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewDetail<?PHP echo $comp['id']; ?>">Detail Lainnya</a>
                            <?php elseif ($comp['status_complain'] == "Selesai Dikerjakan") : ?>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewIzin<?PHP echo $comp['id']; ?>">Detail Izin Kerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewPekerja<?PHP echo $comp['id']; ?>">Detail Pekerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewDetail<?PHP echo $comp['id']; ?>">Detail Lainnya</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewMulai<?PHP echo $comp['id']; ?>">Foto Sebelum Kerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewAkhir<?PHP echo $comp['id']; ?>">Foto Setelah Kerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewTTD<?PHP echo $comp['id']; ?>">Bukti Tanda Tangan</a>
                            <?php endif; ?>
                        </div>
                        <div class="form-group" hidden>
                            <h6>id</h6>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $comp['id']; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <select class="form-control" name="status_complain" id="status_complain">
                                <?php if ($comp['status_complain'] == "Pending") : ?>
                                    <option value="<?= $comp['status_complain']; ?>"><?= $comp['status_complain']; ?></option>
                                    <option value="Complain Disetujui">Komplain Disetujui</option>
                                <?php elseif ($comp['status_complain'] == "Meminta Izin Kerja") : ?>
                                    <option value="<?= $comp['status_complain']; ?>"><?= $comp['status_complain']; ?></option>
                                    <option value="Izin Kerja Disetujui">Izin Kerja Disetujui</option>
                                <?php elseif ($comp['status_complain'] == "Selesai Dikerjakan") : ?>
                                    <option value="<?= $comp['status_complain']; ?>"><?= $comp['status_complain']; ?></option>
                                    <option value="Selesai">Selesai</option>

                                    <!-- Data Complain yang dikirim ke email Tiap User -->
                                    <input hidden type="text" value="<?= $comp['nama']; ?>" name="nama">
                                    <input hidden type="text" value="<?= $comp['email']; ?>" name="email">
                                    <input hidden type="text" value="<?= $comp['judul_complain']; ?>" name="judul_complain">
                                    <input hidden type="text" value="<?= $comp['deskripsi']; ?>" name="deskripsi">
                                    <input hidden type="text" value="<?= $comp['keadaan']; ?>" name="keadaan">
                                    <input hidden type="text" value="<?= $comp['tingkat_bahaya']; ?>" name="tingkat_bahaya">
                                    <input hidden type="text" value="<?= $comp['tanggal_ajukan']; ?>" name="tanggal_ajukan">
                                    <input hidden type="text" value="<?= $comp['gambar']; ?>" name="gambar">
                                    <input hidden type="text" value="<?= $comp['gambar2']; ?>" name="gambar2">
                                    <input hidden type="text" value="<?= $comp['gambar3']; ?>" name="gambar3">

                                    <!-- Data Izin Kerja yang dikirim ke email Tiap Tenant -->
                                    <?php foreach ($izin as $izn) : ?>
                                        <input hidden type="text" value="<?= $izn['nama_kontraktor']; ?>" name="nm_kontrak">
                                        <input hidden type="text" value="<?= $izn['nama_penanggung_jawab']; ?>" name="nm_jawab">
                                        <input hidden type="text" value="<?= $izn['no_telp_kantor']; ?>" name="no_tlp">
                                        <input hidden type="text" value="<?= $izn['deskripsi_pekerjaan']; ?>" name="dsk_pekrj">
                                        <input hidden type="text" value="<?= $izn['waktu_mulai']; ?>" name="wk_awal">
                                        <input hidden type="text" value="<?= $izn['waktu_akhir']; ?>" name="wk_akhir">
                                        <input hidden type="text" value="<?= $izn['tanggal_dikerjakan']; ?>" name="tg_kerja">
                                        <input hidden type="text" value="<?= $izn['tanggal_akhir']; ?>" name="tg_akhir">
                                        <input hidden type="text" value="<?= $izn['ttd']; ?>" name="ttd">
                                    <?php endforeach; ?>

                                    <!-- Data Pekerja yang dikirim ke email Tiap Tenant -->
                                    <?php foreach ($izin as $izn) : ?>
                                        <?php
                                        $data['pekerja_complain'] = $this->db->get_where('tb_tenaga_kerja', ['id_izin_kerja' => $izn['id']])->result_array();
                                        ?>
                                        <?php foreach ($data['pekerja_complain'] as $pkjd) : ?>
                                            <input hidden type="text" value="<?= $pkjd['nama_pekerja']; ?>" name="nm_kerja[]">
                                            <input hidden type="text" value="<?= $pkjd['jenis_pekerjaan']; ?>" name="jns_kerja[]">
                                            <input hidden type="text" value="<?= $pkjd['lokasi_pekerjaan']; ?>" name="lks_kerja[]">
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>

                                    <!-- Data Foto Sesudah Kerja dikirim ke email Tiap Tenant -->
                                    <?php foreach ($izin as $izn) : ?>
                                        <?php
                                        $id = $izn['id'];
                                        $query = "SELECT *
                                        FROM `tb_akhir_kerja`
                                        WHERE `id_izin_kerja` = $id";
                                        $data['ssdh_kerja'] = $this->db->query($query)->result_array();
                                        ?>
                                        <?php foreach ($data['ssdh_kerja'] as $ssdh) : ?>
                                            <input hidden type="text" value="<?= $ssdh['gambar']; ?>" name="ssdh[]">
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>


                                    <!-- Data Foto Sebelum Kerja dikirim ke email Tiap Tenant -->
                                    <?php foreach ($izin as $izn) : ?>
                                        <?php
                                        $id_m = $izn['id'];
                                        $query = "SELECT *
                                        FROM `tb_mulai_kerja`
                                        WHERE `id_izin_kerja` = $id_m";
                                        $data['sblm_kerja'] = $this->db->query($query)->result_array();
                                        ?>
                                        <?php foreach ($data['sblm_kerja'] as $sblm) : ?>
                                            <input hidden type="text" value="<?= $sblm['gambar']; ?>" name="sblm[]">
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>

                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Edit Status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal view detail complain-->
    <div class="modal fade" id="myModalView<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewLabel">Detail Komplain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" value="<?= $comp['email']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama Lengkap</label>
                                <input type="nama" class="form-control" id="nama" value="<?= $comp['nama']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="judul">Judul Complain</label>
                                <input type="text" class="form-control" id="judul" value="<?= $comp['judul_complain']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="deksripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deksripsi" value="<?= $comp['deskripsi']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="keadaan">Tingkat Bahaya</label>
                                <input type="text" class="form-control" id="keadaan" value="<?= $comp['tingkat_bahaya']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bahaya">Tingkat Bahaya</label>
                                <input type="text" class="form-control" id="bahaya" value="<?= $comp['keadaan']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="validationTooltipUsername">Tanggal Diajukan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="validationTooltipUsername" value="<?= $comp['tanggal_ajukan']; ?>" readonly>
                                </div>
                            </div>
                        </div>


                        <label class="control-label font-weight-bold" style="display: block; height:50px; line-height:50px; text-align:center; font-size:20px;"> Gambar Komplain</label>
                        <div class="row options m-auto">
                            <div class="option active" style="--optionBackground:url(<?= base_url()  ?>assets/img/complain/<?= $comp['gambar']; ?>);">
                                <div class="shadow"></div>
                                <div class="label">
                                    <div class="icon">
                                        <i class="fas fa-walking"></i>
                                    </div>
                                    <div class="info">
                                        <div class="main">Gambar 1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="option" style="--optionBackground:url(<?= base_url()  ?>assets/img/complain/<?= $comp['gambar2']; ?>);">
                                <div class="shadow"></div>
                                <div class="label">
                                    <div class="icon">
                                        <i class="fas fa-snowflake"></i>
                                    </div>
                                    <div class="info">
                                        <div class="main">Gambar 2</div>
                                    </div>
                                </div>
                            </div>
                            <div class="option" style="--optionBackground:url(<?= base_url()  ?>assets/img/complain/<?= $comp['gambar3']; ?>);">
                                <div class="shadow"></div>
                                <div class="label">
                                    <div class="icon">
                                        <i class="fas fa-tree"></i>
                                    </div>
                                    <div class="info">
                                        <div class="main">Gambar 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Detail Gambar -->
    <div class="modal fade" id="myModaldetailfoto<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 style="font-size: 18px;" class="title title-up">Detail Gambar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar']; ?>" alt="" class="img-thumbnail" width="300px">
                            <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar2']; ?>" alt="" class="img-thumbnail" width="300px">
                            <img src="<?= base_url()  ?>assets/img/complain/<?= $comp['gambar3']; ?>" alt="" class="img-thumbnail" width="300px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->

<?php endforeach; ?>

<!-- foreach tb izin kerja-->
<?php foreach ($izin as $i) : ?>

    <!-- Detail TTD -->
    <div class="modal fade" id="myModalViewTTD<?PHP echo $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaldetailfotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <h4 style="font-size: 18px;" class="title title-up">Detail Gambar</h4>
                </div>
                <div class="modal-body justify-content-md-center">
                    <div class="fg-gallery cols-2">
                        <img src="<?= base_url()  ?>assets/img/ttd/<?= $i['ttd']; ?>" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->
    <!-- Modal view detail izin kerja-->
    <div class="modal fade" id="myModalViewIzin<?PHP echo $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewIzinLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewIzinLabel">Detail Izin Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="id_complain">ID Comp</label>
                                <input type="text" class="form-control" name="id_complain" id="id_complain" value="<?= $i['id_complain']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="nama_kontraktor">Nama Kontraktor</label>
                                <input type="text" class="form-control" name="nama_kontraktor" id="nama_kontraktor" value="<?= $i['nama_kontraktor']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="nama_penanggung_jawab">Nama Penanggung Jawab</label>
                                <input type="text" class="form-control" name="nama_penanggung_jawab" id="nama_penanggung_jawab" value="<?= $i['nama_penanggung_jawab']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="no_telp_kantor">No Telepon Kantor</label>
                                <input type="text" class="form-control" name="no_telp_kantor" value="<?= $i['no_telp_kantor']; ?>" id="no_telp_kantor" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="deksripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                <input type="text" class="form-control" name="deksripsi_pekerjaan" id="deksripsi_pekerjaan" value="<?= $i['deskripsi_pekerjaan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="validationTooltipUsername">Tanggal Mulai Dikerjakan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="tanggal_dikerjakan" id="tanggal_dikerjakan" value="<?= $i['tanggal_dikerjakan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="validationTooltipUsername">Waktu Mulai</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="waktu_mulai" id="waktu_mulai" value="<?= $i['waktu_mulai']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="validationTooltipUsername">Waktu Akhir</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="waktu_akhir" id="waktu_akhir" value="<?= $i['waktu_akhir']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal view detail Pekerja-->
    <div class="modal fade" id="myModalViewPekerja<?PHP echo $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewPekerjaLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewPekerjaLabel">Detail Pekerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <th>Nama Pekerja</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Lokasi Pekerjaan</th>
                            </thead>
                            <?php
                            $data['pekerja'] = $this->db->get_where('tb_tenaga_kerja', ['id_izin_kerja' => $i['id']])->result_array();
                            ?>
                            <?php foreach ($data['pekerja'] as $pkj) : ?>
                                <tbody>

                                    <td class="align-middle"><?= $pkj['nama_pekerja']; ?></td>
                                    <td class="align-middle"><?= $pkj['jenis_pekerjaan']; ?></td>
                                    <td class="align-middle"><?= $pkj['lokasi_pekerjaan']; ?></td>

                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal view detail lainnya(potensi,tindak,apd)-->
    <div class="modal fade" id="myModalViewDetail<?PHP echo $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewDetailLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewDetailLabel">Detail Lainnya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <!--Jenis Potensi-->
                        <h6 class="title">Detail Jenis Potensi</h6>
                        <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <th style="text-align:center; vertical-align:middle;">NO.</th>
                                <th style="text-align:center; vertical-align:middle;">Nama Jenis Potensi</th>
                            </thead>
                            <?php
                            $id = $i['id'];
                            $query = "SELECT *
                            FROM `tb_master_jenis_potensi` JOIN `tb_jenis_potensi`
                            ON `tb_master_jenis_potensi`.`id_master_JP` = `tb_jenis_potensi`.`id_JP`
                            WHERE `id_izin_kerja` = $id";
                            $data['select'] = $this->db->query($query)->result_array();
                            $a = 1;
                            ?>
                            <?php foreach ($data['select'] as $slt) : ?>
                                <tbody>

                                    <td style="text-align:center; vertical-align:middle;"><?= $a ?></td>
                                    <td style="text-align:center; vertical-align:middle;"><?= $slt['nama_Jenis_Potensi']; ?></td>

                                </tbody>
                                <?php $a++; ?>
                            <?php endforeach; ?>

                        </table>

                        <!--Tindak Pencegahan-->
                        <h6 class="title">Detail Tindak Pencegahan</h6>
                        <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <th style="text-align:center; vertical-align:middle;">NO.</th>
                                <th style="text-align:center; vertical-align:middle;">Nama Tindak Pencegahan</th>
                            </thead>
                            <?php
                            $id = $i['id'];
                            $query = "SELECT *
                          FROM `tb_master_tindak_pencegahan` JOIN `tb_tindak_pencegahan`
                          ON `tb_master_tindak_pencegahan`.`id_master_TP` = `tb_tindak_pencegahan`.`id_tindak_pencegahan`
                          WHERE `id_izin_kerja` = $id";
                            $data['select'] = $this->db->query($query)->result_array();
                            $a = 1;
                            ?>
                            <?php foreach ($data['select'] as $slt) : ?>
                                <tbody>

                                    <td style="text-align:center; vertical-align:middle;"><?= $a ?></td>
                                    <td style="text-align:center; vertical-align:middle;"><?= $slt['nama_tindak_pencegahan']; ?></td>

                                </tbody>
                                <?php $a++; ?>
                            <?php endforeach; ?>

                        </table>

                        <!--APD-->
                        <h6 class="title">Detail APD</h6>
                        <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <th style="text-align:center; vertical-align:middle;">NO.</th>
                                <th style="text-align:center; vertical-align:middle;">Nama APD</th>
                                <th style="text-align:center; vertical-align:middle;">Gambar APD</th>
                            </thead>
                            <?php
                            $id = $i['id'];
                            $query = "SELECT *
                          FROM `tb_master_apd` JOIN `tb_apd`
                          ON `tb_master_apd`.`id_master_APD` = `tb_apd`.`id_APD`
                          WHERE `id_izin_kerja` = $id";
                            $data['select'] = $this->db->query($query)->result_array();

                            ?>
                            <?php $a = 1; ?>
                            <?php foreach ($data['select'] as $slt) : ?>
                                <tbody>

                                    <td style="text-align:center; vertical-align:middle;"><?= $a ?></td>
                                    <td style="text-align:center; vertical-align:middle;"><?= $slt['nama_APD']; ?></td>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <div class="col-lg-6 col-md-4 col-xs-6 thumb m-auto">
                                            <a target="_blank" href="<?= base_url()  ?>assets/img/workpermit/<?= $slt['gambar_apd']; ?>" class="fancybox" rel="ligthbox">
                                                <img src="<?= base_url()  ?>assets/img/workpermit/<?= $slt['gambar_apd']; ?>" class="zoom img-fluid " alt="">
                                            </a>
                                        </div>
                                    </td>
                                </tbody>
                                <?php $a++; ?>
                            <?php endforeach; ?>

                        </table>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal view foto sebelum kerja-->
    <div class="modal fade" id="myModalViewMulai<?PHP echo $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewMulaiLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewMulaiLabel">Foto Sebelum Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Foto-->
                    <?php
                    $id = $i['id'];
                    $query = "SELECT *
                          FROM `tb_mulai_kerja`
                          WHERE `id_izin_kerja` = $id";
                    $data['select'] = $this->db->query($query)->result_array();
                    ?>

                    <!-- Images used to open the lightbox -->
                    <div class="fg-gallery cols-3">
                        <?php foreach ($data['select'] as $slt) : ?>
                            <img src="<?= base_url()  ?>assets/img/pekerjaan/awal/<?= $slt['gambar']; ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal view foto Setelah kerja-->
    <div class="modal fade" id="myModalViewAkhir<?PHP echo $i['id_complain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewDetailLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewDetailLabel">Foto Setelah Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!--Foto-->
                    <?php
                    $id = $i['id'];
                    $query = "SELECT *
                        FROM `tb_akhir_kerja`
                        WHERE `id_izin_kerja` = $id";
                    $data['select'] = $this->db->query($query)->result_array();
                    $a = 1;
                    ?>

                    <!-- Images used to open the lightbox -->
                    <div class="fg-gallery cols-3">
                        <?php foreach ($data['select'] as $slt) : ?>
                            <img src="<?= base_url()  ?>assets/img/pekerjaan/akhir/<?= $slt['gambar']; ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>