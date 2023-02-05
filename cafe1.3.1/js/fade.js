'use strict';
document.addEventListener('DOMContentLoaded', function() {


const auth = document.querySelector('.auth');
const modal = document.querySelector('.modal');
const humbergerAuth = document.querySelectorAll('.menu__item')[0];


auth.addEventListener('click', function() {
  modal.classList.toggle('fade-up');
},false);



document.querySelector('.modal-back').addEventListener('click', function() {
  modal.classList.remove('fade-up');
},false);


//bumberger menu
humbergerAuth.addEventListener('click', function() {
  modal.classList.toggle('fade-up');
}, false);



  window.addEventListener('scroll', function() {

    // const scrollable = this.document.documentElement.scrollHeight - window.innerHeight; //scroll可能な最大値 ※整数値
    // const scrolled = this.window.scrollY; //scroll可能な最大値 ※端数が出る

    // if(Math.ceil(scrolled) === scrollable) {
    //   this.alert('You\'ve reached the bottom!!');
    // }

    //https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference/Global_Objects/Math/ceil

    // console.log(scrollable);
    // const btnTop = document.querySelector('.btn-offset');
    // const offsetBtnTop = document.querySelector('.btn-offset').getBoundingClientRect().top;
    // const scrolled = window.scrollY;
    // const offset = offsetBtnTop + scrolled;
    // const windowHeight = window.innerHeight;

    // if(scrolled > offset - windowHeight + 0) {
    //   btnTop.classList.add('.scroll-in');
    // }
  
  
    // console.log(offsetBtnTop);
    // console.log(scrolled);
    // console.log(offset);
    // console.log(windowHeight);

    let fadeInTarget = document.querySelectorAll('.fade-in');

    for (let i = 0; i < fadeInTarget.length; i++){

    window.addEventListener('scroll', function(){
        
        const rect = fadeInTarget[i].getBoundingClientRect().top;
        const scroll = window.pageYOffset;
        const offset = rect + scroll;
        const windowHeight = window.innerHeight; 
        
        if(scroll > offset - windowHeight + 150){
            fadeInTarget[i].classList.add('scroll-in');
        }else{
            fadeInTarget[i].classList.remove('scroll-in');
        }        
    });
}
  
  }, false);

}, false);