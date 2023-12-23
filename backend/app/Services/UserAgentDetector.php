<?php

namespace App\Services;

use Stevebauman\Location\Facades\Location;
use Stevebauman\Location\Position;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\LoginInfo;
use App\Models\User;

class UserAgentDetector
{
    private Agent $agent;
    private Request $request;
    private bool|Position $clientPLace;

    public function __construct(Request $request)
    {
        $this->agent = new Agent();
        $this->request = $request;

        self::setClientAgent();
        self::definePlaceClientIp();
    }

    private function setClientAgent(): void
    {
        $this->agent->setUserAgent($this->request->userAgent());
    }

    private function definePlaceClientIp(): void
    {
        $this->clientPLace = Location::get($this->request->ip());
    }

    public function saveDataLoginInformation(): void
    {
        $userId = User::where('email', $this->request->get('email'))->value('id');

        if(null !== $userId) {
            $responseData = [
                'user_id' => $userId,
                'ip' => $this->request->ip(),
                'platform' => $this->agent->getUserAgent() ? $this->agent->platform() : null,
                'device' => $this->agent->getUserAgent() ?  $this->agent->device() : null,
                'browser' => $this->agent->getUserAgent() ? $this->agent->browser() : null,
                'robot' => $this->agent->robot(),
                'country' => $this->clientPLace ? $this->clientPLace->countryName : null,
                'city_name' => $this->clientPLace ? $this->clientPLace->cityName : null,
                'created_at' => now(),
            ];

            LoginInfo::insert($responseData);
        }
    }
}
