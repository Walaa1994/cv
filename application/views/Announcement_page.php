<?php if ($result != null) {?>
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
                                    <i  class="fa fa-bullhorn"></i> Announcement</h5>
                                <h3 style="color: #B4B4B4" class="py-3 font-weight-bold">
                                    <strong><?php echo $company->en_name; ?></strong>
                                </h3>

                                <h4 style="color: #B4B4B4"><?php echo $value['job']['value'];?></h4>

                                <a href="<?php echo(site_url('company/oneAnnouncement/'.$value['id']['value']));?>"  class="btn btn-pink waves-effect waves-light">

                                    <i class="fa fa-clone left"></i> View More</a>
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
         
                <!-- card 2 
                <div class="col-md-6">
                    <div class="card card-image mb-3" style="background-image: url('https://mdbootstrap.com/img/Photos/Categories/Components/img(10).jpg');">
                        <div class="text-white text-center d-flex align-items-center rgba-indigo-strong py-5 px-4">
                            <div>
                                <h5 class="orange-text">
                                    <i class="fa fa-bullhorn"></i> Software</h5>
                                <h3 class="card-title pt-2">
                                    <strong>This is card title</strong>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                                    optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                                    Odit sed qui, dolorum!.</p>
                                <a href="<?php echo(site_url('Home/OneAnnouncement_page'));?>" class="btn btn-deep-orange waves-effect waves-light">
                                    <i class="fa fa-clone left"></i> View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                -->
      