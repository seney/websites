<?php
/**
 * Created by PhpStorm.
 * User: Chip Mong
 * Date: 10/10/2016
 * Time: 11:47 AM
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}