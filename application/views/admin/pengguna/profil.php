<?php foreach ($profil as $u) {?>
<div class="row mb-5">
  <div class="col-md-4">
    <div class="card h-100">
        <?php $filename=FCPATH.'/assets/upload/images/profil/'.$u->foto;
        if (file_exists($filename)){ ?>
          <img class="card-img-top" src="<?php echo base_url('assets/upload/images/profil/'.$u->foto); ?>" >
        <?php }  else {?>
          <img class="card-img-top" src="<?php echo base_url('assets/upload/images/no_image.jpg'); ?>" >
        <?php }?>
        <center>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo $u->nama; ?></li>
          </ul>
        </center>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card h-100">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="row">
            <div class="col-md-3"><b>Tempat, Tgl. Lahir</b></div>
            <div class="col-md-9">
              <?php 
              if(($u->tempat_lahir)==NULL){
                echo"Tempat lahir belum dilengkapi";
              } else{
                echo $u->tempat_lahir;
              }
              ?>, 
              <?php 
              if(($u->tanggal_lahir)=='0000-00-00'){
                echo"Tanggal lahir belum dilengkapi";
              } else{
                $this->load->helper('tgl_indo');
                echo date_indo($u->tanggal_lahir);
              }
            ?>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col-md-3"><b>Email</b></div>
            <div class="col-md-9">
              <?php 
              if(($u->email)==NULL){ echo"Email belum dilengkapi";} else{ echo $u->email;} ?>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col-md-3"><b>Kelas</b></div>
            <div class="col-md-9">
              <?php 
              if(($u->kelas)==NULL){ echo"Kelas belum dilengkapi";} else{ echo $u->kelas;} ?>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col-md-3"><b>Tahun Masuk</b></div>
            <div class="col-md-9">
              <?php 
              if(($u->tahun_ajaran)==NULL){ echo"Tahun masuk belum dilengkapi";} else{ echo $u->tahun_ajaran;} ?>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col-md-3"><b>Nomor HP</b></div>
            <div class="col-md-9">
              <?php 
              if(($u->no_hp)==NULL){ echo"Nomo HP belum dilengkapi";} else{ echo $u->no_hp;} ?>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col-md-3"><b>Alamat</b></div>
            <div class="col-md-9">
              <?php 
              if(($u->alamat)==NULL){ echo"Alamat belum dilengkapi";} else{ echo $u->alamat;} ?>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>        
<?php } ?>