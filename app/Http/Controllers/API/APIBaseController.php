<?php
namespace App\http\Controllers\API;

use App\http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class APIBaseController extends Controller 
{
    // สร้างฟังก์ชันในการแสดงข้อมูลเมื่อทำงานสำเร็จ
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    // สร้างฟังก์ชันแสดงข้อมูลเมื่อมีข้อผิดพลาด
    public function sendError($error, $errorMessage = [], $code =404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if(!emply($errorMessage)){
            $response['data'] = $errorMessage;
        }
        return response()->json($response, $code);
    }


}