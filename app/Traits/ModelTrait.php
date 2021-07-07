<?php

namespace App\Traits;

use DB;
use Illuminate\Database\Eloquent\Builder;
use Schema;


/**
 * Trait ModelTrait
 * @package App\Traits
 * @method void|static search($query)
 */
trait ModelTrait
{



	public function persist($data, $save = true)
	{
		foreach ($data as $key => $value)
		{
			$this->$key = $value;
		}

		if ($save)
		{
			$this->save();
		}

		return $this;
	}


}
