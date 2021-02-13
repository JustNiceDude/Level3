<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;


class AdminController extends Controller
{
    /*
     * AdminController constructor.
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->httpAuthentication();
    }

    /*
     * Basic access authentication. The function calls window for input login and password,
     * then put data into global array $_SERVER. After that makes verification of inputted login and pass with
     * the same data from DB. In successful verification case - put the flag for admin in $_SESSION array.
     */
    public function httpAuthentication()
    {
        if ($this->model->checkForAdmin()) {
            $_SESSION['admin'] = 'successful';
        } else {
            header('WWW-Authenticate: Basic realm="Restricted Area"');
            header('HTTP/1.0 401 Unauthorized');
            die("Please input your login and password!");
        }
    }

    /*
     * Calls "getBooks" model. Splits array of data from model that contains pagination params and params of each book
     * from "book_list" table in DB. Then sets layout according to url and passes params from data into layout.
     */
    public function showBooksAction()
    {
        // Get layout name
        $split_url = explode("/", $_SERVER['REQUEST_URI']);
        $layout_name = $split_url[1];
        // Get params of books and pagination
        $result = $this->model->getBooks();
        $data = $result[0];
        $pagination_params = $result[1];
        // Set layout
        $this->view->setLayout($layout_name);
        $this->view->render('Show admin panel', $data, $pagination_params);
    }

    /*
    * Calls "showAuthor" model. Splits array of data from model that contains pagination params and list of authors
    * from "authors" table in DB. Then sets layout according to url and passes params from data into layout.
    */
    public function showAuthorsAction()
    {
        // Get layout name
        $split_url = explode("/", $_SERVER['REQUEST_URI']);
        $layout_name = $split_url[1];
        // Get params of books and pagination
        $result = $this->model->showAuthors();
        $data = $result[0];
        $pagination_params = $result[1];
        // Set layout
        $this->view->setLayout($layout_name);
        $this->view->render('Show authors action', $data, $pagination_params);
    }

    /*
     * Calls "addAuthor" model, sets layout and passes params from model into layout.
     */
    public function addAuthorAction()
    {
        if (isset($_POST['authorName'])) {
            $this->model->addAuthor(input_data_handler($_POST['authorName']));
        }
        // Get layout name
        $split_url = explode("/", $_SERVER['REQUEST_URI']);
        $layout_name = $split_url[1];
        // Set layout
        $this->view->setLayout($layout_name);
        $this->view->render('Add author');
    }


    /*
     * Calls "addBook" model, sets layout and passes params from model into layout.
     */
    public function addBookAction()
    {
        // Get layout name
        $split_url = explode("/", $_SERVER['REQUEST_URI']);
        $layout_name = $split_url[1];
        // Add book into DB or show list of author if $_POST empty
        if (isset($_POST['name']) && isset($_POST['year']) &&
            isset($_POST['description']) && isset($_POST['number_of_pages'])) {
            // Get input - params
            $name = input_data_handler($_POST['name']);
            $year = (int)input_data_handler($_POST['year']);
            $description = input_data_handler($_POST['description']);
            $number_of_pages = (int)input_data_handler($_POST['number_of_pages']);

            $this->model->addBook($name, $year, $description, $number_of_pages);
            $this->view->setLayout($layout_name);
            $this->view->render('Add book');
        } else {
            $authors = $this->model->getAuthors();
            $vars = [
                'data' => $authors
            ];
            $this->view->setLayout($layout_name);
            $this->view->render('Add book', $vars);
        }
    }

    /*
     * Calls "deleteBook" model for current book and redirect to book_list page
     */
    public function deleteBookAction()
    {
        // Get book id
        $split_url = explode("/", $_SERVER['REQUEST_URI']);
        $id = input_data_handler($split_url[3]);
        $this->model->deleteBook($id);
        // Return to book_list page after marking book
        $this->view->redirect('/admin');
    }

    /*
     * Calls "restoreBook" model for current book and redirect to book_list page
     */
    public function restoreBookAction()
    {
        // Get book id
        $split_url = explode("/", $_SERVER['REQUEST_URI']);
        $id = input_data_handler($split_url[3]);
        $this->model->restoreBook($id);
        // Return to book_list page after marking book
        $this->view->redirect('/admin');
    }

    /*
     * Calls "addAdmin" model, sets layout.
     */
    public function addAdminAction()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $this->model->addAdmin(input_data_handler($_POST['login']), input_data_handler($_POST['password']));
        }
        // Get layout name
        $split_url = explode("/", $_SERVER['REQUEST_URI']);
        $layout_name = $split_url[1];
        // Set layout
        $this->view->setLayout($layout_name);
        $this->view->render('Add admin');
    }

    /*
     * Calls "logout" model, sets layout.
     */
    public function logoutAction()
    {
        // Get layout name
        $split_url = explode("/", $_SERVER['REQUEST_URI']);
        $layout_name = $split_url[1];
        // Set layout
        $this->view->setLayout($layout_name);
        $this->view->render('Log Out from Admin Panel!');
    }

}