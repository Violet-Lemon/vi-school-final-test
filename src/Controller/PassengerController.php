<?php

namespace App\Controller;

use App\DTO\PassengerDTO;
use App\Entity\Passenger;
use App\Form\Type\PassengerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

            return $this->redirectToRoute('ticket.buy', [
                'id' => $passenger->getId(),
            ]);
        }

        return $this->renderForm('passenger/add.html.twig', [
            'form' => $form,
        ]);
    }

}