<?php

class Bowling
{
    public function getScore($line): int
    {
        $formattedLine = $this->formatLine($line);

        if (count($formattedLine) < 12) {
            throw new \InvalidArgumentException('Incorrect length');
        }

        return $this->calculateScore($formattedLine);
    }


    private function calculateScore($line): int
    {
        $score = 0;
        $framesCount = 0;

        for ($currentFrame = 0; $currentFrame < count($line) - 1;
             $currentFrame += 2) {

            $framesCount++;
            $score += $line[$currentFrame];
            $score += $line[$currentFrame + 1];

            if ($this->isSpare($line, $currentFrame)) {
                $score += $line[$currentFrame + 2];
            }

            if ($this->isStrike($line, $currentFrame) && isset($line[$currentFrame + 2])) {
                $score += $line[$currentFrame + 2];
                $currentFrame--;
            }

            if ($this->isLastFrame($framesCount)) {
                break;
            }
        }

        return $score;
    }

    private function isLastFrame($count)
    {
        return $count>= 10;
    }

    private function isStrike($line, $frameIndex): bool
    {
        return $line[$frameIndex] === 10;
    }

    private function isSpare($line, $frameIndex): bool
    {
        return $line[$frameIndex] + $line[$frameIndex + 1] === 10;
    }

    private function formatLine($line): array
    {
        $formattedLine = [];

        foreach (explode(' ', $line) as $frame) {
            if (!is_int(intval($frame))) {
                throw new InvalidArgumentException('Incorrect argument');
            }

            if (intval($frame) > 10) {
                throw new InvalidArgumentException('Incorrect argument');
            }

            array_push($formattedLine, intval($frame));
        }

        return $formattedLine;
    }

}
