<?php

namespace App\Repository;

use App\Entity\Productos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @method Productos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Productos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Productos[]    findAll()
 * @method Productos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductosRepository extends ServiceEntityRepository

{
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $manager)

    {
        parent::__construct($registry, Productos::class);
        $this->manager= $manager;
    }

    public function saveProductos($data)

    {
         $newPet = new Pet();

        $newPet
                ->setImg = ($img)
                ->setmMensaje = ($mensaje)
                ->setTitle = ($title)
                ->setDescription = ($description)
                ->setTitle2 = ($title2)
                ->setDate = ($date)
                ->setComments = ($comments)
                ->setCreateby = ($createby)
                ->setCategoria = ($categoria);  

        $this->manager->persist($newPet);
        $this->manager->flush();

    }  

    public function updatePet(Pet $pet):Pet
    
    {
        $this->manager>persist($pet);
        $this->manager->flush();

        return $pet;
    } 

    public function removePet(Pet $pet):Pet
    
    {
        $this->manager->remove($pet);
        $this->manager->flush();

        return $pet;
    }

    
} 
    // /**
    //  * @return Productos[] Returns an array of Productos objects
    //  */
    /*
  


