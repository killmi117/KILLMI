function iniciarMap(){
    var coord ={lat:31.60077,lng:-106.40530};
    var map = new google.maps.Map(document.getElementById('map'),{
        zoom: 45,
        center:coord
    });
        var marker = new google.maps.Marker({
        position : coord,
        map:map
         });
 }

