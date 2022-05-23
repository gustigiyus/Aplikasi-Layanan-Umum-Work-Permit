<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-2 text-gray-800">Persetujuan Izin Kerja</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Kelola Izin Kerja</a></li>
            <li class="breadcrumb-item active" aria-current="page">Persetujuan Izin Kerja</li>
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
                                <h2 class="font-weight-bold text-primary">Tables Izin Kerja</b></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="kelola-data-izin-kerja" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="text-align: center;">#</th>
                                    <th class="align-middle" style="text-align: center;">Nama Kontraktor</th>
                                    <th class="align-middle" style="text-align: center;">Nama Penangung Jawab</th>
                                    <th class="align-middle" style="text-align: center;">No Telp Kantor</th>
                                    <th class="align-middle" style="text-align: center;">Deskripsi Pekerjaan</th>
                                    <th class="align-middle" style="text-align: center;">Waktu Mulai</th>
                                    <th class="align-middle" style="text-align: center;">Waktu Akhir</th>
                                    <th class="align-middle" style="text-align: center;">Detail Komplain</th>
                                    <th class="align-middle" style="text-align: center;">Status Izin Kerja</th>
                                    <th class="align-middle" style="text-align: center;">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($izin as $izn_krj) : ?>
                                    <tr>
                                        <td class="align-middle" style="text-align: center;"><?= $i; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $izn_krj['nama_kontraktor']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $izn_krj['nama_penanggung_jawab']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $izn_krj['no_telp_kantor']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $izn_krj['deskripsi_pekerjaan']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $izn_krj['waktu_mulai']; ?></td>
                                        <td class="align-middle" style="text-align: center;"><?= $izn_krj['waktu_akhir']; ?></td>
                                        <td class="align-middle" style="text-align: center;">
                                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalViewDetailComplain<?PHP echo $izn_krj['id_complain']; ?>">Detail Komplain</a>
                                        </td>
                                        <?php if ($izn_krj['status_izin_kerja'] == 'Meminta Izin Kerja') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">0%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Meminta Izin Kerja" class="badge badge-warning"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($izn_krj['status_izin_kerja'] == 'Izin Kerja Disetujui') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">25%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Izin Kerja berhasil disetujui" class="badge badge-primary"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($izn_krj['status_izin_kerja'] == 'Sedang Dikerjakan') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">50%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Komplain Sedang Dikerjakan" class="badge badge-primary"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($izn_krj['status_izin_kerja'] == 'Selesai Dikerjakan') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">75%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Komplain telah selesai dikerjakan" class="badge badge-primary"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($izn_krj['status_izin_kerja'] == 'Selesai') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest">100%</span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Komplain telah selesai dan berhasil ditutup" class="badge badge-success"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php elseif ($izn_krj['status_izin_kerja'] == 'Izin Kerja Ditolak') : ?>
                                            <td class="align-middle" style="text-align: center;">
                                                <div class="d-flex flex-column w-100 mr-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-dark mr-2 font-size-sm font-weight-boldest"><strong>Ditolak</strong></span>
                                                        <span data-toggle="tooltip" data-theme="dark" data-placement="left" title="Izin Kerja Ditolak" class="badge badge-danger"><?= $izn_krj['status_izin_kerja']; ?></span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        <?php endif; ?>

                                        <td class="align-middle" style="text-align: center;">
                                            <?php if ($izn_krj['status_izin_kerja'] == "Meminta Izin Kerja") : ?>
                                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#myModaleditStatusIzin<?PHP echo $izn_krj['id']; ?>"><i class="fa fa-binoculars"></i></a>
                                            <?php elseif ($izn_krj['status_izin_kerja'] == "Izin Kerja Disetujui") : ?>
                                                <button disabled class="btn btn-info" style="cursor: not-allowed;"><i class="fa fa-binoculars"></i></button>
                                            <?php elseif ($izn_krj['status_izin_kerja'] == "Sedang Dikerjakan") : ?>
                                                <button disabled class="btn btn-info" style="cursor: not-allowed;"><i class="fa fa-binoculars"></i></button>
                                            <?php elseif ($izn_krj['status_izin_kerja'] == "Selesai Dikerjakan") : ?>
                                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#myModaleditStatusIzin<?PHP echo $izn_krj['id']; ?>"><i class="fa fa-binoculars"></i></a>
                                            <?php elseif ($izn_krj['status_izin_kerja'] == "Selesai") : ?>
                                                <button disabled class="btn btn-info" style="cursor: not-allowed;"><i class="fa fa-binoculars"></i></button>
                                            <?php elseif ($izn_krj['status_izin_kerja'] == "Izin Kerja Ditolak") : ?>
                                                <a href="" class="btn btn-trash"><i class="fa fa-trash" style="color: red;"></i></a>
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

<!-- DATA MODAL -->

<!-- Modal view detail complain-->
<?php foreach ($complain as $comp) : ?>
    <div class="modal fade" id="myModalViewDetailComplain<?PHP echo $comp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewLabelcomplain">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewLabelcomplain">Data Komplain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="<?= $comp['email']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama Lengkap</label>
                                <input type="nama" class="form-control" value="<?= $comp['nama']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="judul">Judul Komplain</label>
                                <input type="text" class="form-control" value="<?= $comp['judul_complain']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="deksripsi">Deskripsi</label>
                                <input type="text" class="form-control" value="<?= $comp['deskripsi']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="keadaan">Tingkat Bahaya</label>
                                <input type="text" class="form-control" value="<?= $comp['tingkat_bahaya']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bahaya">Tingkat Bahaya</label>
                                <input type="text" class="form-control" value="<?= $comp['keadaan']; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tanggal Diajukan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?= $comp['tanggal_ajukan']; ?>" readonly>
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
<?php endforeach; ?>


<?php foreach ($izin as $izn_krj) : ?>
    <div class="modal fade" id="myModaleditStatusIzin<?PHP echo $izn_krj['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModaleditStatusLabelizin">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModaleditStatusLabelizin">Ubah Status Izin Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kelola_izin_kerja/workpermit/editPersetujuanIzinKerja'); ?>" method="post">
                    <div class="modal-body">
                        <div class="row justify-content-around">
                            <?php if ($izn_krj['status_izin_kerja'] == "Meminta Izin Kerja") : ?>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewIzin<?PHP echo $izn_krj['id']; ?>">Detail Izin Kerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewPekerja<?PHP echo $izn_krj['id']; ?>">Detail Pekerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewDetail<?PHP echo $izn_krj['id']; ?>">Detail Lainnya</a>
                            <?php elseif ($izn_krj['status_izin_kerja'] == "Selesai Dikerjakan") : ?>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewIzin<?PHP echo $izn_krj['id']; ?>">Detail Izin Kerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewPekerja<?PHP echo $izn_krj['id']; ?>">Detail Pekerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewDetail<?PHP echo $izn_krj['id']; ?>">Detail Lainnya</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewMulaiKerja<?PHP echo $izn_krj['id']; ?>">Detail Mulai Kerja</a>
                                <a href="" class="btn btn-primary col-md-5 mt-2" data-toggle="modal" data-target="#myModalViewAkhiriKerja<?PHP echo $izn_krj['id']; ?>">Detail Akhiri Kerja</a>
                            <?php endif; ?>
                        </div>
                        <div class="form-group" hidden>
                            <h6>id izin</h6>
                            <input type="text" class="form-control" name="id_izin" value="<?= $izn_krj['id']; ?>">
                        </div>
                        <div class="form-group" hidden>
                            <h6>id Komplain</h6>
                            <input type="text" class="form-control" name="id_complain" value="<?= $izn_krj['id_complain']; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <select class="form-control" name="status_izin_kerja">
                                <?php if ($izn_krj['status_izin_kerja'] == "Meminta Izin Kerja") : ?>
                                    <option value="<?= $izn_krj['status_izin_kerja']; ?>"><?= $izn_krj['status_izin_kerja']; ?></option>
                                    <option value="Izin Kerja Disetujui">Izin Kerja Disetujui</option>
                                    <option value="Izin Kerja Ditolak">Izin Kerja Ditolak</option>
                                <?php elseif ($izn_krj['status_izin_kerja'] == "Selesai Dikerjakan") : ?>
                                    <option value="<?= $izn_krj['status_izin_kerja']; ?>"><?= $izn_krj['status_izin_kerja']; ?></option>
                                    <option value="Selesai">Selesai</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- foreach tb izin kerja-->
<?php foreach ($izin as $i) : ?>

    <!-- Modal view detail izin kerja-->
    <div class="modal fade" id="myModalViewIzin<?PHP echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewIzinLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewIzinLabel">Data Izin Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="id_complain">ID Comp</label>
                            <input type="text" class="form-control" value="<?= $i['id_complain']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="nama_kontraktor">Nama Kontraktor</label>
                            <input type="text" class="form-control" value="<?= $i['nama_kontraktor']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="nama_penanggung_jawab">Nama Penanggung Jawab</label>
                            <input type="text" class="form-control" value="<?= $i['nama_penanggung_jawab']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_telp_kantor">No Telepon Kantor</label>
                            <input type="text" class="form-control" value="<?= $i['no_telp_kantor']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="deksripsi_pekerjaan">Deskripsi Pekerjaan</label>
                            <input type="text" class="form-control" value="<?= $i['deskripsi_pekerjaan']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Tanggal Mulai Dikerjakan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?= $i['tanggal_dikerjakan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Waktu Mulai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?= $i['waktu_mulai']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Waktu Akhir</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?= $i['waktu_akhir']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal view detail Pekerja-->
    <div class="modal fade" id="myModalViewPekerja<?PHP echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewPekerjaLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewPekerjaLabel">Data Pekerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
            </div>
        </div>
    </div>

    <!--Modal view detail lainnya(potensi,tindak,apd)-->
    <div class="modal fade" id="myModalViewDetail<?PHP echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewDetailLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewDetailLabel">Data K3</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Jenis Potensi-->
                    <h6 class="title">Data Jenis Potensi</h6>
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
                    <h6 class="title">Data Tindak Pencegahan</h6>
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
                    <h6 class="title">Data APD</h6>
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
                                    <img src="<?= base_url()  ?>assets/img/workpermit/<?= $slt['gambar_apd']; ?>" class="img-thumbnail" width="300px">
                                </td>
                            </tbody>
                            <?php $a++; ?>
                        <?php endforeach; ?>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal view detail Mulai Kerja-->
    <div class="modal fade" id="myModalViewMulaiKerja<?PHP echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewMulaiKerjaLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewMulaiKerjaLabel">Data Mulai Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <th class="align-middle" style="text-align: center;">No.</th>
                            <th class="align-middle" style="text-align: center;">Gambar</th>
                        </thead>
                        <?php
                        $no = 1;
                        $data['mulai_kerja'] = $this->db->get_where('tb_mulai_kerja', ['id_izin_kerja' => $i['id']])->result_array();
                        ?>
                        <?php foreach ($data['mulai_kerja'] as $m_krj) : ?>
                            <tbody>
                                <td class="align-middle" style="text-align: center;"><?= $no ?></td>
                                <td class="align-middle" style="text-align: center;">
                                    <img src="<?= base_url()  ?>assets/img/pekerjaan/awal/<?= $m_krj['gambar']; ?>" class="img-thumbnail" width="300px">
                                </td>
                            </tbody>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal view detail Akhiri Kerja-->
    <div class="modal fade" id="myModalViewAkhiriKerja<?PHP echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalViewAkhiriLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalViewAkhiriLabel">Data Akhiri Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <th class="align-middle" style="text-align: center;">No.</th>
                            <th class="align-middle" style="text-align: center;">Gambar</th>
                        </thead>
                        <?php
                        $no = 1;
                        $data['akhiri_kerja'] = $this->db->get_where('tb_akhir_kerja', ['id_izin_kerja' => $i['id']])->result_array();
                        ?>
                        <?php foreach ($data['akhiri_kerja'] as $a_krj) : ?>
                            <tbody>
                                <td style="text-align:center; vertical-align:middle;"><?= $no ?></td>
                                <td class="align-middle" style="text-align: center;">
                                    <img src="<?= base_url()  ?>assets/img/pekerjaan/akhir/<?= $a_krj['gambar']; ?>" class="img-thumbnail" width="300px">
                                </td>
                            </tbody>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>
<!-- End of Main Content -->