                    <script>
                      
                      $(document).ready(function () {
                          $(".mdb-select").formSelect();
                        });
                    </script>

                      <!--<form class="form-inline">
                      <div class="md-form my-0">
                          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                      </div>
                    </form>
                    -->
                     <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="job_title" class="form-control">
                        <label for="job_title" class="">Job Title</label>
                    </div>
                </div


                    <div>
                    <select class="mdb-select colorful-select dropdown-primary">
                     <option>Full Time</option>
                     <option>Part Time</option>
                     </select>
                      <select class="mdb-select colorful-select dropdown-primary">
                     <option>Employee</option>
                     <option>Contractor</option>
                     <option>inter</option>
                     </select>

                  
                </div>
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="salary" class="form-control">
                        <label for="salary" class="">Salary</label>
                    </div>
                </div>
                <div class="col-md-10 mb-4">
                    <div class="md-form">
                        <input type="text" id="locality" class="form-control">
                        <label for="locality" class="">Locality</label>
                    </div>
                </div>

                    <div class="mdl-card__actions  mdl-card--border">
                      <a href="#" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                         search
                      </a>
                    </div>
             <div class="row">
                <div class="col-md-6">

                    <!-- Card -->
                    <div class="card card-image mb-3" style="background-image: url('https://mdbootstrap.com/img/Photos/Categories/Components/img(10).jpg');">

                        <!-- Content -->
                        <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                            <div>
                                <h5 class="pink-text">
                                    <i class="fa fa-bullhorn"></i> Marketing</h5>
                                <h3 class="card-title pt-2">
                                    <strong>This is card title</strong>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                                    optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                                    Odit sed qui, dolorum!.</p>
                                <a href="<?php echo(site_url('Home/OneAnnouncement_page'));?>" class="btn btn-pink waves-effect waves-light">
                                    <i class="fa fa-clone left"></i> View More</a>
                            </div>
                        </div>
                        <!-- Content -->
                    </div>
                    <!-- Card -->

                </div>

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
            </div>