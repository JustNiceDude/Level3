<?php
/*
 * Routes for user and admin
 */
return [
    // UserController
    '' => [
        'controller' => 'user',
        'action' => 'showBooks'
    ],
    'book/\d+' => [
        'controller' => 'user',
        'action' => 'showBook'
    ],
    '\?click=\d+' => [
        'controller' => 'user',
        'action' => 'makeClick'
    ],

    '\?offset=\d+' => [
        'controller' => 'user',
        'action' => 'showBooks'
    ],

//    // Shitty solution
//    'book/\d+.*?' => [
//        'controller' => 'user',
//        'action' => 'search'
//    ],

    '\?search=.*?' => [
        'controller' => 'user',
        'action' => 'search'
    ],

    // AdminController
    'admin' => [
        'controller' => 'admin',
        'action' => 'showBooks'
    ],
    'admin/showAuthors' => [
        'controller' => 'admin',
        'action' => 'showAuthors'
    ],
    'admin/addBook' => [
        'controller' => 'admin',
        'action' => 'addBook'
    ],
    'admin/deleteBook/\d+' => [
        'controller' => 'admin',
        'action' => 'deleteBook'
    ],
    'admin/restoreBook/\d+' => [
        'controller' => 'admin',
        'action' => 'restoreBook'
    ],
    'admin/addAuthor' => [
        'controller' => 'admin',
        'action' => 'addAuthor'
    ],
    'admin/addAdmin' => [
        'controller' => 'admin',
        'action' => 'addAdmin'
    ],
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout'
    ],
    'admin/\?offset=\d+' => [
        'controller' => 'admin',
        'action' => 'showBooks'
    ],
    'admin/showAuthors\?offset=\d+' => [
        'controller' => 'admin',
        'action' => 'showAuthors'
    ],
];