<?php
require_once 'Dice.php';

class Game {
    private array $dice = [];
    private int $throwCount = 0;
    private array $results = [];

    public function __construct() {
        for ($i = 0; $i < 5; $i++) {
            $this->dice[] = new Dice();
        }
    }

    public function canThrow(): bool {
        return $this->throwCount < 3;
    }

    public function throwDice(): array {
        if (!$this->canThrow()) return [];

        $this->throwCount++;
        $throw = [];

        foreach ($this->dice as $die) {
            $die->throwDice();
            $throw[] = $die->getFaceValue();
        }

        $this->results[] = $throw;
        return $throw;
    }

    public function getResults(): array {
        return $this->results;
    }

    public function getThrowCount(): int {
        return $this->throwCount;
    }

    public function getBonusMessage(array $lastThrow): string {
        $counts = array_count_values($lastThrow);
        if (count($counts) === 1) {
            return "🎉 Jackpot! Alle dobbelstenen tonen hetzelfde!";
        } elseif (max($counts) >= 3) {
            return "🔥 Bonus! Drie of meer dezelfde!";
        }
        return "";
    }
}
