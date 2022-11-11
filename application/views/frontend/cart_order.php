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
    <?php require_once('_header.php'); ?>
    <div id="myalert"> 
      <?php echo $this->session->flashdata('alert', true)?>
    </div> 
    <?php if ($cart==NULL) { ?>
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="tracking_box_inner">
              <p>Keranjang belanja kosong, silahkan pergi ke halaman utama dan mulai berbelanja ^^.</p>
                <a class="main_btn" href="<?php echo site_url('/') ?>">Mulai Berbelanja</a>
          </div>
        </div>
      </div>
    </section>
    <?php } else { ?>
    <?php $sum=0; foreach ($transaksi as $trans) { ?>
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <h4>#<?php echo$trans['kode_transaksi']; ?></h4>
            <h4><?php echo $this->CRUD_model->get_nama_user($trans['pembeli']); ?></h4>
            <h4><?php echo date_format(date_create($trans['tanggal_beli']),'d F Y H:i'); ?></h4>
            <h4>Pembayaran : <?php echo$trans['pembayaran']; ?></h4>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col"> Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $sum=0; foreach ($cart as $product) { ?>
                <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <?php $no=0; foreach ($this->CRUD_model->foto_produk_1($product['kode_produk']) as $foto) { ?>
                        <img src="<?php echo site_url('assets/upload/images/produk/'.$foto['namafile']);?>" width="60px">
                        <?php $no++; } ?>
                      </div>
                      <div class="media-body">
                        <p><?php echo $product['nama']; ?></p>
                      </div>
                    </div>
                  </td>
                  <td> <h5>Rp. <?php echo number_format($product['harga'],0,",","."); ?></h5></td>
                  <td> <?php echo$product['jumlah']; ?> </td>
                  <td>
                    <h5>Rp. <?php echo number_format($product['harga']*$product['jumlah'],0,",","."); ?></h5>
                  </td>
                </tr>
                <?php $sum=$sum+$product['harga']*$product['jumlah']; } ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td><h5>Subtotal</h5></td>
                  <td><h5>Rp. <?php echo number_format($sum,0,",","."); ?></h5></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <?php } } ?>
    <?php require_once('_footer.php'); ?>
    <?php require_once('_js.php'); ?>
  </body>
</html>