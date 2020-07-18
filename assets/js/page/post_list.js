"use strict";

$.get("http://localhost/aquarium/admin/do_get_all_post", function(data, status){
  data = JSON.parse(data);  ;
  if(data['result'] == 1){    
    for(var i = 0; i<data.data.length; i++){ 
      var place = data.data[i]['id'];     
      $("#swal-delete_post_"+place).click(function() {
        swal({
            title: 'Are you sure?',
            text: 'Sekali dihapus, postingan tidak dapat dikembalikan kembali!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal('Postingan berhasil dihapus', {
                icon: 'success',
              }).then(values => {                                
                var url = $("#swal-delete_post_"+place).attr("postUrl")
                window.location.href = url;
              });        
            } else {
              swal('Postingan gagal dihapus');
            }
          });
      });      
    }
  }
});