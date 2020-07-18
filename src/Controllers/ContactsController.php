<?php

namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Base\Controller;

class ContactsController extends Controller{

public function contacts(){
    $template = 'template.php';
    $content = 'contacts.php';
    $data = ['page_title'=>'Контакты',
             'path_css'=>'contacts'
            ];

    return $this->generateResponse($content, $data);
}
}
