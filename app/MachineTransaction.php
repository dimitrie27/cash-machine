<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineTransaction extends Model
{
    protected $fillable = [
        'totalAmount', 'inputs'
    ];
}
