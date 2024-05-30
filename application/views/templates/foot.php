<?php if($page_type == "cart" || $page_type == "shoppage"): ?>
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>"></script>
<script>
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  $.ajax({
    method: 'GET',
    url: '<?php echo site_url('Products/cart_api?action=cart_info'); ?>',
    success: function(res) {
      var data = res.data;

      var total_item = data.total_item;
      $('.cart-item-total').text(total_item);
    }
  });
  //remove cart item
  $('.remove-item').click(function(e) {
    e.preventDefault();

    var rowid = $(this).data('rowid');
    var tr = $('.cart-' + rowid);

    $('.product-name', tr).html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('Products/cart_api?action=remove_item'); ?>',
      data: {
        rowid: rowid
      },
      success: function(res) {
        if (res.code == 204) {
          tr.addClass('alert alert-danger');

          setTimeout(function(e) {
            tr.hide('fade');
            console.log(res.total)
            $('.n-subtotal').text(res.total.subtotal);
            $('.n-total').text(res.total.total);
          }, 2000);
        }
      }
    })
  })


  $('.add-cart').click(function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var product_id = $(this).data('product_id');
    var qty = $(this).data('qty');
    qty = (qty > 0) ? qty : 1;
    var price = $(this).data('price');
    var name = $(this).data('name');
    console.log(qty);

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('Products/cart_api?action=add_item'); ?>',
      data: {
        id: id,
        product_id: product_id,
        qty: qty,
        price: price,
        name: name
      },
      success: function(res) {
        if (res.code == 200) {
          var totalItem = res.total_item;

          $('.cart-item-total').text(totalItem);
          toastr.info('Item ditambahkan dalam keranjang');
        } else {
          console.log('Terjadi kesalahan');
        }
      }
    });
  });
</script>
<?php endif; ?>
</body>

</html>