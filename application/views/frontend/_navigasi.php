<?php 
$this->db->select('*')->from('kategori');
$this->db->order_by('kategori','ASC');
$kategori_produk = $this->db->get()->result_array();
?>
<header class="header_area">
    <div class="main_menu">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
        <a class="navbar-brand logo_h" href="<?php echo site_url('home') ?>">
            BisMart
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
            <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('home') ?>">Beranda</a>
                </li>
                <li class="nav-item submenu dropdown">
                    <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Produk</a
                    >
                    <ul class="dropdown-menu">
					<?php foreach ($kategori_produk as $key) { ?>
						<li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('home/produk/kategori/'.$key['id_kategori']);?>"><?php echo $key['kategori']; ?></a>
                    	</li>
					<?php }  ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('home/contact') ?>">Contact</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('home/cara-belanja') ?>">Cara Belanja</a>
                </li>
                </ul>
            </div>

            <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                <li class="nav-item">
                    <a href="#" class="icons">
                    <i class="ti-shopping-cart"></i> Keranjang
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="icons">
                    <i class="ti-user" aria-hidden="true"></i> Login
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="icons">
                    <i class="ti-heart" aria-hidden="true"></i> Wishlist
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </div>
        </nav>
    </div>
    </div>
</header>