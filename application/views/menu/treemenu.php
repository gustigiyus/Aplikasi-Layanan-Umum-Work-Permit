<!-- Begin Page Content -->
<div class="container-fluid">
    <div class=" card shadow-sm" style="border-bottom: #315c9a; color: #315c9a;">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h1 class="h3 text-gray-800"><?= $title ?></h1>
                </div>
                <div class="col-auto">
                    <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal"
                        data-target="#newSubMenuModal">

                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Tree Menu
                            Baru
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
                        <th class="align-middle" style="text-align: center;">Sub Menu</th>
                        <th class="align-middle" style="text-align: center;">Url</th>
                        <th class="align-middle" style="text-align: center;">Ikon</th>
                        <th class="align-middle" style="text-align: center;">Aktif</th>
                        <th class="align-middle" style="text-align: center;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($treeMenu as $trmenu) : ?>
                    <tr>
                        <td scope="row" class="align-middle" style="text-align: center;"><?= $i; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $trmenu['title']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $trmenu['menu']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $trmenu['judul']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $trmenu['url']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $trmenu['icon']; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $trmenu['is_active']; ?></td>
                        <td class="align-middle" style="text-align: center;">
                            <a class="btn btn-warning btn-sm btn-icon" data-toggle="modal"
                                data-target="#edittreemenu<?PHP echo $trmenu['id']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm btn-icon" data-toggle="modal"
                                data-target="#deltreemenu<?PHP echo $trmenu['id']; ?>">
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
            <form action="<?= base_url('menu/treemenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Judul Submenu"
                            required>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="menu_id" id="menu_id" required>
                            <option value="">- Pilih Menu -</option>
                            <?php foreach ($menu as $mn) : ?>
                            <option value="<?= $mn['id'] ?>"><?= $mn['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="ssmenu_id" id="ssmenu_id" required>
                            <option value="">- Pilih SubMenu -</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="url" id="url" placeholder="Url Submenu" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="icon" id="icon"
                            value="menu-bullet menu-bullet-dot" placeholder="Icon Submenu" required readonly>
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

<?php foreach ($treeMenu as $treemenu) : ?>
<div class="modal fade" id="edittreemenu<?PHP echo $treemenu['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="newRoleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Edit Tree Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/edittreemenu/') . $treemenu['id']; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Judul Tree Menu</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Masukan nama"
                            value="<?= $treemenu['title']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="menu">Menu : </label>
                        <select class="form-control" name="menu_id" id="menu" readonly>
                            <option value="<?= $treemenu['id']; ?>"><?= $treemenu['menu']; ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="menu">Sub Menu : </label>
                        <select name="ss_menu_id" id="menu_id" class="form-control" required readonly>
                            <option value="<?= $treemenu['id']; ?>"><?= $treemenu['judul']; ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url">Url : </label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Masukan nama"
                            value="<?= $treemenu['url']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="icon"> Icon : </label>
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Masukan nama"
                            value="<?= $treemenu['icon']; ?>" required>
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

<div class="modal fade" id="deltreemenu<?PHP echo $treemenu['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="newRoleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Hapus Tree Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/deltreemenu/') . $treemenu['id']; ?>" method="post">
                <div class="modal-body">
                    <h5 class="text text-danger">Anda Yakin Untuk Hapus Tree Menu <?php echo $treemenu['title']; ?> ?
                    </h5>
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