<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'provinces';

    protected $fillable = ['id', 'name_np', 'name_en'];

    public static function getName($id)
    {
    	$datas = Parent::select('name_np')->where('id', $id)->first();
    	if ($datas)
    		return $datas->name_np;
		else
			return '';
	}
}
