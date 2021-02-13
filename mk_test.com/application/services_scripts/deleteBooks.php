<?php
// Connect to DB
$db_connection = new PDO('mysql:host=localhost;dbname=library_db', 'root', '');

/*
 * Deletes books from DB that were mark as deleted.
 */
function deleteBooks($db_connection)
{
    // Get books that will go to delete
    $query = "SELECT id,image_name FROM library_db.books_list WHERE delete_at is not null";
    $books_marked_as_deleted = $db_connection->query($query, PDO::FETCH_ASSOC);

    foreach ($books_marked_as_deleted as $current_book) {
        deleteCurrentBook($db_connection, $current_book['id'], $current_book['image_name']);
        deleteAuthorsRelation($db_connection, $current_book['id']);
    }

}

/*
 * Deletes book from DB and image from images folder
 */
function deleteCurrentBook($db_connection, $id, $image_name)
{
    $image = "/var/www/mk_test.com/public/images/" . $image_name;
    $query = "DELETE FROM library_db.books_list WHERE id =$id";
    $db_connection->query($query);
    if ($image_name != 'book_icon_by_default.png') {
        unlink($image);
    }
}

/*
 * Deletes a pair book_id/author_id with the id of the book to be deleted
 */
function deleteAuthorsRelation($db_connection, $id)
{
    $query = "DELETE FROM library_db.pairs_id WHERE book_id = $id";
    $db_connection->query($query);
}

deleteBooks($db_connection);
