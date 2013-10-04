<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyleft
 */
require_once('vendor/autoload.php');
use Symfony\Component\Console\Application;
use Desyncr\Runner;
$application = new Application();
$application->add(new Runner\Command());
$application->run();
