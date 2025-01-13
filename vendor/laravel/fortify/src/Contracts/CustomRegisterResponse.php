<?php

namespace Laravel\Fortify\Contracts;

use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Redirect;

class CustomRegisterResponse implements RegisterResponse
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return Redirect::to($this->url);
    }
}
