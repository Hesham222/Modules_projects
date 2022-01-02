$(document).ready(function(){
//check current password
    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();
        //alert(current_password);
        $.ajax({
            type: 'post',
            url: '/admin/check-current-pwd',
            data:{current_password:current_password},
            success:function(resp){
                //alert(resp);
                if(resp == "false"){
                    $("#checkCuurentPassword").html("<font color=red>Current Password is Incorrect</font>")
                }else if(resp == "true"){
                    $("#checkCuurentPassword").html("<font color=green>Current Password is correct</font>")
                }
            },error:function(){
                alert("Error");
            }


        });
    });


    //confirm deletion with sweet alert
    $(".confirmDelete").click(function(){
        var record = $(this).attr("record");
        var recordid = $(this).attr("recordid");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {

              window.location.href="/admin/delete-"+record+"/"+recordid;
            }
          });
    });

    //Product Attributes Add/Edit Script
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top:10px; margin-left:2px"><input type="text" name="size[]" style="width:120px" value="" placeholder="Size" /><input type="text" name="price[]" style="width:120px" value="" placeholder="Price" /><input type="text" name="stock[]" style="width:120px" value="" placeholder="Stock" /><input type="text" name="sku[]" style="width:120px" value="" placeholder="Sku" /><a href="javascript:void(0);" class="remove_button">Delete</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

});
