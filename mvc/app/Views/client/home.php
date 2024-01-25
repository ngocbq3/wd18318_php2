<h1>HOME PAGE</h1>

<!--Hiển thị data-->
<?php foreach ($products as $product) : ?>
    <div>
        <a href="<?= ROOT_PATH ?>detail?id=<?= $product->id ?>">
            <h3><?= $product->name ?></h3>
        </a>
        <div>
            Price: <?= $product->price ?>
        </div>
    </div>
<?php endforeach ?>