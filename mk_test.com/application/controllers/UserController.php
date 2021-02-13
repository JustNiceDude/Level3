<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;


class UserController extends Controller
{
    /*
     * Calls "showBooks" model. Splits array of data from model that contains pagination params and params of each book
     * from "book_list" table in DB. Then sets layout according to url and passes params from data into layout.
     */
    public function showBooksAction()
    {
        $result = $this->model->getBooks();
        // Get params of books and pagination
        $data = $result[0];
        $pagination_params = $result[1];

        $this->view->render('List of books', $data, $pagination_params);
    }

    /*
     * Calls "getBook" model, sets layout and passes params from model into layout.
     */
    public function showBookAction()
    {
        // Get book id
        $split_url = explode("/", $_SERVER['REQUEST_URI']);
        $id = input_data_handler($split_url[2]);

        $result = $this->model->getBook($id);
        // Calls "addViewing" model that increase value of view from "book_list" table by 1
        $this->model->addViewing($id);
        $this->view->render('List of books', $result);
    }

    /*
     * Calls "makeClick" model.
     */
    public function makeClickAction()
    {
        $this->model->makeClick(input_data_handler($_GET['click']));
    }

    /*
     * Calls "search" model. Than checks result of model's work. Sets layout and passes data according
     * to result of model's work.
     */
    public function searchAction()
    {
        $result = $this->model->search(input_data_handler($_GET['search']));
        if (!empty($result)) {
            $vars = [
                'data' => $result
            ];
            $this->view->render('Searching result', $vars);
        } else {
            $vars = [
                'data' => null
            ];
            $this->view->render('Searching result', $vars);
        }
    }

}