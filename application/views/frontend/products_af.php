<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href='<?php echo base_url("assets/upload/logo.png"); ?>' rel='shortcut icon' type='image/png' />
    <title><?php echo $title; ?></title>
    <?php require_once('_css.php'); ?>
  </head>
  <body>
    <?php require_once('_navigasi.php'); ?>
    <?php require_once('_header_af.php'); ?>
    <section class="cat_product_area" style="padding-top: 20px; padding-bottom:120px;">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="latest_product_inner">
              <div class="row">
                <?php foreach ($query as $produk) {?>
                  <?php if ($this->CRUD_model->foto_produk_1($produk->kode_produk)!=NULL) {?>
                  <div class="col-lg-3 col-md-4 col-6">
                    <div class="single-product">
                      <div class="product-img">
                        <?php foreach ($this->CRUD_model->foto_produk_1($produk->kode_produk) as $foto) { ?>
                        <img class="card-img" src="<?php echo site_url('assets/upload/images/produk/'.$foto['namafile']);?>"
                        style="height: 170px;">
                        <?php } ?>
                        <div class="p_icon">
                          <a href="<?php echo site_url('affiliate/product/'.$produk->kode_produk) ?>" target="_blank">
                          <i class="ti-shopping-cart"></i></a>
                        </div>
                      </div>
                      <div class="product-btm">
                        <a href="<?php echo site_url('affiliate/product/'.$produk->kode_produk) ?>" class="d-block" target="_blank">
                          <h4><?php echo $produk->nama; ?></h4>
                        </a>
                        <div class="mt-3">
                          <span class="mr-4">Rp. <?php echo number_format($produk->harga,0,",","."); ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                <?php } ?>    
                <?php if ($query==NULL) {
                  echo '<div class="col-md-12">Tidak ada barang.</div>';
                } ?>     
                <div class="col-md-12">
                  <nav class="blog-pagination justify-content-left d-flex" style="margin-top:0px";>
                    <ul class="pagination" style="font-size: 20px ;">
                    <?php echo $halaman;?>
                    </ul>     
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <?php require_once('_sidebar_af.php'); ?>
        </div>
      </div>
    </section>
    <?php require_once('_footer.php'); ?>
    <?php require_once('_js.php'); ?>
    <script>
      var cari = document.getElementById('cari');
      cari.addEventListener("keydown", function(event) {
        if (event.keyCode==13) {
          window.location.href = '<?php echo site_url('home/pencarian/') ?>'+cari.value;
        }
      })
    </script>
  </body>
</html>
