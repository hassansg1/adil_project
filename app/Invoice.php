<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table = 'invoices';

    protected $guarded = null;

    protected $appends = ['file','file_name'];

    public function getFileAttribute()
    {
        return 'files/'.$this->getFileNameAttribute();
    }


    public function getFileNameAttribute()
    {
        return date('F',strtotime($this->activity_date))."-".date('Y',strtotime($this->activity_date)).".csv";
    }

    public static $dateFormatDefault = "d/m/Y";
}
