<!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item <?php if ($no==0) { echo 'active'; } ?>">
        <img src="<?php echo site_url('assets/upload/banner.jpg');?>" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div> -->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Bismart E-Commerce</h2>
                    <p style="color: black;;">Murah, Mudah, Cepat</p>
                </div>
                <div class="page_link">
                    <a style="color: black;" href="<?php echo site_url('home') ?>">Beranda</a>
                    <a style="color: black;" href="<?php echo site_url('home') ?>">Produk</a>
                    <a style="color: black;" href="#"><?php echo $nama_kategori; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>