(function(){
    /*
      flex-image: javascript for image replacement based on screen size
          by John Weir http://famedriver.com
      Usage, where `*` will be replaced by the image size.
      <img data-src='/path-to-image/image-*.jpg' data-sizes='320:480,481:960' class='flex-image'/>
      Thanks to Aurélien Delogu & Molt for the inspiration -> https://github.com/pyrsmk/molt 
    */
    var maxWidth = window.screen.width;
  
    // splits the data-size "json" into an array and returns the closest size to the maxWidth
    function getSrc(img){
     var size, tuples;
      
     tuples = $.map(
       $(img).data("sizes").split(","),
       function(v){ var x = v.split(":"); return [[parseInt(x[0]),x[1]]]})
       .sort(function(a,b){ return b[0] - a[0]});  // sort high to low
     
     for(var i=0; i < tuples.length; i++){ 
       if(tuples[i][0] <= maxWidth){
         size = tuples[i][1];
         break;
       }
     }
     return $(img).data("src").replace(/\*/,size);
    }
  
    // Splits an array into n image queues
    // given an array of [1,2,3,4,5,6] and n = 2
    // returns 
    // [[1,3,5],[2,4,6]]
    function split(arr,n){
      out = [];
      for(var i=0; i < n; i++){ out[i] = [];}
      for(var i=0; i < arr.length; i += n){
        for(var x=0; x < n; x += 1){
          if(arr[i+x]) out[x].push(arr[i+x]);
      }}
      return out;
    }
  
    function setWH(img, imgTemplate, c){
      c = c || 0;
      if(c > 2){ return false;}
      if(img[0].width > 0){
        imgTemplate.attr("src", img.attr("src")).fadeIn();
        //imgTemplate.attr({width:img[0].width, height:img[0].height}).fadeIn();
      } else {
        setTimeout(function(){setWH(img, imgTemplate, c+1)}, 10);
      }
    }
    // Sequentially replaces each link in the block with an image
    function imageReplace(block){
      if(block.length < 1){return true;}
      var imgTemplate = $(block.shift());
      var img = new Image();
      $(img).load(function(){
        if(maxWidth > 480) {setWH($(this), imgTemplate);}
        else {
          imgTemplate.attr("src", img.src);
        }
        imageReplace(block);
      }).attr({src :getSrc(imgTemplate)}); // always set src after onload
    }
    
    $(function(){
      var blocks = split($("img.flex-image").toArray(),3);
      $.each(blocks, function(i,block){ imageReplace(block);})        
    });
  })();