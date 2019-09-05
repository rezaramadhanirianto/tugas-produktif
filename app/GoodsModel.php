<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    protected $table = "goods";
    protected $guarded = ['id'];
}
