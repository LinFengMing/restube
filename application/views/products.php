<div class="container">
    <div class="product w3-row-padding">
        <?php foreach ($list as $kList => $vList) { ?>
        <div class="item w3-third w3-margin-bottom">
            <div class="item-img"><a href="product/<?=$vList['id']?>"><img src="<?=$vList['main_photo']?>" width="320px" height="213px" alt="<?=$vList['title']?>"></a></div>
            <div class="item-title"><a href="product/<?=$vList['id']?>"><span><?=$vList['title']?></span></a></div>
            <div class="item-price">$<?=$vList['cost']?></div>
        </div>
        <?php } ?>
    </div>
</div>