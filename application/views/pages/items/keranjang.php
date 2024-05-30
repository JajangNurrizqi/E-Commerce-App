<?php if (count($carts) > 0) : ?>
    <form action="<?php echo site_url('shop/checkout'); ?>" method="POST">
        <table class="table">
            <thead class="thead-primary">
                <tr class="text-center">
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carts as $item) : ?>
                    <tr class="text-center cart-<?php echo $item['rowid']; ?>">
                        <td class="product-remove"><a href="#" class="remove-item" data-rowid="<?php echo $item['rowid']; ?>"><i class="fa-regular fa-circle-xmark"></i></a></td>

                        <td class="image-prod">
                            <div class="img img-fluid rounded" style="background-image:url(<?php echo get_product_image($item['id']); ?>);"></div>
                        </td>

                        <td class="product-name">
                            <h3><?php echo $item['name']; ?></h3>
                        </td>

                        <td class="price">Rp <?php echo format_rupiah($item['price']); ?></td>

                        <td class="quantity">
                            <div class="input-group mb-3">
                                <input type="text" name="quantity[<?php echo $item['rowid']; ?>]" class="quantity form-control input-number" value="<?php echo $item['qty']; ?>" min="1" max="100" readonly="true">
                            </div>
                        </td>

                        <td class="total">Rp <?php echo format_rupiah($item['subtotal']); ?></td>
                    </tr><!-- END TR-->
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Rincian Keranjang</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span class="n-subtotal font-weight-bold">Rp <?php echo format_rupiah($total_cart); ?></span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span class="n-total font-weight-bold">Rp <?php echo format_rupiah($total_price); ?></span>
                    </p>
                </div>
                <p><button type="submit" class="btn btn-primary py-3 px-4">Checkout</button></p>
            </div>
        </div>
    </form>
<?php else : ?>
    <div class="row">
        <div class="col-md-12 ftco-animate">
            <div class="alert alert-info">Tidak ada barang dalam keranjang.<br><?php echo anchor('/', 'Jelajahi produk kami'); ?> dan mulailah berbelanja!</div>
        </div>
    </div>
<?php endif; ?>