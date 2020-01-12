<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Traits\ResponseSupport;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param LoginRequest $request
     * @param AuthManager $authManager
     * @return JsonResponse|Response
     */
    public function __invoke(LoginRequest $request, AuthManager $authManager)
    {
        $validated = $request->validated();

        if(!$authManager->attempt($validated))
            return ResponseSupport::error(__('Invalid Credential'), 401);

        $token = $request->user()->createToken('Personal Access Token');

        return ResponseSupport::success(__('Login successful'), 200, $token->accessToken);
    }
}
