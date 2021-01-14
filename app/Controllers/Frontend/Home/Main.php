<?php namespace App\Controllers\Frontend\Home;
use App\Controllers\FrontendController;
use App\Models\Master\EventKategoriModel;
use App\Models\Master\EventsModel;

class Main extends FrontendController
{
	public $path_view 	= "frontend/home/";
	public $theme		= "pages/theme-frontend/render";

	public function __construct()
	{
		$this->EventKategoriModel 	= new EventKategoriModel();
		$this->EventsModel			= new EventsModel();
	}

	public function index()
	{
		$data['kategori']	= $this->EventKategoriModel->getJoin();
		$data['events']		= $this->EventsModel->orderBy('created_at','DESC')->findAll(9);
		$param['page'] 		= view($this->path_view.'page-index',$data);
		return view($this->theme, $param);
	}
}