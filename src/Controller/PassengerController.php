<?php

namespace App\Controller;

use App\DTO\PassengerDTO;
use App\Entity\Passenger;
use App\Form\Type\PassengerType;
use App\Repository\PassengerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/passenger")
 */
class PassengerController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/list", name="passenger.list")
     */
    public function getListAction(PassengerRepository $passengerRepository): Response
    {
        $passengerList = $passengerRepository->findAll();

        return $this->render('passenger/list.html.twig', [
            'passengerList' => $passengerList,
        ]);
    }

    /**
     * @Route("/show/{id}", name="passenger.show")
     */
    public function showAction(int $id, PassengerRepository $passengerRepository): Response
    {
        $passenger = $passengerRepository->findById($id);

        if (is_null($passenger)) {
            throw new NotFoundHttpException('Пассажир не найден');
        }

        return $this->renderForm('passenger/show.html.twig', [
            'passenger' => $passenger,
        ]);
    }

    /**
     * @Route("/add", name="passenger.add")
     */
    public function addAction(Request $request): Response
    {
        $passengerDto = new PassengerDTO();

        $form = $this->createForm(PassengerType::class, $passengerDto, [
            'action' => $this->generateUrl('passenger.add'),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $passenger = Passenger::createFromDTO($passengerDto);
            $this->entityManager->persist($passenger);
            $this->entityManager->flush();

            return $this->redirectToRoute('passenger.show', [
                'id' => $passenger->getId(),
            ]);
        }

        return $this->renderForm('passenger/add.html.twig', [
            'form' => $form,
        ]);
    }

}