<div id="myalert"> 
	<?php echo $this->session->flashdata('alert', true)?>
</div> 
<div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">My Profile</h5>
        <div class="card-body">
          <form class="form-horizontal" action="<?php echo base_url('auth/updateProfile') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Username/NIS/NIP</label>
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $this->session->userdata('username'); ?>" readonly>
              </div>
              <div class="mb-3 col-md-6">
                <label for="lastName" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $this->session->userdata('nama'); ?>">
              </div>
              <div class="mb-3 col-md-6" <?php if ( $this->session->userdata('level')=='Pembeli') { echo 'hidden'; } ?> >
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $this->session->userdata('email'); ?>">
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">Nomor Whatsapp</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">IND (+62)</span>
                  <input type="text" class="form-control" placeholder="Telp" name="no_hp" value="<?php echo $this->session->userdata('no_hp'); ?>">
                </div>
              </div>
              <div class="mb-3 col-md-6" <?php if ( $this->session->userdata('level')=='Pembeli') { echo 'hidden'; } ?>>
                <label for="address" class="form-label" >Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $this->session->userdata('tempat_lahir'); ?>">
              </div>
              <div class="mb-3 col-md-6" <?php if ( $this->session->userdata('level')=='Pembeli') { echo 'hidden'; } ?>>
                <label for="state" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Tempat Lahir" name="tanggal_lahir" value="<?php echo $this->session->userdata('tanggal_lahir'); ?>">
              </div>
              <div class="mb-3 col-md-6" <?php if ( $this->session->userdata('level')=='Pembeli') { echo 'hidden'; } ?>>
                <label for="address" class="form-label">Kelas</label>
                <input type="text" class="form-control" placeholder="Kelas" name="kelas" value="<?php echo $this->session->userdata('kelas'); ?>">
              </div>
              <div class="mb-3 col-md-6" <?php if ( $this->session->userdata('level')=='Pembeli') { echo 'hidden'; } ?>>
                <label for="state" class="form-label">Tahun Masuk</label>
                <input type="number" class="form-control" placeholder="Tahun Masuk" name="tahun_ajaran" value="<?php echo $this->session->userdata('tahun_ajaran'); ?>">
              </div>
              <div class="mb-3 col-md-6">
                <label for="zipCode" class="form-label">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $this->session->userdata('alamat'); ?>">
              </div>
              
              <div class="mb-3 col-md-6">
                <label for="language" class="form-label">Foto</label>
                <input type="file" class="form-control" placeholder="Foto" name="berkas" accept="image/jpeg" >
              </div>
             
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
    </div>
  </div>