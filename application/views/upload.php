
<link href="<?php echo base_url();?>/assets/upload.css" rel="stylesheet">
<div class="col-md-12 text-center">
<form  action='<?php echo base_url();?>index.php/Seeker/DoUpload' method="post" enctype="multipart/form-data">
	<div class="md-form">
        <div class="file-field">
            <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                <span>Choose file</span>
                <input type="file"  name="userFile">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload your file">
            </div>
        </div>
    </div>
	<input  type="submit" value="upload" class="btn btn-success waves-effect waves-light">
</form>
</div>
