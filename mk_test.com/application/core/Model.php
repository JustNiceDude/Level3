<?php

namespace application\core;

use application\core\DB;

class Model
{

    public $db;

    /*
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = new DB();
    }

    /*
     * Creates page navigation by sorting data from DB
     *
     * @ return array of pagination params
     */
    public function pagination()
    {
        // Quantity of books for each page
        $limit = 6;
        // Set books offset for current page
        if (!isset($_GET['offset'])) {
            $offset = 0;
        } else {
            $offset = $_GET['offset'];
        }
        // Number of rows
        $result = $this->db->row("SELECT COUNT(*) FROM library_db.books_list WHERE delete_at is null");
        $num_of_rows = $result[0]["COUNT(*)"];
        // General amount of pages
        $total_pages = ceil($num_of_rows / $limit);
        // Create pagination params array
        $pagination['params'] = array('offset' => $offset, 'limit' => $limit, 'total' => $total_pages);
        return $pagination;
    }

}