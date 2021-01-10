<?php namespace App\Controllers\Frontend\Event;
use App\Controllers\FrontendController;
use App\Models\Master\EventKategoriModel;
use App\Models\Master\EventsModel;

class Category extends FrontendController
{
	public $path_view 	= "frontend/event/";
	public $theme		= "pages/theme-frontend/render";

	public function __construct()
	{
		$this->EventKategoriModel 	= new EventKategoriModel();
		$this->EventsModel			= new EventsModel();
	}

	public function index()
	{
        $id = $this->request->getGet('kategori_id');
		$data['kategori']	= $this->EventKategoriModel->get();
		$data['events']		= $this->EventsModel->get(['event_kategori'=>$id]);
		$param['page'] 		= view($this->path_view.'page-category',$data);
		return view($this->theme, $param);
	}
}