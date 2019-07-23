<?php

namespace App\Repository;

use App\Entity\Users;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository
{
    /** EntityManager $manager */
    private $manager;
    /** UserPasswordEncoderInterface $encoder */
    private $encoder;

    public function __construct(RegistryInterface $registry, UserPasswordEncoderInterface $encoder)
    {
        parent::__construct($registry, Users::class);
        $this->manager = $registry->getEntityManager();
        $this->encoder = $encoder;
    }

}
