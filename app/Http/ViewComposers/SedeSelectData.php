<?php
namespace App\Http\ViewComposers;

use App\Models\Aula;
use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class SedeSelectData
{
	public function compose(View $view)
	{
		$sedes = Catalogo::Combo('SEDES')->orderBy('nombre')->pluck('nombre','id')->toarray();
		$view->with(compact('sedes'));
	}
}