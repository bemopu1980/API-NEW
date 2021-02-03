<?php

namespace App\Repository;

use App\Entity\Categoria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Categoria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categoria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categoria[]    findAll()
 * @method Categoria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $manager)
    {
        parent::__construct($registry, Categoria::class);
        $this->manager= $manager;
    }
    public function saveCategoria($data)

    {
         $newPet = new Pet();

        $newPet
                ->setCategoria = ($categoria);  

        $this->manager->persist($newPet);
        $this->manager->flush();

    }  

    public function updatePet(Categoria $pet):Categoria
    
    {
        $this->manager>persist($pet);
        $this->manager->flush();

        return $pet;
    } 

    public function removePet(Categoria $pet):Categoria
    
    {
        $this->manager->remove($pet);
        $this->manager->flush();

        return $pet;
    }

    
}
    // /**
    //  * @return Categoria[] Returns an array of Categoria objects
    //  */
   
    