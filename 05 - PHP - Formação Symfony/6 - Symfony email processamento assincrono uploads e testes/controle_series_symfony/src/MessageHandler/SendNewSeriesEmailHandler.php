<?php

namespace App\MessageHandler;

use App\Message\SeriesWasCreated;
use App\Repository\UserRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class SendNewSeriesEmailHandler
{

    public function __construct(private UserRepository $userRepository,
    private MailerInterface $mailer)
    {
    }

    public function __invoke(SeriesWasCreated $messageEvent)
    {
        $users = $this->userRepository->findAll();
        $usersEmails = array_map(fn($user) => $user->getEmail(), $users);
        $series = $messageEvent->series;

        $email = (new Email())
            ->from('dudutheGoat@goatLand.com')
            ->to(...$usersEmails)
            ->subject('Nova série criada!')
            ->text("nova série adicionada ao nosso catálogo {$series->getName()}")
            ->html("<h1>Nova série!</h1><p>nova série adicionada ao nosso catálogo {$series->getName()}</p>");

        $this->mailer->send($email);
    }
}