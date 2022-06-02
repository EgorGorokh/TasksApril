<?php

require_once 'Api.php';

class Model
{
    public $users;

    public function __construct()
    {
        $this->users = json_decode(file_get_contents(Api::$path), true);
    }

    public function addUser()
    {
        $curl = curl_init();
        $name = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $position = $_POST["position"];
        curl_setopt_array($curl, array(
            CURLOPT_URL => Api::$path . '/?name=' . $name . '&gender=' . $gender . '&email=' . $email . '&status=' . $position,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . Api::$token,
                'Cookie: _gorest_session=xjHsgQQETDme%2F%2FOjMmdvPyMEHRnakiElUKybb8d4sFjBMEh0SuzF4Amu8shIXpxud49CwalZCfeiEg%2BFXjaKAkmnzEAv4qOjB2homlSPu9OvzEOkOQOOwxD55pYyWpuS4Q1rtrsfknaa72s5r3sFahwcKGTpwwhYDw8IFIvaBsxh5ytUjOWmse3Rk0Q6lWey%2BgBw1WFSHUkYbPlHUwHkvixNmlYAJM%2BYXYVjrqt86AsqaUpEbaZfi27dGc6EnTAlrXmrFJbL1ahkA8Lds7nkQ4slBQtb16o%3D--KppOvKPWQMQ3%2BO9o--Z%2B1RvpNW02Q%2F0nMyYxaN7w%3D%3D'
            ],
        ));
        curl_exec($curl);
        curl_close($curl);
        header("Location:index.php");
        exit();
    }

    public function deleteUser(string $id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => Api::$path . '/' . $id,
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
        curl_exec($curl);
        curl_close($curl);
        header("Location:index.php");
        exit();
    }

    public function output(array $books)
    {
        $loader = new Twig_Loader_Filesystem('views/');
        $twig = new Twig_Environment($loader);
        echo $twig->render('page.html',
            ['books' => $books]
        );
    }
}
