
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php \fw\core\base\View::getMeta()?>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <?php if(!empty($menu)): ?>
        <ul class="nav nav-pills">
            <?php foreach ($menu as $item): ?>
                <li><a href="category/<?= $item['id'] ?>"><?= $item['title'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>
    <h1>Admin area!</h1>
    <?= $content ?>

</div>

<?= debug(\fw\core\Db::$countsql) ?>
<?= debug(\fw\core\Db::$queries) ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<?php
foreach($scripts as $script){
    echo $script;
}
?>
</body>
</html>