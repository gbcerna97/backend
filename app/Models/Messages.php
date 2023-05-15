<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'message';
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'message_id';

     /**
     * The table associated with the model.
     *
     * @var array
     */
    protected $fillable = [
        'message',
        'sender',
    ];
}
