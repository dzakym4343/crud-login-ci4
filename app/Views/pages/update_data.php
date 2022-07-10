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
                        <h4 class="mb-sm-0 font-size-18">Edit Data Buku</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Edit Data Buku</li>
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
                            <?php foreach ($data->getResultArray() as $datas) : ?>
                                <form method="post" action="<?= base_url('/action/update/' . $datas['id']); ?>">
                                    <?= csrf_field(); ?>
                                    <div class="form-group mb-2">
                                        <label for="sampul">Sampul</label>
                                        <input type="text" name="sampul" id="sampul" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ?>" value="<?= old('sampul', $datas['sampul']); ?>">
                                        <div class="invalid-feedback mb-3">
                                            <?= $validation->getError('sampul'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="judul">Judul Buku</label>
                                        <input type="text" name="judul" id="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" value="<?= old('judul', $datas['judul']); ?>">
                                        <div class=" invalid-feedback mb-3">
                                            <?= $validation->getError('judul'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="pengarang">deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : '' ?>"><?= old('deskripsi', $datas['deskripsi']); ?></textarea>
                                        <div class="invalid-feedback mb-3">
                                            <?= $validation->getError('deskripsi'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="pengarang">Pengarang</label>
                                        <input type="text" name="pengarang" id="pengarang" class="form-control <?= ($validation->hasError('pengarang')) ? 'is-invalid' : '' ?>" value="<?= old('pengarang', $datas['pengarang']); ?>">
                                        <div class="invalid-feedback mb-3">
                                            <?= $validation->getError('pengarang'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" name="penerbit" id="penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ?>" value="<?= old('penerbit', $datas['penerbit']); ?>">
                                        <div class="invalid-feedback mb-3">
                                            <?= $validation->getError('penerbit'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="tahun_terbit">Tahun Terbit</label>
                                        <input type="hidden" name="slug" value="<?= $datas['slug']; ?>">
                                        <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control <?= ($validation->hasError('tahun_terbit')) ? 'is-invalid' : '' ?>" value="<?= old('tahun_terbit', $datas['tahun_terbit']); ?>">
                                        <div class="invalid-feedback mb-3">
                                            <?= $validation->getError('tahun_terbit'); ?>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Edit Data</button>
                                    </div>
                                </form>
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <?= $this->endSection(); ?>