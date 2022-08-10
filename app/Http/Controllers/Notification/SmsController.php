<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notification\CreateSmsRequest;
use App\Http\Requests\Notification\GetSmsRequest;
use App\Http\Responses\ApiResponse;
use App\Services\Notification\SmsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{

    public $service;

    public function __construct(SmsService $smsService)
    {
        $this->service = $smsService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('sms.index');
    }

    /**
     * @param CreateSmsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateSmsRequest $request)
    {
        try{
            $this->service
                ->create($request->all());
        }catch (\Exception $exception)
        {
            return redirect()->route('sms.index')
                ->with('error', 'Erro ao enviar sms'.$exception->getMessage());
        }

        return redirect()->route('sms.index')
            ->with('success', 'Sms enviado com sucesso');
    }

    /**
     * @param GetSmsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(GetSmsRequest $request)
    {
        try{
            $response = $this->service
                ->read($request->all());
        }catch (\Exception $exception)
        {
            return ApiResponse::error('','Failed get sms','400',$exception->getMessage());
        }

        return ApiResponse::success($response,'Sms received successfully');
    }
}
