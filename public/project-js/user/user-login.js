$('#user_ragistration').validate({
      rules:{
             name:'required',
             email:{
                'required':true,
                'email':true
             },
             username:'required',
             password:{
                'required':true,
                'minlength':4
             },
             confirm_password:{
                'required':true,
                'minlength':4,
                'equalTo':'#password'
             }
      },messages:{

      },submitHandler:function(form,event){
        event.preventDefault();
        $('#btn').val('Please Wait');
        $('#btn').attr('disabled',true);
        $.ajax({
         url:"/user/register",
         method:"POST",
         dataType:"JSON",
         enctype:"multipart/form-data",
         data:new FormData(form),
         contentType:false,
         processData:false,
         beforeSend:function(){

         },success:function(data){
          swal({
           icon:data.icon,
           title:data.title,
           msg:data.msg
          });
            $('#btn').val('CREATE ACCOUNT');
            $('#btn').attr('disabled',false);
            if(data.status){
               $('#user_ragistration').trigger('reset');
            }
 
         }
        
        });
        }
});


// THIS IS USER LOGIN FUNCTION 

$('#user_login').validate({
   rules:{
          username:'required',
          password:{
             'required':true,
             'minlength':4
          }
   },messages:{

   },submitHandler:function(form,event){
     event.preventDefault();
     $('#btn').val('Please Wait');
     $('#btn').attr('disabled',true);
     $.ajax({
      url:"/user/login",
      method:"POST",
      dataType:"JSON",
      enctype:"multipart/form-data",
      data:new FormData(form),
      contentType:false,
      processData:false,
      beforeSend:function(){

      },success:function(data){
       swal({
        icon:data.icon,
        title:data.title,
        msg:data.msg
       });
         $('#btn').val('SIGN IN');
         $('#btn').attr('disabled', false);
         //   var previousPage = document.referrer;
         if(data.status){
            setTimeout(() => {
              window.location.href = "/";
            //   window.location.href = previousPage;
              }, 2000);
         }

      }
     
     });
     }
});

// THIS IS A ADMIN PASSWORD CHANGE FUNCTION 
$('#password_form').validate({
    rules:{
       old:{
        "required":true,
        "minlength":4
       },
       new:{
        "required":true,
        "minlength":4
       },
       confirm:{
        "required":true,
        "minlength":4,
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

// THIS IS A  ADMIN LOGOUT FUNCTION 
function LogoutUser(){
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
               url:'/user/logout',
               method:"POST",
               data:{logout:'1'},
               success:function(data){
                  if(data){
                   window.location="/user";
                  }

               }
           });
        
       } else {
       //   swal("Your imaginary file is safe!");
       }
     });
}