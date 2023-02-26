document.addEventListener('DOMContentLoaded',function(){
  //humbergermenu表示非/表示の切り替え
  const humberger = document.querySelector(".humberger");
  const menu = document.querySelector(".humberge__menu");
  
  humberger.addEventListener('click', function(){
    if(menu.style.display === "none") {
      menu.style.display = "block";
    } else {
      menu.style.display = "none";
    }
  }, false);
  
  document.addEventListener('click', function(event) {
    if (!event.target.closest('.humberger') && !event.target.closest('.humberge__menu')) {
      menu.style.display = "none";
    }
  }, false);


  //クリック時指定要素への移動
  const grobalNavItem = document.querySelectorAll(".grobal-nav__item");
  //to はじめに
  const locationTop = document.querySelector(".location").getBoundingClientRect().top;

  grobalNavItem[0].addEventListener('click', function () {
    window.scrollTo({
      top: locationTop,
      behavior: 'smooth'
    });
  }, false);

  //to 体験
  const iventTop = document.querySelector(".ivent").getBoundingClientRect().top;

  grobalNavItem[1].addEventListener('click', function () {
    window.scrollTo({
      top: iventTop,
      behavior: 'smooth'
    });
  }, false);

  


// //to はじめに
// const locationTop = document.getElementById("location").getBoundingClientRect().top;

// grobalNavItem[0].addEventListener('click', function () {
//   window.scrollTo({
//     top: locationTop,
//     behavior: 'smooth'
//   });
// }, false);

// //to 体験
// const iventTop = document.getElementById("ivent").getBoundingClientRect().top;

// grobalNavItem[1].addEventListener('click', function () {
//   window.scrollTo({
//     top: iventTop,
//     behavior: 'smooth'
//   });
// }, false);




  //クリック時指定要素への移動_ハンバーガーメニュー
  const openMenuItem = function () {
    const menuItem = document.querySelectorAll('.menu__item');
    const locationTop = document.querySelector(".location").getBoundingClientRect().top;
    const iventTop = document.querySelector(".ivent").getBoundingClientRect().top;

    //to はじめに
    menuItem[1].addEventListener('click', function () {
      window.scrollTo({
        top: locationTop,
        behavior: 'smooth'
      });
    }, false);

    //to 体験
    menuItem[2].addEventListener('click', function () {
      window.scrollTo({
        top: iventTop,
        behavior: 'smooth'
      });
    }, false);
  };

    //to top
    const infoTop = document.querySelector('.info').getBoundingClientRect().top;
    const btn = document.querySelector('.btn');

    btn.addEventListener('click', function(){
      window.scrollTo({
        top: infoTop,
        behavior: 'smooth'
      });
    }, false)


    window.addEventListener('scroll', function(){

      // const btn = document.querySelector('.btn');
      const btnTop = btn.getBoundingClientRect().top;
      const scroll = window.pageYOffset;
      const offset = btnTop + scroll;
      const windowHeight = window.innerHeight;

      console.log(btnTop);

      if(scroll > offset - windowHeight + 300) {
        btn.classList.add('.scroll-in')
      }
    }, false);
    

  },false);
