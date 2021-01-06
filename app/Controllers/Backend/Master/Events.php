<?php namespace App\Controllers\Backend\Master;
use App\Controllers\BackendController;

class Events extends BackendController
{
	public $path_view   = "backend/master/events/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{

	}

	public function index()
	{
		$param['menu']			= $this->menu;
		$param['activeMenu']	= $this->activeMenu;

		if($param['activeMenu']['akses_lihat']=='0')
		{
			return redirect()->to('denied');	
		}
		
		$param['page'] = view($this->path_view . 'page-index');
        return view($this->theme, $param);
	}

}