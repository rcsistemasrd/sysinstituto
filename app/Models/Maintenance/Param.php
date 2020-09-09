<?php

namespace App\Models\Maintenance;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;

class Param extends Model
{
    protected $table = 'preparam';

    // protected $primaryKey = 'rec_numero';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('par_cia', function (Builder $builder) {
            $builder->where('par_cia', auth()->user()->usr_cia);
        });

        // static::addGlobalScope('order_by', function (Builder $builder) {
        //     $builder->orderBy('pre_codigo', 'asc');
        // });
    }
}
