<?php
require_once '../configurations/db_connection.php';
// Connect to DB
$db_connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

// Gets list of migration files
function getMigrationFiles($db_connection)
{
    // get path to folder with file for migration process
    $sqlFolder = '/var/www/mk_test.com/application/sql/';
    // get list of sql files
    $allFiles = glob($sqlFolder . '*.sql');

    // Check for presence of table "migrations"
    $query = sprintf('show tables from `%s` like "%s"', DB_NAME, DB_TABLE_MIGRATIONS);
    $stmnt = $db_connection->prepare($query);
    $stmnt->execute();
    $table_version = $stmnt->fetchAll(PDO::FETCH_NUM);

    // If it is first migration process -- returns all sql files from folder
    if (!$table_version) {
        return $allFiles;
    }

    // Get all files from "migrations" table
    $query = sprintf('select `name` from `%s`', DB_TABLE_MIGRATIONS);
    $stmnt = $db_connection->prepare($query);
    $stmnt->execute();
    $table_version_content = $stmnt->fetchAll(PDO::FETCH_NUM);

    // Save the list off migration from "migrations" table
    $versionsFiles = array();
    for ($i = 0; $i < count($table_version_content); $i++) {
        array_push($versionsFiles, $sqlFolder . $table_version_content[$i][0]);
    }
    // return files which are not in the table "migrations"
    return array_diff($allFiles, $versionsFiles);
}

// Run migrations process
function migrate($db_connection, $file)
{
    // Create sql command
    $command = sprintf('mysql -u%s -p%s -h %s -D %s < %s', DB_USER, DB_PASS, DB_HOST, DB_NAME, $file);
    // Run shell-script
    shell_exec($command);
    // Get file name by throwing file path
    $baseName = basename($file);
    // Create request to add file into "migrations" table
    $query = sprintf('insert into `%s` (`name`) values("%s")', DB_TABLE_MIGRATIONS, $baseName);
    // Run request
    $statement = $db_connection->prepare($query);
    $statement->execute();
}

// Get list of files for migration process that is no in "migrations" table
$files = getMigrationFiles($db_connection);

// Check for new migrations
if (empty($files)) {
    echo "Your database has the latest version!\n";
} else {
    echo "Start migration process...\n";
    // Run migration process for each file
    foreach ($files as $file) {
        migrate($db_connection, $file);
        // Print the name of migration file
        echo basename($file) . "\n";
    }
    echo "Migration process success!\n";
}