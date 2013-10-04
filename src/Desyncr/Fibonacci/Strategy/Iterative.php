<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyleft
 */
namespace Desyncr\Fibonacci\Strategy;
class Iterative
{
    public function execute($n)
    {
        // stolen form the internetz
        list( $cur, $nxt, $inc, $seq ) = array( 0, 1, 1, array() );
        do
        {
            $inc++;
            $seq[] = $cur;
            $add   = $cur + $nxt;
            $cur   = $nxt;
            $nxt   = $add;
        
        } while ( $inc <= $n );
        
        return $seq;
    }
}