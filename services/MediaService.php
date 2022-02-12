<?php


namespace Modules\Media\services;


use Illuminate\Support\Facades\Storage;
use Modules\Media\Entities\Media;

class MediaService
{
    public static function upload($file)
    {
        $original_name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $filename = uniqid().".".$extension;

        $media = self::storeDatabaseRecord($filename, $original_name, $extension);

        Storage::disk('public')->putFileAs('/', $file, $filename);

        return $media;
    }

    public static function delete($media)
    {
        Storage::disk('public')->delete($media->path);
    }

    private static function storeDatabaseRecord(string $filename, $original_name, $extension)
    {
        return Media::query()->create([
            'user_id' => auth()->id() ?? null,
            'path' => $filename,
            'original_name' => $original_name,
            'type' => getFileType($extension),
        ]);
    }
}
