<?php
namespace App\Command;

use Knp\Command\Command as Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SilexCommand extends Command
{
    protected function configure()
    {
        $this
          ->setName("skeleton")
          ->setDescription("A test command!");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("It works!");
    }
}
