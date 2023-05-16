<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id',
        'event_id',
    ];

    public static function store($request, $id = null){
        $eventTeam = $request->only(
            'team_id',
            'event_id',
        );
        if ($id) {
            $data = self::updateOrCreate(['id' => $id], $eventTeam);    //update data
        } else {
            $data = self::create($eventTeam);
            $id = $data->id;
        }
        return $eventTeam;
    }
    public function event(): BelongsTo{
        return $this->belongsTo(Event::class);
    }
    public function team(): BelongsTo{
        return $this->belongsTo(Team::class);
    }
}
