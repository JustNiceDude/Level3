<?php
$database = "library_db";
$fileName = date("Y-m-d_H:i:s") . "_dump.sql";
$folderName = "/var/www/mk_test.com/application/dumpDB_storage/";
$command = "mysqldump --user=root --password='' --host=localhost ".$database." > ".$folderName.$fileName;
exec($command);
