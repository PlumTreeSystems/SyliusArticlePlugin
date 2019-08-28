<?php


namespace PTS\SyliusBlogPlugin\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Bundle\FixturesBundle\Fixture\FixtureInterface;

class BlogFixture extends AbstractFixture implements FixtureInterface
{
    private $blogManager;

    public function __construct(ObjectManager $blogManager)
    {
        $this->blogManager = $blogManager;
    }

    function getName(): string
    {
        return "blog";
    }

    function load(array $options): void
    {
        //do stuff
    }
}