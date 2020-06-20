<div class="row">
<div class="col-md-5">
   <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
  <?php if($staff->gambar != "") { ?>
    <img src="<?php echo base_url('assets/upload/staff/'.$staff->gambar) ?>" alt="<?php echo $staff->nama ?>" class="img img-thumbnail img-circle img-responsive"  style="max-width: 200px; height: auto;">
  <?php }else{ ?>
    <img src="<?php echo base_url('assets/admin/dist/img/boxed-bg.jpg') ?>" alt="<?php echo $staff->nama ?>" class="img img-thumbnail img-circle" style="max-width: 200px; height: auto;">
  <?php } ?>
  </div>
      <hr>
              <h3 class="profile-username text-center"><?php echo $staff->nama ?></h3>
              <hr>
              <p class="text-muted text-center"><?php echo $staff->email ?></p>
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th width="32%">Username</th>
                  <th width="32%">Password</th>
                  <th>Level</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($user as $user) { ?>
                  <tr>
                    <td><?php echo $user->username ?></td>
                    <td><?php echo $user->password_hint ?></td>
                    <td><?php echo $user->akses_level ?></td>
                  </tr>
                  
                  <?php } ?>
                </tbody>
              </table>
          </div>
      </div>
</div>
<div class="col-md-7">
  <table class="table">
    <thead>
      <tr>
        <th width="30%">Nama</th>
        <th width="1%">:</th>
        <th><?php echo $staff->nama ?></th>
      </tr>
      <tr>
        <th width="25%">Tempat, tanggal lahir</th>
        <th width="1%">:</th>
        <th><?php echo $staff->tempat_lahir.', '.date('d-m-Y',strtotime($staff->tanggal_lahir)) ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><?php echo $staff->email ?></td>
      </tr>
      <tr>
        <td>Telepon</td>
        <td>:</td>
        <td><?php echo $staff->telepon ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $staff->alamat ?></td>
      </tr>
      <tr>
        <td>Urutan</td>
        <td>:</td>
        <td><?php echo $staff->urutan ?></td>
      </tr>
      <tr>
        <td>Staff Ditampilkan?</td>
        <td>:</td>
        <td><?php echo $staff->status_staff ?></td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?php echo $staff->jabatan ?></td>
      </tr>
      
      <tr>
        <td>Keahlian</td>
        <td>:</td>
        <td><?php echo $staff->keahlian ?></td>
      </tr>
      <tr>
        <td>Keywords di Google</td>
        <td>:</td>
        <td><?php echo $staff->keywords ?></td>
      </tr>
      <tr>
        <td>IP Address</td>
        <td>:</td>
        <td><?php echo $staff->ip_address ?></td>
      </tr>
      <tr>
        <td>Tanggal update</td>
        <td>:</td>
        <td><?php echo $staff->tanggal ?></td>
      </tr>
    </tbody>
  </table>
</div>
</div>