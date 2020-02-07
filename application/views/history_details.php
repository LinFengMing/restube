<div class="container w3-container">
    <div class="">
        <h2>詳細訂單狀況</h2>
        <form class="order-form">
            <h4>個人資訊</h4>
            <input type="hidden" name="rule" value="update">
            <input type="hidden" name="id" value="<?=$res['id'];?>">
            <div class="w3-section">
                <label>姓名</label>
                <input class="w3-input" type="text" disabled name="buy_name" value="<?=$res['buy_name'];?>">
            </div>
            <div class="w3-section">
                <label>手機</label>
                <input class="w3-input" type="text" disabled name="buy_phone" value="<?=$res['buy_phone'];?>">
            </div>
            <div class="w3-section">
                <label>信箱</label>
                <input class="w3-input" type="text" disabled name="buy_email" value="<?=$res['buy_email'];?>">
            </div>
            <div class="w3-section">
                <label>地址</label>
                <input class="w3-input" type="text" disabled name="buy_addr" value="<?=$res['buy_addr'];?>">
            </div>
            <div class="w3-section">
                <label>訂單編號</label>
                <input class="w3-input" type="text" disabled name="id" value="<?=$res['id'];?>">
            </div>
            <div class="w3-section">
                <label>訂單狀態</label>
                    <?php if($res['status'] == 0) { ?>
                        <input class="w3-input" type="text" disabled name="status" value="等待付款">
                    <?php }else if($res['status'] == 1) { ?>
                        <input class="w3-input" type="text" disabled name="status" value="完成付款">
                    <?php }else if($res['status'] == 2) { ?>
                        <input class="w3-input" type="text" disabled name="status" value="運送處理">
                    <?php }else if($res['status'] == 3) { ?>
                        完成訂單
                        <input class="w3-input" type="text" disabled name="status" value="完成訂單">
                    <?php }else{ ?>
                        <input class="w3-input" type="text" disabled name="status" value="未知">
                    <?php } ?>
            </div>
            <div class="w3-section">
                <label>備註</label>
                <textarea class="w3-input" disabled><?=$res['buy_remark'];?></textarea>
            </div>
            <h4>訂單商品</h4>
            <table class="w3-table w3-striped w3-bordered">
                <thead>
                    <tr class="w3-blue">
                        <th>照片</th>
                        <th>名稱</th>
                        <th>價格</th>
                        <th>數量</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($res['sub_order'] as $key => $value) { ?>
                        <tr>
                            <td><img src="<?=$value['product_photo'];?>" alt="photo" class="product_photo"></td>
                            <td><?=$value['product_name'];?></td>
                            <td><?=$value['product_price'];?></td>
                            <td><?=$value['product_qty'];?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
</div>