<div class="container">
    <div id="answer"></div>
    <button class="btn btn-default" id="send">Button</button>
    <?php new \fw\widgets\menu\Menu(
        [
            'tpl' => WWW . '/menu/select.php',
            'container' => 'select',
            'table' => 'categories',
            'cacheTime' => 60,
            'class' => 'my-select',
            'cacheKey' => 'menu_select',
            'enableCache' => false
        ]
    ); ?>
    <?php new \fw\widgets\menu\Menu(
        [
            'tpl' => WWW . '/menu/my_menu.php',
            'container' => 'ul',
            'table' => 'categories',
            'cacheTime' => 60,
            'class' => 'my-menu',
            'cacheKey' => 'menu_ul'
        ]
    ); ?>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= $post['title'] ?></div>
                <div class="panel-body"><?= $post['text'] ?></div>
            </div>
        <?php endforeach; ?>
        <div class="text-center">
            <p>Articles: <?=count($posts); ?> from <?=$total; ?></p>
            <?php if($pagination->countPages > 1): ?>
                <?=$pagination;?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<script src="/js/test.js"></script>
<script>
    $(function () {
        $('#send').click(function () {
                $.ajax({
                    url: '/main/test',
                    type: 'post',
                    data: {'id': 2},
                    success: function (res) {
                        //var data = JSON.parse(res);
                        // $('#answer').html('<p>Answer: ' + data.answer + ' | Code: '+data.code+' </p>');
                        $('#answer').html(res);
                    },
                    error: function () {
                        alert('Error');
                    }
                })
            }
        );
    });
</script>