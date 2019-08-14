 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($this->session->userdata('admin_username')) ?></p>
          <br>

          <a href="#"><i class="<?php  if($this->session->userdata('admin_status') == 1)
          {
            echo "fa fa-circle text-success";
          }
          else
          {
            echo "fa fa-circle text-danger";
          }
           ?>"></i> <?php  if($this->session->userdata('admin_status') == 1)
          {
            echo "Online";
          }
          else
          {
            echo "Offline";
          }
           ?></a>
         
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username'))?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">4</small>
            </span> -->
          </a>
        </li>
  
    <!--     <li>
          <a href="<?php echo base_url('admin/mng_listing') ?>">
            <i class="fa fa-th"></i> <span>Manage Listings</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">4</small>
            </span>
          </a>
        </li> -->
        <li>
          <a href="<?php echo base_url('admin/mng_owners') ?>">
            <i class="fa fa-pie-chart"></i> <span>Manage Owners</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green" id="own"></small>
            </span>
          </a>
        </li>
        <li >
          <a href="<?php echo base_url('admin/mng_view_accounts') ?>">
            <i class="fa fa-user"></i>
            <span>Manage Accounts</span>       
          </a>
        </li>
        <li >
          <a href="<?php echo base_url('admin/mng_articles') ?>">
            <i class="fa fa-user"></i>
            <span>Manage Articles</span>       
          </a>
        </li>
         <li>
           <a href="<?php echo base_url('admin/mng_inquiries') ?>">
             <i class="fa fa-laptop"></i> <span>Inquiries</span>
             <span class="pull-right-container">
               <small class="label pull-right bg-green" id="inqside"></small>
             </span>
           </a>
         </li>
       <!-- <li>
         <a href="<?php echo base_url('admin/mng_contact_us') ?>">
           <i class="fa fa-edit"></i> <span>Contact Us</span>
           
         </a>
       </li> -->
       <li>
         <a href="<?php echo base_url('admin/logout') ?>">
           <i class="fa fa-sign-out"></i> <span>Log Out</span>
           
         </a>
       </li>
      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script type="text/javascript">
    $('document').ready(function(){
      inquiry_notif();
      owner_notif();
      function inquiry_notif()
      {
        $.ajax({
          type: 'ajax',
          url: '<?php echo base_url()?>admin/count_unread_inquiry',
          async: false,
          dataType: 'json',
          success: function(data)
          {
            console.log(data);
            if(data == 0 )
            {
              $('#inqside').html("");
            }
            else
            {
              $('#inqside').html(data);
            }
            
          },
          error: function()
          {
            // alert('Could not count new Inquiries');
          }
        });
      };
      function owner_notif()
      {
        $.ajax({
          type: 'ajax',
          url: '<?php echo base_url()?>admin/count_unread_owner',
          async: false,
          dataType: 'json',
          success: function(data)
          {
            console.log(data);
            if(data == 0 )
            {
              $('#own').html("");
            }
            else
            {
              $('#own').html(data);
            }
            
          },
          error: function()
          {
            // alert('Could not co owner');
          }
        });
      };

    });
  </script>