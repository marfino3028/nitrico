<style>
#imagePreview {
    width: 100px;
    height: 100px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>


<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<?php echo form_open_multipart(base_url('admin/konfigurasi/pembayaran')) ?>
<div class="row">
	<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">
	
    <div class="col-md-4">
        <div class="form-group">
            <label>Gambar yang sudah diupload</label><br>
            <img src="<?php echo base_url('assets/upload/image/'.$site->gambar_pembayaran) ?>" style="max-width:200px; height:auto;">
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="form-group">
            <label>Upload gambar baru</label>
            <input type="file" name="gambar_pembayaran" class="form-control" id="file">
            <div id="imagePreview"></div>
        </div>
        <div class="form-group">
            <label>Judul Informasi Pembayaran</label>
            <input type="text" name="judul_pembayaran" class="form-control" value="<?php echo $site->judul_pembayaran ?>">
        </div>

        <div class="form-group">
            <label>Informasi Lengkap Pembayaran</label>
            <textarea name="isi_pembayaran" class="form-control konten"><?php echo $site->isi_pembayaran ?></textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Update Informasi Pembayaran" class="btn btn-primary">
            <input type="reset" name="reset" value="Reset" class="btn btn-primary">
        </div>      
    </div>
    
</div>
</form>