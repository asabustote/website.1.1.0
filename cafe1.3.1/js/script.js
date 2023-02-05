document.addEventListener('DOMContentLoaded',function(){

  //humbergermenu表示非/表示の切り替え
  const humberger = document.querySelector(".humberger");
  const menu = document.querySelector(".humberge__menu");

  humberger.addEventListener('click', function(){
    if(menu.style.display == "none") {
      menu.style.display = "block"
    } else{
      menu.style.display = "none";
    }
  },false);

  const body = document.getElementsByTagName('body');
  console.log(body);

  const notMenu = document.querySelector(":not(.humberge__menu)");

  notMenu.addEventListener('click', function () {
      if (menu.style.display == "none") {
        menu.style.display = "block";
      } else {
        menu.style.display = "none";
      }
    }, false);

    console.log('aaa');


  //クリック時指定要素への移動
  const grobalNavItem = document.querySelectorAll(".grobal-nav__item");
  //to はじめに
  const locationTop = document.querySelector(".location").getBoundingClientRect().top;

  grobalNavItem[0].addEventListener('click', function(){
    window.scrollTo({
      top: locationTop,
      behavior: 'smooth'
    });
  }, false);

  //to 体験
  const iventTop = document.querySelector(".ivent").getBoundingClientRect().top;

  grobalNavItem[1].addEventListener('click', function(){
    window.scrollTo({
      top: iventTop,
      behavior: 'smooth'
    });
  },false);

  //クリック時指定要素への移動_ハンバーガーメニュー
  const menuItem = document.querySelectorAll('.menu__item');

  //to はじめに
  menuItem[1].addEventListener('click', function(){
    window.scrollTo({
      top: locationTop,
      behavior: 'smooth'
    });
  },false);

    //to 体験
    menuItem[2].addEventListener('click', function(){
      window.scrollTo({
        top: iventTop,
        behavior: 'smooth'
      });
    },false);

    //to top
    const infoTop = document.querySelector('.info').getBoundingClientRect().top;
    const btn = document.querySelector('.btn');

    btn.addEventListener('click', function(){
      window.scrollTo({
        top: infoTop,
        behavior: 'smooth'
      });
    }, false)

    //feadに関する処理
    // const fadeInElm = document.querySelectorAll('.fead-in');

    // for(let i = 0; i < fadeInElm.length; i++) {

    //   window.addEventListener('scroll', function(){

    //     const btnTop = fadeInElm[i].getBoundingClientRect().top;
    //     const scroll = window.pageYOffset;
    //     const offset = btnTop + scroll;
    //     const windowHeight = window.innerHeight;

    //     if(scroll > offset - windowHeight + 150) {
    //       fadeInElm[i].classList.add('scroll-in');
    //     }else {
    //       fadeInElm[i].classList.remove('scroll-in');
    //     }

    //   }, false);

    // }

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

    // console.log(btn);
    // console.log(btnTop);
    // console.log(scroll);
    // console.log(windowHeight);
    



},false);
