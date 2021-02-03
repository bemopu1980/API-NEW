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
         $newPet = new Productos();

        $newPet
                ->setImg = ($img)
                ->setMensaje = ($mensaje)
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

    public function updatePet(Productos $pet):Productos
    
    {
        $this->manager>persist($pet);
        $this->manager->flush();

        return $pet;
    } 

    public function removePet(Productos $pet):Productos
    
    {
        $this->manager->remove($pet);
        $this->manager->flush();

        return $pet;
    }

     public function findProductos($categoria)
    
    {
        $query = $this->manager->createQuery('SELECT p 
        FROM App\Entity\Productos p 
        JOIN App\Entity\Categoria c
        WHERE (p.categoria = c.id) 
        AND (c.categoria = :categoria)');
        $query->setParameter("categoria",$categoria);
        $result = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        return $result; 
    } 
}
    // /**
    //  * @return Productos[] Returns an array of Productos objects
    //  */
    
  


