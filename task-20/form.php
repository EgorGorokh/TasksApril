<?php

require_once 'api.php';

class Form
{
    public $name;
    public $email;
    public $gender;
    public $position;

    public function getName($name)
    {
        $this->name = $name;
    }

    public function getEmail($email)
    {
        $this->email = $email;
    }

    public function getGender($gender)
    {
        $this->gender = $gender;
    }

    public function getPosition($position)
    {
        $this->position = $position;
    }

    public function main()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gorest.co.in/public/v2/users/?name=' . $this->name . '&gender=' . $this->gender . '&email=' . $this->email . '&status=' . $this->position,
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

        $response = curl_exec($curl);
        curl_close($curl);
        //echo $response;
        header("Location:vue.php");
    }

}

$forma = new Form();
$forma->getName($_POST["name"]);
$forma->getEmail($_POST["email"]);
$forma->getGender($_POST["gender"]);
$forma->getPosition($_POST["position"]);
$forma->main();



