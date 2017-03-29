
(function(){
  "use strict";


$(function ($) {

    //BG SLIDESHOW WITH ZOOM EFFECT
    $.mbBgndGallery.buildGallery({
                containment:"body",
                timer:1000,
                effTimer:15000,
                controls:false, 
                grayScale:false,
                shuffle:true,
                preserveWidth:false,
                preserveTop: true,
                effect:"zoom",
    //effect:{enter:{transform:"scale("+(1+ Math.random()*2)+")",opacity:0},exit:{transform:"scale("+(Math.random()*2)+")",opacity:0}},

                // If your server allow directory listing you can use:
                // (however this doesn't work locally on your computer)


                // else:

                 images:[
                 "img/background/custom/0_dark.jpg",
                 "img/background/custom/1_dark.jpg",
                 "img/background/custom/2_dark.jpg",
                 "img/background/custom/3_dark.jpg",
                 "img/background/custom/4_dark.jpg",
                 "img/background/custom/5_dark.jpg",
                 "img/background/custom/6_dark.jpg",
                 "img/background/custom/7_dark.jpg"
                 ],    

                onStart:function(){},
                onPause:function(){},
                onPlay:function(opt){},
                onChange:function(opt,idx){},
                onNext:function(opt){},
                onPrev:function(opt){}
            });


   
});
// $(function ($)  : ends

//              "img/background/bg_1.jpg",
//              "img/background/bg_2.jpg",
//              "img/background/bg_12.jpg"

})();
