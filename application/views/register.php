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
                <h2 class="form-title">會員資料</h2>
                <input type="hidden" name="rule" value="register">
            </div>
            <div class="field">
                <label>信箱</label><label class="form-required">*</label>
                <br>
                <input class="form-input" type="text" name="email" placeholder="email">
            </div>
            <div class="field">
                <label>密碼</label><label class="form-required">*</label>
                <br>
                <input class="form-input" type="password" name="password" placeholder="password">
            </div>
            <div class="field">
                <label>確認密碼</label><label class="form-required">*</label>
                <br>
                <input class="form-input" type="password" name="confirmPassword" placeholder="confirmPassword">
            </div>
            <div class="field">
                <label>姓名</label><label class="form-required">*</label>
                <br>
                <input class="form-input" type="text" name="nickname" placeholder="nickname">
            </div>
            <div class="field">
                <label>電話</label></label>
                <br>
                <input class="form-input" type="text" name="phone" placeholder="phone">
            </div>
            <div class="field">
                <label>地址</label></label>
                <br>
                <input class="form-input" type="text" name="address" placeholder="address">
            </div>
            <div class="field">
                <button class="ui blue button">註冊</button>
            </div>
        </form>
    </div>
</div>