<?php if ($result != null) {?>
<div class="row">
    <script type="text/javascript">
        new WOW().init();
    </script>
    <?php $index=1;
        foreach ($result as $value) {
    ?>
    <div class="col-lg-4 col-md-12 mb-4">
        <!--Rotating card-->
        <div class="card-wrapper">
            <div id="card-<?php echo $index ?>" class="card card-rotating effect__click ">
                <!--Front Side-->
                <div class="face front">
                    <!-- Image-->
                    <div class="card-up">
                        <img src="<?php echo base_url();?>/assets/img/background.jpg" class="img-fluid">
                    </div>
                    <!--Avatar-->
                    <div class="avatar"><img src="<?php echo $value['image'];?>" class="img-circle img-responsive">
                    </div>
                    <!--Content-->
                    <div class="card-block">
                        <h4><?php echo $value['first_name']." ".$value['last_name'];?></h4>
                        <p><strong><?php echo $value['jobposition']; ?></strong></p>
                        <!--Triggering button-->
                        <a class="rotate-btn" id="rotate-btn-<?php echo $index ?>" data-card="card-<?php echo $index ?>">
                        <i class="fa fa-repeat"></i> Click here to rotate</a>
                    </div>
                </div>
                <!--/.Front Side-->
                <!--Back Side-->
                <div class="face back">
                    <!--Content-->
                    <h4>About</h4>
                    <hr>
                    <strong>Last Education</strong>
                    <?php $last=count($value['eduMajor'])-1;?>
                    <p><?php echo $value['eduMajor'][$last];?> - <?php echo $value['eduMinor'][$last];?></p>
                    <p><?php echo $value['studiedIn'][$last];?> - <?php echo $value['degreeType'][$last];?></p>
                    <strong>Last Work Experience</strong>
                    <?php $last=count($value['employedIn'])-1; ?>
                    <p><?php echo $value['jobTitle'][$last];?> - <?php echo $value['employedIn'][$last];?></p>
  
                    <hr>
                    <!--Social Icons-->
                    <!--Triggering button-->
                  <div >
                    <a href="<?php echo(site_url('home/downloadCV/'.$value['id']));?>"  class="btn btn-pink waves-effect waves-light"> <i class="fa fa-clone left"></i>Open CV PDF</a>
                    </div>
                   
                    <div style="margin-top: 50px;" >
                    <a class="rotate-btn back" id="rotate-btn-back-<?php echo $index ?>" data-card="card-<?php echo $index ?>"><i class="fa fa-undo"></i> Click here to rotate back</a>
                    </div>
                </div>
                <!--/.Back Side-->
            </div>
        <!--/.Rotating card-->  
        </div>
    </div>
           <script>
             $("#rotate-btn-<?php echo $index;?>").click(function(){
             $("#card-<?php echo $index;?>").addClass("flipped");
                });
             $("#rotate-btn-back-<?php echo $index ?>").click(function(){
             $("#card-<?php echo $index;?>").removeClass("flipped");
                });
            </script>
               <?php
                 if ($index %3 ==0) {
                       echo "</div><div class='row'>";}
                     $index++;
                        } ?>
</div>
<?php } ?>


  
  
