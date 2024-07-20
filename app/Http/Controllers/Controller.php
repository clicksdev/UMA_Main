<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function sendSms($mobile, $message)
    {
        $url = 'https://mora-sa.com/api/v1/sendsms';
        $params = [
            'api_key'  => 'fe2340aaa1dd15f33cf4b95b8333c8e9f18835ed',
            'username' => 'Soldout',
            'message'  => $message,
            'sender'   => 'Soldout',
            'numbers'  => $mobile,
        ];
        $response = Http::post($url, $params);
        return true;
    }

    public function mergeCarts($guestCart, $user)
    {
        $userCart = $user->cart()->first();
        if (!$userCart) {
            $guestCart->update(['uuid' => null, 'user_id' => $user->id]);
        } else {
            $guestCartProducts = $guestCart->cartProducts()->get();
            foreach ($guestCartProducts as $guestCartProduct) {
                $isExist = $userCart->cartProducts()->whereProductId($guestCartProduct->product_id)->first();
                $productPrice = $guestCartProduct->product->sale_price != null ? $guestCartProduct->product->sale_price : $guestCartProduct->product->regular_price;
                if ($isExist) {
                    $isExist->increment('qty', $guestCartProduct->qty);
                    $isExist->update(['piece_price' => $productPrice, 'quantity_price' => $isExist->qty * $productPrice]);
                } else {
                    $guestCartProduct->update(['cart_id' => $userCart->id]);
                }
            }
            $guestCart->clear();
        }
        return true;
    }


}
