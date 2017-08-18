<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Auth;
class MenuRole
{
	public function compose(View $view)
	{
		$rol = Auth::user()->rol;
		$view->with(compact('rol'));
	}
}