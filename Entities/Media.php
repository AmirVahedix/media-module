<?php

namespace Modules\Media\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Modules\Media\services\MediaService;

class Media extends Model
{
    use HasFactory;

    // region model config
    protected $table = 'media';

    protected $fillable = [
        "user_id",
        "path",
        "original_name",
        "type",
        "user_id",
    ];
    // endregion

    // region relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // endregion

    // region overrides
    protected static function booted()
    {
        static::deleting(function($media) {
            MediaService::delete($media);
        });
    }
    // endregion
}
