<?php

namespace App\Models\Maintenance;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;

class Branch extends Model
{
    protected $table = 'MUESUC';

    protected $primaryKey = 'SUC_CODIGO';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('SUC_ESTADO', function (Builder $builder) {
            $builder->where('SUC_ESTADO', 'A');
        });

        static::addGlobalScope('SUC_CIA', function (Builder $builder) {
            $builder->where('SUC_CIA', auth()->user()->USR_CIA);
        });
    }
}
