<?php

namespace App\Controller;

use App\Repository\ContactoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;;

class ContactoController extends AbstractController
{
    private $ContactoRepository;

    public function __construct(ContactoRepository $ContactoRepository)
    {
        $this->ContactoRepository = $ContactoRepository;
    }
    /**
     * @Route("/Contacto", name="add_Contacto",methods={"POST"})
     */

    public function add(Request $request): JsonResponse

    {
        $data=json_decode($request->getContent(), true);

        $name = $data['name'];
        $email = $data['email'];
        $subject = $data['subject'];
        $message= $data['message'];
        $date= $data['date'];
     
        $this ->ContactoRepository->saveContacto($data);
        return new JsonResponse(['status'=>'Contacto created'], Response::HTTP_CREATED);

    }
    /**
     * @Route("/Contacto/{id}", name="get_one_Contacto", methods={"GET"})
     */
    public function get($id): JsonResponse

    {
        $pet = $this->ContactoRepository->findOneBy(['id'=>$id]);
            $data[] = [
                'id'=> $pet->getId(),
                'name'=>$pet->getImg(),
                'email'=>$pet->getemail(),
                'subject'=>$pet->getmessage(),
                'message'=>$pet->getsubject(),
                'date'=>$pet->getDate(),
            ];

            return new JsonResponse($data, Response::HTTP_OK);
    }
    /**
     * @Route("/Contacto/", name="get_all_Contacto", methods={"GET"})
     */
    public function getAll(): JsonResponse

    {
        $pets = $this->ContactoRepository->findAll();
        $data =[];

        foreach ($pets as $pet) {
            $data[] = [
                'id'=> $pet->getId(),
                'name'=>$pet->getName(),
                'email'=>$pet->getEmail(),
                'subject'=>$pet->getSubject(),
                'message'=>$pet->getMessage(),
                'date'=>$pet->getDate(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
    /**
     * @Route("/Contacto/{id}", name="update_Contacto", methods={"PUT"})
     */
    public function update($id, Request $request): JsonResponse
    {
        $pet = $this->ContactoRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['name']) ? true : $pet->setImg($data['img']);
        empty($data['email']) ? true : $pet->setEmail($data['email']);
        empty($data['subject']) ? true : $pet->setSubject($data['subject']);
        empty($data['message']) ? true : $pet->setmessage($data['message']);
        empty($data['date']) ? true : $pet->setDate($data['date']);

        $updatedPet = $this->ContactoRepository->updatePet($pet);

        return new JsonRespponse(['status' => 'Contacto updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/Contacto/{id}", name="delete_Contacto", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    
    {
        $pet = $this->ContactoRepository->findOneBy(['id' => $id]);

        $this->ContactoRepository->removePet($pet);

        return new JsonResponse(['status'=> 'Contacto delete'], Response::HTTP_OK);
    }
   
     /**
     * @Route("/ContactoDate/{dt1}/{dt2}", name="get_all_ContactoDate", methods={"GET"})
     */
    public function getContactoDate($dt1,$dt2): JsonResponse

    {
        $pets = $this->ContactoRepository->findDate($dt1,$dt2);
        $data =[];

        foreach ($pets as $pet) {
            $data[] = [
                'id'=> $pet->getId(),
                'name'=>$pet->getName(),
                'email'=>$pet->getEmail(),
                'subject'=>$pet->getSubject(),
                'message'=>$pet->getMessage(),
                'date'=>$pet->getDate()->format('d-m-Y H:i:s'),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
