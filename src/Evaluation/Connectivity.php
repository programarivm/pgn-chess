<?php

namespace Chess\Evaluation;

use Chess\Board;
use Chess\Evaluation\Square as SquareEvaluation;
use Chess\PGN\Symbol;

/**
 * Connectivity.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Connectivity extends AbstractEvaluation
{
    const NAME = 'connectivity';

    private $sqEvald;

    public function __construct(Board $board)
    {
        parent::__construct($board);

        $sqEval = new SquareEvaluation($board);

        $this->sqEvald = [
            SquareEvaluation::FEATURE_FREE => $sqEval->evaluate(SquareEvaluation::FEATURE_FREE),
            SquareEvaluation::FEATURE_USED => $sqEval->evaluate(SquareEvaluation::FEATURE_USED),
        ];

        $this->result = [
            Symbol::WHITE => 0,
            Symbol::BLACK => 0,
        ];
    }

    public function evaluate($feature = null): array
    {
        $this->color(Symbol::WHITE);
        $this->color(Symbol::BLACK);

        return $this->result;
    }

    private function color(string $color)
    {
        foreach ($this->board->getPiecesByColor($color) as $piece) {
            switch ($piece->getIdentity()) {
                case Symbol::KING:
                    $this->result[$color] += count(
                        array_intersect(array_values((array)$piece->getScope()),
                        $this->sqEvald[SquareEvaluation::FEATURE_USED][$color])
                    );
                    break;
                case Symbol::KNIGHT:
                    $this->result[$color] += count(
                        array_intersect($piece->getScope()->jumps,
                        $this->sqEvald[SquareEvaluation::FEATURE_USED][$color])
                    );
                    break;
                case Symbol::PAWN:
                    $this->result[$color] += count(
                        array_intersect($piece->getCaptureSquares(),
                        $this->sqEvald[SquareEvaluation::FEATURE_USED][$color])
                    );
                    break;
                default:
                    $this->result[$color] += count(
                        array_intersect(
                            array_merge(...array_values((array)$piece->getScope())),
                            $this->sqEvald[SquareEvaluation::FEATURE_USED][$color]
                        )
                    );
                    break;
            }
        }
    }
}
