<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_sport',
        'date',
        'time',
        'staduim',
        'location',
        'description',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function teams(): BelongsToMany{
        return $this->belongsToMany(Team::class, 'event_teams')->withTimestamps();
    }
    public function ticket(): HasMany{
        return $this->hasMany(Ticket::class);
    }

    public static function store($request, $id = null){
        $team = $request->only(
            'type_sport',
            'date',
            'time',
            'staduim',
            'location',
            'description',
        );
       
        $team = self::updateOrCreate(['id' => $id], $team);    //update data
        $teams = request('teams');
        $team->teams()->sync($teams);
        return $team;
    }
    
    
}
