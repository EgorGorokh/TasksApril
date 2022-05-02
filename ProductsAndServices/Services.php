<?php

require_once 'Main.php';

class Services extends Main
{
    private $deadline;
    private $queue;
    private $cost;

    public function read()
    {
        echo $this->deadline . '<br>';
        echo $this->queue . '<br>';
        echo $this->cost . '<br>';
    }

    public function __construct($deadline, $queue, $cost)
    {
        $this->deadline = $deadline;
        $this->queue = $queue;
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline): void
    {
        $this->deadline = $deadline;
    }

    /**
     * @return mixed
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @param mixed $queue
     */
    public function setQueue($queue): void
    {
        $this->queue = $queue;
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
