<div class="container">
    <div class="ui form tableForm">
        <div class="field">
            <table class="ui celled padded table">
                <thead>
                    <tr class="center aligned">
                        <th>編號</th>
                        <th>姓名</th>
                        <th>狀態</th>
                        <th>總額</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $key => $value) { ?>
                        <tr class="middle center aligned">
                            <td><?=$value['id'];?></td>
                            <td><?=$value['buy_name'];?></td>
                            <td>
                                <?php if($value['status'] == 0) { ?>
                                    等待付款
                                <?php }else if($value['status'] == 1) { ?>
                                    完成付款
                                <?php }else if($value['status'] == 2) { ?>
                                    運送處理
                                <?php }else if($value['status'] == 3) { ?>
                                    完成訂單
                                <?php }else{ ?>
                                    未知
                                <?php } ?>
                            </td>
                            <td><?=$value['total'];?></td>
                            <td>
                                <a href="history/<?=$value['id'];?>" class="ui tiny green button spBtn">查看訂單</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="5">
                        <?=$pagination;?>
                    </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>