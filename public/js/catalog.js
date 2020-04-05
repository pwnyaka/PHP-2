
"use strict";
let ua = navigator.userAgent.toLowerCase();
let isOpera = (ua.indexOf('opera') > -1);
let isIE = (!isOpera && ua.indexOf('msie') > -1);

let startFrom = 5;

function showProduct(url = '', data = {}) {
  return fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: {
      'content-type': 'application/json'
    },
  })
      .then(response => response.json())
      .then((data) => {
        if (data.length > 0) {
          let str = '';
          // document.querySelector('.wrapper').innerHTML = '';
          data.forEach((obj) => {
            str += `<h2><a href="/catalog/card/?id=${obj.id}">${obj.prodName}</a></h2>
                          <img src="/img/${obj.imgName}" alt="" style="width: 500px;">
                          <p>${obj.description}</p>
                          <p>Цена: ${obj.cost}</p>
                          <hr>`;
          });
          document.querySelector('.wrapper').innerHTML += str;
        }
      })
      .catch(error => console.error(error)); // ловит ошибки
}

function getDocumentHeight() {
  return Math.max(document.compatMode != 'CSS1Compat' ? document.body.scrollHeight : document.documentElement.scrollHeight, getViewportHeight());
}

function getViewportHeight() {
  return ((document.compatMode || isIE) && !isOpera) ? (document.compatMode == 'CSS1Compat') ? document.documentElement.clientHeight : document.body.clientHeight : (document.parentWindow || document.defaultView).innerHeight;
}

window.onload = function () {
  window.addEventListener('scroll', () => {
    if (window.pageYOffset + window.innerHeight >= getDocumentHeight()) {
      showProduct('/api/show', {"startFrom": startFrom});
      startFrom += 3;
    }
  });
};
