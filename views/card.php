<?php
/**
 * @var \app\model\Product $product
 */
?>

<h2><?=$product->prodName?></h2>
<p>Просмотры: <?=$product->views?></p>
<img src="/img/<?=$product->imgName?>" alt="" style="width: 1000px;">
<p><?=$product->description?></p>
<p>Цена: <?=$product->cost?></p>


