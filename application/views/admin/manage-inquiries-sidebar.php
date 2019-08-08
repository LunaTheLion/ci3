  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Inquiries
        <small>13 new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inquiries</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <!--  <div class="col-md-3">
          <a href="javascript:;" id="compose"  class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked" id="inquirysidebar">
                <li id="inbox"><a href="<?php echo base_url('admin/mng_inquiries') ?>"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right">12</span></a></li>
                <li id="sent"><a href="<?php echo base_url('admin/mng_inquiries_sent_items') ?>"><i class="fa fa-envelope-o"></i> Sent</a></li>
                <li id="drafts"><a href="<?php echo base_url('admin/mng_inquiries_draft') ?>"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                <li id="trash"><a href="<?php echo base_url('admin/mng_inquiries_trash') ?>"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul>
            </div>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="modal fade " id="modal-default">
          <div class="modal-dialog modal-lg ">
            <div class="modal-content ">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Compose Message</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('admin/send_message') ?>" method="POST" id="messageForm">
                  <div class="form-group">
                    <input type="text" name="to" placeholder="To:" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="subject" placeholder="Subject:" class="form-control">
                  </div>
                  <div class="form-group">
                      <textarea class="textarea" name="propertyDescription" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> <i class="fa fa-close"></i>  Discard</button>
                
                <a href="javascript:;"  class="btn btn-info"> <i class="fa fa-pencil"></i> Draft</a>
                <button type="submit" id="btnsend" class="btn btn-primary"> <i class="fa fa-envelope"></i> Send</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <script type="text/javascript">
          $('document').ready(function(){
            $('#compose').on('click', function(){
              $('#modal-default').modal('show');
            });
            $('#messageForm').submit(function(){
              e.preventDefault();
            
              $.ajax({
                url: '<?php echo base_url('admin/send_message') ?>',
                type:'POST',
                data: $('messageForm').serialize(),
                 success:function(data)
                {
                  Alert('Successfully Submitted');
                },
                error: function()
                {
                  Alert('Cannot Send Message');
                },
              });//ajax end
            });//message form end function

          });
        </script>