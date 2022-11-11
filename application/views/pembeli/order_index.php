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
            <th>Pembayaran</th>
            <th>Status Pesanan</th>
            <th>Total Pesanan</th>
            <th style="text-align: center;" width=30%>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($data2 as $user) {?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $user['tanggal_beli']; ?></td>
              <td><?php echo $user['pembayaran']; ?></td>
              <td>
                <?php 
                if($user['status']==0){ 
                  echo '<span class="btn btn-sm btn-secondary">Penjual sedang menyiapkan pesanan</span>';
                } elseif($user['status']==1){ 
                  echo '<span class="btn btn-sm btn-danger">Pesanan Telah Dibatalkan</span>';
                } elseif($user['status']==2){ 
                  echo '<span class="btn btn-sm btn-primary">Penjual menerima pesananmu, hubungi WA penjual untuk melakukan pembayaran dan pengiriman.</span>';
                } elseif($user['status']==3){ 
                  echo '<span class="btn btn-sm btn-success">Pesanan telah diterima</span>';
                } 
                ?>
              </td>
              <td>Rp. <?php echo number_format($this->CRUD_model->sum_pesanan($user['kode_transaksi']),0,",","."); ?></td>
              <td align="center">
                <?php if($user['status']==0){ ?>
                <a href="<?php echo site_url('pembeli/order/cancel/'.$user['kode_transaksi']);?>" class="btn btn-sm btn-danger"
                  onClick="return confirm('Apakah anda yakin membatalkan pesanan ini?')">
                  Batalkan
                </a>
                <?php } ?>
                <a href="<?php echo site_url('cart/order/'.$user['kode_transaksi']);?>" target="_blank" class="btn btn-sm btn-warning">
                  Lihat Pesanan
                </a>  
                <a href="https://api.whatsapp.com/send?phone=<?php echo $this->CRUD_model->get_wa($user['penjual']); ?>" class="btn btn-sm btn-success" target="_blank">
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