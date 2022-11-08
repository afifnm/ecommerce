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
                </tr>
                <tr class="bottom_button">
                  <td colspan="5" align="right"><a class="main_btn" href="#">Lanjutkan belanja</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <?php require_once('_footer.php'); ?>
    <?php require_once('_js.php'); ?>
  </body>
</html>