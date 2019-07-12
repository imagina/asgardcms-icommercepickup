<?php

namespace Modules\Icommercepickup\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class IcommercePickup extends Model
{
    use Translatable;

    protected $table = 'icommercepickup__icommercepickups';
    public $translatedAttributes = [];
    protected $fillable = [];
}
