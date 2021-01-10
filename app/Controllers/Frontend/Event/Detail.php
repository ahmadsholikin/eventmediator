<?php namespace App\Controllers\Frontend\Event;
use App\Controllers\FrontendController;
use App\Models\Master\EventKategoriModel;
use App\Models\Master\EventsModel;

class Detail extends FrontendController
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
        $id = $this->request->getGet('id');
		$data['kategori']	= $this->EventKategoriModel->get();
		$data['events']		= $this->EventsModel->get(['event_id'=>$id]);
		$param['page'] 		= view($this->path_view.'page-detail',$data);
		return view($this->theme, $param);
	}
}