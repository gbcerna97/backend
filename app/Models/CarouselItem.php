<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselItem extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carousel_item';
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

     /**
     * The table associated with the model.
     *
     * @var array
     */
    protected $fillable = [
        'carousel_name',
        'image_path',
        'description',
        'user_id',
    ];

    
}
