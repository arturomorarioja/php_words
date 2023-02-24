<?php

require_once 'src/words.php';

use PHPUnit\Framework\TestCase;

class wordsTest extends TestCase {

    /**
     * @dataProvider Occurrences
     */
    public function testOccurrences($value, $expected): void {
        $result = letterOccurrences($value);

        $this->assertEquals($expected, $result);
    }
    public function Occurrences(): array {
        return [
            ['', []],
            ['a', ['a' => 1]],
            ['ab', ['a' => 1, 'b' => 1]],
            ['abcdefghijklmnopqrstuvwxyz', ['a' => 1, 'b' => 1, 'c' => 1, 'd' => 1, 'e' => 1, 'f' => 1, 'g' => 1, 'h' => 1, 'i' => 1, 'j' => 1, 'k' => 1, 'l' => 1, 'm' => 1, 'n' => 1, 'o' => 1, 'p' => 1, 'q' => 1, 'r' => 1, 's' => 1, 't' => 1, 'u' => 1, 'v' => 1, 'w' => 1, 'x' => 1, 'y' => 1, 'z' => 1]],
            ['Hello', ['H' => 1, 'e' => 1, 'l' => 2, 'o' => 1]],
            ['ZZZ', ['Z' => 3]],
            ['aZZZ', ['a' => 1, 'Z' => 3]],
            ['Hello there', ['H' => 1, 'e' => 3, 'l' => 2, 'o' => 1, ' ' => 1, 't' => 1, 'h' => 1, 'r' => 1]],
        ];
    }

    /**
     * @dataProvider AnagramSucceeds
     */
    public function testAnagramSucceeds($value): void {
        $result = isAnagram($value[0], $value[1]);

        $this->assertTrue($result);
    }
    public function AnagramSucceeds(): array {
        return [
            [['elbow', 'below']],
            [['vase', 'save']],
            [['', '']],
            [['a', 'a']],
            [['', '8']],
            [['a gentleman', 'elegant man']],
            [['William Shakespeare', 'I\'ll make a wise phrase']],
        ];
    }

    /**
     * @dataProvider AnagramFails
     */
    public function testAnagramFails($value): void {
        $result = isAnagram($value[0], $value[1]);

        $this->assertFalse($result);
    }
    public function AnagramFails(): array {
        return [
            [['elbow', 'belw']],
            [['elbow', 'belowa']],
            [['a', '']],
            [['', 'a']],
            [['a gentleman', 'elegant mn']],
            [['a gentleman', 'elegant mana']],
        ];
    }
}