<?php

class Bridge
{
    private $length = 0;

    private $throughput = 0;

    /**
     * Bridge constructor.
     *
     * @param $length
     * @param $throughput
     * @throws Exception
     */
    public function __construct(int $length, int $throughput)
    {
        $this->length = $length;

        if ($throughput < 2) {
            throw new Exception('Bridge through put must be at least 2 persons.');
        }

        $this->throughput = $throughput;
    }

    /**
     * @param Person[] $persons
     * @return int
     */
    public function getTimeToPass(array $persons): int
    {
        if ($this->length == 0) {
            return 0;
        }

        if (sizeof($persons) == 0) {
            return 0;
        }

        if (sizeof($persons) == 1) {
            $fastest = array_shift($persons);
            return $fastest->getSpeed() * $this->length;
        }
        // Sort by speed, fastest first.
        usort($persons, function(Person $a, Person $b)
        {
            return $a->getSpeed() == $b->getSpeed() ? 0 : ($a->getSpeed() > $b->getSpeed()) ? -1 : 1;
        });

        $fastest = array_pop($persons);

        $time = 0;

        $take = $this->throughput - 2;

        while ($slowest = array_shift($persons)) {
            // Pop the next ones, if can take more than one at a time.
            for ($i = 0; $i < $take; $i++) {
                array_shift($persons);
            }

            // Cross with the slowest speed.
            $time += $slowest->getSpeed() * $this->length;

            // Cross back with own speed.
            $time += $fastest->getSpeed() * $this->length;
        }

        // The fastest does not need to get back on the last round.
        $time -= $fastest->getSpeed() * $this->length;

        return $time;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return Bridge
     */
    public function setLength(int $length): Bridge
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return int
     */
    public function getThroughput(): int
    {
        return $this->throughput;
    }

    /**
     * @param int $throughput
     * @return Bridge
     */
    public function setThroughput(int $throughput): Bridge
    {
        $this->throughput = $throughput;
        return $this;
    }


}