<div class="col-lg-3">
    <div class="left_sidebar_area">
        <aside class="left_widgets p_filter_widgets">
        <div class="l_w_title">
            <h3>Daftar Produk</h3>
        </div>
        <div class="widgets_inner">
            <ul class="list">
                <li class="<?php if($this->uri->segment('4')==NULL){ echo "active"; } ?>">
                    <a href="<?php echo site_url('affiliate/store/'.$username);?>">Semua</a>
                </li>
                <?php foreach ($kategori_produk as $key) { ?>
                <li class="<?php if(($this->uri->segment('4')==$key['id_kategori'] AND ($this->uri->segment('2')=='kategori'))){ echo "active"; } ?>">
                    <a href="<?php echo site_url('affiliate/kategori/'.$username.'/'.$key['id_kategori'].'/0');?>"><?php echo $key['kategori']; ?></a>
                </li>
                <?php }  ?>
            </ul>
        </div>
        </aside>
    </div>
</div>