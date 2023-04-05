<?php

namespace App\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Pimcore\Console\AbstractCommand;


class ProCommand extends \Pimcore\Console\AbstractCommand
{
    protected function configure()
    {
        $this->setName('pro')->setDescription('this cmd is used to import pro');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $product = new \Pimcore\Model\DataObject\Product();
        $product->setProdName('pro 166');
        $product->setProdDescription('Pro Description');
        $product->setParentId(17);
        $product->setKey('pro-166');
        $product->setPublished(true);
        $product->save();
        $output->writeln('Pro is successfull created');

        
        /* For Product Listing*/
        // $product_listing = new \Pimcore\Model\DataObject\Product\Listing();
        // foreach($product_listing->load as $product){
        //     p_r($product->getKey());
        // }
        return 0;
    }
}