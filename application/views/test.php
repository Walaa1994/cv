<!-- <div class="row"> -->
    <div class="row">
    <?php $index=1;
    foreach ($result as  $value) {
            ?>
    <div class="col-md-6 mb-md-0 mb-4">
        <!-- Card -->
        <div class="card card-image mb-3" style="background-image: url('https://mdbootstrap.com/img/Photos/Categories/Components/img(10).jpg');">

            <!-- Content -->
            <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
                <div>
                    <h5 class="pink-text">
                        <i class="fa fa-bullhorn"></i> Marketing</h5>
                    <h3 class="card-title pt-2">
                        <strong><?php echo $value; ?></strong>
                    </h3>

                    <p>tewt</p>

                    <a href="#"  class="btn btn-pink waves-effect waves-light">

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
 