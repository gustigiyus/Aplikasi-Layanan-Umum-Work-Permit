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
                    <h6>Role : <?= $role['role'] ?></h6>
                </div>
            </div>
        </div>
        <div class="table-responsive col-auto">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle" style="text-align: center;">No.</th>
                        <th class="align-middle" style="text-align: center;">Menu</th>
                        <th class="align-middle" style="text-align: center;">Hak Akses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                    <tr>
                        <td scope="row" class="align-middle" style="text-align: center;"><?= $i; ?></td>
                        <td class="align-middle" style="text-align: center;"><?= $m['menu']; ?></td>
                        <td class="align-middle" style="text-align: center;">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-access"
                                    <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>"
                                    data-menu="<?= $m['id']; ?>">
                            </div>
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