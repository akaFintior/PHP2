Каталог
<div class=container>
<?foreach ($catalog as $good): ?>
<div class="flex-container">
    <a href="/?c=product&a=card&id=<?=$good["id"]?>">
    <b><?=$good['name']?></b></a><br>
    Описание: <?=$good['description']?><br>
    Цена: <?=$good['price']?><br>
    <button class="buy" data-id="<?=$good['id']?>">Купить</button><hr>
</div>
<? endforeach; ?>
</div>