<?php

namespace Sabre\VObject\Parser;

use
    Sabre\VObject\Reader;

class InvalidEncodingTest extends \PHPUnit_Framework_TestCase {

    function testLibicalSpecificValues() {

        $data = "BEGIN:VCARD\nLABEL:a'b\"c\\\\d\\;e\\,f:g^h&i<j>k!l\\\"M\\tN\\rO\\bP\\fQ\nEND:VCARD";

        /* with compatibility kludges */
        $result = Reader::read($data);
        $this->assertEquals("a'b\"c\\d;e,f:g^h&i<j>k!l\"M\tN\rO\010P\fQ", "".$result->LABEL);

    }
}
