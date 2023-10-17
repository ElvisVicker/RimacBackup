<?php

namespace App\Mail;

use App\Models\Buyer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $buyer;
    public $id;
    public function __construct(Buyer $buyer, $id)
    {
        $this->buyer =  $buyer->where('buyers.id', '=', $id)
            ->select('buyers.*', 'cars.id as car_id', 'cars.name as car_name', 'cars.price as price')
            ->join('cars', 'cars.id', '=', 'car_id')->get();
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Approved from Rimac',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.mail_to_customer',
            with: ['buyer' => $this->buyer]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
