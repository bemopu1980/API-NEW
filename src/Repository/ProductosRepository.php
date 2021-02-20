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
         $newProductos = new Productos();

        $newProductos
     
                ->setImg($data['img'])
                ->setMensaje($data['mensaje'])
                ->setTitle($data['title'])
                ->setDescription($data['description'])
                ->setTitle2($data['title2'])
                ->setDate($data['date'])
                ->setComments($data['comments'])
                ->setCreateby($data['createby'])
                ->setCategoria($data['categoria']);  

        $this->manager->persist($newProductos);
        $this->manager->flush();

    }  

    public function updatePet(Productos $Productos):Productos
    
    {
        $this->manager>persist($Productos);
        $this->manager->flush();

        return $Productos;
    } 

    public function removePet(Productos $Productos):Productos
    
    {
        $this->manager->remove($Productos);
        $this->manager->flush();

        return $Productos;
    }

     public function findProductos():array
    
    {
        $em=$this->getEntityManager();
        $query = $em->createQuery('SELECT p 
        FROM App\Entity\Productos p 
        JOIN p.categoria c');
        $result = $query->getResult();
        return $result; 
    } 
}
    // /**
    //  * @return Productos[] Returns an array of Productos objects
    //  */
    
  

