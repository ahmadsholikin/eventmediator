<?php namespace App\Controllers\Backend\Master;
use App\Controllers\BackendController;
use App\Models\Master\EventKategoriModel;

class EventKategori extends BackendController
{
	public $path_view   = "backend/master/event-kategori/";
	public $theme       = "pages/theme-backend/render";
	
	public function __construct()
	{
        $this->session     	        = session();
        $this->EventKategoriModel   = new EventKategoriModel();
	}

	public function index()
    {
        $data['data']        = $this->EventKategoriModel->get();
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_lihat'] == 'default value')
        {
            return redirect()->to('denied');
        }

        $param['page'] = view($this->path_view . 'page-index', $data);
        return view($this->theme, $param);
    }

    public function add()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

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
        $data['row'] = $this->EventKategoriModel->get(['kategori_id' => $id]);
        
        if (empty($data['row']))
        {
            return redirect()->to(base_url() . '/404');
        }

        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

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
        $data['kategori_nama'] = entitiestag($this->request->getPost('kategori_nama'));

        //proses validasi
        if(!$this->validate([
			'kategori_nama' => [
			    'rules'     => 'required',
			    'errors'    => [
	                'required' 		=> 'Wajib diisikan',
			    ]
			],
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->back()->withInput()->with('validation',$validation);
		}
        
        $this->EventKategoriModel->insert($data);
        return redirect()->to(backend_url() . '/kategori-event');
    }

    public function update()
    {
        $id = entitiestag($this->request->getPost('kategori_id'));

        $data['kategori_nama']  =  entitiestag($this->request->getPost('kategori_nama'));

        //proses validasi
        if(!$this->validate([
			'kategori_nama' => [
			    'rules'     => 'required',
			    'errors'    => [
	                'required' 		=> 'Wajib diisikan',
			    ]
			],
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->back()->withInput()->with('validation',$validation);
        }
        
        $this->EventKategoriModel->update($id, $data);
        return redirect()->to(backend_url() . '/kategori-event');
    }

    public function delete()
    {
        $param['activeMenu'] = $this->activeMenu;
        
        if ($param['activeMenu']['akses_hapus'] == '0')
        {
            return redirect()->to('denied');
        }

        $id = $this->request->getGet('id');
        $this->EventKategoriModel->delete($id);
        return redirect()->to(backend_url() . '/kategori-event');
    }

    

}