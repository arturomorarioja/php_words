<?php
/**
 * @author  Arturo Mora-Rioja (amri@kea.dk)
 * @version 1.0.0 January 2023
 */

/**
 * Returns an associative array with each letter in the word 
 * it receives and its number of occurrences in the word
 */
function letterOccurrences(string $word): array {
    $letters = [];

    for ($index = 0; $index < strlen($word); $index++) {
        $key = $word[$index];
        if (!isset($letters[$key])) {
            $letters[$key] = 0;
        }
        $letters[$key] += 1;
    }
    return $letters;
}

/** 
 * Returns true if both words received as parameters are anagrams, 
 * false otherwise.
 *  - Case insensitive
 *  - Non-alphabetic characters are ignored
 */
function isAnagram(string $word, string $potentialAnagram): bool {
    $word = str_split(strtoupper($word));
    $potentialAnagram = str_split(strtoupper($potentialAnagram));

    removeNonAlphabeticCharactersFromCharacterArray($word);
    removeNonAlphabeticCharactersFromCharacterArray($potentialAnagram);

    // Each letter found in both words is removed from both arrays
    foreach($word as $index => $letter) {
        if (is_numeric($pos = array_search($letter, $potentialAnagram))) {
            unset($word[$index]);
            unset($potentialAnagram[$pos]);
        }
    }

    // If both arrays are empty, all letters have been found, 
    // thus the words are anagrams
    return (count($word) === 0 && count($potentialAnagram) === 0);
}

function removeNonAlphabeticCharactersFromCharacterArray(array &$word): void {

    foreach($word as $index => $letter) {
        if (!ctype_alpha($letter)) {
            unset($word[$index]);
        }
    }
}