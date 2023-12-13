<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function success($podaci, $poruka = null)
    {
        return response()->json([
            'status' => 'success',
            'data' => $podaci,
            'message' => $poruka,
        ], 200);
    }

    public function error($poruka, $errors,  $status = 404)
    {
        return response()->json([
            'status' => 'error',
            'message' => $poruka,
            'errors' => $errors,
        ], $status);
    }
}
