const mainVisualSlider = new Swiper("#mainVisual", {
  autoplay: true,
  speed: 1000,
  effect: "fade",
  loop: true,
  // navigation: {
  //   prevEl: "#mainVisual .prev",
  //   nextEl: "#mainVisual .next",
  // },
  pagination: {
    el: "#mainVisual .pagination",
    type: "bullets",
    clickable: "true",
  },
});

const productSlider = new Swiper("#product .list", {
  speed: 600,
  slidesPerView: 3, //화면에 보여지는 갯수
  slidesPerGroup: 3, //묶음
  navigation: {
    prevEl: "#product .prev",
    nextEl: "#product .next",
  },
});

const gnbList = $("#gnb .list > li");
gnbList.on("mouseenter", function () {
  $(this).find(".depth02").stop().slideDown(200);
});
gnbList.on("mouseleave", function () {
  $(this).find(".depth02").stop().slideUp(200);
});

const faqList = $(".faqBox ul li");
faqList.on("click", function () {
  $(this).toggleClass("on");
  $(this).siblings("li").removeClass("on");
  $(this).find("dd").stop().slideToggle();
  $(this).siblings("li").find("dd").stop().slideUp();
});
