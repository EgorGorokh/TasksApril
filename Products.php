<?php

require_once 'Main.php';


class Products extends Main
{
    private $name;
    private $manufacturer;
    private $release;
    private $cost;

    public function read()
    {
        echo $this->name . '<br>';
        echo $this->manufacturer . '<br>';
        echo $this->release . '<br>';
        echo $this->cost . '<br>';
    }

    public function __construct($name, $manufacturer, $release, $cost)
    {
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->release = $release;
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getRelease()
    {
        return $this->release;
    }

    /**
     * @param mixed $release
     */
    public function setRelease($release): void
    {
        $this->release = $release;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost): void
    {
        $this->cost = $cost;
    }
}
