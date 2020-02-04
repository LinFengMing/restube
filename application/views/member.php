<div class="container">
    <div class="order-form">
        <?php if (isset($sys_code)) { ?>
            <div class="warning-message">
                <i class="fas fa-exclamation fa-1g"></i>
                <?= $sys_msg; ?>
            </div>
        <?php } ?>
        <form method="post" class="form">
            <div class="field">
                <h2 class="form-title">歡迎 <?=$this->session->userdata('user_name')?> 登入 Restube</h2>
                <input type="hidden" name="rule" value="update">
                <input type="hidden" name="id" value="<?=$this->session->userdata('user_id')?>">
            </div>
            <div class="field">
                <label>信箱</label><label class="form-required">*</label>
                <br>
                <input class="form-input" type="text" name="email" placeholder="email" value="<?=$user['email']?>">
            </div>
            <div class="field">
                <label>密碼</label>
                <br>
                <input class="form-input" type="password" name="password" placeholder="password">
            </div>
            <div class="field">
                <label>確認密碼</label>
                <br>
                <input class="form-input" type="password" name="confirmPassword" placeholder="confirmPassword">
            </div>
            <div class="field">
                <label>姓名</label><label class="form-required">*</label>
                <br>
                <input class="form-input" type="text" name="nickname" placeholder="nickname" value="<?=$user['nickname']?>">
            </div>
            <div class="field">
                <label>電話</label></label>
                <br>
                <input class="form-input" type="text" name="phone" placeholder="phone" value="<?=$user['phone']?>">
            </div>
            <div class="field">
                <label>地址</label></label>
                <br>
                <input class="form-input" type="text" name="address" placeholder="address" value="<?=$user['address']?>">
            </div>
            <div class="field">
                <button class="ui button blue">修改</button>
            </div>
        </form>
    </div>
</div>