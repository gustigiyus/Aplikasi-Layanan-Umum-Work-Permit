<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <h5>Role : <?= $role['role'] ?></h5>

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
                                    <input type="checkbox" class="form-check-access" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
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