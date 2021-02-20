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
         $newCategoria = new Categoria ();
            $newCategoria
                ->setCategoria($data['categoria']);

        
          

        $this->manager->persist($newCategoria);
        $this->manager->flush();

    }  

    public function updatePet(Categoria $Categoria):Categoria
    
    {
        $this->manager>persist($Categoria);
        $this->manager->flush();

        return $Categoria;
    } 

    public function removePet(Categoria $Categoria):Categoria
    
    {
        $this->manager->remove($Categoria);
        $this->manager->flush();

        return $Categoria;
    }

    
}
    // /**
    //  * @return Categoria[] Returns an array of Categoria objects
    //  */
   
    