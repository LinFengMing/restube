<div class="container">
    <div class="order-form">
        <?php if (isset($error)) { ?>
            <div class="warning-message">
                <i class="icon warning"></i>
                <?= $error; ?>
            </div>
        <?php } ?>
        <div class="w3-container w3-blue">
            <h2>歡迎登入 Restube</h2>
        </div>
        <form method="post" class="w3-container">
            <input type="hidden" name="rule" value="login">
            <div class="w3-section">
                <label>信箱</label><label class="form-required">*</label>
                <input class="w3-input" type="text" name="email" placeholder="email">
            </div>
            <div class="w3-section">
                <label>密碼</label><label class="form-required">*</label>
                <input class="w3-input" type="password" name="password" placeholder="Password">
            </div>
            <button class="w3-btn w3-blue">登入</button>
            <a href="register" class="w3-btn w3-green">註冊會員</a>
        </form>
    </div>
</div>