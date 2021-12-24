<?php

namespace App\Service;

use App\Entity\Ticket;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class TicketEmailSender
{
    private const SUBJECT_TITLE = 'Приобретен билет';
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendTicketInformation(Ticket $ticket): void
    {
        $preparedEmail = $this->prepareEmail($ticket);

        $this->mailer->send($preparedEmail);
    }

    private function prepareEmail(Ticket $ticket): TemplatedEmail
    {
        $email = new TemplatedEmail();
        $email->addTo(new Address('ticket-info@email.ru'))
            ->subject(self::SUBJECT_TITLE)
            ->htmlTemplate('email/email-success-registration.html.twig')
            ->context([
                'ticketId' => $ticket->getId(),
                'passenger' => $ticket->getPassenger()->getFullPassengerData(),
                'flight' => $ticket->getFlight()->getFlightData()
            ]);

        return $email;
    }

}