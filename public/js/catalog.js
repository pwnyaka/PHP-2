"use strict";
let ua = navigator.userAgent.toLowerCase();
let isOpera = (ua.indexOf('opera') > -1);
let isIE = (!isOpera && ua.indexOf('msie') > -1);

let startFrom = 5;
let inAction = false;

window.onload = function () {
  initBuyButtons();
  window.addEventListener('scroll', () => {
    if (window.pageYOffset + window.innerHeight >= getDocumentHeight() && !inAction) {
      inAction = true;
      showProduct('/api/show', {"startFrom": startFrom});
      startFrom += 3;
    }
  });
};


