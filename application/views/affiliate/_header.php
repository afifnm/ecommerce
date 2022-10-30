<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2><?php echo $this->CRUD_model->get_nama_user($username); ?> Store</h2>
                    <p>Murah, Mudah, Cepat</p>
                </div>
                <div class="page_link">
                    <a href="<?php echo site_url('home') ?>">Beranda</a>
                    <a href="<?php echo site_url('home') ?>">Produk</a>
                    <a href="#"><?php echo $nama_kategori; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>