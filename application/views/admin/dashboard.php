  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
        
      </h1>
               <p><?php 
       // echo "<pre>";
       // print_r($this->session->userdata());
       // echo "</pre>";
      ?></p>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 id="countallinquiry"></h3>

              <p>Inquiries</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('admin/mng_inquiries') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3 id="countowner"></h3>

              <p>Owners</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('admin/mng_owners') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 id="countarticle"></h3>

              <p>Articles</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('admin/mng_articles') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3 id="countproperties"></h3>

              <p>Properties</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <div class="small-box-footer">For Rent : For Sale</div>
            <p></p>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row" id="main">
        <div class="col-xs-12">
          <div class="box"> 
            <div class="box-header">
              <h3 class="box-title">Listing Table</h3>
              <a href="<?php echo base_url('admin/create_listing') ?>" class="btn btn-success pull-right" title="Create a New Property">Create Listing</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              
             <table id="example1" class="table table-bordered table-hover " width="100%">
                <thead>
                  <tr>
                  <th>Property Code</th>
                  <th>Street Address</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Modified</th>
                </tr>
                </thead>
                <tbody id="properties">
                  <?php 
                  if($fetch_data->num_rows() > 0)
                  {
                    foreach($fetch_data->result() as $row)
                    {
                      ?>
                        <tr data="<?php echo $row->property_id; ?>">
                          <td><?php echo $row->property_code ?></td>
                          <td><?php echo $row->property_address ?></td>
                          <td id="price"> ₱ <?php echo $row->property_price ?></td>
                          <td><center><?php echo $row->property_category; ?></center></td>
                          <td><center><?php echo $row->property_type; ?></center></td>
                          <td><center><?php echo ucfirst($row->property_status); ?></center></td>
                          <td><center><?php echo $row->property_date_edited ?></center></td>
                         
                        </a></tr>

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
                   <th>Property Code</th>
                  <th>Street Address</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Modified</th>

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
                <label id="sampleonly"></label>
                <div id='readdescription'></div>
                  <textarea class="textarea" name="sampledescription" id="sampledescription" placeholder="Place Details here"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                  
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
    function numberWithCommas(number) {
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})(?!\d))/g, ",");
        return parts.join(".");
    }
  $("#properties #price").each(function() {
    var num = $(this).text();
    var commaNum = numberWithCommas(num);
    $(this).text(commaNum);
  });

  $('#properties tr').click(function(){
    var id = $(this).attr('data');
    var url = '<?php echo base_url()?>admin/view_listing/'+id;
    $(location).attr('href',url);


  });
    count_inq();
    count_owner();
    count_article();
    count_property();
    function count_inq()
    {
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url()?>admin/count_inquiry',
        async: false,
        dataType: 'json',
        success: function(data)
        {
          console.log(data);
          if(data == 0 )
          {
            $('#countallinquiry').html("0");
          }
          else
          {
            $('#countallinquiry').html(data);
          }
          
        },
        error: function()
        {
          // alert('Could not count new Inquiries');
        }
      });
    }
    function count_owner()
    {
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url()?>admin/count_owner',
        async: false,
        dataType: 'json',
        success: function(data)
        {
          console.log(data);
          if(data == 0 )
          {
            $('#countowner').html("0");
          }
          else
          {
            $('#countowner').html(data);
          }
          
        },
        error: function()
        {
          // alert('Could not count new Inquiries');
        }
      });
    }
    function count_article()
    {
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url()?>admin/count_article',
        async: false,
        dataType: 'json',
        success: function(data)
        {
          console.log(data);
          if(data == 0 )
          {
            $('#countarticle').html("0");
          }
          else
          {
            $('#countarticle').html(data);
          }
          
        },
        error: function()
        {
          // alert('Could not count new Inquiries');
        }
      });
    }
    function count_property()
    {
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url()?>admin/count_property',
        async: false,
        dataType: 'json',
        success: function(data)
        {
          console.log(data);
          if(data == 0 )
          {
            $('#countproperties').html("0");
          }
          else
          {
            $('#countproperties').html(data);
          }
          
        },
        error: function()
        {
          // alert('Could not count new Inquiries');
        }
      });
    }

    
       $('#properties').on('click', '.item-hide', function(){
        var id = $(this).attr('data');
        alert(id+' is now Hidden');
        // $('#hide').hide();
        $.ajax({
          type:'ajax',
          method: 'get',
          async : false,
          url: '<?php echo base_url()?>admin/hide_property',
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

       $('#properties').on('click', '.item-unhide', function(){
        var id = $(this).attr('data');
        alert(id+' is now Active');
        $.ajax({
          type:'ajax',
          method: 'get',
          async : false,
          url: '<?php echo base_url()?>admin/unhide_property',
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
       $('#properties').on('click', '.item-createview', function(){
        var id = $(this).attr('data');
        $('#modal-dashboard').modal('show');
        $('input[name=data]').val(id);
        });
    $('#properties').on('click', '.item-editview', function(){
        var id = $(this).attr('data');
        $('#modal-dashboard').modal('show');
        $('#modal-dashboard').find('.modal-title').text('Edit Property Details');
        $('#viewForm').attr('action','<?php echo base_url('property/update_sample_view') ?>');
        $.ajax({
          type:'ajax',
          method: 'get',
          url: '<?php echo base_url('property/view_sample')?>',
          data:{id,id},
          async: false,
          dataType: 'json',
          success: function(data)
          {
            console.log(data);
            $('input[name=data]').val(data.property_id);
            $('#sampleonly').append('This is your Previous Summary');
             $('#readdescription').addClass('box box-solid bg-light-blue-gradient');
             $('#readdescription').append(data.property_sample_view);
             //$('textarea[name=sampledescription]').append(data.property_sample_view);
             //$('#readdescription').append(data.property_sample_view);
            $('#modal-dashboard').find('.btn-primary').text('Update');
          },
          error: function() 
          {
            alert('Could not Update');
          }
        });
    });

 
});
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>