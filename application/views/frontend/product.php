<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title><?php echo $title; ?></title>
    <?php require_once('_css.php'); ?>
  </head>
  <body>
    <?php require_once('_navigasi.php'); ?>
    <?php require_once('_header.php'); ?>
    <section class="cat_product_area" style="padding-top: 20px; padding-bottom:120px;">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="product_top_bar" style="padding :0px;">
              <div class="input-group-icon mt-10">
                <div class="icon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <input type="text" name="address" placeholder="Pencarian..." class="single-input" id="cari">
                </div>
            </div>
            <div class="latest_product_inner">
              <div class="row">
  <?php foreach ($products as $product) { ?>
    <div class="product_image_area">
      <div class="container">
        <div class="row s_product_inner">
          <div class="col-lg-12">
            <div class="s_product_img" style="">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <?php $no=0; foreach ($this->CRUD_model->foto_produk($product['kode_produk']) as $foto) { ?>
                  <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $no; ?>" 
                  class="<?php if ($no==0) { echo 'active';} ?>">
                    <img src="<?php echo site_url('assets/upload/images/produk/'.$foto['namafile']);?>">
                  </li>
                  <?php $no++; } ?>
                </ol>
                <div class="carousel-inner">
                  <?php $no=0; foreach ($this->CRUD_model->foto_produk($product['kode_produk']) as $foto2) { ?>
                  <div class="carousel-item <?php if ($no==0) { echo 'active';} ?>">
                    <img class="d-block w-100" src="<?php echo site_url('assets/upload/images/produk/'.$foto2['namafile']);?>">
                  </div>
                  <?php $no++; } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <h3><?php echo $product['nama']; ?></h3>
              <h2>Rp. <?php echo number_format($product['harga'],0,",","."); ?></h2>
              <ul class="list">
                <li>
                  <a class="active" href="#">
                    <span>Kategori</span> : <?php echo $product['kategori']; ?></a>
                </li>
                <li>
                  <a href="#"> <span>Stok</span> : <?php echo $product['stok']; ?></a>
                </li>
              </ul>
              <p>
                <?php echo $product['deskripsi']; ?>
              </p>
              <div class="product_count">
                <label for="qty">Quantity:</label>
                <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
                  <i class="lnr lnr-chevron-up"></i>
                </button>
                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">
                  <i class="lnr lnr-chevron-down"></i>
                </button>
              </div>
              <div class="card_area">
                <a class="main_btn" href="#">Add to Cart</a>
                <a class="icon_btn" href="#">
                  <i class="lnr lnr lnr-diamond"></i>
                </a>
                <a class="icon_btn" href="#">
                  <i class="lnr lnr lnr-heart"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  <?php } ?> 

              </div>
            </div>
          </div>
          <?php require_once('_sidebar.php'); ?>
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
