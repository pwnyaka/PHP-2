<h2>Каталог</h2>

<div class="wrapper">
    <? foreach ($catalog as $item): ?>
      <h2><a href="/catalog/card/?id=<?= $item['id'] ?>"><?= $item['prodName'] ?></a></h2>
      <img src="/img/<?=$item['imgName']?>" alt="" style="width: 500px;">
      <p><?= $item['description'] ?></p>
      <p>Цена: <?= $item['cost'] ?></p>
      <p>Просмотры: <?=$item["views"]?></p>
      <hr>
    <? endforeach; ?>
</div>
<script src="/js/catalog.js"></script>