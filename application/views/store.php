<div class="container">
    <div class="container-top">
        <img src="assets/img/top0.jpg">
    </div>
    <h2 class="product-lineup"><span>精選商品</span></h2>
    <div class="product w3-row-padding">
        <?php foreach ($feature as $key => $value) { ?>
            <div class="item w3-third w3-margin-bottom">
                <div class="item-img">
                    <a href="product/<?=$value['id'];?>">
                        <img src="<?=$value['main_photo'];?>" width="320px" height="213px" />
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