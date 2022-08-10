<?php

namespace App\Repositories\SmsRepository;

use App\Contracts\Repository\AbstractRepository;
use App\Models\Notification\Sms;

class SmsRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->setModel(Sms::class);
    }

}
