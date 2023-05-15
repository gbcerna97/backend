<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comment';
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'comment_id';

     /**
     * The table associated with the model.
     *
     * @var array
     */
    protected $fillable = [
        'comment',
        'commentator',
    ];
}
