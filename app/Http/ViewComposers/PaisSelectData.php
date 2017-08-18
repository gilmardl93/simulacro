<?php
namespace App\Http\ViewComposers;

use App\Models\Pais;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class PaisSelectData
{
	public function compose(View $view)
	{
		$pais = Pais::Activo()->orderBy('nombre')->pluck('nombre','id')->toarray();
		$view->with(compact('pais'));
	}
}