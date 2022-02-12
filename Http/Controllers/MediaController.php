<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Entities\Media;
use Modules\Media\Http\Requests\UploadMediaRequest;
use Modules\Media\services\MediaService;

class MediaController extends Controller
{
    public function upload(UploadMediaRequest $request)
    {
        $media = MediaService::upload($request->file('media'));


        return response($media);
    }
}
