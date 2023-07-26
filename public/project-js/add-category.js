$('#category_form').validate({
    rules:{
        category:'required',
        // text:'required',
        file:'required',
    },messages:{
        category:"Please Enter Category Name Here",
        // text:'Please Enter Client Preview Text',
        file:"Please Select Category Icon Here"
    },submitHandler:function(form,event){
        event.preventDefault();
        $('#btn').html('Please Wait');
        $('#btn').attr('disabled',true);
        $.ajax({
         url:"/admin/add-category",
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
            $('#btn').html('Upload Category');
            $('#btn').attr('disabled',false);
            if(data.status){
                $('#imagePreview').css("display","none");
                $('#category_form').trigger('reset');
            }
 
         }
        
        });
        }
});


function Status(status,id){
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
                url:'/admin/dashboard/status',
                method:"POST",
                dataType:"JSON",
                data:{ status_type: status, category_id: id},
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

   
// THIS IS A UPDATE CATEGORY FORM FUNCTION 
$('#update_category_form').validate({
    rules:{
        category:'required',
        // file:'required',
    },messages:{
        category:"Please Enter Category Name Here",
        // file:"Please Select Category Icon Here"
    },submitHandler:function(form,event){
        event.preventDefault();
        $('#btn').html('Please Wait');
        $('#btn').attr('disabled',true);
        $.ajax({
         url:"/admin/update-category",
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
            if(data.status){
                $('#imagePreview').css("display","none");
                $('#update_category_form').trigger('reset');
            }
 
         }
        
        });
        }
});

// this is a category delete function 

function Delete(id){
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
                url:'/admin/dashboard/category-delete',
                method:"POST",
                dataType:"JSON",
                data:{category_id: id},
                success:function(data){
                  swal({
                 title:data.title,
                 icon:data.icon
                  });
                  if(data.status){
                    $('#'+id).hide();
                  }
 
                }
            });
         
        } else {
        //   swal("Your imaginary file is safe!");
        }
      });
}
