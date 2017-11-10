<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesTag extends Model
{
    protected $table = 'tags';
    protected $fillable = [
      'gallery_id',
      'tags'
    ];

    public function imageUpload()
    {
        return $this->belongsTo('App\ImageUpload', 'id', 'id');
    }

}
