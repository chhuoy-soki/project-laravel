<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
