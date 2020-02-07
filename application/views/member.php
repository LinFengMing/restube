<div class="container">
    <div class="order-form">
        <?php if (isset($sys_code)) { ?>
            <div class="warning-message">
                <i class="fas fa-exclamation fa-1g"></i>
                <?= $sys_msg; ?>
            </div>
        <?php } ?>
        <div class="w3-container w3-blue">
            <h2 class="form-title">歡迎 <?=$this->session->userdata('user_name')?> 登入 Restube</h2>
        </div>
        <form method="post" class="form">
            <input type="hidden" name="rule" value="update">
            <input type="hidden" name="id" value="<?=$this->session->userdata('user_id')?>">
            <div class="w3-section">
                <label>信箱</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="text" name="email" placeholder="email" value="<?=$user['email']?>">
            </div>
            <div class="w3-section">
                <label>密碼</label>
                <br>
                <input class="w3-input" type="password" name="password" placeholder="password">
            </div>
            <div class="w3-section">
                <label>確認密碼</label>
                <br>
                <input class="w3-input" type="password" name="confirmPassword" placeholder="confirmPassword">
            </div>
            <div class="w3-section">
                <label>姓名</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="text" name="nickname" placeholder="nickname" value="<?=$user['nickname']?>">
            </div>
            <div class="w3-section">
                <label>電話</label></label>
                <br>
                <input class="w3-input" type="text" name="phone" placeholder="phone" value="<?=$user['phone']?>">
            </div>
            <div class="w3-section">
                <label>地址</label></label>
                <br>
                <input class="w3-input" type="text" name="address" placeholder="address" value="<?=$user['address']?>">
            </div>
            <div class="w3-section">
                <button class="w3-btn w3-blue">修改</button>
            </div>
        </form>
    </div>
</div>