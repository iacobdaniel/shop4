<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

$al = Core::make('helper/concrete/asset_library');

$audioFile = false;
if(isset($fID) && $fID > 0) {
    $audioFile = File::getByID($fID);
}
?>

<div class="form-group">
    <label class="control-label"><?=t('Audio file'); ?></label>
    <?=$al->audio('fID', 'fID', t('Audio File'), $audioFile); ?>
</div>

<div class="form-group">
    <label class="control-label" for="name"><?=t('Name'); ?></label>
    <input type="text" class="form-control" name="name" value="<?=$name ?>">
</div>

<div class="form-group">
    <label class="control-label" for="description"><?=t('Description'); ?></label>
    <input type="text" class="form-control" name="description" value="<?=$description ?>">
</div>