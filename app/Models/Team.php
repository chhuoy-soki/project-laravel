<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_name',
        'member',
    ];
    public static function store($request, $id = null){
        $ticket = $request->only(
            'team_name',
            'member',
        );
        if ($id) {
            $data = self::updateOrCreate(['id' => $id], $ticket);    //update data
        } else {
            $data = self::create($ticket);
            $id = $data->id;
        }
        return $ticket;
    }
    public function teams(): BelongsToMany{
        return $this->belongsToMany(Event::class, 'event_teams')->withTimestamps();

    }
}
