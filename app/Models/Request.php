<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

    protected $table = 'requests';

    protected $fillable = [

        'user_created_at',
        'user_closed_at',
        'name',
        'email',
        'phone',
        'requestTitle',
        'requestDescription',
        'status',
        'requestReply',
        'upload_path'


    ];

}
