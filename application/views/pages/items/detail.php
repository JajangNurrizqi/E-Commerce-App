<div>
    <div><?php echo $product->name; ?></div>
    <div><?php echo $product->description; ?></div>
    <div><?php echo $product->price; ?></div>
    <div><?php echo $product->stock; ?></div>
    <div><?php echo $product->type; ?></div>
    <div><?php echo $product->category; ?></div>
    <span class="input-group-btn mr-2">
        <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
            -
        </button>
    </span>
    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
    <span class="input-group-btn ml-2">
        <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
            +
        </button>
    </span>

    <div>
        <a href="#" class="add-cart cart-btn" 
        data-product_id="<?php echo $product->product_id; ?>"
        data-name="<?php echo $product->name; ?>"
        data-price="<?php echo $product->price; ?>"
        data-id="<?php echo $product->id; ?>"
        data-type="<?php echo $product->type; ?>"
        >
        Tambah ke Keranjang
        </a>
    </div>
</div>


<script>
    $(document).ready(function() {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);
            $('.cart-btn').attr('data-qty', quantity + 1);

        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Decrement
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
                $('.cart-btn').attr('data-qty', quantity - 1);
            }
        });

    });
</script>