<?php

class BowlingTest extends \PHPUnit\Framework\TestCase
{
    protected $sut;

    protected function setUp(): void
    {
        $this->sut = new Bowling();
    }


    /**
     * @test
     * @dataProvider getLineAllGuttersProvider
     */
    public function testAllGutterBallsGetScore($line)
    {
        $this->assertEquals($this->sut->getScore($line), 0);
    }

    /**
     * @test
     * @dataProvider getIncorrectLengthLineProvider
     */
    public function testIncorrectLengthLine($line)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->sut->getScore($line);
    }

    /**
     * @test
     * @dataProvider getLineAllFoursProvider
     */
    public function testAllFoursGetScore($line)
    {
        $this->assertEquals(80, $this->sut->getScore($line));
    }

    /**
     * @test
     * @dataProvider getLineSparkAndFourProvider
     */
    public function testSparkAndFourGetScore($line)
    {
        $this->assertEquals(92, $this->sut->getScore($line));
    }

    /**
     * @test
     * @dataProvider getLineSparkAndFourWith21FramesProvider
     */
    public function testSparkAndFourWith21FramesGetScore($line)
    {
        $this->assertEquals(93, $this->sut->getScore($line));
    }

    /**
     * @test
     * @dataProvider getLineStrikeAndFourProvider
     */
    public function testStrikeAndFourGetScore($line)
    {
        $this->assertEquals(90, $this->sut->getScore($line));
    }

    /**
     * @test
     * @dataProvider getLineMixedProvider
     */
    public function testMixedLineGetScore($line, $expected)
    {
        $this->assertEquals($expected, $this->sut->getScore($line));
    }

    /**
     * @test
     * @dataProvider getLineStrikeAndFourWith21FramesProvider
     */
    public function testStrikeAndFourWith21FramesGetScore($line)
    {
        $this->assertEquals(108, $this->sut->getScore($line));
    }

    /**
     * @test
     * @dataProvider getLineStrikeAndFinalRandom
     */
    public function testStrikeAndFinalRandom($line)
    {
        $this->assertEquals(280, $this->sut->getScore($line));
    }

    public function getIncorrectLengthLineProvider()
    {
        return [
            ['0 0 0']
        ];
    }

    public function getLineAllFoursProvider()
    {
        return [
            ['4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4']
        ];
    }

    public function getLineAllGuttersProvider()
    {
        return [
            ['0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0']
        ];
    }

    public function getLineSparkAndFourProvider()
    {
        return [
            ['5 5 4 4 5 5 4 4 4 4 4 4 4 4 4 4 4 4 4 4']
        ];
    }

    public function getLineSparkAndFourWith21FramesProvider()
    {
        return [
            ['5 5 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 5 5 5']
        ];
    }

    public function getLineStrikeAndFourProvider()
    {
        return [
            ['10 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4']
        ];
    }

    public function getLineMixedProvider()
    {
        return [
            ['3 3 10 10 3 3 3 3 3 3 3 3 3 3 3 3 3 3', 87],
            ['10 10 10 10 10 10 10 10 10 10 10 10', 300],
            ['9 0 9 0 9 0 9 0 9 0 9 0 9 0 9 0 9 0 9 0',90],
            ['5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5', 150]
        ];
    }

    public function getLineStrikeAndFourWith21FramesProvider()
    {
        return [
            ['5 5 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 4 10 10 10']
        ];
    }

    public function getLineStrikeAndFinalRandom() {
        return [
            ['10 10 10 10 10 10 10 10 10 10 3 4']
        ];
    }
}
