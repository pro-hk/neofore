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

// gsap.from("#mainVisual .slogan .main", { opacity: 0, duration: 2, stagger: 0.2 });

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

const header = $("#header");
$(window).on("scroll", function () {
  const st = $(window).scrollTop();
  if (st > 0 || !header.hasClass("scroll")) {
    header.addClass("scroll");
  } else {
    header.removeClass("scroll");
  }
});

const popup = $(".popup");
const btnClose = popup.find(".btnClose");
const checkbox = popup.find("#checkbox");

// let isCheck = checkbox.is(":checked");
// checkbox.on("change", function () {
//   isChecked = $(this).is(":checked");
// });
btnClose.on("click", function () {
  if (checkbox.is(":checked")) {
    Cookies.set("oneday", "one", { expires: 1 });
  }
  gsap.to(popup, {
    top: -600,
    duration: 1,
    ease: "back.in",
    // in : 점점 빠르게 ; out : 점점 느리게 ; inOut : 점점 빠르다가 점점 느리게
  });
});

if (Cookies.get("oneday") === "one") {
  popup.hide();
} else {
  popup.show();
}
