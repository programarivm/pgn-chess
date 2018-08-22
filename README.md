## PGN Chess

[![Build Status](https://travis-ci.org/programarivm/pgn-chess.svg?branch=master)](https://travis-ci.org/programarivm/pgn-chess)
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)

![PGN Chess](/resources/chess-move.jpg?raw=true)

This is a simple, friendly, and powerful PGN (Portable Game Notation) library for running chess games from within PHP applications. It is a chess board representation that can be used in chess engines, chess applications and chess algorithms.

PGN Chess can play and validate PGN notated games, and comes to the rescue in the following scenarios:

- Develop chess APIs
- Create funny, random games for fun
- Analyze games of chess
- Validate games
- Seed databases with PGN games

### Install

Via composer:

    $ composer require programarivm/pgn-chess

### Instantiation

Just instantiate a game and play PGN moves:

```php
<?php

use PGNChess\Game;

$game = new Game;

$isLegalMove = $game->play('w', 'e4');
```
All action takes place in the `$game` object. The call to the `$board->play` method returns `true` or `false` depending on whether or not a chess move can be run on the board.

It is up to you how to process the moves accordingly -- go into a loop till the player runs a valid move, ask them to please try again, play a sound, exit the game or whatever thing you consider appropriate. The important thing is that PGN Chess understands chess rules, internally replicating the game being played on the board.

> **Side note**: PGN Chess games are actually run in the computer's memory. So, if it turns out that for whatever reason a player forgets to append the + symbol to their check moves, PGN Chess will anyway understand that it is a check move. The same thing goes for checkmate moves.

### Documentation

Please see the [Documentation](https://pgn-chess.readthedocs.io/en/latest/).

### License

The GNU General Public License.

### Contributions

Would you help make this library better? Contributions are welcome.

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "PGN Chess Contributions"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)
- Say hello on [Google+](https://plus.google.com/+Programarivm)

Many thanks.
