<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyleft
 */
namespace Desyncr\Runner;
use Desyncr\Fibonacci;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @package Desyncr\Runner
 */
class Command extends \Symfony\Component\Console\Command\Command
{
    protected function configure()
    {
        $this
            ->setName('runner:run')
            ->setDescription('Runs process')
            ->addArgument(
                'n',
                InputArgument::REQUIRED,
                'nth fibonacci'
            )
            ->addArgument(
               'strategy',
               InputArgument::REQUIRED,
               'Strategy used: recursive | iterative'
            )
        ;
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output) {
        parent::initialize($input, $output);

        $this->n = $input->getArgument('n');
        $this->strategy = $input->getArgument('strategy');

    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        switch ($this->strategy)
        {
            case 'recursive': 
                $strategy = new Fibonacci\Strategy\Recursive();
                break;
            default:
                $strategy = new Fibonacci\Strategy\Iterative();
        }

        $fib = new Fibonacci\Fibonacci($strategy);

        // benchmarking
        $time = -microtime(true); 
            $fib->execute($this->n);
        $time += microtime(true);

        //$this->writeln("Fib time: ",sprintf('%f', $time));
        //$this->writeln("Mem: ", memory_get_peak_usage());
        $output->writeln(sprintf('%f', $time));
    }
}
