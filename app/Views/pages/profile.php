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
                        <h4 class="mb-sm-0 font-size-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- start row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Ganti Nama</h4>
                            <?php if (session()->getFlashdata('name_changed')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('name_changed'); ?>
                                </div>
                            <?php endif; ?>
                            <?php foreach ($data->getResultArray() as $datas) : ?>
                                <form method="post" action="<?= base_url('/action/profile/update/name/' . $datas['id']); ?>">
                                    <?= csrf_field(); ?>
                                    <div class="form-group mb-2">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" value="<?= old('name', $datas['name']); ?>">
                                        <div class="invalid-feedback mb-3">
                                            <?= $validation->getError('name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" value="<?= $datas['username']; ?>" readonly>

                                    </div>


                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                    </div>
                                </form>
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Ganti Password</h4>
                            <?php if (session()->getFlashdata('pass_changed')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pass_changed'); ?>
                                </div>
                            <?php endif; ?>
                            <?php foreach ($data->getResultArray() as $datas) : ?>
                                <form method="post" action="<?= base_url('/action/profile/update/password/' . $datas['id']); ?>">
                                    <?= csrf_field(); ?>
                                    <div class="form-group mb-2">
                                        <label for="password">Password Lama</label>
                                        <input type="password" name="password_old" id="password_old" class="form-control <?= ($validation->hasError('password_old')) ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback mb-3">
                                            <?= $validation->getError('password_old'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="password">Password Baru</label>
                                        <input type="password" name="password_new" id="password_new" class="form-control <?= ($validation->hasError('password_new')) ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback mb-3">
                                            <?= $validation->getError('password_new'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="password">Konfirmasi Password Baru</label>
                                        <input type="password" name="password_confirm" id="password_confirm" class="form-control <?= ($validation->hasError('password_confirm')) ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback mb-3">
                                            <?= $validation->getError('password_confirm'); ?>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                    </div>
                                </form>
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
            <?= $this->endSection(); ?>