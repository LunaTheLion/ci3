<!--/ Intro Single star /-->

  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
        <a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('useremail')) ?>" class="btn btn-danger">Back to Admin</a>
          <div class="title-single-box" id="showcase">
            <h1 class="title-single"><?php echo $this->session->flashdata('title');?></h1>
            <h5 class="color-text-a">Php <?php echo $this->session->flashdata('price') ?></h5>
          </div>
        </div>
        <!-- <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="home">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="property-grid">Properties</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                304 Blaster Up
              </li>
            </ol>
          </nav>
        </div> -->
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow">
            <?php 
              if(!empty($this->session->flashdata('title')))
              {
                 
                    $dirname = "uploads/".$this->session->flashdata('title_slug')."/amenities";
                    $files = glob($dirname."*.*");
                    $dir_path =  "uploads/".$this->session->flashdata('title_slug')."/amenities";
                    $extensions_array = array('jpg','png','jpeg');

                    if(is_dir($dir_path))
                    {
                      $files = scandir($dir_path);
                                      
                      for($i = 0; $i < count($files); $i++)
                      {
                        if($files[$i] !='.' && $files[$i] !='..')
                        {                     
                          $file = pathinfo($files[$i]);
                          //getting images from the root folder.  
                        ?>

                        
                        <div class="carousel-item-b">
                          <img  src="<?php echo base_url('uploads/'.$this->session->flashdata('title_slug')."/amenities/".$files[$i])?>" alt="<?php echo $files[$i] ?> ">
                        </div>
                    <?php
                    }
                    }
                    }
            
              }
             ?>
          </div>
        </div>
            <div class="col-sm-12 quick-details text-center mb-3">
              <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-1x"></i>
                <i class="fa fa-bed fa-stack-1x"></i>
              </span>
              <span class="bathroom mr-3"><?php echo $this->session->flashdata('bath') ?></span>
              <span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-1x"></i>
                <i class="fa fa-bath fa-stack-1x"></i>
              </span>
              <span class="bedroom mr-3"><?php echo $this->session->flashdata('bed') ?></span>

              <!-- if their is a garden available -->
              <?php if(!empty($this->session->flashdata('garden'))){ echo '<span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-1x"></i>
                <i class="fa fa-leaf fa-stack-1x"></i>
              </span>
              <span class="garden mr-3">'."✔ </span>"; }  ?>


              <!-- If pet is allowed -->
              <?php if(!empty($this->session->flashdata('pet'))){ echo '<span class="fa-stack fa-1x">
                <i class="fa fa-circle fa-stack-1x"></i>
                <i class="fa fa-paw fa-stack-1x"></i>
              </span>
              <span class="pet">'."✔</span>"; }  ?>
            </div>
            <div class="col-sm-12 text-center mb-3">
              <span class="mr-3">Lot Area: <b><?php echo $this->session->flashdata('lot_area') ?> SQM</b></span>
              <span class="">Floor Area: <b><?php echo $this->session->flashdata('floor_area') ?> SQM</b></span>
            </div>
        
         <!--  <div class="col-md-5 col-lg-4">
            <div class="property-price d-flex justify-content-center foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="ion-money">$</span>
                </div>
                <div class="card-title-c align-self-center">
                  <h5 class="title-c">15000</h5>
                </div>
              </div>
            </div>
            <div class="property-summary">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d section-t4">
                    <h3 class="title-d">Quick Summary</h3>
                  </div>
                </div>
              </div>
              <div class="summary-list">
                <ul class="list">
                  <li class="d-flex justify-content-between">
                    <strong>Property ID:</strong>
                    <span>1134</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Location:</strong>
                    <span>Chicago, IL 606543</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Property Type:</strong>
                    <span>House</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Status:</strong>
                    <span>Sale</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Area:</strong>
                    <span>340m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Beds:</strong>
                    <span>4</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Baths:</strong>
                    <span>2</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Garage:</strong>
                    <span>1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div> -->
        <div id="inquiry-form" class="col-md-8 col-lg-8 section-md-t3">
          <div class="row">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Property Description</h3>
              </div>
            </div>
          </div>
          <div class="property-description">
            <?php echo $this->session->flashdata('details') ?>
          </div>
          <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
                aria-controls="pills-video" aria-selected="true">Video</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans"
                aria-selected="false">Floor Plans</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map"
                aria-selected="false">Ubication</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
              <!-- <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0"
                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
            </div>
            <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
              <img src="<?= base_url()?>assets/img/plan2.jpg" alt="" class="img-fluid">
            </div>
            <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834"
                width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe> -->
            </div>
          </div>
          <!-- <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Amenities</h3>
              </div>
            </div>
          </div>
          <div class="amenities-list color-text-a">
            <ul class="list-a no-margin">
              <li>Balcony</li>
              <li>Outdoor Kitchen</li>
              <li>Cable Tv</li>
              <li>Deck</li>
              <li>Tennis Courts</li>
              <li>Internet</li>
              <li>Parking</li>
              <li>Sun Room</li>
              <li>Concrete Flooring</li>
            </ul>
          </div> -->
        </div>
        <div class="col-md-4 col-lg-4">
          <div class="row">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Inquiry Form</h3>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-5">
            <img src="<?= base_url('uploads/'.$this->session->flashdata('title_slug').'/facade/'.$this->session->flashdata('facade'))?>" alt="<?php echo $this->session->flashdata('facade') ?>" title="<?php echo $this->session->flashdata('title') ?>" class="img-fluid">
          </div>
          <div class="col-sm-12 contact">
            <form class="form-a contactForm" action="<?php echo base_url() ?>" method="post" role="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input name="email" type="email" class="form-control form-control-sm" placeholder="Your Email" data-rule="required" data-msg="Please enter a valid email">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input name="number" type="text" class="form-control form-control-sm" placeholder="Your Number" data-rule="required" data-msg="Please enter your number">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input name="unit-type" type="text" class="form-control form-control-sm" placeholder="Bedrooms Needed" data-rule="required" data-msg="">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input name="duration" type="text" class="form-control form-control-sm" placeholder="Duration of Stay" data-rule="required" data-msg="">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input name="move-in" type="text" class="form-control form-control-sm" placeholder="Move-in Date" data-rule="required" data-msg="">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <input type="url" name="subject" class="form-control form-control-sm" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <textarea name="message" class="form-control form-control-sm" name="message" cols="45" rows="4" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-a">Send Message</button>
                </div>
              </div>
            </form>
          </div>
            <!-- <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="<?= site_url()?>/home">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Contact
                  </li>
                </ol>
              </nav>
            </div> -->
        </div>
      </div>    
    </div> 
  </section>
  <!--/ Property Single End /-->
<script type="text/javascript">
  function numberWithCommas(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})(?!\d))/g, ",");
    return parts.join(".");
}
$(document).ready(function() {
  $("#showcase h5").each(function() {
    var num = $(this).text();
    var commaNum = numberWithCommas(num);
    $(this).text(commaNum);
  });
});
</script>