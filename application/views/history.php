<div class="container">
    <table class="w3-table w3-striped w3-bordered">
        <thead>
            <tr class="w3-blue">
                <th>編號</th>
                <th>姓名</th>
                <th>狀態</th>
                <th>總額</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $key => $value) { ?>
                <tr>
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
                        <a href="history/<?=$value['id'];?>" class="w3-btn w3-green">查看訂單</a>
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