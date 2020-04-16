function fetchPost(url, data) {
  return fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: {
      'content-type': 'application/json'
    },
  })
}

function showProduct(url = '', data = {}) {
  return fetchPost(url, data)
      .then(response => response.json())
      .then((data) => {
        if (data.length > 0) {
          let str = '';
          data.forEach((obj) => {
            str += `<h2><a href="/catalog/card/${obj.id}">${obj.prodName}</a></h2>
                          <img src="/img/${obj.imgName}" alt="" style="width: 300px;">
                          <p>${obj.description}</p>
                          <p>Цена: ${obj.cost}</p>
                          <p>Просмотры: ${obj.views}</p>
                          <button class="buy" data-id="${obj.id}" data-cost="${obj.cost}">Купить</button>
                          <hr>`;
          });
          document.querySelector('.wrapper').innerHTML += str;
          initBuyButtons();
          inAction = false;
        }
      })
      .catch(error => console.error(error)); // ловит ошибки
}

function buyProduct(url = '', data = {}) {
  return fetchPost(url, data)
      .then(response => response.json())
      .then((data) => {
        document.getElementById('count').innerText = data.count
      })
      .catch(error => console.error(error)); // ловит ошибки
}

function initBuyButtons() {
  let buttons = document.querySelectorAll('.buy');
  buttons.forEach((elem) => {
    elem.addEventListener('click', () => {
      let id = elem.getAttribute('data-id');
      let cost = elem.getAttribute('data-cost');
      buyProduct('/api/buy', {"id": id, "cost": cost})
    })
  })
}

function getDocumentHeight() {
  return Math.max(document.compatMode != 'CSS1Compat' ? document.body.scrollHeight : document.documentElement.scrollHeight, getViewportHeight());
}

function getViewportHeight() {
  return ((document.compatMode || isIE) && !isOpera) ? (document.compatMode == 'CSS1Compat') ? document.documentElement.clientHeight : document.body.clientHeight : (document.parentWindow || document.defaultView).innerHeight;
}

