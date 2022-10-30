<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/libs/popper/popper.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/js/bootstrap.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/js/menu.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/sneat/assets/js/main.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
    $('#example2').DataTable();
  });
</script>
<script src="https://cdn.tiny.cloud/1/aq37vou6o6fl7r2lfo92721t18z6173r03hevnh6qpu52i0f/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
 tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>