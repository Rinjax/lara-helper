<?php

namespace Rinjax\LaraHelper\Traits;

trait BladeDirectives
{
    protected function SvgDirective()
    {
        \Blade::directive('svg', function($arguments) {

            // Funky madness to accept multiple arguments into the directive
            list($path, $class, $style) = array_pad(explode(',', trim($arguments, "() ")), 3, '');
            $path = trim($path, "' ");
            $class = trim($class, "' ");
            $style = trim($style, "' ");

            // Create the dom document as per the other answers
            $svg = new \DOMDocument();
            $svg->load(public_path($path));
            $svg->documentElement->setAttribute("class", $class);
            $svg->documentElement->setAttribute("style", $style);
            $output = $svg->saveXML($svg->documentElement);
            return $output;

        });
    }
}


