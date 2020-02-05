<div class="top w3-container w3-center">
    <div class="logo"><a href="index"><img src="assets/img/logo.jpg"></a></div>
    <div class="nav w3-bar w3-padding-32">
        <a class="w3-bar-item" href="index">HOME</a>
        <a class="w3-bar-item" href="products/all">商品一覽</a>
        <a class="w3-bar-item" href="contact">聯絡我們</a>
        <?php if($this->session->userdata('user_login_status')) { ?>
            <a class="w3-bar-item" href="member">會員資訊</a>
            <a class="w3-bar-item" href="history">歷史訂單</a>
            <a class="w3-bar-item" href="logout">登出</a>
        <?php } else { ?>
            <a class="w3-bar-item" href="login">登入</a>
        <?php } ?>
        <a class="w3-bar-item" href="order"><i class="icon cart"></i>$<?= $this->cart->total(); ?></a>
    </div>
</div>