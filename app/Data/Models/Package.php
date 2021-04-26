<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'travel_destination_id',
        'description',
        'cover_photo',
        'added_by'
    ];

    public function travel_destination()
    {
        return $this->belongsTo(TravelDestination::class);
    }

    public function scopeFilterBy($query,$filters){
        $query->when(isset($filters['search']), function ($query) use ($filters){
            $query->where('description', 'like', '%'.$filters['search'].'%');
        });
    }
}
