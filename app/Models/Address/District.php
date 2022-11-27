<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'districts';

    protected $fillable = ['id', 'name_np', 'name_en', 'provience_id'];
    
    public static function getName($id)
    {
    	$datas = Parent::select('name_np')->where('id', $id)->first();
    	if ($datas)
    		return $datas->name_np;
		else
			return '';
	}
}
