"use strict";

function fetchPost(url, data) {
  return fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: {
      'content-type': 'application/json'
    },
  })
}

function initControlButtons() {
  let controlBtn = document.querySelectorAll('.order_button');

  controlBtn.forEach(elem => {
    let id = elem.getAttribute('data-id');
    let status = elem.getAttribute('data-status');
    elem.addEventListener('click', () => {
      fetchPost('/orders/control', {"id": id, "status": status})
          .then(response => response.json())
          .then((data) => {
            let msg = document.createElement('span');
            msg.innerText = data.message;
            elem.replaceWith(msg);
            document.querySelector(`[data-id="${id}"] .orders_status`).innerText = data.status == 0 ? 'Новый' : data.status == 1 ? 'В работе' : data.status == 2 ? 'Оплачен' : 'Завершен';
          })
    })
  });
}

let btn = document.getElementById('filter-btn');
btn.addEventListener('click', (e) => {
  e.preventDefault();
  status = document.getElementById('filter').value;
  console.log(status);
  fetchPost('/orders/filter', {"status": status})
      .then(response => response.json())
      .then((data) => {
        document.querySelectorAll('.order').forEach((elem) => {
          elem.remove();
        });
        let str = '';
        data.list.forEach((order, index) => {
          str += `<div class="order" data-id="${order.id}">
            <div class="orders_number">${index + 1}</div>
            <div class="orders_status">${order.status == 0 ? 'Новый' : order.status == 1 ? 'В работе' : order.status == 2 ? 'Оплачен' : 'Завершен'}</div>
            <div class="orders_name">${order.name}</div>
            <div class="orders_login">${order.login ? order.login : 'Не зарегистрирован'}</div>
            <div class="orders_phone">${order.phone}</div>
            <div class="orders_sum">${order.sum}</div>
            <div class="orders_details"><a target="_blank" href="/orders/details/${order.id}">Подробнее</a></div>
            <div class="orders_controls">`;
          if (order.status != 3) {
            str += `<button data-id="${order.id}" data-status="${order.status}" class="order_button">${order.status == 0 ? 'Взять в работу' : order.status == 1 ? 'Подтвердить оплату' : order.status == 2 ? 'Завершить' : ''}</button>`
          } else {
            str += `-`;
          }
          str += `</div></div>`
        });
        document.querySelector('.container').insertAdjacentHTML('beforeend', str);
        initControlButtons();
      })
});

initControlButtons();


