// THIS IS A ADMIN LOGIN FUNCTION 
$('#admin-login').validate({
     rules:{
        username:'required',
        password:'required'
     },messages:{
        username:"Please Enter Username",
        password:"Please Enter Password"

     },submitHandler:function(form , event){
      $('#btn').hide();
      $('#loader').attr('disabled',true);
      $('#loader').show()
        event.preventDefault();
        $.ajax({
              url:"admin-login",
              method:"POST",
              data:new FormData(form),
              dataType:"JSON",
              processData:false,
              contentType:false,
              beforeSend:function(){
              },success:function(data){
               $('#btn').show();
               $('#loader').hide()
               $('#loader').attr('disabled',false);
               swal({
                     title:data.title,
                     icon:data.icon,
               });
            if(data.status==true){
               setTimeout(() => {
                  window.location="/admin/dashboard";
               }, 2000);
            }
               
                
              }
        });
     }
});

// THIS IS A  ADMIN LOGOUT FUNCTION 
function Logout(){
   swal({
       title: "Are you sure ?",
       // text: "Once deleted, you will not be able to recover this imaginary file!",
       icon: "warning",
       buttons: true,
       dangerMode: true,
     })
     .then((willDelete) => {
       if (willDelete) {
           $.ajax({
               url:'/logout',
               method:"POST",
               data:{logout:'1'},
               success:function(data){
                  if(data){
                   window.location="/admin";
                  }

               }
           });
        
       } else {
       //   swal("Your imaginary file is safe!");
       }
     });
}


// THIS IS A ADMIN PASSWORD CHANGE FUNCTION 
$('#password_form').validate({
    rules:{
       old:{
        "required":true,
        "minlength":3
       },
       new:{
        "required":true,
        "minlength":3
       },
       confirm:{
        "required":true,
        "minlength":3,
        "equalTo":"#new"
       }
    },messages:{
        
    },submitHandler:function(form,event){
        event.preventDefault();
        $('#btn').html('Please Wait');
        $('#btn').attr('disabled',true);
        $.ajax({
           url:"password_change",
           method:"post",
           data:new FormData(form),
           dataType:"json",
           processData:false,
           contentType:false,
           success:function(data){
            $('#btn').html('Update Password');
           $('#btn').attr('disabled',false);
            swal({
               title:data.title,
               icon:data.icon
            });

           if(data.status){
            $('#password_form').trigger('reset');
           }
           }
        });
    }
});
// THIS IS A ADMIN PASSWORD CHANGE FUNCTION 