<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RecipeRepository extends ServiceEntityRepository
{
    /** EntityManager $manager */
    private $manager;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Recipe::class);
        $this->manager = $registry->getEntityManager();
    }

    public function getIds($param)
    {
        return $this->createQueryBuilder('r')
                    ->where('r.owner = :owner')
                    ->setParameter('owner', $param)
                    ->addSelect('r.id')
                    ->getQuery()
                    ->getResult();

    }
}
