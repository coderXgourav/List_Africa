$('#review-submit').validate({
     rules:{
        // rating:'required',
        comment:'required'
     },messages:{

     },submitHandler:function(form,event){
        event.preventDefault();
        $('#submit').val('Wait..');
        $('#submit').attr('disabled',true);
        $.ajax({
             url:'rating-submit',
             method:'POST',
             dataType:"JSON",
             data:new FormData(form),
             processData:false,
             contentType:false,
             success:function(data){
                $('#submit').val('Submit');
                $('#submit').attr('disabled',false);
                if(data.login==0){
                    window.location="/user";
                }else{
                    swal({
                       title:data.title,
                       icon:data.icon
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 2000);

                }
                $('#review-submit').trigger('reset');
                
             }
            
        });
     }

});