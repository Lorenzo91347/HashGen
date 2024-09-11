<?php

namespace Loren\Hashgen;

use PHPUnit\Framework\TestCase;

use Loren\Hashgen\Hash;

final class HashTest extends TestCase
{

    public function testThatSomethingShouldHappen()
    {
        $hash = new Hash();

        $this->assertSame(false, $hash->generateHashtag(''), 'Expected an empty string to return false');
        $this->assertSame(false, $hash->generateHashtag(str_repeat(' ', 200)), "Still an empty string");
        $this->assertSame('#Codewars', $hash->generateHashtag('Codewars'), 'Should handle a single word and add a hashtag at the beginning.');
        $this->assertSame('#Codewars', $hash->generateHashtag('Codewars      '), 'Should handle trailing whitespace.');
        $this->assertSame('#CodewarsIsNice', $hash->generateHashtag('Codewars Is Nice'), 'Should remove spaces.');
        $this->assertSame('#CodewarsIsNice', $hash->generateHashtag('codewars is nice'), 'Should capitalize first letters of words.');
        $this->assertSame('#CodeWars', $hash->generateHashtag('Code' . str_repeat(' ', 140) . 'wars'));
        $this->assertSame(false, $hash->generateHashtag('Looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong Cat'), 'Should return false if the final word is longer than 140 chars.');
        $this->assertSame("#A" . str_repeat("a", 138), $hash->generateHashtag(str_repeat("a", 139)), "Should work");
        $this->assertSame(false, $hash->generateHashtag(str_repeat("a", 140)), "Too long");
    }
}
