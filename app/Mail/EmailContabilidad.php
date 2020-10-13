<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailContabilidad extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Confirmación datos del viaje";
    public $msg;
    public $datos;

    public function __construct($msg, $datos)
    {
        $this->msg = $msg;
        $this->datos = $datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contabiidad_email');
    }
}
