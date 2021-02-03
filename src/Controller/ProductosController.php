<?php

namespace App\Controller;
use App\Repository\ProductosRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProductosController extends AbstractController
{
    private $ProductosRepository;

    public function __construct(ProductosRepository $ProductosRepository)
    {
        $this->ProductosRepository = $ProductosRepository;
    }
    /**
     * @Route("/productos", name="add_productos",methods={"POST"})
     */

    public function add(Request $request): JsonResponse

    {
        $data=json_decode($request->getContent(), true);

        $img = $data['img'];
        $mensaje = $data['mensaje'];
        $title = $data['title'];
        $description= $data['description'];
        $title2= $data['title2'];
        $date= $data['date'];
        $comments = $data['comments'];
        $createby = $data['createby'];
        $categoria = $data['categoria'];

        
        $this ->ProductosRepository->saveProductos($data);
        return new JsonResponse(['status'=>'Pet created'], Response::HTTP_CREATED);

    }
    /**
     * @Route("/productos/{id}", name="get_one_productos", methods={"GET"})
     */
    public function get($id): JsonResponse

    {
        $pet = $this->ProductosRepository->findOneBy(['id'=>$id]);
            $data[] = [
                'id'=> $pet->getId(),
                'img'=>$pet->getImg(),
                'mensaje'=>$pet->getMensaje(),
                'description'=>$pet->getDescription(),
                'title'=>$pet->getTitle(),
                'date'=>$pet->getDate(),
                'comments'=>$pet->getComments(),
                'createby'=>$pet->getCreateby(),
                'categoria'=>$pet->getCategoria(),
            ];

            return new JsonResponse($data, Response::HTTP_OK);
    }
    /**
     * @Route("/productos/", name="get_all_productos", methods={"GET"})
     */
    public function getAll(): JsonResponse

    {
        $pets = $this->ProductosRepository->findAll();
        $data =[];

        foreach ($pets as $pet) {
            $data[] = [
                'id'=> $pet->getId(),
                'img'=>$pet->getImg(),
                'mensaje'=>$pet->getMensaje(),
                'title'=>$pet->getTitle(),
                'description'=>$pet->getDescription(),
                'title2'=>$pet->getTitle2(),
                'date'=>$pet->getDate(),
                'comments'=>$pet->getComments(),
                'createby'=>$pet->getCreateby(),
                'categoria'=>$pet->getCategoria(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
    /**
     * @Route("/productos/{id}", name="update_productos", methods={"PUT"})
     */
    public function update($id, Request $request): JsonResponse
    {
        $pet = $this->ProductosRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['img']) ? true : $pet->setImg($data['img']);
        empty($data['mensaje']) ? true : $pet->setMensaje($data['mensaje']);
        empty($data['title']) ? true : $pet->setTitle($data['title']);
        empty($data['description']) ? true : $pet->setDescription($data['description']);
        empty($data['title2']) ? true : $pet->setTitle2($data['title2']);
        empty($data['date']) ? true : $pet->setDate($data['date']);
        empty($data['comments']) ? true : $pet->setComments($data['comments']);
        empty($data['createby']) ? true : $pet->setCreateby($data['createby']);
        empty($data['categoria']) ? true : $pet->setCategoria($data['categoria']);

        $updatedPet = $this->ProductosRepository->updatePet($pet);

        return new JsonRespponse(['status' => 'Pet updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/productos/{id}", name="delete_productos", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    
    {
        $pet = $this->ProductosRepository->findOneBy(['id' => $id]);

        $this->ProductosRepository->removePet($pet);

        return new JsonResponse(['status'=> 'Pet delete'], Response::HTTP_OK);
    }

     /**
     * @Route("/productos/categoria/{categoria}", name="filter_productos", methods={"GET"})
     * 
     */

    public function getFilter($categoria):JsonResponse

    {
        $categoria = $this->ProductosRepository-> findProductos($categoria);

        echo json_encode(($categoria));

        return new JsonResponse(['status'=> 'Categoria'], Response::HTTP_OK);
    }
}
