<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $request->validated();
        } catch (Exception $e) {
            Log::error("Register Failed", ['error' => $e->getMessage()]);
        }
    }
}
