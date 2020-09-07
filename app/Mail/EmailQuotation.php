<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailQuotation extends Mailable
{
    use Queueable, SerializesModels;
    //public $quotationEmail;
    public $subject = "Cotización gasto de viaje";
    public $msg;

    public function __construct($msg/*QuotationEmail $quotationEmail*/)
    {
        //$this->quotationEmail = $quotationEmail;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.quotation_email');
    }
}