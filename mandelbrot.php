<?php

/**
 * @see https://stitcher.io/blog/jit-in-real-life-web-applications
 */

define('DEFAULT_DEPTH', 5000);

class Mandelbrot
{
    public function draw($depth = DEFAULT_DEPTH)
    {
        for ($y = -39; $y < 39; $y++) {
            printf("\n");

            for ($x = -39; $x < 39; $x++) {
                $i = $this->loop(
                    $x / 40.0,
                    $y / 40.0,
                    $depth
                );

                if ($i == 0) {
                    printf("*");
                } else {
                    printf(" ");
                }
            }
        }

        printf("\n");
    }

    private function loop($x, $y, $depth)
    {
        $cr = $y - 0.5;
        $ci = $x;
        $zi = 0.0;
        $zr = 0.0;
        $i = 0;

        while (1) {
            $i++;
            
            $temp = $zr * $zi;
            
            $zr2 = $zr * $zr;
            $zi2 = $zi * $zi;
            
            $zr = $zr2 - $zi2 + $cr;
            $zi = $temp + $temp + $ci;

            if ($zi2 + $zr2 > 16) {
                return $i;
            }

            if ($i > $depth) {
                return 0;
            }
        }
    }
}
