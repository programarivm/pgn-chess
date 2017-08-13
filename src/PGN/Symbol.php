<?php
namespace PGNChess\PGN;

/**
 * Symbols in PGN format.
 *
 * @author Jordi Bassagañas <info@programarivm.com>
 * @link https://programarivm.com
 * @license MIT
 */
class Symbol
{
    const WHITE = 'w';
    const BLACK = 'b';

    const BISHOP = 'B';
    const KING = 'K';
    const KNIGHT = 'N';
    const PAWN = 'P';
    const QUEEN = 'Q';
    const ROOK = 'R';

    const CASTLING_SHORT = 'O-O';
    const CASTLING_LONG = 'O-O-O';
    const SQUARE = '[a-h]{1}[1-8]{1}';
    const CHECK = '[\+\#]{0,1}';
}
