"use strict";

window.onload = function () {
  let buttons = document.querySelectorAll('.delete');
  buttons.forEach((elem) => {
    elem.addEventListener('click', () => {
      let id = elem.getAttribute('data-id');
      fetch('/api/delete', {
        method: 'POST',
        body: JSON.stringify({"id": id}),
        headers: {
          'content-type': 'application/json'
        }
      })
          .then(response => response.json())
          .then((data) => {
            document.getElementById('count').innerText = data.count;
            if (data.summ) {
              document.getElementById('summ').innerText = data.summ;
            } else {
              document.querySelector('.basket-summ').innerText = 'Корзина пуста';
            }
          });
      document.getElementById(id).remove();
    })
  });
};