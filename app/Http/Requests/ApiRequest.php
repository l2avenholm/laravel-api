<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ApiRequest extends FormRequest
{
    /**
     * Response in case of error happened.
     *
     * @param array $errors
     * @return JsonResponse
     */
    public function response(array $errors)
    {
        return new JsonResponse(['error' => $errors], 422);
    }
}
