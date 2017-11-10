<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    protected $table = 'image_uploads';
    protected $fillable = [
        'filename',
        'filesize',
        'height',
        'width'
    ];

    public function tag()
    {
        return $this->hasMany('App\ImagesTag', 'gallery_id', 'id');
    }

    public static function getTags($imageUploadId)
    {
        return ImageUpload::find($imageUploadId)->tag;
    }

}
