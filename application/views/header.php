<div class="top">
    <div class="logo"><a href="index"><img src="assets/img/logo.jpg"></a></div>
    <ul class="nav">
        <li><a href="index">HOME</a></li>
        <li><a href="products/all">商品一覽</a></li>
        <li><a href="cantact">聯絡我們</a></li>
        <?php if($this->session->userdata('user_login_status')) { ?>
            <li>
                <a href="member">會員資訊</a>
            </li>
            <li>
                <a href="history">歷史訂單</a>
            </li>
            <li>
                <a href="logout">登出</a>
            </li>
        <?php } else { ?>
            <li>
                <a href="login">登入</a>
            </li>
        <?php } ?>
        </li>
        <li><a href="order"><i class="icon cart"></i>$<?= $this->cart->total(); ?></a></li>
    </ul>
</div>