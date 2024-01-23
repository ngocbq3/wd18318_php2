<?php include "header.php" ?>

<?php foreach ($products as $product) : ?>
    <div class="product">
        <a href="#">
            <h3><?= $product['name'] ?></h3>
        </a>
    </div>
<?php endforeach ?>

<?php include "footer.php" ?>