<?php

namespace App\Models\Notification;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $table = 'dispatcher_sms';

    protected $fillable = [
        'client_id',
        'phone',
        'message',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
