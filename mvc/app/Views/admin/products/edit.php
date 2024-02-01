<form action="" method="post" enctype="multipart/form-data">
    Tên sản phẩm
    <input type="text" name="name" value="<?= $product->name ?>">
    <br>
    Giá sản phẩm
    <input type="number" name="price" value="<?= $product->price ?>">
    <br>
    Danh mục
    <select name="cate_id" id="">
        <?php foreach ($categories as $cate) : ?>
            <option value="<?= $cate->id ?>" <?= ($product->cate_id == $cate->id) ? 'selected' : '' ?>>
                <?= $cate->cate_name ?>
            </option>
        <?php endforeach ?>
    </select>
    <br>
    Hình ảnh <br>
    <img src="<?= ROOT_PATH . $product->image ?>" width="110" alt=""> <br>
    <input type="file" name="image" id="">
    <br>
    Chi tiết sản phẩm <br>
    <textarea name="detail" id="" cols="100" rows="10"><?= $product->detail ?></textarea>
    <br><input type="hidden" name="id" value="<?= $product->id ?>">
    <button type="submit">Thêm</button>
</form>