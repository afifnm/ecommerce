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
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col"> Total</th>
                  <th width="10%"></th>
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
                  <td>
                    <a href="<?php echo site_url('cart/hapus/'.$product['kode_produk']) ?>"
                    onClick="return confirm('Apakah anda yakin menghapus produk ini?')"
                     class="genric-btn danger-border circle">Hapus</a>
                  </td>
                </tr>
                <?php $sum=$sum+$product['harga']*$product['jumlah']; } ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td><h5>Subtotal</h5></td>
                  <td><h5>Rp. <?php echo number_format($sum,0,",","."); ?></h5></td>
                  <td></td>
                </tr>
                <form method="post" action="<?php echo site_url('cart/checkout') ?>">
                  <tr>
                    <td colspan="3"></td>
                    <td>
                      Pembayaran
                    </td>
                    <td>
                      <select name="pembayaran">
                        <option value="Tunai">Tunai</option>
                        <option value="Transfer">Transfer</option>
                      </select>
                    </td>
                  </tr>
                  <tr class="bottom_button">
                    <td colspan="5" align="right">
                      <button class="main_btn" type="submit">Lanjutkan belanja</button>
                    </td>
                  </tr>
                </form>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>
    <?php require_once('_footer.php'); ?>
    <?php require_once('_js.php'); ?>
  </body>
</html>