<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

$file = File::getByID($fID);
$path = File::getRelativePathFromID($fID);

if(is_object($file)) { ?>

    <audio controls>
        <source src="<?=$path ?>" type="<?=$file->getMimeType() ?>">
        Your browser does not support the audio element.
    </audio>

<?php
}
?>