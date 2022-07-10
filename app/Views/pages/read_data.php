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
                        <h4 class="mb-sm-0 font-size-18">Detail Buku</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Detail Buku</li>
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
                            <!-- <div class="card mb-3" style="max-width: 540px;"> -->
                            <div class="row">
                                <?php foreach ($data->getResultArray() as $datas) : ?>
                                    <!-- <div class="col-md-1"> -->
                                    <div class="col-lg-2">

                                        <img src="<?= $datas['sampul'] ?>" class="rounded me-2" style="width: 150px; height: 220px; object-fit: center;" alt="zpedia">

                                    </div>
                                    <!-- </div> -->
                                    <div class="col-lg-8 mt-2">
                                        <!-- <div class="card-body"> -->
                                        <h5 class="card-title"><?= $datas['judul']; ?></h5>
                                        <p class="card-text" style="text-align: justify;"><?= $datas['deskripsi']; ?></p>
                                        <p class="card-text"><small class="text-muted"><b>Pengarang : </b><?= $datas['pengarang']; ?><br>
                                                <b>Penerbit/Thn Terbit : </b><?= $datas['penerbit']; ?>/<?= $datas['tahun_terbit'] ?></small></p>
                                        <a href="<?= base_url(); ?>"><i class="mdi mdi-arrow-left"> Kembali</i></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <?= $this->endSection(); ?>