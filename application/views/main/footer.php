<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Team Aslab 2021</div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src=" <?= base_url('assets/') ?>js/scripts.js"> </script>
<script src="<?= base_url('assets/') ?>js/datatables-demo.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Ya</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="logoutModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('super_admin/logoutAdmin'); ?>">Ya</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('.set1').hide();
    $('.set2').hide();
    $("#golongan").change(function() {
        var pilih = $(this).children("option:selected").val();

        if (pilih == 'BPJS') {
            $('.set1').hide();
            $('.set2').show();
            $(".cl").click(function() {
                if ($('.set2').show()) {
                    $('.set1').remove();
                } else {
                    $('.set1').hide();
                }
            });
        } else if (pilih == "Umum") {
            $('.set2').hide();
            $('.set1').show();
            $(".cl").click(function() {
                if ($('.set1').show()) {
                    $('.set2').remove();
                } else {
                    $('.set2').hide();
                }
            });
        }
    });
</script>

<script>
    $('.sett1').hide();
    $('.sett2').hide();
    $("#golongan1").change(function() {
        var pilih = $(this).children("option:selected").val();

        if (pilih == 'BPJS') {
            $('.sett1').hide();
            $('.sett2').show();
        } else {
            $('.sett2').hide();
            $('.sett1').show();
        }
    });
</script>


</body>

</html>