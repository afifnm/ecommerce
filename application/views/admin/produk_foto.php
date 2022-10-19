<div id="myalert"> 
  <?php echo $this->session->flashdata('alert', true)?>
</div> 
<?php foreach ($produk as $u) { ?>
<div class="row">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-8">
            <div class="card-body">
              <h5 class="card-title text-primary"><?php echo $u->nama; ?></h5>
              <?php echo $this->CRUD_model->get_kategori($u->id_kategori); ?>
              <p class="mb-4">Rp. <?php echo number_format($u->harga,0,",","."); ?></p>
              <form method='post' action='<?php echo site_url('admin/produk/uploadfoto');?>' enctype='multipart/form-data'>
                <div class="row">
                  <div class="col-md-5">
                    <input type="hidden" name="kode_produk" value="<?php echo $u->kode_produk; ?>">
                    <input type="hidden" name="id_kategori" value="<?php echo $u->id_kategori; ?>">
                    <input type='file' name='foto' class="form-control" accept="image/jpeg" required>
                  </div>    
                  <div class="col-md-4">
                    <input type='submit' value='Upload Foto' name='upload' class="form-control">
                  </div>
                </div> 
              </form>
            </div>
          </div>
          <div class="col-sm-4 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="<?php echo site_url('assets/vendor/sneat');?>/assets/img/illustrations/man-with-laptop-light.png" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" height="140">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <?php foreach ($this->CRUD_model->foto_produk($u->kode_produk) as $foto) { ?>
    <div class="col-md-3" style="margin-bottom: 20px;">
      <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <a href="<?php echo site_url('admin/produk/delete_foto/'.$u->id_kategori.'/'.$foto['namafile'].'/'.$u->kode_produk);?>" class="btn-close" onClick="return confirm('Apakah anda yakin menghapus foto ini?')"></a>
        </div>
        <div class="toast-body">
          <img class="card-img-top" src="<?php echo site_url('assets/upload/images/produk/'.$foto['namafile']);?>">
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<?php } ?>