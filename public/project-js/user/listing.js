function Name(name){
    $('#name_change').html(name+" Name");
    $('#name_placeholder').attr('placeholder',"Please Enter "+name+ " Name");
}

$('#user_listing_form').validate({
    rules:{
        category_id:'required',
        company:'required',
        address:'required',
        country:'required',
        phone_number:'required',
        mobile_number:'required',
        // fax:'required',
        email:'required',
        // website:'required',
        desc:'required',
        year:'required',
        // employe:'required',
        manager:'required',
        file:'required'
    },messages:{

    },submitHandler:function(form,event){
        event.preventDefault();
        $('#btn').html('Please Wait ');
        $('#loader').show();
        $('#btn').attr('disabled',true);
        $.ajax({
            url:"/user/save-listing",
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
               $('#btn').html('Update Category');
               $('#btn').attr('disabled',false);
               $('#loader').hide();

               if(data.status){
                   $('#imagePreview').css("display","none");
                   $('#user_listing_form').trigger('reset');
               }
    
            }
           
           });
    }
});


// THIS IS A  LISTING STATUS FUNCTION 
function ListingStatus(status,id){
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
                url:'/admin/dashboard/listing-status',
                method:"POST",
                dataType:"JSON",
                data:{ status_type: status, listing_id: id},
                success:function(data){
                  swal({
                 title:data.title,
                 icon:data.icon
                  });
 
                }
            });
         
        } else {
        //   swal("Your imaginary file is safe!");
        }
      });
}


// THIS  IS UPDATE LISTING FUNCTION 
$('#user_update_listing_form').validate({
    rules:{
        category_id:'required',
        company:'required',
        address:'required',
        country:'required',
        phone_number:'required',
        mobile_number:'required',
        // fax:'required',
        email:'required',
        // website:'required',
        desc:'required',
        year:'required',
        // employe:'required',
        manager:'required',
        // file:'required'
    },messages:{

    },submitHandler:function(form,event){
        event.preventDefault();
        $('#btn').html('Please Wait ');
        $('#loader').show();
        $('#btn').attr('disabled',true);
        $.ajax({
            url:"/user/update-listing",
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
               $('#btn').html('Update Category');
               $('#btn').attr('disabled',false);
               $('#loader').hide();

               if(data.status){
                   $('#imagePreview').css("display","none");
                //    $('#update_listing_form').trigger('reset');
               }
    
            }
           
           });
    }
});

// THIS IS A LISTING DELETE FUNCTION 
function UserDeleteListing(id){
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
                url:'/user/dashboard/listing-delete',
                method:"POST",
                dataType:"JSON",
                data:{listing_id: id},
                success:function(data){
                  swal({
                 title:data.title,
                 icon:data.icon
                  });
                  if(data.status){
                  $('#'+data.id).hide();
                  }
                }
            });
         
        } else {
        //   swal("Your imaginary file is safe!");
        }
      });
}
