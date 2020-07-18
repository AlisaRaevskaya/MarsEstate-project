<?php
namespace Ifmo\Web\Controllers;

use Ifmo\Web\Core\Controller;

class AnimalController extends Controller{

    public function showCategory(Request $request){
var_dump($request->params());
    }
}
