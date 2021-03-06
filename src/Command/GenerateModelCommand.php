<?php

namespace Radvance\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Radvance\Generator\Generator;

class GenerateModelCommand extends AbstractGeneratorCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('generate:model')
            ->setDescription('Generate model')
            ->addArgument(
                'classPrefix',
                InputArgument::REQUIRED,
                'classPrefix'
            )
            ->addOption(
                'projectPath',
                null,
                InputOption::VALUE_REQUIRED,
                'Path to the project root'
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        $prefix = $input->getArgument('classPrefix');

        $this->generator->generateModel($prefix);
    }
}
