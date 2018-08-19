<?php

namespace PGNChess\PGN\File;

use PGNChess\PGN\Validate as PgnValidate;

/**
 * Validate class.
 *
 * @author Jordi Bassagañas <info@programarivm.com>
 * @link https://programarivm.com
 * @license GPL
 */
class Validate extends AbstractFile
{
    private $invalid = [];

    public function __construct($filepath)
    {
        parent::__construct($filepath);
    }

    /**
     * Checks if the syntax of a PGN file is valid.
     *
     * @return mixed array|bool
     */
    public function syntax()
    {
        $tags = $this->resetTags();
        $movetext = '';
        if ($file = fopen($this->filepath, 'r')) {
            while (!feof($file)) {
                $line = preg_replace('~[[:cntrl:]]~', '', fgets($file));
                try {
                    $tag = PgnValidate::tag($line);
                    $tags[$tag->name] = $tag->value;
                } catch (\Exception $e) {
                    switch (true) {
                        case $this->startsMovetext($line) && !$this->hasStrTags($tags):
                            $this->invalid[] = ['tags' => array_filter($tags)];
                            $tags = $this->resetTags();
                            $movetext = '';
                            break;
                        case $this->startsMovetext($line) && $this->hasStrTags($tags):
                            $movetext .= $line;
                            break;
                        case $this->endsMovetext($line) && $this->hasStrTags($tags):
                            $movetext .= $line;
                            if (!PgnValidate::movetext($movetext)) {
                                $this->invalid[] = [
                                    'tags' => array_filter($tags),
                                    'movetext' => $movetext
                                ];
                            }
                            $tags = $this->resetTags();
                            $movetext = '';
                            break;
                        case $this->hasStrTags($tags):
                            $movetext .= $line;
                            break;
                    }
                }
            }
            fclose($file);
        }

        return $this->invalid;
    }
}