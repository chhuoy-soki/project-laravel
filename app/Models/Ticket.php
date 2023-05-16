<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'user_id',
        'event_id',
    ];
    public static function store($request, $id = null){
        $ticket = $request->only(
            'price',
            'user_id',
            'event_id',
        );
        if ($id) {
            $data = self::updateOrCreate(['id' => $id], $ticket);    //update data
        } else {
            $data = self::create($ticket);
            $id = $data->id;
        }
        return $ticket;
    }
    public function event(): BelongsTo{
        return $this->belongsTo(Event::class);
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
