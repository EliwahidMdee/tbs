<?php
// Notification for doctor assignment
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PatientAssigned extends Notification
{
    use Queueable;

    private $patient;

    public function __construct($patient)
    {
        $this->patient = $patient;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new patient has been assigned to you.')
            ->action('View Patient', url('/patients/' . $this->patient->id))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'patient_id' => $this->patient->id,
            'message' => 'A new patient has been assigned to you.'
        ];
    }
}
