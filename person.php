<?php

class Person
{
    /**
     * @var int
     */
    private $speed = 0;

    /**
     * Person constructor.
     * @param int $speed
     */
    public function __construct(int $speed)
    {
        $this->speed = $speed;
    }


    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }
    
    /**
     * @param int $speed
     * @return Person
     */
    public function setSpeed (int $speed): Person
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * Factory method to get n random speed Persons.
     *
     * @param int $n
     * @return Person[]
     */
    public static function getRandom(int $n = 1): array
    {
        $randoms = array();

        for ($i = 0; $i < $n; $i++) {
            $randoms[] = new Person(rand(1, 100));
        }

        return $randoms;
    }
}