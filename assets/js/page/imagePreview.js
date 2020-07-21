function loadFile(event) {    
    var data = '';
    for(var i = 0 ; i<event.target.files.length; i++){
        // data += '<div class="gallery-item" data-image="'+URL.createObjectURL(event.target.files[i])+'" data-title="Image '+i+'"></div>';
        data += '<img class="mr-2 mb-2 gallery-item" src="'+URL.createObjectURL(event.target.files[i])+'"/>'
    }    
    $('#image-output').html(data);     
};

function loadFileBanner(event) {            
    var data = event.target.files['0']['name'];
    $('#banner-name').html(data);     
};

