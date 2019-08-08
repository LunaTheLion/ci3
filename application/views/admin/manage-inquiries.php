
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
                            <td><input type="checkbox"></td>
                            
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
            <div id=""></div>
            <!-- <div class="form-group">
                <textarea class="textarea" name="propertyDescription" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnsend" class="btn btn-primary"> <i class="fa fa-envelope"></i> Close</button>
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

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
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
        alert('Delete selected messages?');
      });
      $('#inquiries').on('click', '#reademail', function(){
          var id = $(this).attr('data');
          $('#readmodal').modal('show');
      });
  });
</script>