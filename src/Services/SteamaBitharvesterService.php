<?php

namespace Inensus\SteamaMeter\Services;

use Inensus\SteamaMeter\Http\Requests\SteamaMeterApiRequests;

class SteamaBitharvesterService
{
    private $steamaApi;
    private $rootUrl = '/bitharvesters';

    public function __construct(
        SteamaMeterApiRequests $steamaApi
    ) {
        $this->steamaApi = $steamaApi;
    }

    public function getBitharvester($siteId)
    {
        $result = $this->steamaApi->get($this->rootUrl);
        $bitHarvesters = $result['results'];

        return array_values(array_filter($bitHarvesters, function ($obj) use ($siteId) {
            return $obj["site"] === $siteId;
        }))[0] ;
    }
}
