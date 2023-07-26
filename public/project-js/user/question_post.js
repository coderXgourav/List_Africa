$('#question_post').validate({
    rules:{
          question:'required',
       
    },messages:{
          question:'Please Type Question Here..'
    },submitHandler:function(form,event){
        event.preventDefault();
        $.ajax({
            url:'question',
            method:'POST',
            dataType:'JSON',
            data:new FormData(form),
            contentType:false,
            processData:false,
            success:function(data){
              swal({
                title:data.title,
                icon:data.icon
              });

              if(data.question){
                $('.swal-button--confirm').click(function(){
                    window.location="/user";
                  });
              }
             
            }
        });
    }
});

$('#submitAns').validate({
  rules:{
        ans:'required',
        maxlength:160
  },messages:{
        question:'Please Type Answer Here..'
  },submitHandler:function(form,event){
      event.preventDefault();
      $.ajax({
          url:'answer',
          method:'POST',
          dataType:'JSON',
          data:new FormData(form),
          contentType:false,
          processData:false,
          success:function(data){
            swal({
              title:data.title,
              icon:data.icon
            });
           if(data.status){
            $('#submitAns').trigger('reset');
           }
            if(data.question){
              $('.swal-button--confirm').click(function(){
                  window.location="/user";
                });
            }
           
          }
      });
  }
});

       
function AnsShow(id){
   $.ajax({
      url:'ans',
      type:'GET',
      data:{myid:id},
      success:function(data){
        $('#parent_div').html(data);
        $('#hello').show();
      }
   }); 
}
 