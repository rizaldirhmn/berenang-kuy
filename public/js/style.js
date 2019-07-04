const sideNav = document.querySelectorAll(".sidenav");
M.Sidenav.init(sideNav);

const tabing = document.querySelectorAll(".tabs");
M.Tabs.init(tabing);

const collaps = document.querySelectorAll(".collapsible");
M.Collapsible.init(collaps);

const share = document.querySelectorAll(".fixed-action-btn");
M.FloatingActionButton.init(share, {
  hoverEnabled: false
});

$(".sbs").slick({
  infinite: true,
  mobileFirst: true,
  autoplay: true,
  autoplaySpeed: 3000,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: true,
  cssEase: "linear"
});

$(".sat").slick({
  infinite: true,
  autoplay: true,
  autoplaySpeed: 5000,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        centerMode: true,
        centerPadding: "40px"
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        arrows: false,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: "40px"
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: "40px"
      }
    }
  ]
});
