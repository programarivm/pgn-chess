<?php

namespace Chess\Tests\Unit\Evaluation;

use Chess\Board;
use Chess\Evaluation\MaterialEvaluation;
use Chess\Evaluation\System;
use Chess\PGN\Symbol;
use Chess\Tests\AbstractUnitTestCase;
use Chess\Tests\Sample\Opening\RuyLopez\LucenaDefense as RuyLopezLucenaDefense;

class MaterialEvaluationTest extends AbstractUnitTestCase
{
    /**
     * @test
     */
    public function ruy_lopez_lucena_defense()
    {
        $board = (new RuyLopezLucenaDefense(new Board()))->play();

        $expected = [
            Symbol::WHITE => 40.06,
            Symbol::BLACK => 40.06,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_BERLINER);

        $this->assertEquals($expected, $mtlEvald);
    }

    /**
     * @test
     */
    public function berliner()
    {
        $board = new Board();

        $expected = [
            Symbol::WHITE => 40.06,
            Symbol::BLACK => 40.06,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_BERLINER);

        $this->assertEquals($expected, $mtlEvald);
    }

    /**
     * @test
     */
    public function bilguer()
    {
        $board = new Board();

        $expected = [
            Symbol::WHITE => 43.7,
            Symbol::BLACK => 43.7,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_BILGUER);

        $this->assertEquals($expected, $mtlEvald);
    }

    /**
     * @test
     */
    public function fisher()
    {
        $board = new Board();

        $expected = [
            Symbol::WHITE => 39.5,
            Symbol::BLACK => 39.5,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_FISHER);

        $this->assertEquals($expected, $mtlEvald);
    }

    /**
     * @test
     */
    public function kasparov()
    {
        $board = new Board();

        $expected = [
            Symbol::WHITE => 38,
            Symbol::BLACK => 38,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_KASPAROV);

        $this->assertEquals($expected, $mtlEvald);
    }

    /**
     * @test
     */
    public function kaufman()
    {
        $board = new Board();

        $expected = [
            Symbol::WHITE => 40.75,
            Symbol::BLACK => 40.75,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_KAUFMAN);

        $this->assertEquals($expected, $mtlEvald);
    }

    /**
     * @test
     */
    public function lasker()
    {
        $board = new Board();

        $expected = [
            Symbol::WHITE => 39,
            Symbol::BLACK => 39,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_LASKER);

        $this->assertEquals($expected, $mtlEvald);
    }

    /**
     * @test
     */
    public function philidor()
    {
        $board = new Board();

        $expected = [
            Symbol::WHITE => 42,
            Symbol::BLACK => 42,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_PHILIDOR);

        $this->assertEquals($expected, $mtlEvald);
    }

    /**
     * @test
     */
    public function pratt()
    {
        $board = new Board();

        $expected = [
            Symbol::WHITE => 40,
            Symbol::BLACK => 40,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_PRATT);

        $this->assertEquals($expected, $mtlEvald);
    }

    /**
     * @test
     */
    public function sarrat()
    {
        $board = new Board();

        $expected = [
            Symbol::WHITE => 38.7,
            Symbol::BLACK => 38.7,
        ];

        $mtlEvald = (new MaterialEvaluation($board))->evaluate(System::SYSTEM_SARRAT);

        $this->assertEquals($expected, $mtlEvald);
    }
}
