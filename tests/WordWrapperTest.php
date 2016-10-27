<?php

namespace Potherca\TestWorkshop;

class WordWrapperTest extends \PHPUnit_Framework_TestCase
{
    final public function testWordWrapperShouldBeInstantiatedWhenNotGivenLimit()
    {
        new WordWrapper();
    }

    final public function testWordWrapperShouldComplainWhenGivenNonIntegerAsLimit()
    {
        $this->expectException(\TypeError::class);

        new WordWrapper(false);
    }

    final public function testWordWrapperShouldWrapWordsToLimitWhenGivenLimit()
    {
        $wordWrapper = new WordWrapper();
        $actual = $wordWrapper->wrap('These are some words');

        $expected = <<<TXT
These
 are 
 some 
words
TXT;
        self::assertEquals($expected, $actual);
    }
}
