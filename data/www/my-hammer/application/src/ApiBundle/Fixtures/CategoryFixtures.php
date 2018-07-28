<?php

namespace ApiBundle\Fixtures;


use ApiBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setId(804040);
        $category1->setTitle("Sonstige Umzugsleistungen");
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setId(802030);
        $category2->setTitle("Abtransport, Entsorgung und Entrümpelung");
        $manager->persist($category2);

        $manager->flush();
    }
}