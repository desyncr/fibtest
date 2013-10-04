<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyleft
 */
namespace Desyncr\Fibonacci;
class Fibonacci
{
    public function __construct($strategy)
    {
        $this->strategy = $strategy;
    }

    public function execute($n)
    {
        return $this->strategy->execute($n);
    }
}