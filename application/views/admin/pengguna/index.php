<div id="myalert"> 
  <?php echo $this->session->flashdata('alert', true)?>
</div> 
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
          <span class="tf-icons bx bx-message-add"></span>&nbsp; Tambah Pengguna
        </button>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Level</th>
            <th style="text-align: center;">Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach ($data2 as $user) {?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $user['username']; ?></td>
              <td><?php echo $user['nama']; ?></td>
              <td><?php echo $user['level']; ?></td>
              <td align="center">
        <?php if($user['username']!=$this->session->userdata('username')){ ?>
                <a href="<?php echo site_url('admin/pengguna/delete_data/'.$user['id']);?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"><span class="tf-icons bx bx-trash-alt"></span></a>
                <a href="<?php echo site_url('admin/pengguna/profil/'.$user['username']);?>" class="btn btn-sm btn-warning" ><span class="tf-icons bx bx-search"></span></a>   
        <?php } ?>        
                 
              </td>
            </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>

<script>
function confirmDialog() {
  return confirm('Apakah anda yakin akan menghapus data ini?')
}
</script>
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
<div class="modal-dialog modal-lg">
  <form class="modal-content" method="post" action="<?php echo site_url('admin/pengguna/simpan');?>">
    <div class="modal-header">
      <h5 class="modal-title" id="backDropModalTitle">
        <span class="tf-icons bx bx-message-add"></span>&nbsp; Tambah Pengguna
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">*NIS/NIP</label>
          <input type="text"class="form-control" placeholder="NIS/NIP" name="username" required>
        </div>
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">*Password</label>
          <input type="password"class="form-control" placeholder="Password" name="password" required>
        </div>
      </div>
      <div class="col mb-3">
        <div class="mb-3">
          <label class="form-label">Level</label>
          <select class="form-select form-select-lg" name="level">
            <option value="Siswa">Siswa</option>
            <option value="Konsumen">Konsumen</option>
            </select>
        </div>
      </div>
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Nama Lengkap</label>
          <input type="text"class="form-control" placeholder="Nama Lengkap" name="nama" required>
        </div>
      </div>
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Kelas</label>
          <input type="text"class="form-control" placeholder="Kelas" name="kelas">
        </div>
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Tahun Ajaran</label>
          <input type="number"class="form-control" placeholder="tahun_ajaran" name="tahun_ajaran">
        </div>
      </div>
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Tempat Lahir</label>
          <input type="text"class="form-control" placeholder="Tempat lahir" name="tempat_lahir">
        </div>
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Tanggal Lahir</label>
          <input type="date"class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir">
        </div>
      </div>
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Alamat</label>
          <input type="text"class="form-control" placeholder="Alamat Lengkap" name="alamat">
        </div>
      </div>
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Email</label>
          <input type="email"class="form-control" placeholder="Email" name="email">
        </div>
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Nomor Whatsapp</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text">IND (+62)</span>
            <input type="text" class="form-control" placeholder="Telp" name="no_hp" >
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
        Close
      </button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
</div>