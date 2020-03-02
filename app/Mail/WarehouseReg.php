<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WarehouseReg extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $warehouse;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $warehouse)
    {
        $this->user = $user;
        $this->warehouse = $warehouse;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Warehouse Registration')
                    ->markdown('emails.warehouseReg')
                     ->with([
                        'user' => $this->user,
                        'warehouse' => $this->warehouse
                    ]);
    }
}
