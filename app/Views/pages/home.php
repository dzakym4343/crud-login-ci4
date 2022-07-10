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
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Selamat Datang !</h5>
                                        <p>Halaman Utama</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?= base_url(); ?>/assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="<?= base_url(); ?>/assets/images/users/avv.jpg" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate"><?= session()->get('name'); ?></h5>
                                    <p class="text-muted mb-0 text-truncate"><?= ucwords(session()->get('role')); ?></p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15"><?= $_SERVER['REMOTE_ADDR']; ?></h5>
                                                <p class="text-muted mb-0">IP Anda</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15"><?= date("d M Y H:i:s"); ?></h5>
                                                <p class="text-muted mb-0">Informasi Waktu</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="<?= base_url('/pages/profile') ?>" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-7">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Jumlah Buku</p>
                                            <h5 class="mb-0"><?= $countData; ?></h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="fa-regular fa-book font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (session()->get('role') == "admin") : ?>
                                <a href="<?= base_url('/pages/buku/add'); ?>" class="btn btn-primary waves-effect waves-light mb-2">Tambah Data</a>
                            <?php endif; ?>
                            <h4 class="card-title mt-2">Daftar Buku</h4>
                            <?php if (session()->getFlashdata('success_msg')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('success_msg'); ?>
                                </div>
                            <?php endif; ?>
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sampul</th>
                                        <th>Judul Buku</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data->getResultArray() as $datas) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><img class="rounded me-2" width="100px" src="<?= $datas['sampul']; ?>" alt=""></td>
                                            <td><?= $datas['judul'] ?></td>
                                            <td>
                                                <a href="<?= base_url('/pages/buku/list/' . $datas['slug']); ?>" class="btn btn-success waves-effect waves-light"><i class="fa fa-list"></i></a>
                                                <?php if (session()->get('role') == "admin") : ?>
                                                    <a href="<?= base_url('/pages/buku/edit/' . $datas['slug']); ?>" class="btn btn-warning waves-effect waves-light"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="delData(<?= $datas['id']; ?>)" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <?= $this->endSection(); ?>