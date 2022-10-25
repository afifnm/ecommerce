<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Bismart E-Commerce</title>
    <?php require_once('_css.php'); ?>
  </head>
  <body>
    <?php require_once('_navigasi.php'); ?>
    <?php require_once('_header.php'); ?>
    <section class="cat_product_area" style="padding-top: 20px; padding-bottom:120px;">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="product_top_bar">
              <div class="left_dorp">
                Pencarian
              </div>
            </div>
            <div class="latest_product_inner">
              <div class="row">
                <?php foreach ($query as $produk) {?>
                  <?php if ($this->CRUD_model->foto_produk_1($produk->kode_produk)!=NULL) {?>
                  <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                      <div class="product-img">
                        <?php foreach ($this->CRUD_model->foto_produk_1($produk->kode_produk) as $foto) { ?>
                        <img class="card-img" src="<?php echo site_url('assets/upload/images/produk/'.$foto['namafile']);?>">
                        <?php } ?>
                        <div class="p_icon">
                          <a href="#"><i class="ti-eye"></i></a>
                          <a href="#"><i class="ti-heart"></i></a>
                          <a href="#"><i class="ti-shopping-cart"></i></a>
                        </div>
                      </div>
                      <div class="product-btm">
                        <a href="#" class="d-block">
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
          <?php require_once('_sidebar.php'); ?>
        </div>
      </div>
    </section>
    <?php require_once('_footer.php'); ?>
    <?php require_once('_js.php'); ?>
  </body>
</html>
