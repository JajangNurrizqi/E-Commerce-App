<?php foreach ($products as $product) : ?>
<div>
    <div><img src="<?php echo $product->images; ?>" alt=""></div>
    <div><?php echo $product->name; ?></div>
    <div><?php echo $product->price; ?></div>
    <div><?php echo $product->category; ?></div>
    <div><a href="<?php echo site_url("Products/detail/".$product->id."/".$product->product_id."")?>">Lihat</a></div>
</div>
<?php endforeach ?>