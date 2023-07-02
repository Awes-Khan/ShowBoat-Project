function showNotification(from, align, message='successfull completed',type='success') {
    // type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

    // color = Math.floor((Math.random() * 6) + 1);

    $.notify({
      icon: "add_alert",
      message: message,

    }, {
      type: type,
      timer: 3000,
      placement: {
        from: from,
        align: align
      }
    });
  };
  function confirmDelete(formEntryId) {
    // alert("insert");
    console.log("confiming");
    Swal.fire({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this form entry.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        // console.log(result, result.value);
        if (result.value) {
            // console.log("submitting");
            document.getElementById('delete-form-' + formEntryId).submit();
            // console.log("submitted");
            $.notify({
                icon: "add_alert",
                message: "Entry Deleted Successfully"
          
              }, {
                type: 'success',
                timer: 3000,
                placement: {
                  from: 'top',
              align: 'left'
                }
              });
          
        }
    });
    
    // console.log("Terminated");
}







//// below Code is for Create.blade.php //////////
$(document).ready(function() {
    // Preview avatar image
    $('#previewContainer').html('<img src="/default-avatar.png" class="img-thumbnail" style="width: 100px;border-radius:100px;padding-top:0px;    margin-top: -10px;" alt="Avatar Preview">');
    $('#avatarInput').change(function() {
      var file = $(this).prop('files')[0];
  
      if (file) {
        var reader = new FileReader();
  
        reader.onload = function(e) {
          $('#previewContainer').html('<img src="' + e.target.result + '" class="img-thumbnail" style="width: 100px;height: 100px;border-radius:500px;padding-top:0px;margin-top: -10px;"alt="Avatar Preview">');
        };
  
        reader.readAsDataURL(file);
      }
    });
  });
  

  ////////success page/////////
  function createdSuccessfully(){
    $.notify({
        icon: "add_alert",
        message: 'New Entry Created Successfully',

        }, {
        type: 'success',
        timer: 5000,
        placement: {
            from: 'top',
            align: 'left'
        }
    });
  }
  function updatedSuccessfully(){
    $.notify({
        icon: "add_alert",
        message: 'Entry updated Successfully',

        }, {
        type: 'success',
        timer: 5000,
        placement: {
            from: 'top',
            align: 'left'
        }
    });
  }
