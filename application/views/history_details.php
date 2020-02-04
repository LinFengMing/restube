<div class="container">
    <div class="ui container containerSpec">
        <div class="ui grid">
            <div class="sixteen wide column">
                <h2 class="ui dividing header">
                    <i class="icon file text outline"></i>
                    <div class="content">
                        詳細訂單狀況
                    </div>
                </h2>
                <form class="ui form tableForm">
                    <h4 class="ui dividing header">個人資訊</h4>
                    <input type="hidden" name="rule" value="update">
                    <input type="hidden" name="id" value="<?=$res['id'];?>">
                    <div class="three fields">
                        <div class="field">
                            <label>姓名</label>
                            <input type="text" disabled name="buy_name" value="<?=$res['buy_name'];?>">
                        </div>
                        <div class="field">
                            <label>手機</label>
                            <input type="text" disabled name="buy_phone" value="<?=$res['buy_phone'];?>">
                        </div>
                        <div class="field">
                            <label>信箱</label>
                            <input type="text" disabled name="buy_email" value="<?=$res['buy_email'];?>">
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="field">
                            <label>地址</label>
                            <input type="text" disabled name="buy_addr" value="<?=$res['buy_addr'];?>">
                        </div>
                        <div class="field">
                            <label>訂單編號</label>
                            <input type="text" disabled name="id" value="<?=$res['id'];?>">
                        </div>
                        <div class="field">
                            <label>訂單狀態</label>
                                <?php if($res['status'] == 0) { ?>
                                    <input type="text" disabled name="status" value="等待付款">
                                <?php }else if($res['status'] == 1) { ?>
                                    <input type="text" disabled name="status" value="完成付款">
                                <?php }else if($res['status'] == 2) { ?>
                                    <input type="text" disabled name="status" value="運送處理">
                                <?php }else if($res['status'] == 3) { ?>
                                    完成訂單
                                    <input type="text" disabled name="status" value="完成訂單">
                                <?php }else{ ?>
                                    <input type="text" disabled name="status" value="未知">
                                <?php } ?>
                        </div>
                    </div>
                    <div class="field">
                        <label>備註</label>
                        <textarea disabled><?=$res['buy_remark'];?></textarea>
                    </div>
                    <h4 class="ui dividing header">訂單商品</h4>
                    <table class="ui celled padded table">
                        <thead>
                            <tr class="center aligned">
                                <th>照片</th>
                                <th>名稱</th>
                                <th>價格</th>
                                <th>數量</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($res['sub_order'] as $key => $value) { ?>
                                <tr class="middle center aligned">
                                    <td><img src="<?=$value['product_photo'];?>" alt="photo" class="ui tiny image"></td>
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
    </div>
</div>