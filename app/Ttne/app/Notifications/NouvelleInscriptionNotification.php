<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NouvelleInscriptionNotification extends Notification
{
    use Queueable;


    public function __construct(
        public User $user
    )
    {

    }



    public function via(object $notifiable): array
    {
        return [
            'database',
            'mail',
        ];
    }



    public function toArray(object $notifiable): array
    {

        return [

            'type' => 'nouvelle_inscription',

            'titre' => 'Nouvelle demande d\'inscription',

            'message' => $this->user->name.' souhaite rejoindre la plateforme.',

            'user_id' => $this->user->id,

            'telephone' => $this->user->telephone,

            'email' => $this->user->email,

            'photo' => $this->user->photo,

            'date' => now(),

        ];

    }




    public function toMail(object $notifiable): MailMessage
    {

        return (new MailMessage)

            ->subject('Nouvelle demande d\'inscription')

            ->greeting('Bonjour,')

            ->line(
                'Une nouvelle demande d\'inscription nécessite votre validation.'
            )

            ->line(
                'Nom : '.$this->user->name
            )

            ->line(
                'Téléphone : '.$this->user->telephone
            )

            ->line(
                'Email : '.$this->user->email
            )

            ->action(
                'Voir la demande',
                route('admin.users.show',$this->user->id)
            )

            ->line(
                'Merci de procéder à la vérification.'
            );

    }

}
