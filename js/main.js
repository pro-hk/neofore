Splitting();

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

gsap.from("#mainVisual .slogan .main .char", { opacity: 0, x: 300, skewX: -45, ease: "power4", duration: 1, stagger: 0.1 });
gsap.from("#mainVisual .slogan .sub .char", { opacity: 0, x: 300, skewX: -45, ease: "power4", duration: 1, delay: 1, stagger: 0.1 });
