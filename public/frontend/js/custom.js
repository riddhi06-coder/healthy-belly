$('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});

$('#category').owlCarousel({
  loop: true,
  stagePadding: 20,
  dots: false,
  navigation: true,
  autoplay: true,
  autoplayHoverPause:true,
      autoplaySpeed: 1000,
    navText: ["<img src='images/left-arrow.png'>","<img src='images/right-arrow.png'>"],
  responsiveClass: true,
  responsive: {
      0: {
      items: 2
    },
    360: {
      items: 2
    },
     480: {
      items: 4
    },
    768: {
      items: 6
    },
    1000: {
      items: 8
    }
  }
});

 $('#seller').owlCarousel({
  loop: true,
  margin: 10,
  stagePadding: 0,
  dots: false,
  navigation: true,
  autoplay: true,
  autoplayHoverPause:true,
      autoplaySpeed: 1000,
    navText: ["<img src='images/left-arrow.png'>","<img src='images/right-arrow.png'>"],
  responsiveClass: true,
  responsive: {
      0: {
      items: 1
    },
    640: {
      items: 2
    },
     768: {
      items: 2
    },
    1000: {
      items: 4
    },
        1400: {
      items: 5
    }
  }
});


  $('#all-products').owlCarousel({
  loop: true,
  margin: 10,
  dots: false,
  navigation: false,
  autoplay: true,
  autoplayHoverPause:true,
      autoplaySpeed: 1000,
    navText: ["<img src='images/left-arrow.png'>","<img src='images/right-arrow.png'>"],
  responsiveClass: true,
  responsive: {
      0: {
      items: 1
    },
    640: {
      items: 2
    },
     768: {
      items: 2
    },
    1000: {
      items: 4
    },
        1400: {
      items: 5
    }
  }
});

$('#testimonials').owlCarousel({
  loop: true,
  margin: 10,
  stagePadding: 0,
  dots: false,
  navigation: true,
  autoplay: true,
  autoplayHoverPause:true,
      autoplaySpeed: 1000,
    navText: ["<img src='images/left-arrow.png'>","<img src='images/right-arrow.png'>"],
  responsiveClass: true,
  responsive: {
      0: {
      items: 1
    },
     640: {
      items: 2
    },
    1000: {
      items: 3
    }
  }
});

   //   $('#products-new').owlCarousel({
   // loop: true,
   //      items: 1,
   //      slideSpeed: 2000,
   //      autoplay: true,
   //      thumbs: true,
   //      thumbImage: true,
   //      thumbContainerClass: 'owl-thumbs',
   //      thumbItemClass: 'owl-thumb-item'
   // });

// lightslider start
    $(document).ready(function() {
      $("#content-slider").lightSlider({
          loop:true,
          keyPress:true
      });
      $('#products-gallery').lightSlider({
          gallery:true,
          item:1,
          verticalHeight: 100,
          thumbItem:5,
          galleryMargin: 30,
          adaptiveHeight :true,
          thumbMargin: 10,
          speed:500,
          auto:true,
          loop:true,
          onSliderLoad: function() {
              $('#products-gallery').removeClass('cS-hidden');
          }  
      });
  });
// lightslider end
$('#newarrive').owlCarousel({
  loop: true,
  margin: 30,
  dots: false,
  navigation: true,
  autoplay: true,
  autoplayHoverPause:true,
      autoplaySpeed: 1000,
    navText: ["<img src='images/left-arrow.png'>","<img src='images/right-arrow.png'>"],
  responsiveClass: true,
  responsive: {
      0: {
      items: 1
    },
     640: {
      items: 2
    },
    1000: {
      items: 2
    },
    1400: {
        items: 3
    }
  }
});


AOS.init({
  once: true
})
var sync1 = $(".slider");
var sync2 = $(".navigation-thumbs");

var thumbnailItemClass = '.owl-item';

var slides = sync1.owlCarousel({
  video:true,
  startPosition: 12,
  items:1,
  loop:true,
  margin:10,
  autoplay:true,
  autoplayTimeout:6000,
  autoplayHoverPause:false,
  nav: false,
  dots: true
}).on('changed.owl.carousel', syncPosition);

function syncPosition(el) {
  $owl_slider = $(this).data('owl.carousel');
  var loop = $owl_slider.options.loop;

  if(loop){
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);
    if(current < 0) {
        current = count;
    }
    if(current > count) {
        current = 0;
    }
  }else{
    var current = el.item.index;
  }

  var owl_thumbnail = sync2.data('owl.carousel');
  var itemClass = "." + owl_thumbnail.options.itemClass;


  var thumbnailCurrentItem = sync2
  .find(itemClass)
  .removeClass("synced")
  .eq(current);

  thumbnailCurrentItem.addClass('synced');

  if (!thumbnailCurrentItem.hasClass('active')) {
    var duration = 300;
    sync2.trigger('to.owl.carousel',[current, duration, true]);
  }   
}
var thumbs = sync2.owlCarousel({
  startPosition: 12,
  items:4,
  loop:false,
  margin:10,
  autoplay:false,
  nav: false,
  dots: false,
  onInitialized: function (e) {
    var thumbnailCurrentItem =  $(e.target).find(thumbnailItemClass).eq(this._current);
    thumbnailCurrentItem.addClass('synced');
  },
})
.on('click', thumbnailItemClass, function(e) {
    e.preventDefault();
    var duration = 300;
    var itemIndex =  $(e.target).parents(thumbnailItemClass).index();
    sync1.trigger('to.owl.carousel',[itemIndex, duration, true]);
}).on("changed.owl.carousel", function (el) {
  var number = el.item.index;
  $owl_slider = sync1.data('owl.carousel');
  $owl_slider.to(number, 100, true);
});
// counter js
    $(document).ready(function(){
        $('.counts').prop('disabled', true);
        $(document).on('click','.pluss',function(){
        $('.counts').val(parseInt($('.counts').val()) + 1 );
        
        });
          $(document).on('click','.minuss',function(){
          $('.counts').val(parseInt($('.counts').val()) - 1 );
            if ($('.counts').val() == 0) {
            $('.counts').val(1);
          }
            });
    });