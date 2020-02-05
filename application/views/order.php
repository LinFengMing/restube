<div class="container w3-container">
    <div class="cart">
        <h2 class="cart-title">購買清單</h2>
        <div class="cart-items">
            <?php if(sizeof($cart) == 0) { ?>
            <div class="cart-none">目前購物車尚無任何商品！</div>
            <?php } else { ?>
                <?php foreach ($cart as $key => $value) { ?>
                <div class="cart-item w3-card">
                    <div class="cart-item-image">
                        <img src="<?=$value['options']['image']?>" width="100px" height="100px">
                    </div>
                    <div class="cart-item-information">
                        <h3 class="cart-item-name"><?=$value['name']?></h3>
                        <div class="cart-item-name-qty">數量: <?=$value['qty'];?></div>
                        <div class="cart-item-name-price">單價: $<?=$value['price'];?></div>
                        <div class="cart-item-name-total">合計: $<?=$value['subtotal'];?></div>
                    </div>
                    <button class="ui red basic button cart-item-remove" data-rowid="<?=$value['rowid'];?>">
                        <i class="icon trash"></i>刪除
                    </button>
                </div>
                <?php } ?>
            <?php } ?>
            <div class="cart-totalPrice">總價格: $<?= $this->cart->total(); ?></div>
        </div>
    </div>

    <div class="order-form">
        <?php if (isset($sys_code)) { ?>
            <div class="warning-message">
                <i class="fas fa-exclamation fa-1g"></i>
                <?= $sys_msg; ?>
            </div>
        <?php } ?>
        <form method="post" class="form w3-container">
            <div class="field">
                <h2 class="form-title">運送資訊</h2>
                <input type="hidden" name="rule" value="order">
            </div>
            <div class="field">
                <label>收件人姓名</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="text" name="order_name" placeholder="name" value="<?=$user['nickname']?>">
            </div>
            <div class="field">
                <label>收件人電話</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="text" name="order_phone" placeholder="phone" value="<?=$user['phone']?>">
            </div>
            <div class="field">
                <label>收件人信箱</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="text" name="order_email" placeholder="email" value="<?=$user['email']?>">
            </div>
            <div class="field">
                <label>收件人地址</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="text" name="order_addr" placeholder="address" value="<?=$user['address']?>">
            </div>
            <div class="field">
                <label>備註</label>
                <br>
                <textarea class="w3-input" name="order_remark"></textarea>
            </div>
            <div class="field">
                <!-- <button class="form-submit">提交訂單</button> -->
                <button class="ui button blue">提交訂單</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.cart-item-remove').on('click', function(e) {
            e.preventDefault();
            var that = $(this);
            var id = that.data('rowid');
            var api = 'api/removeFromCart';
            $.post(api, {
                rowid: id
            }, function(response) {
                window.alert(response.sys_msg);
                if(response.sys_code == 200) location.reload();
            }, 'json');
        });
    });
</script>