<?php

namespace Sabre\VObject;

/**
 * Useful utilities for working with various strings.
 *
 * Copyright (C) 2011-2016 Evert Pot (http://evertpot.com/),
 *	fruux GmbH (https://fruux.com/)
 * Copyright © 2014, 2016 mirabilos,
 *	tarent solutions GmbH (https://www.tarent.de/)
 *
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * - Redistributions of source code must retain the above copyright notice,
 *   this list of conditions and the following disclaimer.
 * - Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 * - Neither the name Sabre nor the names of its contributors
 *   may be used to endorse or promote products derived from this software
 *   without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

class StringUtil {

    static private $cp1252_map = array(
        "\x00\x00", "\x01\x00", "\x02\x00", "\x03\x00",
        "\x04\x00", "\x05\x00", "\x06\x00", "\x07\x00",
        "\x08\x00", "\x09\x00", "\x0A\x00", "\x0B\x00",
        "\x0C\x00", "\x0D\x00", "\x0E\x00", "\x0F\x00",
        "\x10\x00", "\x11\x00", "\x12\x00", "\x13\x00",
        "\x14\x00", "\x15\x00", "\x16\x00", "\x17\x00",
        "\x18\x00", "\x19\x00", "\x1A\x00", "\x1B\x00",
        "\x1C\x00", "\x1D\x00", "\x1E\x00", "\x1F\x00",
        "\x20\x00", "\x21\x00", "\x22\x00", "\x23\x00",
        "\x24\x00", "\x25\x00", "\x26\x00", "\x27\x00",
        "\x28\x00", "\x29\x00", "\x2A\x00", "\x2B\x00",
        "\x2C\x00", "\x2D\x00", "\x2E\x00", "\x2F\x00",
        "\x30\x00", "\x31\x00", "\x32\x00", "\x33\x00",
        "\x34\x00", "\x35\x00", "\x36\x00", "\x37\x00",
        "\x38\x00", "\x39\x00", "\x3A\x00", "\x3B\x00",
        "\x3C\x00", "\x3D\x00", "\x3E\x00", "\x3F\x00",
        "\x40\x00", "\x41\x00", "\x42\x00", "\x43\x00",
        "\x44\x00", "\x45\x00", "\x46\x00", "\x47\x00",
        "\x48\x00", "\x49\x00", "\x4A\x00", "\x4B\x00",
        "\x4C\x00", "\x4D\x00", "\x4E\x00", "\x4F\x00",
        "\x50\x00", "\x51\x00", "\x52\x00", "\x53\x00",
        "\x54\x00", "\x55\x00", "\x56\x00", "\x57\x00",
        "\x58\x00", "\x59\x00", "\x5A\x00", "\x5B\x00",
        "\x5C\x00", "\x5D\x00", "\x5E\x00", "\x5F\x00",
        "\x60\x00", "\x61\x00", "\x62\x00", "\x63\x00",
        "\x64\x00", "\x65\x00", "\x66\x00", "\x67\x00",
        "\x68\x00", "\x69\x00", "\x6A\x00", "\x6B\x00",
        "\x6C\x00", "\x6D\x00", "\x6E\x00", "\x6F\x00",
        "\x70\x00", "\x71\x00", "\x72\x00", "\x73\x00",
        "\x74\x00", "\x75\x00", "\x76\x00", "\x77\x00",
        "\x78\x00", "\x79\x00", "\x7A\x00", "\x7B\x00",
        "\x7C\x00", "\x7D\x00", "\x7E\x00", "\x7F\x00",
        "\xAC\x20", "\x81\x00", "\x1A\x20", "\x92\x01",
        "\x1E\x20", "\x26\x20", "\x20\x20", "\x21\x20",
        "\xC6\x02", "\x30\x20", "\x60\x01", "\x39\x20",
        "\x52\x01", "\x8D\x00", "\x7D\x01", "\x8F\x00",
        "\x90\x00", "\x18\x20", "\x19\x20", "\x1C\x20",
        "\x1D\x20", "\x22\x20", "\x13\x20", "\x14\x20",
        "\xDC\x02", "\x22\x21", "\x61\x01", "\x3A\x20",
        "\x53\x01", "\x9D\x00", "\x7E\x01", "\x78\x01",
        "\xA0\x00", "\xA1\x00", "\xA2\x00", "\xA3\x00",
        "\xA4\x00", "\xA5\x00", "\xA6\x00", "\xA7\x00",
        "\xA8\x00", "\xA9\x00", "\xAA\x00", "\xAB\x00",
        "\xAC\x00", "\xAD\x00", "\xAE\x00", "\xAF\x00",
        "\xB0\x00", "\xB1\x00", "\xB2\x00", "\xB3\x00",
        "\xB4\x00", "\xB5\x00", "\xB6\x00", "\xB7\x00",
        "\xB8\x00", "\xB9\x00", "\xBA\x00", "\xBB\x00",
        "\xBC\x00", "\xBD\x00", "\xBE\x00", "\xBF\x00",
        "\xC0\x00", "\xC1\x00", "\xC2\x00", "\xC3\x00",
        "\xC4\x00", "\xC5\x00", "\xC6\x00", "\xC7\x00",
        "\xC8\x00", "\xC9\x00", "\xCA\x00", "\xCB\x00",
        "\xCC\x00", "\xCD\x00", "\xCE\x00", "\xCF\x00",
        "\xD0\x00", "\xD1\x00", "\xD2\x00", "\xD3\x00",
        "\xD4\x00", "\xD5\x00", "\xD6\x00", "\xD7\x00",
        "\xD8\x00", "\xD9\x00", "\xDA\x00", "\xDB\x00",
        "\xDC\x00", "\xDD\x00", "\xDE\x00", "\xDF\x00",
        "\xE0\x00", "\xE1\x00", "\xE2\x00", "\xE3\x00",
        "\xE4\x00", "\xE5\x00", "\xE6\x00", "\xE7\x00",
        "\xE8\x00", "\xE9\x00", "\xEA\x00", "\xEB\x00",
        "\xEC\x00", "\xED\x00", "\xEE\x00", "\xEF\x00",
        "\xF0\x00", "\xF1\x00", "\xF2\x00", "\xF3\x00",
        "\xF4\x00", "\xF5\x00", "\xF6\x00", "\xF7\x00",
        "\xF8\x00", "\xF9\x00", "\xFA\x00", "\xFB\x00",
        "\xFC\x00", "\xFD\x00", "\xFE\x00", "\xFF\x00"
      );

    /**
     * Returns true or false depending on if a string is valid UTF-8
     *
     * @param string $str
     * @return bool
     */
    static public function isUTF8($str) {

        // Control characters
        if (preg_match('%[\x00-\x08\x0B-\x0C\x0E-\x1F\x7F]%', $str)) {
            return false;
        }

        return (bool)preg_match('%%u', $str);

    }

    /**
     * This method tries its best to convert the input string to UTF-8.
     *
     * Currently only ISO-5991-1 input and UTF-8 input is supported, but this
     * may be expanded upon if we receive other examples.
     *
     * @param string $str
     * @return string
     */
    static public function convertToUTF8($str) {

        /*
         * Unfortunately, mb_check_encoding is not reliable.
         * But mb_convert_encoding can be used to convert
         * from (presumed) UTF-8 to UTF-16 then back to UTF-8,
         * and will replace invalid input with question marks.
         * That means if previous and result are not equal,
         * the input was not UTF-8, in which case we convert
         * as if it were encoded in Codepage 1252 (ISO-8859-1
         * superset); ; all 256 bytes are (after conversion)
         * valid per RFC3629 §4. For this to work, we need to
         * temporarily change the mb_* functions’ encoding.
         */
        $mb_encoding = mb_internal_encoding();
        mb_internal_encoding("UTF-8");

        /* coerce to string first */
        $str = ''.$str;
        /* check for UTF-8 encoding as detailed above */
        $ws = mb_convert_encoding($str, "UTF-16LE", "UTF-8");
        $mbs = mb_convert_encoding($ws, "UTF-8", "UTF-16LE");
        /* match? */
        if ($mbs !== $str) {
            /* convert from Codepage 1252 to UTF-16LE */
            $ws = implode('', array_map(function ($value) {
                return (self::$cp1252_map[ord($value)]);
              }, str_split($str)));
            /* convert from UTF-16LE to UTF-8 */
            $mbs = mb_convert_encoding($ws, "UTF-8", "UTF-16LE");
        }

        /* restore internal encoding used by the mb_* functions */
        mb_internal_encoding($mb_encoding);

        /* remove any C0 control characters (C1 are fine) */
        return (preg_replace('%(?:[\x00-\x08\x0B-\x0C\x0E-\x1F\x7F])%', '', $mbs));

    }

}
