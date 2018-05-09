<?php


namespace App\Traits;


trait DoesResponses
{
    /**
     * Return an error response
     *
     * @param string $info
     * @param string $error
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($error = '',$info = '',$status = 400){
        return response()->json([
            'status' => 'ERROR',
            'error' => $error,
            'info' => $info
        ],$status);
    }

    /**
     * Return an success response with info.
     *
     * @param string $info
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($info = '',$status = 200){
        return response()->json([
            'status' => 'OK',
            'info' => $info
        ],$status);
    }
}