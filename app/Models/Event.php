<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function store($request, $id = null){
        $event = $request->only(
            'type_sport',
            'date',
            'time',
            'staduim',
            'location',
        );
        if ($id) {
            $data = self::updateOrCreate(['id' => $id], $event);    //update data
        } else {
            $data = self::create($event);
            $id = $data->id;
        }
        return $event;
    }
    public function ticket(): HasMany{
        return $this->hasMany(Ticket::class);
    }

}
