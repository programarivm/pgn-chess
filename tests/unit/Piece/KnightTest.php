<?php

namespace Chess\Tests\Unit\Piece;

use Chess\PGN\Symbol;
use Chess\Piece\Knight;
use Chess\Tests\AbstractUnitTestCase;

class KnightTest extends AbstractUnitTestCase
{
    /**
     * @test
     */
    public function scope_d4()
    {
        $knight = new Knight(Symbol::WHITE, 'd4');
        $jumps = [
            'c6',
            'b5',
            'b3',
            'c2',
            'e2',
            'f3',
            'f5',
            'e6'
        ];

        $this->assertEquals($jumps, $knight->getScope()->jumps);
    }

    /**
     * @test
     */
    public function scope_h1()
    {
        $knight = new Knight(Symbol::WHITE, 'h1');
        $jumps = [
            'g3',
            'f2'
        ];

        $this->assertEquals($jumps, $knight->getScope()->jumps);
    }

    /**
     * @test
     */
    public function scope_b1()
    {
        $knight = new Knight(Symbol::WHITE, 'b1');
        $jumps = [
            'a3',
            'd2',
            'c3'
        ];

        $this->assertEquals($jumps, $knight->getScope()->jumps);
    }
}
