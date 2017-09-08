<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

$al = Core::make('helper/concrete/asset_library');

?>

<div class="form-group">
    <label class="control-label"><?=t('Audio file'); ?></label>
    <?=$al->audio('fID', 'fID', t('Audi File')); ?>
</div>

<div class="form-group">
    <label class="control-label" for="name"><?=t('Name'); ?></label>
    <input type="text" class="form-control" name="name">
</div>

<div class="form-group">
    <label class="control-label" for="description"><?=t('Description'); ?></label>
    <input type="text" class="form-control" name="description">
</div>