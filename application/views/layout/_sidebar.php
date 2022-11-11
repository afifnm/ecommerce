<?php 
$this->db->select('*')->from('kategori');
$this->db->order_by('kategori','ASC');
$kategori_produk = $this->db->get()->result_array();
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?php echo site_url('/');?>" class="app-brand-link" target="_blank">
      <span class="app-brand-text demo  fw-bolder ms-2">Bis-mart</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>
  <?php if ($this->session->userdata('level') == "Admin"){ ?>
  <ul class="menu-inner py-1">
    <li class="menu-item <?php echo activate_menu('home');  ?>">
      <a href="<?php echo site_url('admin/home');?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-item <?php echo activate_menu('pengguna');  ?>">
      <a href="<?php echo site_url('admin/pengguna');?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Analytics">Pengguna</div>
      </a>
    </li>
    <li class="menu-item <?php echo open_menu('order'); ?> <?php echo activate_menu('order');  ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cart"></i>
        <div data-i18n="Layouts">Daftar Pesanan</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?php if($this->uri->segment('4')=='0'){ echo "active"; } ?>">
          <a href="<?php echo site_url('admin/order/status/0');?>" class="menu-link">
            <div data-i18n="Without menu"> Pesanan Masuk</div>
          </a>
        </li>
        <li class="menu-item <?php if($this->uri->segment('4')=='2'){ echo "active"; } ?>">
          <a href="<?php echo site_url('admin/order/status/2');?>" class="menu-link">
            <div data-i18n="Without menu"> Pesanan Dalam Perjalanan</div>
          </a>
        </li>
        <li class="menu-item <?php if($this->uri->segment('4')=='3'){ echo "active"; } ?>">
          <a href="<?php echo site_url('admin/order/status/3');?>" class="menu-link">
            <div data-i18n="Without menu"> Pesanan Selesai</div>
          </a>
        </li>
        <li class="menu-item <?php if($this->uri->segment('4')=='1'){ echo "active"; } ?>">
          <a href="<?php echo site_url('admin/order/status/1');?>" class="menu-link">
            <div data-i18n="Without menu"> Pesanan Dibatalkan</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item <?php echo open_menu('produk'); ?> <?php echo activate_menu('produk');  ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-store-alt"></i>
        <div data-i18n="Layouts">Daftar Produk</div>
      </a>
      <ul class="menu-sub">
        <?php foreach ($kategori_produk as $key) { ?>
        <li class="menu-item <?php if($this->uri->segment('4')==$key['id_kategori']){ echo "active"; } ?>">
          <a href="<?php echo site_url('admin/produk/kategori/'.$key['id_kategori']);?>" class="menu-link">
            <div data-i18n="Without menu"> <?php echo $key['kategori']; ?></div>
          </a>
        </li>
        <?php }  ?>
      </ul>
    </li>
    <li class="menu-item <?php echo activate_menu('kategori');  ?>">
      <a href="<?php echo site_url('admin/kategori');?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Analytics">Kategori Produk</div>
      </a>
    </li>
  </ul>
  <?php }  elseif ($this->session->userdata('level') == "Siswa"){ ?>
  <ul class="menu-inner py-1">
    <li class="menu-item <?php echo activate_menu('home');  ?>">
      <a href="<?php echo site_url('siswa/home');?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-item <?php echo open_menu('produk'); ?> <?php echo activate_menu('produk');  ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-store-alt"></i>
        <div data-i18n="Layouts">Affiliasi Produk</div>
      </a>
      <ul class="menu-sub">
        <?php foreach ($kategori_produk as $key) { ?>
        <li class="menu-item <?php if($this->uri->segment('4')==$key['id_kategori']){ echo "active"; } ?>">
          <a href="<?php echo site_url('siswa/produk/kategori/'.$key['id_kategori']);?>" class="menu-link">
            <div data-i18n="Without menu"> <?php echo $key['kategori']; ?></div>
          </a>
        </li>
        <?php }  ?>
      </ul>
    </li>
    <li class="menu-item <?php echo open_menu('order'); ?> <?php echo activate_menu('order');  ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cart"></i>
        <div data-i18n="Layouts">Daftar Pesanan</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?php if($this->uri->segment('4')=='0'){ echo "active"; } ?>">
          <a href="<?php echo site_url('admin/order/status/0');?>" class="menu-link">
            <div data-i18n="Without menu"> Pesanan Masuk</div>
          </a>
        </li>
        <li class="menu-item <?php if($this->uri->segment('4')=='2'){ echo "active"; } ?>">
          <a href="<?php echo site_url('admin/order/status/2');?>" class="menu-link">
            <div data-i18n="Without menu"> Pesanan Dalam Perjalanan</div>
          </a>
        </li>
        <li class="menu-item <?php if($this->uri->segment('4')=='3'){ echo "active"; } ?>">
          <a href="<?php echo site_url('admin/order/status/3');?>" class="menu-link">
            <div data-i18n="Without menu"> Pesanan Selesai</div>
          </a>
        </li>
        <li class="menu-item <?php if($this->uri->segment('4')=='1'){ echo "active"; } ?>">
          <a href="<?php echo site_url('admin/order/status/1');?>" class="menu-link">
            <div data-i18n="Without menu"> Pesanan Dibatalkan</div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
  <?php } elseif ($this->session->userdata('level') == "Pembeli"){ ?>
  <ul class="menu-inner py-1">
    <li class="menu-item <?php echo activate_menu('home');  ?>">
      <a href="<?php echo site_url('pembeli/home');?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-item <?php echo activate_menu('order');  ?>">
      <a href="<?php echo site_url('pembeli/order');?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cart"></i>
        <div data-i18n="Analytics">Pesanan Saya</div>
      </a>
    </li>
  </ul>
  <?php }   ?>
</aside>