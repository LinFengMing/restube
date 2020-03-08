<div class="container">
    <div class="product-item" data-product="<?=$product['id'];?>">
        <div class="product-item-img w3-center"><img src="<?=$product['main_photo'];?>"></div>
        <div class="product-item-title"><span><?=$product['title'];?></span></div>
        <div class="product-item-sub-title"><span><?=$product['sub_title'];?></span></div>
        <div class="product-item-price"><span>建議售價 $<?=$product['price'];?></span></div>
        <div class="product-item-cost"><span>售價 $<?=$product['cost'];?></span></div>
        <!-- <div class="product-item-form-quantity">
            <label for="product-item-quantity" class="product-item-subject">選擇數量</label>
            <div class="product-item-quantity" id="product-item-quantity">
                <a href="javascript: void(0)" class="btn-q-minus">
                    <i class="icon minus"></i> 一
                </a>
                <input type="count" class="product-item-input-quantity" value="1" data-value="1">
                <a href="javascript: void(0)" class="btn-q-plus">
                    <i class="icon plus"></i> 十
                </a>
            </div>
        </div>
        <div class="item-form-button">
            <?php if($product['reserve'] != 0) { ?>
            <button class="w3-btn w3-green btn-insert-cart">
                <i class="icon cart"></i>
                加入購物車
            </button>
            <button class="w3-btn w3-blue btn-paymentNow">
                <i class="icon dollar"></i>
                商品結帳
            </button>
            <?php }else{ ?>
            <button class="w3-btn w3-blue">
                抱歉目前尚無庫存，正在補貨中。
            </button>
            <?php } ?>
        </div> -->
        <div class="product-item-detail">
            <?=$product['content'];?>
        </div>
    </div>
</div>
<script>
    /* $(document).ready(function() {
        typeQuantity();
        addToCart();
        paymentNow()
    });

    function typeQuantity() {
        var main = $('.product-item-form-quantity');
        var _target = main.find('.product-item-input-quantity');
        var defaultAmount = _target.data('value');
        var btnPlus = main.find('.btn-q-plus');
        var btnMinus = main.find('.btn-q-minus');
        btnPlus.on('click', function(e) {
            e.preventDefault();
            var amount = _target.val();
            if(IntergeRegex(amount)) {
                _target.val(parseInt(amount)+1);
            }else{
            _target.val(defaultAmount);
            }
        });
        btnMinus.on('click', function(e) {
            e.preventDefault();
            var amount = _target.val();
            if(IntergeRegex(amount)) {
                if(amount > 1) {
                    _target.val(parseInt(amount)-1);
                }
            }else{
                _target.val(defaultAmount);
            }
        });
    }

    function IntergeRegex(number) {
        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
        if(intRegex.test(number)) {
            return true;
        }else{
            return false;
        }
    }

    function addToCart() {
        $('.btn-insert-cart').on('click', function(e) {
            e.preventDefault();
            var that = $(this);
            var id = that.closest('.product-item').data('product');
            var qty = that.closest('.product-item').find('.product-item-input-quantity').val();
            console . log(id);
            console . log(qty);
            var api = 'api/addToCart';
            $.post(api, {
                id: id,
                qty: qty
            }, function(response) {
                window.alert(response.sys_msg);
                if(response.sys_code == 200) location.reload();
            }, 'json');
        });
    }

    function paymentNow() {
        $('.btn-paymentNow').on('click', function(e) {
            e.preventDefault();
            var that = $(this);
            var id = that.closest('.product-item').data('product');
            var qty = that.closest('.product-item').find('.product-item-input-quantity').val();
            console . log(id);
            console . log(qty);
            var api = 'api/addToCart';
            $.post(api, {
                id: id,
                qty: qty
            }, function(response) {
                if(response.sys_code == 200) window.location.replace("order");
            }, 'json');
        });
    } */
</script>