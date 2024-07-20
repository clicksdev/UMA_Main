<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Lang;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register the application's response macros.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('api', function ($status, $message = "", $errors = [], $data = [], $code = 200) {
            $response = [];
            $response['status']   = $status;
            if ($status) {
                $response['msg']  = Lang::get("api.$message");
                $response['data'] = $data;
            } else {
                $response['errors'] = (is_array($errors)) ? $errors : [Lang::get("api.$errors")];
            }
            return $this->json($response, $code);
        });
    }
}
