<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Language extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'mysql2';
    protected $table = 'language';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'partner_id',
        'code',
        'status',
        'type',
        'subtitle',
        'audio',
    ];

    public function languageAudio()
    {
        $pid = Auth::user()->publisherID;
        $sub_title = Language::where('partner_id', $pid)
            ->where('status', '=', '1')
            ->where('subtitle', '!=', '0')
            ->sum('subtitle');
        $audio = Language::where('partner_id', $pid)
            ->where('status', '=', '1')
            ->where('audio', '!=', '0')
            ->sum('audio');
        return $data = ['subtitle' => $sub_title, 'audio' => $audio];
    }
}
