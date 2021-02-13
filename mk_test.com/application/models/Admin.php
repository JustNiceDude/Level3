<?php


namespace application\models;

use application\core\Model;


class Admin extends Model
{
    /*
     * Gets inputted login and password from $_SESSION and from DB, compare data,
     * then returns true for successful comparison.
     *
     * @ return true/false
     */
    public function checkForAdmin(): bool
    {
        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
            $admins = $this->db->row('SELECT * FROM library_db.admins');
            foreach ($admins as $current_admin) {
                if ($current_admin['login'] == $_SERVER['PHP_AUTH_USER'] &&
                    $current_admin['password'] == $_SERVER['PHP_AUTH_PW']) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    /*
     * Gets all collection of books from DB and puts it into array. Then add pagination params to
     * output array
     *
     * @ return array of books with pagination params
     */
    public function getBooks()
    {
        // Get pagination params for query
        $pagination_params = $this->pagination();
        $offset = $pagination_params['params']['offset'];
        $limit = $pagination_params['params']['limit'];

        $query = "SELECT library_db.books_list.id, library_db.books_list.name,library_db.books_list.year, library_db.books_list.image_name,
                         library_db.books_list.description,library_db.books_list.clicks,library_db.books_list.views,library_db.books_list.delete_at,
                         GROUP_CONCAT(author) AS author
                         FROM library_db.books_list
                         LEFT JOIN library_db.pairs_id AS p ON books_list.id = p.book_id
                         LEFT JOIN library_db.authors AS a ON p.author_id = a.id
                         GROUP BY books_list.id LIMIT $offset, $limit";

        $data['data'] = $this->db->row($query);
        // Add pagination params to output array
        $result = array($data, $pagination_params);
        return $result;
    }

    /*
     * Add author into "authors" table in DB
     */
    public function addAuthor($authorName)
    {
        $query = "INSERT INTO library_db.authors (author) VALUES ('$authorName') ";
        $this->db->row($query);
    }

    /*
    * Gets all authors from DB and puts it into array. Then add pagination params to
    * output array
    * @ return array of author with pagination params
    */
    public function showAuthors()
    {
        // Get pagination params for query
        $pagination_params = $this->pagination();
        $offset = $pagination_params['params']['offset'];
        $limit = $pagination_params['params']['limit'];

        $query = "SELECT * FROM library_db.authors LIMIT $offset, $limit";
        $data['data'] = $this->db->row($query);

        $result = array($data, $pagination_params);
        return $result;
    }

    /*
    * Gets all authors from DB.
    * @ return array of author with pagination params
    */
    public function getAuthors()
    {
        $query = "SELECT * FROM library_db.authors";
        $result = $this->db->row($query);
        return $result;
    }

    /*
     * Add login and password from form into DB
     */
    public function addAdmin($login, $password)
    {
        $query = "INSERT INTO library_db.admins (login, password) VALUES ('$login', '$password')";
        $this->db->row($query);
    }

    /*
     * Gets data of book from input form and upload image for current book. Then add it into DB and sets
     * connection between book that was added and author from "authors"- table.
     */
    public function addBook($name, $year, $description, $number_of_pages)
    {
        // Upload image
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . "/public/images/";
        $image_name = input_data_handler($_FILES['image_name']['name']);
        $move_from = $_FILES['image_name']['tmp_name'];
        $image_size = $_FILES['image_name']['size'];
        if (!isset($image_name) || $image_size != 0) {
            copy($move_from, $upload_path . $image_name);
        } else {
            $image_name = "book_icon_by_default.png";
        }
        // Insert inputted data into DB
        $query = "INSERT INTO library_db.books_list (name, year,image_name, description, number_of_pages,clicks,views)
                        VALUES ('$name','$year','$image_name' ,'$description','$number_of_pages',0,0)";
        $this->db->row($query);
        // Get id of last added book
        $last_insert_id = $this->db->row('SELECT LAST_INSERT_ID()');
        $book_id = (int)$last_insert_id[0]["LAST_INSERT_ID()"];
        // Make connection between added book and authors in "pair_id" - table.
        if (isset($_POST['author1'])) {
            $author_id = (int)input_data_handler($_POST['author1']);
            $query = "INSERT INTO library_db.pairs_id (book_id, author_id) VALUES ('$book_id','$author_id')";
            $this->db->query($query);
        }
        if (isset($_POST['author2'])) {
            $author_id = (int)input_data_handler($_POST['author2']);
            $query = "INSERT INTO library_db.pairs_id (book_id, author_id) VALUES ('$book_id','$author_id')";
            $this->db->query($query);
        }
        if (isset($_POST['author3'])) {
            $author_id = (int)input_data_handler($_POST['author3']);
            $query = "INSERT INTO library_db.pairs_id (book_id, author_id) VALUES ('$book_id','$author_id')";
            $this->db->query($query);
        }
    }

    /*
     * That function doesn't delete book, just mark book by "id" as deleted by adding time-mark into
     * "delete_at" column from "book_list" table
     */
    public function deleteBook($id)
    {
        date_default_timezone_set("Europe/Kiev");
        $pressed_delete_button_time = date("Y-m-d H:i:s");
        $query = "UPDATE library_db.books_list SET delete_at = '$pressed_delete_button_time' WHERE id = '$id'";
        $this->db->query($query);
    }

    /*
     * Delete time mark for book by id and set "null" value for "delete_at" column
     */
    public function restoreBook($id)
    {
        $query = "UPDATE library_db.books_list SET delete_at = null WHERE id = '$id'";
        $this->db->query($query);
    }
}