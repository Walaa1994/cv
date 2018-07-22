<div class="mdl-grid site-max-width">
  <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">
    <div class="mdl-card__title">
      <h1 class="mdl-card__title-text">Upload your CV</h1>
    </div>
    <div class="mdl-card__media">
      <img class="article-image" src="<?php echo base_url();?>/assets/img/upload.banner.jpg" border="0" alt="About">
    </div>
    <div class="mdl-grid site-copy">
        <div class="mdl-cell mdl-cell--12-col">
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
                        <button type="submit" class="btn btn-fb waves-effect waves-light"><i class="fa fa-upload"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
