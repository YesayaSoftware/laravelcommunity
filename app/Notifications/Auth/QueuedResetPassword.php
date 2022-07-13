<?php

namespace App\Notifications\Auth;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Auth\Notifications\ResetPassword;

class QueuedResetPassword extends ResetPassword implements ShouldQueue
{
    use Queueable;
}
