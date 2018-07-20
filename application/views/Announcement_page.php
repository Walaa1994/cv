 <div class="row">
                <div class="col-md-6">
                <?php foreach ($result['results']['bindings'] as  $value) {?>
                    <!-- Card -->
                    <div class="card card-image mb-3" style="background-image: url('https://mdbootstrap.com/img/Photos/Categories/Components/img(10).jpg');">

                        <!-- Content -->
                        <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                            <div>
                                <h5 class="pink-text">
                                    <i class="fa fa-bullhorn"></i> Marketing</h5>
                                <h3 class="card-title pt-2">
                                    <strong><?php echo $company_id->en_name; ?></strong>
                                </h3>
<<<<<<< HEAD
<<<<<<< HEAD
                                <p><?php echo $value['job']['value'];?></p>
                                <a class="btn btn-pink waves-effect waves-light">
=======
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                                    optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                                    Odit sed qui, dolorum!.</p>
                                <a href="<?php echo(site_url('Home/OneAnnouncement_page'));?>"  class="btn btn-pink waves-effect waves-light">
>>>>>>> master
=======
                                <p><?php echo $value['job']['value'];?></p>
                                <a class="btn btn-pink waves-effect waves-light">
>>>>>>> 16015451a2896faf3c09001e056d7f83eb3ee497
                                    <i class="fa fa-clone left"></i> View More</a>
                            </div>
                        </div>
                        <!-- Content -->
                    </div>
                    <!-- Card -->
                    <?php } ?>

                </div>
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
            </div>