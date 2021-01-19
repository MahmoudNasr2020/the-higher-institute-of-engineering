
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script type="text/javascript" src="<?php echo $js; ?>vendor.js"></script>
<script type="text/javascript" src="<?php echo $js; ?>hoverable-collapse.js"></script>
<script type="text/javascript" src="<?php echo $js; ?>off-canvas.js"></script>
<script type="text/javascript" src="<?php echo $js; ?>misc.js"></script>
<script type="text/javascript" src="<?php echo $js; ?>settings.js"></script>
<script>
    $(document).ready(function(){
        function notification(view=''){
            $.ajax({
                url:'../../php/message/fetch.php',
                method:'POST',
                data:{view:view},
                dataType:'json',
                success:function(data){
                    $('.message-list').html(data.content);
                    if(data.count > 0 ){
                        $('.count').css('visibility','visible');
                        $('.count').html(data.count);
                    }
                }
            });
        }
        notification();
        $('#messageDropdown').on('click',function(){
            $('.count').html('');
            $('.count').css('visibility','hidden');
             notification('yes');
        });
        setInterval(function(){
            notification();
        },1000);
    });
    function notificationteach(view=''){
        $.ajax({
            url:'../../php/activity/fetch.php',
            method:'POST',
            data:{view:view},
            dataType:'json',
            success:function(data){
                $('.activity-list').html(data.content);
                if(data.count > 0){
                    $('.count-activity').html(data.count);
                    $('.count-activity').css('visibility','visible');
                }
            }
        });   
    }
            notificationteach();
            $('#notificationDropdown').on('click',function(){
                $('.count-activity').html('');
                $('.count-activity').css('visibility','hidden');
                notificationteach('yes');
            });
            setInterval(function(){
                notificationteach()
            },10000);

             /*-------------------------------------------------------------------
                                                  clcik
                  --------------------------------------------------------------------*/
                  $(document).on('click','.click-setting',function(){
                    $('#file-img-manageradmin').val('');
                    $('#file-img-manageradmin').text('');
                    $('#respons-manageradmin').hide();
                    $('#passwordadmin').val('');
                  });
                  /*-------------------------------------------------------------------
                                                  admin
                  --------------------------------------------------------------------*/
            $('.form-settingadmin').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                        url:'../adminsetting/update.php',
                        method:'POST',
                        data:new FormData(this),
                        cache:false,
                        contentType:false,
                        processData:false,
                        dataType:'json',
                        success:function(data){
                         if(data.pass=='error' || data.file == 'error' || data.email=='error'){
                            $('#respons-manageradmin').html(data.error);
                            $('#respons-manageradmin').show();
                         }else{
                             $('.name-adminnew').html(data.name);
                            
                             $('.img-new').attr('src',data.img);
                           $('#adminsetting').modal('hide');
                         }
                    }
              });
          });
          
                   /*-------------------------------------------------------------------
                                                  show
                  --------------------------------------------------------------------*/
                  $('.click-setting').on('click',function(){
                    var id=$(this).attr('id');
                    $.ajax({
                      url:'../adminsetting/select.php',
                      method:'POST',
                      data:{id:id},
                      dataType:'json',
                      success:function(data){
                        $('#nameadmin').val('');
                        $('#emailadmin').val('');
                        $('#adminsetting').modal('show');
                      }
                    });
                  });

                    /*-------------------------------------------------------------------
                                                  show
                  --------------------------------------------------------------------*/
                  $('.click-settingshow').on('click',function(){
                    var id=$(this).attr('id');
                    $.ajax({
                      url:'../adminsetting/showadminsetting.php',
                      method:'POST',
                      data:{id:id},
                      dataType:'json',
                      success:function(data){
                        $('#modal_showadminsetting').html(data.content);
                      }
                    });
                  });
</script>
</body>