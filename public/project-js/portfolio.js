$('#portfolio-form').validate({
    rules:{
        portfolio:'required',
        file:'required',
    },messages:{
       
    },submitHandler:function(form,event){
        event.preventDefault();
        $('#btn').val('Please Wait');
        $('#btn').attr('disabled',true);
        $.ajax({
         url:"../action/portfolio.php",
         method:"POST",
         dataType:"JSON",
         enctype:"multipart/form-data",
         data:new FormData(form),
         contentType:false,
         processData:false,
         beforeSend:function(){

         },success:function(data){
            $('#btn').val('Save Review');
            $('#btn').attr('disabled',false);
            swal({
              'title':data.title,
              'text':data.msg,
              icon:data.icon
            });
            if(data.status){
                $('#portfolio-form').trigger('reset');
                $('#imagePreview').css("display","none");
            }
 
         }
        
        });
        }
});