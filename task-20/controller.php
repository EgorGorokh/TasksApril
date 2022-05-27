<?php

require_once 'api.php';
require_once 'model.php';
require_once 'vendor/autoload.php';


class Controller
{
    public function main($data, $books)
    {
        $loader = new Twig_Loader_Filesystem('views/');
        $twig = new Twig_Environment($loader);
        $function = new Twig_SimpleFunction('delete', function ($id) {
            if (isset($_POST['submitData' . $id])) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://gorest.co.in/public/v2/users/' . $id,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'DELETE',
                    CURLOPT_HTTPHEADER => [
                        'Authorization: Bearer ' . Api::$token,
                        'Cookie: _gorest_session=4D9Ln9npGSu3P3AE7a3xviDVfHJ0Gqtogu5FZBvUhrl2k7Cvt7r1BPZjgfGFOiHWa6q8IU23ELMYa9qapBPd2v%2F4UxrxLYqhyC2QmsapViMKFznbDDPe38XUSxs5Sx5t9WM%2Fz78x8%2FkHQvBFOE6sRQQyRvyIVP2D4oEwCgP6oR2xP2Yz3dtnsvDsynVi5S%2FANHB3RmSzUXSNrrGNdQVWSvgJF3trseHcAtZkIQX%2F2MN2HPnT8WuievHj1o%2F%2Fl%2FViN0QFlxhrDYxaY%2FQG4hymcP9wPRqZ4As%3D--vSZSOn37Pujb8Lui--uvjD4vg3BSxKsKLJdENT%2Fw%3D%3D'
                    ],
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                header("Location:controller.php");
            }
        });
        $twig->addFunction($function);
        echo $twig->render('page.html',
            ['data' => $data, 'books' => $books]
        );
    }
}
$modelka = new Model();
$modelka->getData(Api::$users);
$data = $modelka->setData();
$modelka->getBooks($data);
$books = $modelka->setBooks();

$object = new Controller();
$object->main($data, $books);