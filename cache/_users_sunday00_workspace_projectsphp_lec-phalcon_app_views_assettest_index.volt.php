<h1>Hello assets</h1>

<?php $this->assets->outputCss(); ?>
<?php $this->assets->outputJs(); ?>

<h2><?= $animal1->name ?></h2>
<p><?= $animal1->eat('dear') ?></p>
<?php $aa = $animal1; ?>
<?= trim($aa->type) ?>

<?php foreach ($aa->like as $key => $act) { ?>
<h3><?= $key ?></h3>
    <p><?= $act ?></p>
<?php } ?>