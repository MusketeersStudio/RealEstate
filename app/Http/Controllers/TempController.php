<?php

namespace App\Http\Controllers;

use App\Traits\DoesResponses;
use Illuminate\Http\Request;

class TempController extends Controller
{
    use DoesResponses;

    public function storeTempPic(Request $request){
        $path = 'public/temp';

        $fileName = explode('.',$request->file('tempImage')->getClientOriginalName());
        $extension = $request->file('tempImage')->getClientOriginalExtension();

        //filename to store
        $fileNameToStore = $fileName[0] . '_' . time() .'.'. $extension;

        $request->file('tempImage')->storeAs($path,$fileNameToStore);

        return $this->successResponse(
            ['location'=>$path . '/' .$fileNameToStore]
        );
    }

    public function storeTempDoc(Request $request){
        $path = 'public/temp';

        $fileName = explode('.',$request->file('tempDoc')->getClientOriginalName());
        $extension = $request->file('tempDoc')->getClientOriginalExtension();
        $size = $request->file('tempDoc')->getClientSize();

        //filename to store
        $fileNameToStore = $fileName[0] . '_' . time() .'.'. $extension;

        $request->file('tempDoc')->storeAs($path,$fileNameToStore);

        return $this->successResponse([
            'location'=>$path . '/' .$fileNameToStore,
            'size' => $size,
            'type' => $extension
        ]);
    }
}
