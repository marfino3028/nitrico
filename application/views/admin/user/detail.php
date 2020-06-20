<div class="row">
  <div class="col-md-5">
     <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
    <?php if($user->gambar != "") { ?>
      <img src="<?php echo base_url('assets/upload/user/'.$user->gambar) ?>" alt="<?php echo $user->nama ?>" class="img img-thumbnail img-circle img-responsive">
    <?php }else{ ?>
      <img src="<?php echo base_url('assets/admin/dist/img/boxed-bg.jpg') ?>" alt="<?php echo $user->nama ?>" class="img img-thumbnail img-circle">
    <?php } ?>
    </div>
        <hr>
                <h3 class="profile-username text-center"><?php echo $user->nama ?></h3>

                <p class="text-muted text-center"><?php echo $user->email ?></p>
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Username</td>
                      <td>: <?php echo $user->email ?></td>
                    </tr>
                    <tr>
                      <td>Password</td>
                      <td>: <?php echo $user->password_hint ?></td>
                    </tr>
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
          <th><?php echo $user->nama ?></th>
        </tr>
        <tr>
          <th width="25%">Tempat, tanggal lahir</th>
          <th width="1%">:</th>
          <th><?php echo $user->tempat_lahir.', '.date('d-m-Y',strtotime($user->tanggal_lahir)) ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $user->email ?></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>:</td>
          <td><?php echo $user->telepon ?></td>
        </tr>
        <tr>
          <td>Deskripsi Ringkas</td>
          <td>:</td>
          <td><?php echo $user->keterangan ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $user->email ?></td>
        </tr>
        <tr>
          <td>Pengguna Ditampilkan?</td>
          <td>:</td>
          <td><?php echo $user->akses_level ?></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>:</td>
          <td><?php echo $user->jabatan ?></td>
        </tr>
        
        <tr>
          <td>Keahlian</td>
          <td>:</td>
          <td><?php echo $user->keahlian ?></td>
        </tr>
        <tr>
          <td>Keywords di Google</td>
          <td>:</td>
          <td><?php echo $user->username ?></td>
        </tr>
        <tr>
          <td>IP Address</td>
          <td>:</td>
          <td><?php echo $user->ip_address ?></td>
        </tr>
        <tr>
          <td>Tanggal update</td>
          <td>:</td>
          <td><?php echo $user->tanggal ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>