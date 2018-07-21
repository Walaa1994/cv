<div class="row">
    <script type="text/javascript">
        new WOW().init();
    </script>
    <?php $index=1;
        foreach ($result as  $value) {
    ?>
    <div class="col-lg-4 col-md-12 mb-4">
        <!--Rotating card-->
        <div class="card-wrapper">
            <div id="card-<?php echo $index ?>" class="card card-rotating effect__click ">
                <!--Front Side-->
                <div class="face front">
                    <!-- Image-->
                    <div class="card-up">
                        <img src="https://mdbootstrap.com/images/reg/reg%20(35).jpg" class="img-fluid">
                    </div>
                    <!--Avatar-->
                    <div class="avatar"><img src="https://mdbootstrap.com/wp-content/uploads/2015/10/team-avatar-2.jpg" class="img-circle img-responsive">
                    </div>
                    <!--Content-->
                    <div class="card-block">
                        <h4>Jonathan Doe</h4>
                        <strong><?php echo $value; ?></strong>
                        <p>Web developer</p>
                        <!--Triggering button-->
                        <a class="rotate-btn" id="rotate-btn-<?php echo $index ?>" data-card="card-<?php echo $index ?>">
                        <i class="fa fa-repeat"></i> Click here to rotate</a>
                    </div>
                </div>
                <!--/.Front Side-->
                <!--Back Side-->
                <div class="face back">
                    <!--Content-->
                    <h4>About me</h4>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime quae, dolores dicta. Blanditiis rem amet repellat, dolores nihil quae in mollitia asperiores ut rerum repellendus, voluptatum eum, officia laudantium quaerat?</p>
                    <hr>
                    <!--Social Icons-->
                    <!--Triggering button-->
                    <a class="rotate-btn back" id="rotate-btn-back-<?php echo $index ?>" data-card="card-<?php echo $index ?>"><i class="fa fa-undo"></i> Click here to rotate back</a>
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


  
  
