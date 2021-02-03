<?php

namespace App\Controller;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }
    /**
     * @Route("/User", name="add_User",methods={"POST"})
     */

    public function add(Request $request): JsonResponse

    {
        $data=json_decode($request->getContent(), true);

        $username = $data['username'];
        $password = $data['password'];
       
        $this ->UserRepository->saveUser($data);
        return new JsonResponse(['status'=>'Pet created'], Response::HTTP_CREATED);

    }
    /**
     * @Route("/User/{id}", name="get_one_User", methods={"GET"})
     */
    public function get($id): JsonResponse

    {
        $pet = $this->UserRepository->findOneBy(['id'=>$id]);
            $data []= [
                'id'=> $pet->getId(),
                'username'=>$pet->getUsername(),
                'password'=>$pet->getPassword(),
            ];

            return new JsonResponse($data, Response::HTTP_OK);
    }
    /**
     * @Route("/User/", name="get_all_User", methods={"GET"})
     */
    public function getAll(): JsonResponse

    {
        $pets = $this->UserRepository->findAll();
        $data =[];

        foreach ($pets as $pet) {
            $data[] = [
                'id'=> $pet->getId(),
                'username'=>$pet->getUsername(),
                'password'=>$pet->getPassword(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
    /**
     * @Route("/User/{id}", name="update_User", methods={"PUT"})
     */
    public function update($id, Request $request): JsonResponse
    {
        $pet = $this->UserRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['username']) ? true : $pet->setUsername($data['username']);
        empty($data['password']) ? true : $pet->setPassword($data['password']);

        $updatedPet = $this->UserRepository->updatePet($pet);

        return new JsonRespponse(['status' => 'Pet updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/User/{id}", name="delete_User", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    
    {
        $pet = $this->UserRepository->findOneBy(['id' => $id]);

        $this->UserRepository->removePet($pet);

        return new JsonResponse(['status'=> 'Pet delete'], Response::HTTP_OK);
    }

}

