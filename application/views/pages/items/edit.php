<form action="" method="post">
<?php
    if(isset($listItemArray)){

        foreach ($listItemArray as $value) {
    ?>
    <input type="text" name="name" value="<?php echo $value->name; ?>">
    <input type="text" name="price" value="<?php echo $value->price; ?>">
    <input type="text" name="description" value="<?php echo $value->description; ?>">
    <input type="text" name="item_quantity" value="<?php echo $value->item_quantity; ?>">
    <input type="text" name="weight" value="<?php echo $value->weight; ?>">
    <input type="text" name="id_type" value="<?php echo $value->id_type; ?>">
    <input type="text" name="id_category" value="<?php echo $value->id_category; ?>">
    <?php
        }
    }else{
    ?>
    <tr>
        <td>Tidak ada data.</td>
    </tr>
    <?php  
    }
?>

</form>