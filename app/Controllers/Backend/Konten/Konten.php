<?php namespace App\Controllers\Backend\Konten;
use App\Controllers\BackendController;
use App\Models\Konten\KontenModel;
use App\Models\Konten\KontenKategoriModel;

class Konten extends BackendController
{
    public $path_view   = "backend/konten/konten/";
    public $theme       = "pages/theme-backend/render";

    public function __construct()
    {
        $this->session              = session();
        $this->KontenModel          = new KontenModel();
        $this->KontenKategoriModel  = new KontenKategoriModel();
    }
    
    public function index()
    {
        $data['data']        = $this->KontenModel->getJoin();
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
        $data['konten_kategori'] = $this->KontenKategoriModel->get();
        $param['menu']           = $this->menu;
        $param['activeMenu']     = $this->activeMenu;

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
        $data['row'] = $this->KontenModel->get(['konten_id' => $id]);
        
        if (empty($data['row']))
        {
            return redirect()->to(base_url() . '/404');
        }

        $data['konten_kategori']     = $this->KontenKategoriModel->get();
        $param['menu']               = $this->menu;
        $param['activeMenu']         = $this->activeMenu;

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
        $data['konten_kategori']    = entitiestag($this->request->getPost('kategori_id'));
        $data['konten_nama']        = $this->request->getPost('konten_nama');
        $data['konten_sub']         = entitiestag($this->request->getPost('konten_sub'));
   
        //proses validasi
        if(!$this->validate([
            'konten_nama' => [
                'rules'   => 'required',
                'errors'  => [
                    'required' => 'wajib diisikan',
                ]
            ],
        ]))
        {
			$validation = \Config\Services::validation();
			return redirect()->back()->withInput()->with('validation',$validation);
        }
        
        $this->KontenModel->insert($data);
		return redirect()->to(backend_url() . '/konten');
    }

    public function update()
    {
        $id = $this->request->getPost('konten_id');

        $data['konten_kategori']    = entitiestag($this->request->getPost('kategori_id'));
        $data['konten_nama']        = $this->request->getPost('konten_nama');
        $data['konten_sub']         = entitiestag($this->request->getPost('konten_sub'));
   
        //proses validasi
        if(!$this->validate([
            'konten_nama' => [
                'rules'   => 'required',
                'errors'  => [
                    'required' => 'wajib diisikan',
                ]
            ],
        ]))
        {
			$validation = \Config\Services::validation();
			return redirect()->back()->withInput()->with('validation',$validation);
        }

        $this->KontenModel->update($id, $data);
        return redirect()->to(backend_url() . '/konten');
    }

    public function delete()
    {
        $param['activeMenu'] = $this->activeMenu;
        
        if ($param['activeMenu']['akses_hapus'] == '0')
        {
            return redirect()->to('denied');
        }

        $id = $this->request->getGet('id');
        $this->KontenModel->delete($id);
        return redirect()->to(backend_url() . '/konten');
    }
}
