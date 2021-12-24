<?php

namespace App\Controller;

use App\DTO\TicketDTO;
use App\Entity\Ticket;
use App\Form\Type\TicketType;
use App\Repository\FlightRepository;
use App\Repository\TicketRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ticket")
 */
class TicketController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

//    /**
//     * @Route("/list", name="ticket.list")
//     */
//    public function getListAction(TicketRepository $ticketRepository): Response
//    {
//        $ticketList = $ticketRepository->findAll();
//
//        return $this->render('ticket/list.html.twig', [
//            'ticketList' => $ticketList,
//        ]);
//    }

    /**
     * @Route("/show/{id}", name="ticket.show")
     */
    public function showAction(int $id, TicketRepository $ticketRepository): Response
    {
        $ticket = $ticketRepository->findById($id);

        if (is_null($ticket)) {
            throw new NotFoundHttpException('Билет не найден');
        }

        return $this->renderForm('ticket/show.html.twig', [
            'ticket' => $ticket,
            'flight' => $ticket->getFlight()->getFlightData(),
            'passenger' => $ticket->getPassenger()->getFullPassengerData()
        ]);
    }

    /**
     * @Route("/add", name="ticket.add")
     */
    public function addAction(Request $request, FlightRepository $flightRepository): Response
    {
        $ticketDto = new TicketDTO();
        $activeFlights = $flightRepository->findBy((['status' => 'активен']));

        $form = $this->createForm(TicketType::class, $ticketDto, [
            'action' => $this->generateUrl('ticket.add'),
            'activeFlights' => $activeFlights
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ticket = Ticket::createFromDTO($ticketDto);
            $this->entityManager->persist($ticket);
            $this->entityManager->flush();

            return $this->redirectToRoute('ticket.show', [
                'id' => $ticket->getId(),
            ]);
        }

        return $this->renderForm('ticket/add.html.twig', [
            'form' => $form,
        ]);
    }

}