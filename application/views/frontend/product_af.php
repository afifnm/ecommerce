<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href='<?php echo base_url("assets/upload/logo.png"); ?>' rel='shortcut icon' type='image/png' />
    <title><?php echo $title; ?></title>
    <?php require_once('_css.php'); ?>
    <style>
      .s_product_text p{
        margin: 0;
        padding: 0;
        border: 0;
      }
    </style>
  </head>
  <body>
    <?php require_once('_navigasi.php'); ?>
    <?php require_once('_header.php'); ?>
    <?php foreach ($products as $product) { ?>
          <!--================Single Product Area =================-->
    <div class="product_image_area"  style="margin-bottom: 50px ; padding-top: 50px;">
      <div class="container">
        <div class="row s_product_inner">
          <div class="col-lg-6">
            <div class="s_product_img">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php $no=0; foreach ($this->CRUD_model->foto_produk($product['kode_produk']) as $foto) { ?>
                  <div class="carousel-item <?php if ($no==0) { echo 'active'; } ?>">
                    <img src="<?php echo site_url('assets/upload/images/produk/'.$foto['namafile']);?>" class="d-block w-100">
                  </div>
                  <?php $no++; } ?>
                </div>
              <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <h3><?php echo $product['nama']; ?></h3>
              <h2>Rp. <?php echo number_format($product['harga'],0,",","."); ?></h2>
              <ul class="list">
                <li>
                  <a class="active" href="<?php echo site_url('home/kategori/'.$product['id_kategori'].'/0');?>">
                    <span>Kategori</span> : <?php echo $this->CRUD_model->get_kategori($product['id_kategori']); ?>
                  </a>
                </li>
                <li>
                  <a href="#"> <span>Stok</span> : <?php echo $product['stok']; ?> pc</a>
                </li>
              </ul>
                <?php echo $product['deskripsi']; ?>
              <form method="post" action="<?php echo site_url('cart/simpan');?>">
                <div class="product_count">
                  <label for="qty">Jumlah:</label>
                  <input type="number" name="jumlah" min="1" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                  <input type="hidden" name="kode_produk" value="<?php echo $product['kode_produk'] ?>">
                  <input type="hidden" name="pembeli" value="<?php echo $this->session->userdata('username') ?>">
                  <input type="hidden" name="penjual" value="<?php echo $username; ?>">
                </div>
                <div class="card_area"> 
                  <button class="main_btn" type="submit" <?php if($product['stok']<1){ echo "disabled"; } ?>>Masukan Keranjang</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================End Single Product Area =================-->
    <br>
    <?php } ?> 
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
