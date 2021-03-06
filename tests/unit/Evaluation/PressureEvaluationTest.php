<?php

namespace Chess\Tests\Unit\Evaluation;

use Chess\Board;
use Chess\PGN\Convert;
use Chess\PGN\Symbol;
use Chess\Evaluation\PressureEvaluation;
use Chess\Tests\AbstractUnitTestCase;
use Chess\Tests\Sample\Opening\Sicilian\Closed as ClosedSicilian;
use Chess\Tests\Sample\Opening\Sicilian\Open as OpenSicilian;

class PressureEvaluationTest extends AbstractUnitTestCase
{
    /**
     * @test
     */
    public function start()
    {
        $pressEvald = (new PressureEvaluation(new Board()))->evaluate();

        $expected = [
            Symbol::WHITE => [],
            Symbol::BLACK => [],
        ];

        $this->assertEquals($expected, $pressEvald);
    }

    /**
     * @test
     */
    public function open_sicilian()
    {
        $board = (new OpenSicilian(new Board()))->play();

        $pressEvald = (new PressureEvaluation($board))->evaluate();

        $expected = [
            Symbol::WHITE => [],
            Symbol::BLACK => ['e4'],
        ];

        $this->assertEquals($expected, $pressEvald);
    }

    /**
     * @test
     */
    public function closed_sicilian()
    {
        $board = (new ClosedSicilian(new Board()))->play();

        $pressEvald = (new PressureEvaluation($board))->evaluate();

        $expected = [
            Symbol::WHITE => [],
            Symbol::BLACK => ['c3'],
        ];

        $this->assertEquals($expected, $pressEvald);
    }

    /**
     * @test
     */
    public function e4_e5_Nf3_Nc6_Bb5_a6_Nxe5()
    {
        $board = new Board();
        $board->play(Convert::toStdObj(Symbol::WHITE, 'e4'));
        $board->play(Convert::toStdObj(Symbol::BLACK, 'e5'));
        $board->play(Convert::toStdObj(Symbol::WHITE, 'Nf3'));
        $board->play(Convert::toStdObj(Symbol::BLACK, 'Nc6'));
        $board->play(Convert::toStdObj(Symbol::WHITE, 'Bb5'));
        $board->play(Convert::toStdObj(Symbol::BLACK, 'a6'));
        $board->play(Convert::toStdObj(Symbol::WHITE, 'Nxe5'));

        $pressEvald = (new PressureEvaluation($board))->evaluate();

        $expected = [
            Symbol::WHITE => ['a6', 'c6', 'c6', 'd7', 'f7'],
            Symbol::BLACK => ['b5', 'e5'],
        ];

        $this->assertEquals($expected, $pressEvald);
    }
}
