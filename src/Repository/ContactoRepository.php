<?php

namespace App\Repository;

use App\Entity\Contacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Contacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contacto[]    findAll()
 * @method Contacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $manager)
    {
        parent::__construct($registry, Contacto::class);
        $this->manager= $manager;
    }

    public function saveContacto($data)    

    {
         $newPet = new Contacto();

        $newPet
                ->setNombre = ($nombre)
                ->setEmail = ($email)
                ->setSubject= ($subject)
                ->setMessage = ($message)
                ->setDate = ($date);
               

        $this->manager->persist($newPet);
        $this->manager->flush();

    }  

    public function updatePet(Contacto $pet):Contacto
    
    {
        $this->manager>persist($pet);
        $this->manager->flush();

        return $pet;
    } 

    public function removePet(Contacto $pet):Contacto
    
    {
        $this->manager->remove($pet);
        $this->manager->flush();

        return $pet;
    }

    public function findDate($dt1,$dt2):array
    {
        $sq = $this->createQueryBuilder('d')
        ->where('d.date > :min')
        ->andwhere('d.date < :max')
        ->setParameter('min',$dt1)
        ->setParameter('max',$dt2);
        $query =$sq->getQuery();
        return $query->execute();
    } 

    // /**
    //  * @return Contacto[] Returns an array of Contacto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contacto
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
