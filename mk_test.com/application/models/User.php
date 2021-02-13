<?php

namespace application\models;

use application\core\Model;

class User extends Model
{
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

        $query = "SELECT library_db.books_list.id, library_db.books_list.name, library_db.books_list.image_name, library_db.books_list.description,
                         GROUP_CONCAT(author) AS author
                         FROM library_db.books_list
                         LEFT JOIN library_db.pairs_id AS p ON books_list.id = p.book_id
                         LEFT JOIN library_db.authors AS a ON p.author_id = a.id
                         WHERE delete_at is null 
                         GROUP BY books_list.id LIMIT $offset, $limit";

        $data['data'] = $this->db->row($query);
        // Add pagination params to output array
        $result = array($data, $pagination_params);
        return $result;
    }

    /*
     * Gets book from DB by id
     *
     * @ return array of book params
     */
    public function getBook($id)
    {
        $query = "SELECT library_db.books_list.id, library_db.books_list.name,library_db.books_list.year ,
                         library_db.books_list.image_name, library_db.books_list.description,library_db.books_list.number_of_pages,
                         GROUP_CONCAT(author) AS author
                         FROM library_db.books_list
                         LEFT JOIN library_db.pairs_id AS p ON books_list.id = p.book_id
                         LEFT JOIN library_db.authors AS a ON p.author_id = a.id
                         WHERE books_list.id = '$id' 
                         GROUP BY books_list.id";

        $result = $this->db->row($query);
        return $result[0];
    }

    /*
     * Increases value of "views" field from "book_list" table for current book by 1 for each view
     */
    public function addViewing($id)
    {
        $query = "UPDATE library_db.books_list SET views = views+1 WHERE id ='$id'";
        $this->db->query($query);
    }

    /*
     * Increases value of "сдшслі" field from "book_list" table for current book by 1 for each click
     */
    public function makeClick($id)
    {
        $query = "UPDATE library_db.books_list SET clicks = clicks+1 WHERE id ='$id'";
        $this->db->query($query);
    }

    /*
     * Gets all collection of books from DB and compares each field of book's data with data from query string.
     * In case if was found any coincidence with any book -- returns all data for this book.
     *
     * @ return array of data for book by query
     */
    public function search($request)
    {
        $searching_request = '%' . $request . '%';
        $query = "SELECT library_db.books_list.id, library_db.books_list.name, library_db.books_list.image_name, library_db.books_list.description,
                         GROUP_CONCAT(author) AS author
                         FROM library_db.books_list
                         LEFT JOIN library_db.pairs_id AS p ON books_list.id = p.book_id
                         LEFT JOIN library_db.authors AS a ON p.author_id = a.id
                         WHERE delete_at is null AND books_list.name LIKE '$searching_request' OR author 
                         LIKE '$searching_request' AND delete_at is null 
                         GROUP BY books_list.id";

        $result = $this->db->row($query);
        return $result;
    }
}