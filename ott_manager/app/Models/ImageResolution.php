<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageResolution extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'image_resolution';
    protected $primaryKey = 'id';

    function getImageDimension($size)
    {
        $data = ImageResolution::select('height', 'width')
            ->where('id', $size)
            ->where('status', '1')
            ->get();
        //print_r($data->toArray());
        $arr = [];
        foreach ($data->toArray() as $key => $value) {
            $arr['height'] = $value['height'];
            $arr['width'] = $value['width'];
        }
        return $arr;
    }
}
