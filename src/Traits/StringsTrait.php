<?php

namespace Rinjax\LaraHelper\Traits;

trait StringsTrait
{
    /**
     * Generate a random string of character from a-Z-0-9 with the specified length
     * @param int $length
     * @return string
     */
    public function str_random(int $length = 5): string
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLength = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $chars[rand(0, $charLength - 1)];
        }
        return $string;
    }

    /**
     * Generate a random string token, with the specified length, and number of sections.
     * EG length 4, 3 sections: a1T7-k9T3-pPlj
     * @param int $section_length
     * @param int $num_sections
     * @param string $separator
     * @return string
     */
    public function str_token(int $section_length = 5, int $num_sections = 4, string $separator = '-'): string
    {
        $string = '';

        for ($i = 0; $i < $num_sections; $i++) {
            $string .= $this->str_random($section_length) . $separator;
        }

        return substr($string, 0, -1);
    }

    /**
     * Masks a string with a masking character. Different masking patterns can be used by setting the type
     * @param string $string
     * @param int $type
     * @param string $mask
     * @return string
     */
    public function str_mask(string $string, int $type = 1, string $mask = '*'): string
    {
        switch ($type) {
            case 1:
                return $this->str_mask_1($string, $mask);
                break;
            case 2:
                return $this->str_mask_2($string, $mask);
                break;
            case 3:
                return $this->str_mask_3($string, $mask);
                break;
            default:
                return $this->str_mask_1($string, $mask);
                break;
        }
    }

    /**
     * Mask all the characters with the masking character.
     * @param string $string
     * @param $mask
     * @return string
     */
    private function str_mask_1(string $string, $mask): string
    {
        $masked_string = '';

        for ($i = 0; $i <= strlen($string); $i++) {
            $masked_string .= $mask;
        }

        return $masked_string;
    }

    /**
     * Masks all the characters with the masking character, but leaves the last 3 characters of the original string unchanged.
     * @param string $string
     * @param $mask
     * @return string
     */
    private function str_mask_2(string $string, $mask): string
    {
        $masked_string = '';

        if (strlen($string) >= 5) {
            for ($i = 0; $i <= (strlen($string) - 3); $i++) {
                $masked_string .= $mask;
            }

            $masked_string .= substr($string, -3);
        } else {
            for ($i = 0; $i <= strlen($string); $i++) {
                $masked_string .= $mask;
            }
        }

        return $masked_string;
    }

    /**
     * Masks all the characters with the masking character, apart from the first and last character.
     * @param string $string
     * @param $mask
     * @return string
     */
    private function str_mask_3(string $string, $mask): string
    {
        $masked_string = '';

        if (strlen($string) >= 3) {
            $masked_string .= substr($string, 1, 1);
            for ($i = 0; $i <= (strlen($string) - 2); $i++) {
                $masked_string .= $mask;
            }

            $masked_string .= substr($string, -1);
        } else {
            for ($i = 0; $i <= strlen($string); $i++) {
                $masked_string .= $mask;
            }
        }

        return $masked_string;
    }
}

