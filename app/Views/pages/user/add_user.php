<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tambah User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Tambah User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- start row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (session()->getFlashdata('success_msg')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('success_msg'); ?>
                                </div>
                            <?php endif; ?>
                            <form method="post" action="<?= base_url('/action/user/add'); ?>">
                                <?= csrf_field(); ?>
                                <div class="form-group mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" placeholder="" value="<?= old('name'); ?>">
                                    <div class=" invalid-feedback mb-3">
                                        <?= $validation->getError('name'); ?>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>" placeholder="" value="<?= old('username'); ?>">
                                    <div class="invalid-feedback mb-3">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="">
                                    <div class="invalid-feedback mb-3">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah User</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <?= $this->endSection(); ?>