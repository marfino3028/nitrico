<p class="text-right">
  <a href="<?php echo base_url('admin/client/cetak/'.$client->id_client) ?>" target="_blank" class="btn btn-success btn-sm">
      <i class="fa fa-print"></i> Cetak
    </a>
    <a href="<?php echo base_url('admin/client/edit/'.$client->id_client) ?>" class="btn btn-info btn-sm">
      <i class="fa fa-edit"></i> Edit
    </a>

    <a href="<?php echo base_url('admin/client') ?>" class="btn btn-warning btn-sm">
      <i class="fa fa-backward"></i> Kembali
    </a>
</p>

<div class="row">
  <div class="col-md-4">
     <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
    <?php if($client->gambar != "") { ?>
      <img src="<?php echo base_url('assets/upload/client/'.$client->gambar) ?>" alt="<?php echo $client->nama ?>" class="img img-thumbnail img-circle img-responsive">
    <?php }else{ ?>
      <img src="<?php echo $this->website->icon() ?>" alt="<?php echo $client->nama ?>" class="img img-thumbnail img-circle">
    <?php } ?>
    </div>
        <hr>
                <h4 class="profile-username text-center"><?php echo $client->nama ?></h4>

                <p class="text-muted text-center"><?php echo $client->email ?></p>
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Username:<br><?php echo $client->email ?></td>
                    </tr>
                    <tr>
                      <td>Password:<br><?php echo $client->password_hint ?></td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
  </div>
  <div class="col-md-8">
    <table class="table">
      <thead>
        <tr>
          <th width="30%">Nama</th>
          <th width="1%">:</th>
          <th><?php echo $client->nama ?></th>
        </tr>
        <tr>
          <th>Tempat, tanggal lahir</th>
          <th>:</th>
          <th><?php echo $client->tempat_lahir.', '.date('d-m-Y',strtotime($client->tanggal_lahir)) ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $client->email ?></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>:</td>
          <td><?php echo $client->telepon ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?php echo $client->alamat ?></td>
        </tr>
        <tr>
          <td>Jenis client</td>
          <td>:</td>
          <td><?php echo $client->jenis_client ?></td>
        </tr>
        <tr>
          <td>Client Ditampilkan?</td>
          <td>:</td>
          <td><?php echo $client->status_client ?></td>
        </tr>
        <tr>
          <td>Testimoni ditampilkan?</td>
          <td>:</td>
          <td><?php echo $client->status_testimoni ?></td>
        </tr>
        
        <tr>
          <td>Isi Testimoni</td>
          <td>:</td>
          <td><?php echo $client->isi_testimoni ?></td>
        </tr>
        <tr>
          <td>Keywords di Google</td>
          <td>:</td>
          <td><?php echo $client->keywords ?></td>
        </tr>
        <tr>
          <td>IP Address</td>
          <td>:</td>
          <td><?php echo $client->ip_address ?></td>
        </tr>
        <tr>
          <td>Tanggal update</td>
          <td>:</td>
          <td><?php echo $client->tanggal ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>