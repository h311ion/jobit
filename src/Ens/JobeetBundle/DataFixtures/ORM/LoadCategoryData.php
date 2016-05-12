<?php
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ens\JobeetBundle\Entity\Category;

/**
 * Created by PhpStorm.
 * User: antonkozlov
 * Date: 12.05.16
 * Time: 8:42
 */
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $em
     */
    public function load(ObjectManager $em)
    {
        $design = new Category();
        $design->setName('design');

        $programming = new Category();
        $programming->setName('Programming');

        $manager = new Category();
        $manager->setName('Manager');

        $administrator = new Category();
        $administrator->setName('Administrator');

        $em->persist($design);
        $em->persist($programming);
        $em->persist($manager);
        $em->persist($administrator);

        $em->flush();

        $this->addReference('category-design', $design);
        $this->addReference('category-programming', $programming);
        $this->addReference('category-manager', $manager);
        $this->addReference('category-administrator', $administrator);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}