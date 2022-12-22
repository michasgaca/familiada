<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    protected $table = "to_do_lists";

    protected $primaryKey = "id";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'day',
        'user_id',
        'description',
        'note',
        'priority',
        'timeStamp',
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
