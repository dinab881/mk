<option value="<?= $id ?>">
    <?= $tab . $category['title']; ?>
</option>
<?php if (isset($category['children'])): ?>
    <?= $this->getMenuHtml($category['children'], '&nbsp;'.$tab.'-'); ?>
<?php endif; ?>
