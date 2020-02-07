<div class="container">
    <div class="order-form">
        <?php if (isset($sys_code)) { ?>
            <div class="warning-message">
                <i class="fas fa-exclamation fa-1g"></i>
                <?= $sys_msg; ?>
            </div>
        <?php } ?>
        <div class="w3-container w3-blue">
            <h2>會員資料</h2>
        </div>
        <form method="post" class="form">
            <input type="hidden" name="rule" value="register">
            <div class="w3-section">
                <label>信箱</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="text" name="email" placeholder="email">
            </div>
            <div class="w3-section">
                <label>密碼</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="password" name="password" placeholder="password">
            </div>
            <div class="w3-section">
                <label>確認密碼</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="password" name="confirmPassword" placeholder="confirmPassword">
            </div>
            <div class="w3-section">
                <label>姓名</label><label class="form-required">*</label>
                <br>
                <input class="w3-input" type="text" name="nickname" placeholder="nickname">
            </div>
            <div class="w3-section">
                <label>電話</label></label>
                <br>
                <input class="w3-input" type="text" name="phone" placeholder="phone">
            </div>
            <div class="w3-section">
                <label>地址</label></label>
                <br>
                <input class="w3-input" type="text" name="address" placeholder="address">
            </div>
            <div class="w3-section">
                <button class="w3-btn w3-blue">註冊</button>
            </div>
        </form>
    </div>
</div>