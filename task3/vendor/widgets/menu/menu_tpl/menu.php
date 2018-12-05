<li>
    <a href="?category=<?= $id ?>"><?= $category['title'] ?></a>
    <?php if (isset($category['children'])): ?>
        <ul>
            <?php echo $this->getMenuHtml($category['children']); ?>
        </ul>
    <?php endif; ?>
</li>