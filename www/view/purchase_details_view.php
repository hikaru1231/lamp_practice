<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <title>購入明細</title>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
<?php include VIEW_PATH . 'templates/header_logined.php'; ?>
<h1>購入明細</h1>
<div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    
    注文番号<?php print h($history['history_id']); ?>
    購入日時<?php print h($history['created']); ?>
    合計金額<?php print number_format($history['total']); ?>

    <?php if(count($details) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>購入時の価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        </tbody>
          <?php foreach($details as $detail) { ?>
          <tr>
            <td><?php print h($detail['name']); ?></td>
            <td><?php print h($detail['purchase_price']); ?></td>
            <td><?php print h($detail['purchase_amount']); ?></td>
            <td><?php print number_format($detail['subtotal']); ?></td>
          </tr>
          <?php } ?>
        </tbody>
    <?php }?>
</body>
</html>