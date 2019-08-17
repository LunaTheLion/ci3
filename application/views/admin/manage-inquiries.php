
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>
              <!-- /.box-tools -->

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle" id="selectbox"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" id="deletselected"><i class="fa fa-trash-o"></i></button>
                 <!--  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button> -->
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" id="reload"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody id="inquiries">
                    <?php 
                      
                      if($fetch_data->num_rows() > 0)
                      {


                        foreach($fetch_data->result() as $row)
                        {
                        ?>
                          <tr>
                            <td><input type="checkbox" id="inqaction" name="inqaction" value='<?php echo $row->inquiry_id;?>'></td>
                            
                            <td class="mailbox-name"><a href="javascript:;" id='reademail' data='<?php echo $row->inquiry_id ?>'><?php echo $row->inquiry_email; ?></a></td>
                            <td class="mailbox-subject"><b><?php echo $row->inquiry_name ?> </b> <?php echo substr($row->inquiry_message, 0,20) ?>...
                            </td>
                            <td class="mailbox-date"><?php $date =  $row->inquiry_date_received; echo date("M jS, Y", strtotime($date)); ?></td>
                          </tr>

                        <?php
                        }
                      }
                      else
                      {
                        ?>
                        <tr>
                          <td colspan="6"><center>No Results Found</center></td>
                        </tr>

                        <?php
                      }
                     ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>


              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade " id="readmodal">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Read Message</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/send_message') ?>" method="POST" id="messageForm">
            <p>To: <b id='sender'></b></p>
            <p>Subject: <b id='subject'></b></p>
            <div id="inquirymessage"></div>
         
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnsend" class="btn btn-primary">Close</button>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<script type="text/javascript">
  $('document').ready(function(){
      $('#inquirysidebar').siblings().removeClass('active');
      $('#inbox').addClass('active');
      $('#reload').click(function() {
          location.reload();
      });
      $('#selectbox').mousedown(function() {
          if (!$('input[type=checkbox]').is(':checked')) {
             $('input[type=checkbox]').attr('checked',true);
          }
          else
          {
            $('input[type=checkbox]').attr('checked',false);
          }        
      });
      $('#deletselected').click(function(){
        var favorite = [];
        $.each($("input[name='inqaction']:checked"), function(){
          favorite.push($(this).val());
        });
        alert('May selected are:'+favorite.join(", "));
        
      });
      $('#inquiries').on('click', '#reademail', function(){
          var id = $(this).attr('data');
          $('#readmodal').modal('show');
          $('#messageForm').attr('action', '<?php echo base_url('admin/update_inquiry') ?>');
          $.ajax({
            type:'ajax',
            method: 'get',
            url: '<?php echo base_url('admin/view_inquiry')?>',
            data:{id,id},
            async: false,
            dataType: 'json',
            success: function(data)
            {
              console.log(data);
              $('#sender').append(data.inquiry_name);
              $('#subject').append(data.inquiry_project);
              $('#inquirymessage').append(data.inquiry_message);
              // $('#readmodal').find('.btn-primary').text('Update');
            },
            error: function() 
            {
              alert('Could not Update');
            }
          });
      });
  });
</script>