<div id="myalert"> 
	<?php echo $this->session->flashdata('alert', true)?>
</div> 
<div class="row">
  <div class="col-xl-12">
    <!-- HTML5 Inputs -->
    <form class="form-horizontal" action="<?php echo base_url('auth/updatePassword') ?>" method="POST">
    <div class="card mb-4">
      <h5 class="card-header">Password</h5>
      <div class="card-body">
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Password Lama</label>
          <div class="col-md-10">
            <input class="form-control" type="password" placeholder="Password lama" name="passLama">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Password Baru</label>
          <div class="col-md-10">
            <input class="form-control" type="password" placeholder="Password baru" name="passBaru">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Konfirmasi Password Baru</label>
          <div class="col-md-10">
            <input class="form-control" type="password" placeholder="Masukan password terbaru kembali" name="passKonf">
          </div>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Simpan</button>
        </div> 
      </div>
    </div>
    </form>
  </div>
</div>