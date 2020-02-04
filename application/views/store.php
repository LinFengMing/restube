<div class="container">
    <div class="container-top">
        <img src="assets/img/top0.jpg">
    </div>
    <div class="product-lineup">精選商品</div>
        <div class="product">
            <?php foreach ($feature as $key => $value) { ?>
                <div class="item">
                    <div class="item-img">
                        <a href="product/<?=$value['id'];?>">
                            <img src="<?=$value['main_photo'];?>" width="320px" height="213px">
                        </a>
                    </div>
                    <div class="item-title">
                        <a href="product/<?=$value['id'];?>"><?=$value['title'];?></a>
                    </div>
                    <div class="item-price"><span>$ <?=$value['cost'];?></span></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>