<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use App\Models\Appointment; // Import the Appointment model

class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    /**
     * Create a new message instance.
     *
     * @param Appointment $appointment
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function build()
    {
        return $this
            ->from('your-email@example.com') // Set the sender's email address
            ->subject('Appointment Confirmation')
            ->view('emails.appointment-confirmation'); // Blade view for the email content
            return $this->view('emails.appointment-confirmation');
    }
}
