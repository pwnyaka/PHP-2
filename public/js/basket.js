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
            if (data.count != 0) {
              document.getElementById('sum').innerText = data.sum;
            } else {
              document.querySelector('.basket-sum').innerText = 'Корзина пуста';
              document.getElementById('order').remove();
            }
          });
      document.getElementById(id).remove();
    })
  });
};