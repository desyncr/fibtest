<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyleft
 */
namespace Desyncr\Fibonacci\Strategy;
class Recursive
{
    public function execute($n)
    {
        if ($n == 1 || $n == 2) {
            return 1;
        } else {
            return $this->execute( $n - 1 ) + $this->execute( $n - 2 );
        }
    }
}