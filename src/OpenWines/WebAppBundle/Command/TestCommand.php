<?php
/**
 * Created by PhpStorm.
 * User: ronan
 * Date: 30/05/2014
 * Time: 20:05
 */
namespace OpenWines\WebAppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Goutte\Client;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('openwines:test')
            ->setDescription('a test purposed command')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://openwines/app_dev.php/vignobles.json', array(), array(), array('HTTP_CONTENT_TYPE' => 'application/json'));
        die(var_dump($response));

        if ($input->getOption('yell')) {
            $text = strtoupper($text);
        }

        $output->writeln($text);
    }
}
