<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <link href="<?php echo base_url() ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
  

<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr class="bg-dark">
        <th width="5%">
            NO
        </th>
    <th width="64%">Link</th>
    <th width="20%">Judul</th>
    <th width="10%">Gambar</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($galeri as $galeri) { ?>

<tr class="odd gradeX">
    <td class="text-center"><?php echo $i ?></td>
    <td><textarea name="link" class="form-control" id="link<?php echo $i ?>"><?php echo base_url('assets/upload/image/'.$galeri->gambar) ?></textarea>
      <button onclick="myFunction<?php echo $i ?>()">Copy Link</button>
      <script>
        function myFunction<?php echo $i ?>() {
            /* Get the text field */
            var copyText = document.getElementById("link<?php echo $i ?>");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Link sudah dicopy: " + copyText.value);
          }
      </script>
        </td>
   
    <td><?php echo $galeri->judul_galeri ?></td>
     <td>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" width="60">
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</body>
</html>