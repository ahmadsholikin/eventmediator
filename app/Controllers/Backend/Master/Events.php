<?php namespace App\Controllers\Backend\Master;
use App\Controllers\BackendController;
use App\Models\Master\EventsModel;
use App\Models\Master\EventKategoriModel;

class Events extends BackendController
{
	public $path_view   = "backend/master/events/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
		$this->session     	    	= session();
		$this->EventsModel 			= new EventsModel();
		$this->EventKategoriModel 	= new EventKategoriModel();
	}

	public function index()
	{
		$data['data']        	= $this->EventsModel->getJoin();
		$param['menu']			= $this->menu;
		$param['activeMenu']	= $this->activeMenu;
		
		if($param['activeMenu']['akses_lihat']=='0')
		{
			return redirect()->to('denied');	
		}
		
		$param['page'] = view($this->path_view . 'page-index', $data);
        return view($this->theme, $param);
	}

	public function add()
    {
		$data['event_kategori'] = $this->EventKategoriModel->get();
        $param['menu']       	= $this->menu;
        $param['activeMenu'] 	= $this->activeMenu;

        if ($param['activeMenu']['akses_tambah'] == '0')
        {
            return redirect()->to('denied');
        }

        $data['validation'] = \Config\Services::validation();
        $param['page']      = view($this->path_view . 'page-add',$data);
        return view($this->theme, $param);
	}

	public function edit() 
    {
        $id          = $this->request->getGet('id');
        $data['row'] = $this->EventsModel->get(['event_id' => $id]);
        
        if (empty($data['row']))
        {
            return redirect()->to(base_url() . '/404');
        }

		$data['event_kategori']     = $this->EventKategoriModel->get();
        $param['menu']       		= $this->menu;
        $param['activeMenu'] 		= $this->activeMenu;

        if ($param['activeMenu']['akses_ubah'] == '0')
        {
            return redirect()->to('denied');
        }

        $data['validation'] = \Config\Services::validation();
        $param['page']      = view($this->path_view . 'page-edit', $data);
        return view($this->theme, $param);
    }
	
	public function insert()
	{
		$data['event_nama']      = entitiestag($this->request->getPost('event_nama'));
		$data['event_kategori']  = entitiestag($this->request->getPost('kategori_id'));
		$data['event_deskripsi'] = $this->request->getPost('event_deskripsi');
		$data['event_harga']     = entitiestag($this->request->getPost('event_harga'));
		$data['event_mulai']     = tanggal_Ymd(entitiestag($this->request->getPost('event_mulai')));
		$data['event_selesai']   = tanggal_Ymd(entitiestag($this->request->getPost('event_selesai')));
		$data['event_kuota']     = entitiestag($this->request->getPost('event_kuota'));
		
		//proses validasi
		if(!$this->validate([
			'event_nama' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Wajib Diisikan',
				]
			],
			'event_deskripsi' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Wajib Diisikan',
				]
			],
			'event_harga' => [
				'rules'  => 'required|numeric',
				'errors' => [
					'required' => 'Wajib Diisikan',
					'numeric'  => 'Entri harus diisikan bentuk angka nominal',
				]
			],
			'event_kuota' => [
				'rules'  => 'required|numeric',
				'errors' => [
					'required' => 'Wajib Diisikan',
					'numeric'  => 'Entri harus diisikan bentuk angka nimonal',
				]
			],
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->back()->withInput()->with('validation',$validation);
		}

		//upload gambar
		if (!empty($_FILES['event_gambar']['name']))
        {
            $data['event_gambar'] = $this->request->getFile('event_gambar')->store('events');
		}

		$this->EventsModel->insert($data);
		return redirect()->to(backend_url() . '/event');
		
	}

	public function update()
	{
		$id = $this->request->getPost('event_id');

		$data['event_nama']      = entitiestag($this->request->getPost('event_nama'));
		$data['event_kategori']  = entitiestag($this->request->getPost('kategori_id'));
		$data['event_deskripsi'] = $this->request->getPost('event_deskripsi');
		$data['event_harga']     = entitiestag($this->request->getPost('event_harga'));
		$data['event_mulai']     = tanggal_Ymd(entitiestag($this->request->getPost('event_mulai')));
		$data['event_selesai']   = tanggal_Ymd(entitiestag($this->request->getPost('event_selesai')));
		$data['event_kuota']     = entitiestag($this->request->getPost('event_kuota'));

		if(!$this->validate([
			'event_nama' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Wajib Diisikan',
				]
			],
			'event_deskripsi' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Wajib Diisikan',
				]
			],
			'event_harga' => [
				'rules'  => 'required|numeric',
				'errors' => [
					'required' => 'Wajib Diisikan',
					'numeric'  => 'Entri harus diisikan bentuk angka nominal',
				]
			],
			'event_kuota' => [
				'rules'  => 'required|numeric',
				'errors' => [
					'required' => 'Wajib Diisikan',
					'numeric'  => 'Entri harus diisikan bentuk angka nimonal',
				]
			],
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->back()->withInput()->with('validation',$validation);
		}

		//upload gambar
		if (!empty($_FILES['event_gambar']['name']))
        {
            $data['event_gambar'] = $this->request->getFile('event_gambar')->store('events');
		}

		$this->EventsModel->update($id, $data);
        return redirect()->to(backend_url() . '/event');
	}

	public function delete()
    {
        $param['activeMenu'] = $this->activeMenu;
        
        if ($param['activeMenu']['akses_hapus'] == '0')
        {
            return redirect()->to('denied');
        }

        $id = $this->request->getGet('id');
        $this->EventsModel->delete($id);
        return redirect()->to(backend_url() . '/event');
    }

}