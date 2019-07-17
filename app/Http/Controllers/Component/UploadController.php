<?php

namespace App\Http\Controllers\Component;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function upload(Request $request)
    {
        $upload = $request->file;

        if ($upload->isValid()) {
            $path = $upload->store(date('ymd', 'attachment'));

            return ['code' => 200, 'message' => asset('attachment/' . $path)];
        }

        return ['code' => 4401, 'message' => '长传文件失败，文件大小不能超过2MB'];
    }

    public function filesLists()
    {
//        return
    }
}
