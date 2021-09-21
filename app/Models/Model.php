<?php

namespace App\Models;

use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as BaseModel;

abstract class Model extends BaseModel
{
    use CastsEnums, SoftDeletes;
}