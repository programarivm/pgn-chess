<?php

namespace Chess\Piece;

/**
 * Class that represents a bishop, a rook or a queen.
 *
 * These three pieces are quite similar. They can slide on the board, so to speak,
 * which means that their legal moves can be computed in the exact same way.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
abstract class Slider extends AbstractPiece
{
    /**
     * Constructor.
     *
     * @param $color
     * @param $square
     * @param $identity
     */
    public function __construct(string $color, string $square, string $identity)
    {
        parent::__construct($color, $square, $identity);
    }

    /**
     * Gets the legal moves of a slider piece.
     *
     * @return array The slider piece's (BRQ) legal moves.
     */
    public function getLegalMoves(): array
    {
        $moves = [];
        foreach ($this->scope as $direction) {
            foreach ($direction as $square) {
                if (
                    !in_array($square, $this->boardStatus->squares->used->{$this->getColor()}) &&
                    !in_array($square, $this->boardStatus->squares->used->{$this->getOppColor()})
                ) {
                    $moves[] = $square;
                } elseif (in_array($square, $this->boardStatus->squares->used->{$this->getOppColor()})) {
                    $moves[] = $square;
                    break 1;
                } elseif (in_array($square, $this->boardStatus->squares->used->{$this->getColor()})) {
                    break 1;
                }
            }
        }

        return $moves;
    }

    /**
     * Gets the defended squares by a slider piece.
     *
     * @return array The slider piece's (BRQ) defended squares.
     */
    public function getDefendedSquares(): array
    {
        $squares = [];
        foreach ($this->scope as $direction) {
            foreach ($direction as $square) {
                if (in_array($square, $this->boardStatus->squares->used->{$this->getColor()})) {
                    $squares[] = $square;
                    break 1;
                } elseif (in_array($square, $this->boardStatus->squares->used->{$this->getOppColor()})) {
                    break 1;
                }
            }
        }

        return $squares;
    }
}
