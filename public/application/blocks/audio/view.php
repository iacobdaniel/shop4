<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

$file = File::getByID($fID);

if(is_object($file)) {
    $path = File::getRelativePathFromID($fID);
    $version = $file->getVersion();
    $mime_type = $version->getMimeType();
    ?>

    <audio controls>
        <source src="<?=$path ?>" type="<?=$mime_type ?>">
        Your browser does not support the audio element.
    </audio>

<?php
}
?>