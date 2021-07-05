<!-- Begin Page Content -->
<div class="container-fluid">
    <div class=" card shadow-sm" style="border-bottom: #315c9a; color: #315c9a;">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h1 class="h3 text-gray-800"><?= $title ?></h1>
                </div>
                <div class="col-auto">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal"
                        data-target="#newSubMenuModal">

                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Submenu Baru
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive mb-2 mt-3 col-auto">
            <table id="complain" class="table table-striped table-hover table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="align-middle" style="text-align: center;">#</th>
                        <th class="align-middle" style="text-align: center;">Judul</th>
                        <th class="align-middle" style="text-align: center;">Menu</th>
                        <th class="align-middle" style="text-align: center;">Url</th>
                        <th class="align-middle" style="text-align: center;">Ikon</th>
                        <th class="align-middle" style="text-align: center;">Aktif</th>
                        <th class="align-middle" style="text-align: center;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                    <tr>
                        <td scope="row" class="align-middle" style="text-align: center;"><?= $i; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $sm['title']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $sm['menu']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $sm['url']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $sm['icon']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $sm['is_active']; ?></td>
                        <td class="align-middle" style="text-align: center;">
                            <a class="btn btn-warning btn-sm btn-icon" data-toggle="modal"
                                data-target="#editsubmenu<?PHP echo $sm['id']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm btn-icon" data-toggle="modal"
                                data-target="#hapussubmenu<?PHP echo $sm['id']; ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Submenu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Judul Submenu"
                            required>
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control" required>
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" id="url" placeholder="Url Submenu" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon Submenu"
                            required>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active"
                                checked>
                            <label class="form-check-label" for="is_active">Aktif?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($subMenu as $submen) : ?>
<div class="modal fade" id="editsubmenu<?PHP echo $submen['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="newRoleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/editsubmenu/') . $submen['id']; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Masukan nama"
                            value="<?= $submen['title']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="menu">Menu : </label>
                        <select class="form-control" name="menu" id="menu">
                            <option value="<?php echo $submen['menu_id']; ?>"><?php echo $submen['menu']; ?></option>
                            <?php foreach ($menu as $men) : ?>
                            <option value="<?php echo $men['id']; ?>"><?php echo $men['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url">Url : </label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Masukan nama"
                            value="<?= $submen['url']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="icon"> Icon : </label>
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Masukan nama"
                            value="<?= $submen['icon']; ?>" required>
                    </div>
                    <div class="form-group" hidden>
                        <label for="aktif">AKTIF? : </label>
                        <select class="form-control" name="aktif" id="aktif">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hapussubmenu<?PHP echo $submen['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="newRoleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Hapus Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/hapussubmenu/') . $submen['id']; ?>" method="post">
                <div class="modal-body">
                    <h5 class="text text-danger">Anda Yakin Untuk Hapus Menu <?php echo $submen['title']; ?> ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>