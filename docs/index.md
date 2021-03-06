## PHP Chess

[![Latest Stable Version](https://poser.pugx.org/programarivm/php-chess/v/stable)](https://packagist.org/packages/programarivm/php-chess)
[![Build Status](https://travis-ci.org/programarivm/php-chess.svg?branch=master)](https://travis-ci.org/programarivm/php-chess)
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)

A chess library for PHP.

### Install

Via composer:

    $ composer require programarivm/php-chess

### Play Chess

```php
use Chess\Game;

$game = new Game();

$game->play('w', 'e4');
$game->play('b', 'e5');
```
The call to the `$game->play` method returns `true` or `false` depending on whether or not a chess move can be run on the board.

### Play Chess With an AI

Pass the `Game::MODE_AI` parameter when instantiating a `$game`:

```php
$game = new Game(Game::MODE_AI);

$game->play('w', 'e4');
$game->play('b', $game->response());
$game->play('w', 'e5');
$game->play('b', $game->response());
```

The AIs are stored in the [`model`](https://github.com/programarivm/php-chess/tree/master/model) folder. The default is `a1.model`, if you want to play with a different AI pass it as a second parameter to the `Chess\Game` constructor:

```php
$game = new Game(Game::MODE_AI, 'a2.model');

$game->play('w', 'e4');
$game->play('b', $game->response());
$game->play('w', 'e5');
$game->play('b', $game->response());
```

If you'd want to learn more please visit:

- [Two Things That My AI Project Required](https://medium.com/geekculture/two-things-that-my-ai-project-required-50000297053b)
- [What Are Some Healthy Tips to Reduce Cognitive Load?](https://medium.com/geekculture/what-are-some-healthy-tips-to-reduce-cognitive-load-4f91b695a3cb)
- [How to Take Normalized Heuristic Pictures](https://medium.com/geekculture/how-to-take-normalized-heuristic-pictures-79ca0df4cdec)
- [Equilibrium, Yin-Yang Chess](https://medium.com/geekculture/equilibrium-yin-yang-chess-292e044be46b)

Currently a few machine learning models are being built with the [Rubix ML](https://github.com/RubixML/ML) library at [programarivm/chess-data](https://github.com/programarivm/chess-data). The supervised learning process is all about using suitable heuristics such as king safety, pressure, material or connectivity, among others.

But how can the efficiency of a chess heuristic be measured? This is where plotting data on nice charts comes to the rescue! A live demo is available at [Heuristics Quest](https://programarivm.github.io/heuristics-quest/).
