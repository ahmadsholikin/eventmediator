<?php namespace App\Controllers\Frontend\Event;
use App\Controllers\FrontendController;
use App\Models\Master\EventKategoriModel;
use App\Models\Master\EventsModel;

class Main extends FrontendController
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
		$inkategori = array();
		$type      	= "";
		$sort     	= "";
		$keyword   	= "";
		$price		= "";

		$data_event = $this->EventsModel;

		if(!empty($this->request->getGet('keyword')))
		{
			$keyword = $this->request->getGet('keyword');
			$data_event->like('event_nama', $keyword, 'both');
		}

		if(!empty($this->request->getGet('kategori[]')))
		{
			$inkategori = $this->request->getGet('kategori[]');
			$data_event->whereIn('event_kategori',$inkategori);
		}
		
		if(!empty($this->request->getGet('type')))
		{
			$type = $this->request->getGet('type');
			switch ($type) {
				case 'READY':
					$data_event->where('created_at > ',date('Y-m-d H:i:s'));
					break;
				default:
					$data_event->orderBy('event_nama','ASC');
					break;
			}
		}

		if(!empty($this->request->getGet('sort')))
		{
			$sort = $this->request->getGet('sort');
			switch ($sort) {
				case 'LATEST':
					$data_event->orderBy('created_at','DESC');
					break;
				case 'PRICE':
					$data_event->orderBy('event_harga','ASC');
					break;
				default:
					$data_event->orderBy('event_nama','ASC');
					break;
			}
		}

		if(!empty($this->request->getGet('price')))
		{
			$price = $this->request->getGet('price');
			switch ($price) {
				case 'free':
					$data_event->where('event_harga','0');
					break;
				default:
					$data_event->where('event_harga !=','0');
					break;
			}
		}

		$data_event->select('events.*, event_kategori.kategori_nama AS kategori');
		$data_event->join('event_kategori', 'event_kategori = kategori_id');

		$pager 				= \Config\Services::pager();
		$data['events']		= $data_event->paginate(6,'show');
		$data['pager']		= $data_event->pager;
		$data['inkategori'] = $inkategori;
		$data['keyword']    = $keyword;
		$data['type']       = $type;
		$data['sort']       = $sort;
		$data['price']      = $price;
		$data['kategori']	= $this->EventKategoriModel->get();

		$param['page'] 		= view($this->path_view.'page-index',$data);
		return view($this->theme, $param);
	}
}