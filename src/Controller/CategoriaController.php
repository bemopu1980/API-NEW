<?php

namespace App\Controller;
use App\Repository\CategoriaRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaController extends AbstractController
{
    private $CategoriaRepository;

    public function __construct(CategoriaRepository $CategoriaRepository)
    {
        $this->CategoriaRepository = $CategoriaRepository;
    }
    /**
     * @Route("/categoria", name="add_categoria", methods={"POST"})
     */
    public function add(Request $request): JsonResponse

    {
        $data=json_decode($request->getContent(), true);

        $categoria = $data['categoria'];

        
        $this ->CategoriaRepository->saveCategoria($data);
        return new JsonResponse(['status'=>'Pet created'], Response::HTTP_CREATED);
    }
     /**
     * @Route("/categoria/{id}", name="get_one_categoria", methods={"GET"})
     */
    public function get($id): JsonResponse

    {
        $pet = $this->CategoriaRepository->findOneBy(['id'=>$id]);
            $data = [
                'id'=> $pet->getId(),
                'categoria'=>$pet->getCategoria(),
            ];

            return new JsonResponse($data, Response::HTTP_OK);
    }
     /**
     * @Route("/categoria/{id}", name="update_categoria", methods={"PUT"})
     */
    public function update($id, Request $request): JsonResponse
    {
        $pet = $this->petRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['categoria']) ? true : $pet->setCategoria($data['categoria']);

        $updatedPet = $this->CategoriaRepository->updatePet($pet);

        return new JsonRespponse(['status' => 'Pet updated!'], Response::HTTP_OK);
    }
     /**
     * @Route("/categoria/{id}", name="delete_categoria", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    
    {
        $pet = $this->CategoriaRepository->findOneBy(['id' => $id]);

        $this->CategoriaRepository->removePet($pet);

        return new JsonResponse(['status'=> 'Pet delete'], Response::HTTP_OK);
    }

}
