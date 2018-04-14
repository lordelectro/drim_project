<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    //
    public $fillable = [    'match_id',
                            'country_id',
                            'country_name',
                            'league_id',
                            'league_name',
                            'match_date',
                            'match_status',
                            'match_time',
                            'match_hometeam_name',
                            'match_hometeam_score',
                            'match_awayteam_name',
                            'match_awayteam_score',
                            'match_hometeam_halftime_score',
                            'match_awayteam_halftime_score'
                        ];

}
