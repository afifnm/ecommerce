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
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Bismart E-Commerce</h2>
              <p>Murah, Mudah, Cepat</p>
            </div>
            <div class="page_link">
              <a href="<?php echo site_url('home') ?>">Beranda</a>
              <a href="#">Produk</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="cat_product_area" style="padding-top: 20px;">
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
                <?php foreach ($produks as $produk) {?>
                <?php if ($this->CRUD_model->foto_produk_1($produk['kode_produk'])!=NULL) {?>
                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <?php foreach ($this->CRUD_model->foto_produk_1($produk['kode_produk']) as $foto) { ?>
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
                        <h4><?php echo $produk['nama']; ?></h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">Rp. <?php echo number_format($produk['harga'],0,",","."); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="left_sidebar_area">
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Daftar Produk</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <li>
                    <a href="<?php echo site_url('home/produk/');?>">Semua</a>
                    </li>
                <?php foreach ($kategori_produk as $key) { ?>
                    <li>
                    <a href="<?php echo site_url('home/produk/kategori/'.$key['id_kategori']);?>"><?php echo $key['kategori']; ?></a>
                  </li>
                <?php }  ?>
                  </ul>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php require_once('_footer.php'); ?>
    <?php require_once('_js.php'); ?>
  </body>
</html>
