<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchlive extends Model
{
    use HasFactory;
      protected $fillable = [
        'team_one_image_type',
        'team_one_url',
        'team_one_image',
        'team_two_name',
        'team_two_image_type',
        'team_two_url',
        'team_two_image',
        'match_title',
        'match_time',
        'match_date',
    ];
}
