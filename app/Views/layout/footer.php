<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Skote. | Page rendered in {elapsed_time} seconds
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Ahmad Dzaky
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- JAVASCRIPT -->
<script src="<?= base_url(); ?>/assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/node-waves/waves.min.js"></script>

<!-- Sweet Alerts js -->
<script src="<?= base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<script>
    function delData(id) {
        Swal.fire({
            icon: 'question',
            title: 'Anda yakin ingin menghapus?',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return fetch('<?= base_url('/action/delete/'); ?>/' + id)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.text()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Data berhasil dihapus'
                })
            }
            // window.setTimeout(() => {}, 3000)
            location.reload()
        })
    }

    function delDataUser(id) {
        Swal.fire({
            icon: 'question',
            title: 'Anda yakin ingin menghapus?',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return fetch('<?= base_url('/action/user/delete/'); ?>/' + id)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.text()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Data berhasil dihapus'
                })
            }
            // window.setTimeout(() => {}, 3000)
            location.reload()
        })
    }
</script>

<!-- dashboard init -->
<script src="<?= base_url(); ?>/assets/js/pages/dashboard.init.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url(); ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url(); ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url(); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>/assets/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="<?= base_url(); ?>/assets/js/app.js"></script>
</body>

</html>