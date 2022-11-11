<style>
  a{
    margin-bottom: 2px;
  }
</style>
<div id="myalert"> 
  <?php echo $this->session->flashdata('alert', true)?>
</div> 
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Pembelian</th>
            <th>Nama Pembeli</th>
            <th>Pembayaran</th>
            <th>Status Pesanan</th>
            <th>Total Pesanan</th>
            <?php if(($status==0) OR ($status==2)){ ?>
            <th style="text-align: center;">Konfirmasi</th>
            <?php } ?>
            <th style="text-align: center;">Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($data2 as $user) {?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo date_format(date_create($user['tanggal_beli']),'d F Y H:i'); ?></td>
              <td>
                <a href="<?php echo site_url('admin/pengguna/profil/'.$user['pembeli']);?>" target="_blank">
                <?php echo $this->CRUD_model->get_nama_user($user['pembeli']); ?>
                </a>
              </td>
              <td><?php echo $user['pembayaran']; ?></td>       
              <td> 
                <?php 
                if($user['status']==0){ 
                  echo '<span class="btn btn-sm btn-secondary">Penjual sedang menyiapkan pesanan</span>';
                } elseif($user['status']==1){ 
                  echo '<span class="btn btn-sm btn-danger">Pesanan Telah Dibatalkan</span>';
                } elseif($user['status']==2){ 
                  echo '<span class="btn btn-sm btn-primary">Pesanan telah diterima, hubungi penjual untuk melanjutkan proses transaksi pembayaran dan pengiriman.</span>';
                } elseif($user['status']==3){ 
                  echo '<span class="btn btn-sm btn-success">Pesanan selesai</span>';
                } 
                ?>
              </td>
              <td>Rp. <?php echo number_format($this->CRUD_model->sum_pesanan($user['kode_transaksi']),0,",","."); ?></td>
              <?php if($status==0){ ?>
              <td align="center">
                <a href="<?php echo site_url('admin/order/accept/'.$user['kode_transaksi']);?>" class="btn btn-sm btn-primary"
                  onClick="return confirm('Apakah anda yakin menerima pesanan ini?')">
                  &nbsp; Terima Pesanan 
                </a>
                <a href="<?php echo site_url('admin/order/cancel/'.$user['kode_transaksi']);?>" class="btn btn-sm btn-danger"
                  onClick="return confirm('Apakah anda yakin membatalkan pesanan ini?')">
                  Batalkan Pesanan
                </a>
              </td>
              <?php } ?>
              <?php if($status==2){ ?>
              <td align="center">
                <a href="<?php echo site_url('admin/order/done/'.$user['kode_transaksi']);?>" class="btn btn-sm btn-danger"
                  onClick="return confirm('Apakah pesanan ini telah selesai?')">
                  Selesaikan Pesanan
                </a>
              </td>
              <?php } ?>
              <td align="center">
                <a href="<?php echo site_url('cart/order/'.$user['kode_transaksi']);?>" target="_blank" class="btn btn-sm btn-warning">
                  Lihat Pesanan
                </a>  
                <a href="https://api.whatsapp.com/send?phone=<?php echo $this->CRUD_model->get_wa($user['pembeli']); ?>" class="btn btn-sm btn-success" target="_blank">
                    <i class="bx bxl-whatsapp"></i> WhatsApp
                </a>       
              </td>
            </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>