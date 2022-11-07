<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\sendEmail;

class QueuEmail extends Controller
{
    public function QueuEmail()
    {
        $queuMails = new sendEmail();
        $this->dispatch($queuMails);
    }
}
