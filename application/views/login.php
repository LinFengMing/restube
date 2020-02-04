<div class="container">
    <div class="order-form">
        <?php if (isset($error)) { ?>
            <div class="warning-message">
                <i class="icon warning"></i>
                <?= $error; ?>
            </div>
        <?php } ?>
        <form method="post" class="form">
            <div class="field">
                <h2 class="form-title">歡迎登入 Restube</h2>
                <input type="hidden" name="rule" value="login">
            </div>
            <div class="field">
                <label>信箱</label><label class="form-required">*</label>
                <br>
                <input class="form-input" type="text" name="email" placeholder="email">
            </div>
            <div class="field">
                <label>密碼</label><label class="form-required">*</label>
                <br>
                <input class="password" type="password" name="password" placeholder="Password">
            </div>
            <div class="field">
                <button class="ui blue button">登入</button>
                <a href="register" class="ui green button">註冊會員</a>
            </div>
        </form>
    </div>
</div>