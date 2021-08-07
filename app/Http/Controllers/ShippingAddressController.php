<?php

namespace App\Http\Controllers;

use App\DeliveryAddress;
use App\Http\Requests\ShippingAddressRequest;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ShippingAddressController extends Controller
{
    public function store(ShippingAddressRequest $request)
    {
        $addresses = $request->all();
        try {
            $newAddress = DeliveryAddress::create($addresses);
            if ($newAddress) return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            Log::error($e);
            throw new BadRequestHttpException();
        }
    }
}
