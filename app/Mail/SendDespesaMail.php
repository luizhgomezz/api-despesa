<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Despesa;

class SendDespesaMail extends Mailable
{
    use Queueable, SerializesModels;

    private Despesa $despesa;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Despesa $despesa)
    {
        $this->despesa = $despesa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Despesa Cadastrada');
        $this->to($this->despesa->user()->email, $this->despesa->user()->name);

        return $this->markdown('mail.despesa', [
            'despesa' => $this->despesa
        ]);
    }
}
