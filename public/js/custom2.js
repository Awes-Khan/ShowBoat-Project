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







//// below Code is for Create.blade.php //////////
$(document).ready(function() {
    function createPageImageHandler(){
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
    }  

    function editPageImageHandler(imageUrl){
        // Preview avatar image
        $('#previewContainer').html('<img src="{{asset("'+imageUrl+'") ?? "/default-avatar.png"}}" class="img-thumbnail" style="width: 100px;border-radius:100px;padding-top:0px;    margin-top: -10px;" alt="Avatar Preview">');
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
        } 
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
