"use strict";

function delPost(obj){
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
        var url = $(obj).attr("postUrl")        
        window.location.href = url;
      });        
    } else {
      swal('Postingan gagal dihapus');
    }
  });
}