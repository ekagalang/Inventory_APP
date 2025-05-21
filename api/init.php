<?php
$dbTmpPath = '/tmp/db_inventory.sqlite';
$dbSrcPath = __DIR__ . '/../db/db_inventory.sqlite';

if (!file_exists($dbTmpPath)) {
    copy($dbSrcPath, $dbTmpPath);
}

header("Location: /");
exit;
?>
