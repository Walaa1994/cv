 <?php if ($result != null) {?>
    <!-- <div class="row"> -->
    <div class="row">
    <?php $index=1;
    foreach ($result['results']['bindings'] as  $value) {
            ?>
    <div class="col-md-6 mb-md-0 mb-4">
        <!-- Card -->
        <div class="card card-image mb-3" style="background-image: url('<?php echo base_url();?>/assets/img/bg_anno.jpg');">

            <!-- Content -->
            
            <div class="text-white text-center align-items-center py-5 px-4 rounded " style="background-color: ##dddee075;">
                <div>
                    <h5 class="black-text">
                        <i class="fa fa-bullhorn"></i> Announcement</h5>
                    
                        <h3 class="pb-3"  style="color: #CCCCCC"><strong  style="color: #CCCCCC"><?php echo $value['description']['value'];?></strong></h3>
                        <h5 class="py-3 font-weight-bold">
                        <?php echo $value['company']['value']; ?>
                    </h5>

                        <a href="<?php echo(site_url('company/oneAnnouncement/'.$value['id']['value'].'/'. $value['company']['value']));?>"  class="btn btn-pink waves-effect waves-light">

                            <i class="fa fa-clone left"></i> Read More</a>
                            </div>
                        </div> 
            <!-- Content -->
        </div>
        <!-- Card -->
    </div>

    <?php
    if ($index %2 ==0) {
            echo "</div><div class='row'>";
        }
        $index++;
     } ?>
</div>
 <?php } ?>