<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function send($message) {
        $qs = new QueueSenderEmail($message);
        $this->dispatch($qs);

        return redirect()
            ->back()
            ->with('mess', "Сообщение $message отправлено");
    }
}
