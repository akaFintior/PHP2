<h2>Корзина</h2>
<br><br>
<?=$message?>
<?foreach ($goods as $good): ?>
<div>
    <b><?=$good['name']?></b> price:<?=$good['price']?> <button class="delete" id="<?=$good['id']?>">Удалить</button><br>
</div>
<? endforeach; ?>