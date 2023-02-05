document.addEventListener('DOMContentLoaded', () => {

const validatonForm = document.querySelector('.validationForm');

if(validatonForm) {
  const errorClassName = 'error';
  const requiredElems = document.querySelectorAll('.required')
  const emailElems = document.querySelectorAll('.email');
  const tellElems = document.querySelectorAll('.tel');
  const maxlengthElems = document.querySelectorAll('.maxlength');
  const equaToElemsElems = document.querySelectorAll('.equal-to');

  const createError = (elem, errorMessage) => {
    const errorSpan = document.createElement('span');
    errorSpan.classList.add(errorClassName);
    errorSpan.setAttribute('aria-live', 'polite');
    errorSpan.textContent = errorMessage;
    elem.patternNode.appendChild(errorSpan);
  }

  validatonForm.addEventListener('submit', (e) => {
    
    const errorElems = validatonForm.querySelectorAll('.' + errorClassName);
    errorElems.forEach( (elem) => {
      elem.remove();
    });

    requiredElems.forEach( (elem) => {
      const elemValue = elem.calue.trim();
      if(elemValue.length === 0) {
        createError(elem, '入力は必須です。');
        e.preventDefault();
      }
    });

    emailElems.forEach( (elem) => {
      const pattern =  /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ui;
      if(elem.value !== '') {
        if(!pattern.test(elem.value)) {
          createError(elem, 'Emailアドレスの形式が正しくないようです。');
          e.preventDefault();
        }
      }
    });

    tellElems.forEach( (elem) => {
      const pattern = /^\(?\d{2,5}\)?[-(\.\s]{0,2}\d{1,4}[-)\.\s]{0,2}\d{3,4}$/;
      if(elem.value !== '') {
        if(!pattern.test(elem.calue)) {
          createError(elem, '電話番号の形式が正しくないようです。')
          e.preventDefault();
        }
      }
    });

    maxlengthElems.forEach( (elem) => {
      const maxlength = elem.dataset.maxlength;
      //const maxlength = elem.getAttribute('data-maxlenght);
      if(elem.value !=='') {
        if(elem.value.length > maxlength) {
          createError(elem, maxlength + '文字以内でご入力ください。')
          e.preventDefault();
        }
      }
    });

    equalToElems.forEach( (elem) => {
      const equalToId = elem.dataset.equalTo;
      //const equalToId = elem.getAttribute('data-equal-to');
      if(elem.value !=='' && equalToElem.value !=='') {
        createError(elem, '入力された値が異なります。');
        e.preventDefault();
      }
    });

    const errorElem = validatonForm.querySelector('.' + errorClassName);
    if(errorElm) {
      const errorElemOffsetTop = errorElem.offsetTop;
      window.scrollTo( {
        top: errorElemOffsetTop - 40,
        behavior: 'smooth'
      });
    }

  });

console.log(errorClassName);
console.log(requiredElems);
console.log(emailElems);
console.log(tellElems);
console.log(maxlengthElems);
console.log(equaToElemsElems);

}


















});