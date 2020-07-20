"use strict";

function delProduct(obj){
  swal({
    title: 'Are you sure?',
    text: 'Sekali dihapus, produk tidak dapat dikembalikan kembali!',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal('Produk berhasil dihapus', {
        icon: 'success',
      }).then(values => {                                
        var url = $(obj).attr("productUrl")        
        window.location.href = url;
      });        
    } else {
      swal('Produk gagal dihapus');
    }
  });
}