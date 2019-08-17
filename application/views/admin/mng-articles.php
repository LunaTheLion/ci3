
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Articles
        <small>Control panel</small>
        
      </h1>
               <p><?php 
       // echo "<pre>";
       // print_r($this->session->userdata());
       // echo "</pre>";
      ?></p>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Manage Article</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="row" id="main">
        <div class="col-xs-12">
          <div class="box"> 
            <div class="box-header">
              <h3 class="box-title">Listing Table</h3>
              <a href="<?php echo base_url('admin/create_article') ?>" class="btn btn-success pull-right" title="Create a New Property">Create Article</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>Article Image</center></th>
                  <th><center>Article Title</center></th>
                 
                  <th><center>Activity</center></th>
                </tr>
                </thead>
                <tbody id="articles">
                  <?php 
                  if($fetch_data->num_rows() > 0)
                  {
                    foreach($fetch_data->result() as $row)
                    {
                      ?>
                        <tr><td style="width: 40%;"><center>
                          <?php
                          $dirname = "uploads/articles/".$row->article_title_slug."";
                          $files = glob($dirname."*.*");
                          $dir_path =  "uploads/articles/".$row->article_title_slug."";
                          $extensions_array = array('jpg','png','jpeg');

                          if(is_dir($dir_path))
                          {
                            $files = scandir($dir_path);
                                            
                            for($i = 0; $i < count($files); $i++)
                            {
                             if($files[$i] !='.' && $files[$i] !='..')
                              {
                                $file = pathinfo($files[$i]);
                              ?>
                              <!-- <div class="carousel-item ">
                                <img id="viewunitlayout" src="<?php echo base_url().$dir_path."/".$files[$i] ?> "  style='width:100%;height:100%;'><br>
                              </div> -->
                              <img  src="<?php echo base_url().$dir_path."/".$files[$i] ?> " style='height: 40%; width: 35%;'>&nbsp;
                              
                              <?php
                              }
                              }
                              }
                          ?>
                         </center></td>
                            
                          <td><center><b> <?php echo $row->article_title; ?></b>
                           
                          </center></td>
                          
                          <td style="width: 10%;"><center><br>
                            <?php 
                                if($row->article_system_status == '1')
                                {//active to the website
                                  ?>
                                  
                                    <a href='javascript:;' class='btn btn-danger btn-xs item-hide' id='hide' data="<?php echo $row->article_id;?>"><i class='fa fa-eye-slash'></i> Hide </a>&nbsp;
                                  <?php
                                }
                                elseif($row->article_system_status == '2')
                                  {//hidden to the website
                                  ?>

                                  <a href='javascript:;' class='btn btn-primary btn-xs item-unhide ' id='unhide'  data="<?php echo $row->article_id;?>" ><i class='fa fa-eye'></i> Unhide </a>&nbsp;
                                  <?php
                                }
                             ?>
                              <a href='<?php echo base_url('Admin/edit_article/'.$row->article_id.'/'.$row->article_title_slug) ?>' class='btn btn-success btn-xs item-view'><i class='fa fa-folder-open'></i>View</a><Br>&nbsp;<br>
                              
                          </center></td>
                        </tr>

                      <?php
                    }


                  }
                    else
                    {
                      ?>
                        <tr>
                          <td colspan="5"><center>No Results Found</center></td>
                        </tr>
                      <?php
                    }

                   ?>
                </tbody>
                <tfoot>
                <tr>
                   <th><center>Article Image</center></th>
                  <th><center>Article Title</center></th>
               
                  <th><center>Activity</center></th>
                </tr>
                </tfoot>
              </table>
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>

    
   <div class="modal fade " id="modal-dashboard">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Compose Property Details</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('property/create_sample_view') ?>" method="POST" id="viewForm">
           <div class="form-group">
              <input type="hidden" name="data" id="data">
               
                <div id='readdescription'>
                  <textarea class="textarea" name="sampledescription" id="sampledescription" placeholder="Place Details here"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                </div>  
                <!-- <textarea  name="sample"></textarea> -->
             </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnsubmit" class="btn btn-primary"> <i class="fa fa-envelope"></i> Submit</button>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  $('document').ready(function(){
   
    
       $('#articles').on('click', '.item-hide', function(){
        var id = $(this).attr('data');
        alert(id+' is now Hidden');
        // $('#hide').hide();
        $.ajax({
          type:'ajax',
          method: 'get',
          async : false,
          url: '<?php echo base_url()?>admin/hide_article',
          data: {id,id},
          dataType: 'json',
          success: function(response)
          {
              console.log(id);
              if(response.success)
              {
                alert('success');
                window.location.reload();
              }
          },
          error: function()
          {
            alert('Could not Hide the Property');
          }
        })
       });

       $('#articles').on('click', '.item-unhide', function(){
        var id = $(this).attr('data');
        alert(id+' is now Active');
        $.ajax({
          type:'ajax',
          method: 'get',
          async : false,
          url: '<?php echo base_url()?>admin/unhide_article',
          data: {id,id},
          dataType: 'json',
          success: function()
          {
              console.log(id);
             
                alert('success');
                window.location.reload();
              
          },
          error: function()
          {
            alert('Could not Hide the Property');
          }
        })
       });
       $('#articles').on('click', '.item-createview', function(){
        var id = $(this).attr('data');
        $('#modal-dashboard').modal('show');
        $('input[name=data]').val(id);
        });
  

 
});
</script>