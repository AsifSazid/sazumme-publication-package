<?php

namespace SazUmme\Publication\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



use App\Traits\Historiable;

class Division extends Model
{
    
    use SoftDeletes;
    
    
    use Historiable;
    protected $connection = 'golflinks';
    protected $table = 'divisions';
    protected $guarded = ['id'];
    

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function member()
    {
        return $this->belongsTo(\Baf\Afgl\Afgl\Models\Member::class);
    }
    
    ##ELOQUENTRELATIONSHIPMODEL##
}
