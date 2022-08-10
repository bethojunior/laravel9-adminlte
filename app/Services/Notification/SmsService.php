<?php

namespace App\Services\Notification;

use App\Http\Requests\Notification\UpdateSmsRequest;
use App\Repositories\SmsRepository\SmsRepository;
use App\Models\Notification\Sms;

class SmsService
{
    public $repository;

    /**
     * @param SmsRepository $smsRepository
     */
    public function __construct(SmsRepository $smsRepository)
    {
        $this->repository = $smsRepository;
    }

    /**
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function create(array $params)
    {
        $params['status'] = false;
        return $this->repository
            ->create($params);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function read(array $params)
    {
        return Sms::where('status',$params['status'])
            ->limit($params['limit'])
            ->get();
    }

    public function update(UpdateSmsRequest $request)
    {

    }
}
