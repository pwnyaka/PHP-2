<h2>Отзывы</h2>

<? foreach ($feedback as $item): ?>
    <h3><?=$item["name"]?></h3>
    <p><?=$item['feedback']?></p>
    <hr>
<? endforeach;?>
