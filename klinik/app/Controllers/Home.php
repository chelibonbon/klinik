<?php

namespace App\Controllers;
use App\Models\M_gudang;
use TCPDF;
use Dompdf\Dompdf;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
	public function wendy()
	{
		echo "tak suka cewek";
	}
	public function reset_pass ($id)
	{

		$Sim= new M_gudang;
		$chiuw= array('id_user' =>$id);
		$data = array(
			
			"password"=>MD5('1111'),	
		);
        $chichi['chelsica']=$Sim->edit('user',$data,$chiuw);
		return redirect()->to('home/profile');
	}
	public function change_pass()
	{
		$model= new M_gudang();
		$chiuw= array('id_user' => session()->get('id'));
		$data = array(
			'password'=> MD5($this->request->getPost('newpassword')),
		);
		$model->edit('user',$data,$chiuw);
		return redirect()->to('/home/profile')->with('success','Password berhasil diganti');
	}
	public function profile()
{

    if (session()->get('level') > 0) {
        $Sim = new M_gudang; 

        if (session()->get('level') == "2") {
            $where = array('dokter.id_user' => session()->get('id'));
            $chichi['chelsica'] = $Sim->joinw('user', 'dokter', 'user.id_user=dokter.id_user', $where);
        } else if (session()->get('level') == "1") {
            $where = array('id_user' => session()->get('id'));
            $chichi['chelsica'] = $Sim->getWhere('user', $where);
        } else if (session()->get('level') == "3") {
            $where = array('id_user' => session()->get('id'));
            $chichi['chelsica'] = $Sim->getWhere('user', $where);
        } else {
            return redirect()->to('/error');
        }
        $chelsica = $chichi['chelsica'];
        if (session()->get('level') == "2") {
            $chichi['name'] = $chelsica->nama_d ?? $chelsica->username ?? $chelsica->password ?? $chelsica->spesialis ?? $chelsica->jenis_kelamin ?? $chelsica->tgl_lahir ?? $chelsica->alamat ?? $chelsica->no_hp ?? $chelsica->kode_dokter;
        } else { 
            $chichi['name'] = $chelsica->nama ?? $chelsica->username;
        }
        echo view('header', $this->data);
        echo view('menu');
        echo view('profile', $chichi); 
        echo view('footer');
    } else {
        return redirect()->to('/home/login');
    }
}
public function update_profile()
{
    $Sim = new M_gudang();
    $userId = session()->get('id');
    $userLevel = session()->get('level');

    if ($userLevel == "2") { // Employee
        $where = ['dokter.id_user' => $userId];
        $nameColumn = 'nama_d';
        $table = 'dokter';
    } elseif ($userLevel == "1") { // Admin
        $where = ['id_user' => $userId];
        $nameColumn = 'username';
        $table = 'user';
    } else {
        return redirect()->to('/error')->with('error', 'Invalid user level.');
    }

    $newName = $this->request->getPost('fullName');
    if (!$newName) {
        return redirect()->back()->with('error', 'Full Name is required.');
    }
    $data = [$nameColumn => $newName];
    $Sim->edit($table, $data, $where);

    $file = $this->request->getFile('profile_image');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $uploadPath = 'img/';
        $newFileName = $userId . '_' . $file->getRandomName();
        if ($file->move($uploadPath, $newFileName)) {
            $currentData = $Sim->getWhere('user', ['id_user' => $userId]);
             $oldFileName = $currentData->foto ?? null;
            $Sim->edit('user', ['foto' => $newFileName], ['id_user' => $userId]);
            if ($oldFileName && file_exists($uploadPath . $oldFileName)) {
                unlink($uploadPath . $oldFileName);
            }
        } else {
            return redirect()->back()->with('error', 'Failed to upload the profile image.');
        }
    }

    return redirect()->to('/home/profile')->with('successprofil', 'Profile updated successfully.');
}
public function delete_profile_picture()
{
    $Sim = new M_gudang();
    $userId = session()->get('id');

    $currentData = $Sim->getWhere('user', ['id_user' => $userId]);
    $oldFileName = $currentData->foto ?? null;

    if ($oldFileName) {
        $filePath = 'img/' . $oldFileName;

        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $Sim->edit('user', ['foto' => null], ['id_user' => $userId]);
    }

    return redirect()->to('/home/profile')->with('successprofil', 'Profile picture removed successfully.');
}







	public function halamandokter() {
    if (session()->get('level') == 1 || session()->get('level') == 2) {
        $Joyce = new M_gudang;
        date_default_timezone_set('Asia/Jakarta');
        $id_user = session()->get('id');
        $dokter = $Joyce->getWhere('dokter', ['id_user' => $id_user]);
        $id_dokter = $dokter->id_dokter;

        $status1 = ['status' => 1];
        $status2 = ['status' => 2];
        $hariini = ['tanggal_berobat' => date('Y-m-d')];

        $wendy = [
            'takdirestui' => $Joyce->rm2($status1, $hariini, ['id_dokter' => $id_dokter]),
            'direstui'    => $Joyce->rm2($status2, $hariini, ['id_dokter' => $id_dokter])
        ];
        echo view('header', $this->data);
        echo view('halamandokter.php', $wendy);
        echo view('footer.php');
    } else if (session()->get('level') > 0) {
        return redirect()->to('home/error');
    } else {
        return redirect()->to('home/login');
    }
}

	public function guser()
	{
		echo view ('header.php');
		echo view ('guser.php');
		echo view ('footer.php');
	}
	public function register()
	{
		return view('pages-register.php');
	}
	public function aFksi_register()
	{
		$a=$this->request->getPost('name');
		$b=$this->request->getPost('username');
		$c=$this->request->getPost('password');
		$d=$this->request->getPost('level');
		$Joyce= new M_gudang();
		$data = array(
			"name"=>$a,
			"username"=>$b,
			"password"=>MD5($c),
			"level"=>$d
		);
		$Joyce->input('user',$data);

		$cek = $Joyce->getWhere('user', $data);

		if ($cek != null) {

			session()->set('id', $cek->id_user);
			session()->set('u', $cek->username);
			session()->set('level', $cek->level);

			//penulisan kode array isinya pakai $cek[isinya]//
			return redirect ()->to('home/dashboard');
		}else{
			return redirect ()->to('home/login');
		}
	}
	public function login()
	{
		return view('pages-login.php');
	}
	public function aksi_login()
	{
		$a=$this->request->getPost('email');
		$b=$this->request->getPost('password');

		$Joyce= new M_gudang;
		$data = array(
			"username"=>$a,
			"password"=>MD5($b)
		);

		$cek = $Joyce->getWhere('user', $data);
		//$cek uhh//
		//ini karena kitaa nyetak, harus menggunahkan echo, kalau error, karena di model tak ada Array akhirnya//
		if ($cek != null) {

			session()->set('id', $cek->id_user);
			session()->set('u', $cek->username);
			session()->set('level', $cek->level);

			//penulisan kode array isinya pakai $cek[isinya]//
			return redirect ()->to('home/dashboard');
		}else{
			return redirect ()->to('home/login');
		}
	}
	public function logout()
	{
		session()->destroy();
		return redirect ()->to('home/login');
	}
	public function dashboard()
	{	
		if (session()->get('id')>0) {
			echo view('header', $this->data);
			echo view ('menu.php');
			echo view ('dashboard.php');
			echo view ('footer.php');

		}else{
			return redirect()->to('home/login');
		}
	}
	public function detail_obat($id)
	{
		if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
			$Joyce= new M_gudang;
			$wece= array('id_obat' =>$id);
			$wendy['takdirestui']=$Joyce->getWhere('obat',$wece);
			echo view('header', $this->data);
			echo view ('menu.php');
			echo view ('detail_obat',$wendy);
			echo view ('footer.php');
		}else if (session()->get('level')>0) {
			return redirect()->to('home/error');
		}else{
			return redirect()->to('home/login');
		}
		//echo view "barang", itu dari view, bukan database gudang//
	}
	public function dashobat()
	{
		if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
			$Joyce= new M_gudang;
			$where= ('id_obat');
			$wendy['takdirestui']=$Joyce->tampil('obat', $where);
			echo view('header', $this->data);
			echo view ('menu.php');
			echo view ('dashobat.php',$wendy);
			echo view ('footer.php');
		}else if (session()->get('level')>0) {
			return redirect()->to('home/error');
		}else{
			return redirect()->to('home/login');
		}
		//echo view "barang", itu dari view, bukan database gudang//
	}
	//input barang itu di view "tambah_barang"//
	public function input_obat()
	{
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('tambah_obat.php');
		echo view ('footer.php');
	}
	public function simpan_obat1()
	{
		$Joyce= new M_gudang;
		$data = array(
			'nama_obat'=> $this->request->getPost('namaobat'),
			'stok'=> $this->request->getPost('stok'),
			'harga'=> $this->request->getPost('harga'),
			'foto'=> $this->request->getPost('file')
		);

		$file = $_FILES["file"];
		$validExtensions = ["jpg", "png", "jpeg"];
		$extension = pathinfo($file["name"], PATHINFO_EXTENSION);
		$timestamp = time(); 
		$newFileName = $timestamp . "_" . $file["name"]; 
		move_uploaded_file($file["tmp_name"], "foto/" . $newFileName);
		$data['foto'] = $newFileName; 

		$Joyce= new M_gudang;
		$Joyce->input('obat',$data);
		return redirect ()->to('home/dashobat');
	}
	public function hapus_obat($id)
	{
		$Joyce= new M_gudang;
		$wece= array('id_obat' =>$id);
		$wendy['takdirestui']=$Joyce->hapus('obat',$wece);
		return redirect()->to('home/dashobat');
	}
	public function edit_obat($id)
	{
		$Joyce= new M_gudang;
		$wece= array('id_obat' =>$id);
		$wendy['takdirestui']=$Joyce->getWhere('obat',$wece);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('obat',$wendy);
		echo view ('footer.php');
		//echo view "barang", itu dari view, bukan database gudang//
	}
	public function simpan_obat()
	{
		$a=$this->request->getPost('namaobat');
		$b=$this->request->getPost('stok');
		$c=$this->request->getPost('harga');
		$d=$this->request->getPost('file');
		$id=$this->request->getPost('id');
		$Joyce= new M_gudang;
		$wece= array('id_obat' =>$id);
		$data = array(
			"nama_obat"=>$a,
			"stok"=>$b,
			"harga"=>$c,
			"foto"=>$d
		);

		$file = $_FILES["file"];
		$validExtensions = ["jpg", "png", "jpeg"];
		$extension = pathinfo($file["name"], PATHINFO_EXTENSION);
		$timestamp = time(); 
		$newFileName = $timestamp . "_" . $file["name"]; 
		move_uploaded_file($file["tmp_name"], "foto/" . $newFileName);
		$data['foto'] = $newFileName; 

		$Joyce= new M_gudang;
		$Joyce->edit('obat',$data, $wece);
		return redirect ()->to('home/dashobat');
	}
	public function detail_user($id)
	{
		$Joyce= new M_gudang;
		$wece= array('id_user' =>$id);
		$wendy['takdirestui']=$Joyce->getWhere('user',$wece);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('detail_user',$wendy);
		echo view ('footer.php');
	}
	public function dashuser()
	{
		if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
			$Joyce= new M_gudang;
			$where= ('id_user');
			$wendy['takdirestui']=$Joyce->tampil('user', $where);
			echo view('header', $this->data);
			echo view ('menu.php');
			echo view ('dashuser.php',$wendy);
			echo view ('footer.php');
		}else if (session()->get('level')>0) {
			return redirect()->to('home/error');
		}else{
			return redirect()->to('home/login');
		}
	}
	public function input_user()
	{
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('tambah_guser.php');
		echo view ('footer.php');
	}
	public function simpan_user1()
	{
		$a=$this->request->getPost('nama');
		$b=$this->request->getPost('username');
		$c=$this->request->getPost('password');
		$d=$this->request->getPost('level');
		$id=$this->request->getPost('id');
		$Joyce= new M_gudang;
		$data = array(
			"nama"=>$a,
			"username"=>$b,
			"password"=>MD5($c),
			"level"=>$d
		);
		$Joyce->input('user',$data);
		return redirect ()->to('home/dashuser');
	}
	public function hapus_user($id)
	{
		$Joyce= new M_gudang;
		$wece= array('id_user' =>$id);
		$wendy['takdirestui']=$Joyce->hapus('user',$wece);
		return redirect()->to('home/dashuser');
	}
	public function edit_user($id)
	{
		$Joyce= new M_gudang;
		$wece= array('id_user' =>$id);
		$wendy['takdirestui']=$Joyce->getWhere('user',$wece);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('guser',$wendy);
		echo view ('footer.php');
	}
	public function simpan_user()
	{
		$a=$this->request->getPost('nama');
		$b=$this->request->getPost('username');
		$c=$this->request->getPost('password');
		$d=$this->request->getPost('level');
		$id=$this->request->getPost('id');
		$Joyce= new M_gudang;
		$wece= array('id_user' =>$id);
		$data = array(
			"nama"=>$a,
			"username"=>$b,
			"password"=>MD5($c),
			"level"=>$d
		);
		$Joyce->edit('user',$data, $wece);
		return redirect ()->to('home/dashuser');
	}
	public function detail_pasien($id)
	{
		$Joyce= new M_gudang;
		$wece= array('pasien.id_user' =>$id);
		$wendy['takdirestui']=$Joyce->joinw('pasien', 'user', 'pasien.id_user=user.id_user', $wece);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('detail_pasien',$wendy);
		echo view ('footer.php');
	}
	public function dashpasien()
	{
		if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
			$Joyce= new M_gudang;
			$where= ('id_pasien');
			$wendy['takdirestui']=$Joyce->tampil ('pasien',$where);
			echo view('header', $this->data);
			echo view ('menu.php');
			echo view ('dashpasien',$wendy);
			echo view ('footer.php');
		}else if (session()->get('level')>0) {
			return redirect()->to('home/error');
		}else{
			return redirect()->to('home/login');
		}
	}
	public function input_pasien()
	{
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('tambah_pasien.php');
		echo view ('footer.php');
	}
	public function simpan_pasien1()
	{
		$a=$this->request->getPost('namap');
		$e=$this->request->getPost('jk');
		$f=$this->request->getPost('tanggallahir');
		$g=$this->request->getPost('alamat');
		$h=$this->request->getPost('no_hp');
		$i=$this->request->getPost('pekerjaan');
		$j=$this->request->getPost('agama');
		$Joyce= new M_gudang;
		$data=array(
			"nama_p"=>$a,
			"jenis_kelamin"=>$e,
			"tgl_lahir"=>$f,
			"alamat"=>$g,
			"no_hp"=>$h,
			"pekerjaan"=>$i,
			"agama"=>$j,
		);
		$Joyce->input('pasien', $data);
		return redirect ()->to('home/dashpasien');
	}
	public function hapus_pasien($id)
	{
		$Joyce= new M_gudang;
		$wece= array('id_user' =>$id);
		$Joyce->hapus('pasien',$wece);
		$Joyce->hapus('user',$wece);
		return redirect()->to('home/dashpasien');
	}
	public function edit_pasien($id)
	{
		$Joyce= new M_gudang;
		$where= array('id_pasien'=>$id);
		$wendy['takdirestui']=$Joyce->getWhere('pasien', $where);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('pasien',$wendy);
		echo view ('footer.php');
	}
	public function simpan_pasien()
	{
		$a=$this->request->getPost('namap');
		$e=$this->request->getPost('jk');
		$f=$this->request->getPost('tanggallahir');
		$g=$this->request->getPost('alamat');
		$h=$this->request->getPost('no_hp');
		$i=$this->request->getPost('pekerjaan');
		$j=$this->request->getPost('agama');
		$id = $this->request->getPost('id');
		$Joyce = new M_gudang;
		
		$data=array(
			"nama_p"=>$a,
			"jenis_kelamin"=>$e,
			"tgl_lahir"=>$f,
			"alamat"=>$g,
			"no_hp"=>$h,
			"pekerjaan"=>$i,
			"agama"=>$j,
		);
		$where= array('id_pasien' => $id);
		$Joyce->edit('pasien', $data, $where);

		return redirect()->to('home/dashpasien');
	}
	public function detail_dokter ($id)
	{
		$Joyce= new M_gudang;
		$wece= array('dokter.id_user' =>$id);
		$wendy['takdirestui']=$Joyce->joinw('dokter', 'user', 'dokter.id_user=user.id_user', $wece);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('detail_dokter',$wendy);
		echo view ('footer.php');
	}
	public function dashdokter1()
	{
		if (session()->get('level') == 2) {
			$Joyce = new M_gudang;
			$where = ('id_dokter');
			$id_user = session()->get('id');
			$dokter = $Joyce->getWhere('dokter', ['id_user' => $id_user]);
			$id_dokter = $dokter->id_dokter;

        // Correct condition for filtering
			$wendy['takdirestui'] = $Joyce->filterpesan(
				'dokter',
				'user',
				'dokter.id_user = user.id_user',$where,
            ['dokter.id_dokter' => $id_dokter] // Apply filter here
        );
			echo view('header', $this->data);
			echo view ('menu.php');
			echo view ('dashdokter1',$wendy);
			echo view ('footer.php');
		}else if (session()->get('level')>0) {
			return redirect()->to('home/error');
		}else{
			return redirect()->to('home/login');
		}
	}
	public function dashdokter()
	{
		if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
			$Joyce= new M_gudang;
			$where= ('id_dokter');
			$wendy['takdirestui']=$Joyce->join ('dokter', 'user', 'dokter.id_user=user.id_user',$where);
			echo view('header', $this->data);
			echo view ('menu.php');
			echo view ('dashdokter',$wendy);
			echo view ('footer.php');
		}else if (session()->get('level')>0) {
			return redirect()->to('home/error');
		}else{
			return redirect()->to('home/login');
		}
	}
	public function input_dokter()
	{
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('tambah_dokter');
		echo view ('footer.php');
	}
	
	public function simpan_dokter1()
	{
		$a=$this->request->getPost('namad');
		$b=$this->request->getPost('email');
		$c=$this->request->getPost('password');
		$e=$this->request->getPost('spesialis');
		$f=$this->request->getPost('jk');
		$g=$this->request->getPost('tanggallahir');
		$h=$this->request->getPost('alamat');
		$i=$this->request->getPost('no_hp');
		$j=$this->request->getPost('kode_dokter');
		
		$Joyce= new M_gudang;
		
		$data = array(
			"nama"=>$a,
			"username"=>$b,
			"password"=>MD5($c),
			"level"=> 2
		);
		$Joyce->input('user', $data);

		$where = array(
			"username"=>$b
		);
		$wendy=$Joyce->getWhere('user', $where);
		// echo $wendy->id_user;
		$data2=array(
			"id_user"=>$wendy->id_user,
			"nama_d"=>$a,
			"spesialis"=>$e,
			"jenis_kelamin"=>$f,
			"tgl_lahir"=>$g,
			"alamat"=>$h,
			"no_hp"=>$i,
			"kode_dokter"=>$j
		);
		// print_r($data2);
		$Joyce->input('dokter', $data2);

		$where = array(
			"kode_dokter"=>$j
		);
		$wendy=$Joyce->getWhere('dokter', $where);
		return redirect ()->to('home/dashdokter');
	}
	public function hapus_dokter ($id)
	{
		$Joyce= new M_gudang;
		$wece= array('id_user' =>$id);
		$Joyce->hapus('dokter',$wece);
		$Joyce->hapus('user',$wece);
		return redirect()->to('home/dashdokter');
	}
	public function edit_dokter ($id)
	{
		$Joyce= new M_gudang;
		$wece= array('dokter.id_user' =>$id);
		$wendy['takdirestui']=$Joyce->joinw('dokter', 'user', 'dokter.id_user=user.id_user', $wece);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('dokter',$wendy);
		echo view ('footer.php');
	}
	
	public function simpan_dokter()
	{
		$a = $this->request->getPost('namad');
		$b = $this->request->getPost('email');
		$c = $this->request->getPost('password');
		$d = $this->request->getPost('level');
		$e = $this->request->getPost('spesialis');
		$f = $this->request->getPost('jk');
		$g = $this->request->getPost('tanggallahir');
		$h = $this->request->getPost('alamat');
		$i = $this->request->getPost('no_hp');
		$j=$this->request->getPost('kode_dokter');
		$id = $this->request->getPost('id');
		$Joyce = new M_gudang;
		$where = array("id_user" => $id);

    // Update 'user' table data
		$data = array(
			"nama" => $a,
			"username" => $b,
			"password" => MD5($c),
			"level" => $d
		);
		$Joyce->edit('user', $data, $where);

    // Update 'dokter' table data
		$data2 = array(
			"nama_d" => $a,
			"spesialis" => $e,
			"jenis_kelamin" => $f,
			"tgl_lahir" => $g,
			"alamat" => $h,
			"no_hp" => $i,
			"kode_dokter"=>$j
			// "status"=>"2"
		);
		$Joyce->edit('dokter', $data2, $where);

		return redirect()->to('home/dashdokter');
	}
	// public function detail_ro($id)
	// {
	// 	$Joyce= new M_gudang;
	// 	$wece= array('id_ro' =>$id);
	// 	$wendy['takdirestui']=$Joyce->getWhere('resep_obat',$wece);
	// 	echo view ('header.php');
	// 	echo view ('menu.php');
	// 	echo view ('detail_ro',$wendy);
	// 	echo view ('footer.php');
	// }

	// public function dashro()
	// {
	// 	if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
	// 		$Joyce= new M_gudang;
	// 		$where= ('id_ro');
	// 		$wendy['takdirestui']=$Joyce->join ('resep_obat', 'obat', 'resep_obat.id_obat=obat.id_obat',$where);
	// 		echo view ('header.php');
	// 		echo view ('menu.php');
	// 		echo view ('dashro',$wendy);
	// 		echo view ('footer.php');
	// 	}else if (session()->get('level')>0) {
	// 		return redirect()->to('home/error');
	// 	}else{
	// 		return redirect()->to('home/login');
	// 	}
	// }
	// public function input_ro()
	// {
	// 	$Joyce= new M_gudang;
	// 	$where= ('id_obat');
	// 	$wendy['takdirestui']=$Joyce->tampil('obat',$where);
	// 	echo view ('header.php');
	// 	echo view ('menu.php');
	// 	echo view ('tambah_ro.php',$wendy);
	// 	echo view ('footer.php');
	// }
	// public function simpan_ro1()
	// {
	// 	$a=$this->request->getPost('idobat');
	// 	$b=$this->request->getPost('pakai');
	// 	$c=$this->request->getPost('jumlah');
	// 	$d=$this->request->getPost('total');
	// 	$e=$this->request->getPost('status');
	// 	$Joyce= new M_gudang();
	// 	$data = array(
	// 		"id_obat"=>$a,
	// 		"aturan_pakai"=>$b,
	// 		"jumlah"=>$c,
	// 		"total_harga"=>$d,
	// 		"status_bayar"=>$e
	// 	);
	// 	$Joyce->input('resep_obat',$data);
	// 	return redirect ()->to('home/dashro');
	// }
	// public function hapus_ro($id)
	// {
	// 	$Joyce= new M_gudang;
	// 	$wece= array('id_ro' =>$id);
	// 	$wendy['takdirestui']=$Joyce->hapus('resep_obat',$wece);
	// 	return redirect()->to('home/dashro');
	// }
	// public function edit_ro($id)
	// {
	// 	$Joyce= new M_gudang;
	// 	$wece= array('id_ro' =>$id);
	// 	$wendy['takdirestui']=$Joyce->getWhere('resep_obat',$wece);
	// 	echo view ('header.php');
	// 	echo view ('menu.php');
	// 	echo view ('resepobat',$wendy);
	// 	echo view ('footer.php');
	// }
	// public function simpan_ro()
	// {
	// 	$a=$this->request->getPost('idobat');
	// 	$b=$this->request->getPost('pakai');
	// 	$c=$this->request->getPost('jumlah');
	// 	$d=$this->request->getPost('total');
	// 	$e=$this->request->getPost('status');
	// 	$id=$this->request->getPost('id');
	// 	$Joyce= new M_gudang;
	// 	$wece= array('id_ro' =>$id);
	// 	$data = array(
	// 		"id_obat"=>$a,
	// 		"aturan_pakai"=>$b,
	// 		"jumlah"=>$c,
	// 		"total_harga"=>$d,
	// 		"status_bayar"=>$e
	// 	);
	// 	$Joyce->edit('resep_obat',$data, $wece);
	// 	return redirect ()->to('home/dashro');
	// }
	public function lap_bayar()
	{
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('lap_bayar');
		echo view ('footer.php');
	}
	public function excel_bayar()
	{
		$Joyce= new M_gudang;
		$a=$this->request->getpost('tanggalawal');
		$b=$this->request->getpost('tanggalakhir');
		$where= ('id_bayar');
		$wendy['takdirestui'] = $Joyce->bayarfilter('tanggal >=', 'tanggal <=', $a, $b, $where);
    	// Fetch data for the view
		echo view ('excel_bayar',$wendy);
	}

	public function lap_rm()
	{
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('lap_rm');
		echo view ('footer.php');
	}
	public function tabelrm()
	{
		$Joyce= new M_gudang;
		$a=$this->request->getpost('tanggalawal');
		$b=$this->request->getpost('tanggalakhir');
		$where= ('id_rm');
		$wendy['takdirestui'] = $Joyce->rmfilter('tanggal_berobat >=', 'tanggal_berobat <=', $a, $b, $where);
		echo view ('tabelrm',$wendy);
	}
	public function detail_rm($id)
	{
		$Joyce= new M_gudang;
		$wece= array('id_rm' =>$id);
		$wendy['takdirestui']=$Joyce->getWhere2($wece);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('detail_rm',$wendy);
		echo view ('footer.php');
	}
// 	public function downloadTCPDF()
// {
//     // Initialize TCPDF
//     $Joyce = new M_gudang;
//     $pdf = new TCPDF('P', 'mm', 'A4');
//     ob_start();

//     // PDF Setup
//     $pdf->SetCreator('TCPDF');
//     $pdf->SetTitle('Laporan Pendaftaran');
//     $pdf->setPrintHeader(false);
//     $pdf->setPrintFooter(false);
//     $pdf->addPage();

//     // Add Logo
//     $pdf->Image('public/img/logo_klinik.jpg', 10, 10, 30); // Adjust logo size and position

//     // Fetch form data
//     $a = $this->request->getPost('tanggalawal');
//     $b = $this->request->getPost('tanggalakhir');
//     $out = session()->get('id_rm');
//     $wendy = $Joyce->rmfilter('tanggal_berobat >=', 'tanggal_berobat <=', $a, $b, $where);

//     // Set font for the header section
//     $pdf->SetFont('helvetica', 'B', 14);
//     $pdf->SetTextColor(0, 0, 0);
//     $pdf->Cell(0, 15, 'Laporan Pendaftaran Klinik XYZ', 0, 1, 'C');

//     // Add date range information
//     $pdf->SetFont('helvetica', '', 12);
//     $pdf->Cell(0, 10, 'Dari Tanggal: ' . $a . ' Sampai Tanggal: ' . $b, 0, 1, 'C');

//     // Add an empty line for separation
//     $pdf->Ln(5);

//     // Set font for receipt items
//     $pdf->SetFont('courier', '', 10);

//     // Table Header
//     $pdf->Cell(30, 7, 'No Antrean', 1, 0, 'C');
//     $pdf->Cell(70, 7, 'Deskripsi', 1, 0, 'C');
//     $pdf->Cell(30, 7, 'Pendapatan (Rp)', 1, 1, 'C');

//     // Table Content
//     foreach ($wendy as $hasil) {
//         $pdf->Cell(30, 7, $hasil['no_antrean'], 1, 0, 'C');
//         $pdf->Cell(70, 7, 'Pendaftaran Berobat', 1, 0, 'L'); // Customize with actual data
//         $pdf->Cell(30, 7, 'Rp. ' . number_format($hasil['total_b'], 0, ',', '.'), 1, 1, 'R');
//     }

//     // Add a line for total
//     $pdf->Ln(5);
//     $pdf->SetFont('helvetica', 'B', 12);
//     $pdf->Cell(100, 7, 'Total Pendapatan', 0, 0, 'R');
//     $pdf->Cell(30, 7, 'Rp. ' . number_format(array_sum(array_column($wendy, 'total_b')), 0, ',', '.'), 1, 0, 'R'); // Calculate total amount

//     // Add footer (company info, etc.)
//     $pdf->Ln(15);
//     $pdf->SetFont('helvetica', 'I', 8);
//     $pdf->Cell(0, 5, 'Klinik XYZ - Jl. Kesehatan No. 123, Jakarta', 0, 1, 'C');
//     $pdf->Cell(0, 5, 'Telp: (021) 123-4567 | Website: www.klinikxyz.com', 0, 1, 'C');

//     // Output the PDF
//     $this->response->setContentType('application/pdf');
//     ob_end_clean();
//     $pdf->Output();
// }

// 	public function downloadTCPDF()
// 	{
// 		$Joyce= new M_gudang;
// 		$a=$this->request->getpost('tanggalawal');
// 		$b=$this->request->getpost('tanggalakhir');
// 		$where= ('id_rm');
// 		$wendy= $Joyce->rmfilter('tanggal_berobat >=', 'tanggal_berobat <=', $a, $b, $where);

// 		// $wendy =$Joyce-> filnota ('nota', 'tanggal >=',$a,$where);

//     // Buat instance dari TCPDF
// 		$pdf = new TCPDF();

//     // Setel metadata dasar PDF
// 		$pdf->SetCreator('TCPDF');
// 		$pdf->SetAuthor('Nama Anda');
// 		$pdf->SetTitle('Laporan pendaftaran');
// 		$pdf->SetSubject('Laporan PDF');
// 		$pdf->SetKeywords('TCPDF, PDF, laporan, pendaftaran, rekam_medis');

//     // Atur halaman PDF
// 		$pdf->AddPage();

//     // Load view and capture output
// 		$html = view('tcpdf_rm', ['takdirestui' => $wendy]);

//     // Render HTML ke PDF
// 		$pdf->writeHTML($html, true, false, true, false, '');

//     // Output file PDF
//     $pdf->Output('laporan_pendaftaran.pdf', 'D'); // 'D' untuk download, 'I' untuk menampilkan di browser
// }

	public function downloadDOMPDF()
	{
		$a=$this->request->getpost('tanggalawal');
		$b=$this->request->getpost('tanggalakhir');
		$where= ('id_rm');
    // Fetch data for the view
		
    // Ambil input tanggal dari form
	// $a=$this->request->getpost('tanggal');
	// $where= ('id_nota');
    // Menggunakan model untuk filter data
		$Joyce = new M_gudang;

    // Memanggil method filter dari model untuk mengambil data sesuai tanggal
    // Ganti parameter sesuai dengan kebutuhan query Anda

		$wendy = $Joyce->rmfilter(
			'tanggal_berobat >=', 
			'tanggal_berobat <=', 
			$a,
			$b,
			$where
		);

    // Memuat Dompdf
		$dompdf = new Dompdf();

    // Menyusun HTML untuk laporan menggunakan view
		$html = view('dompdf_rm', ['takdirestui' => $wendy, 'tanggalawal' => $a, 'tanggalakhir' => $b]);

    // Load HTML ke Dompdf
		$dompdf->loadHtml($html);

    // Set ukuran kertas dan orientasi (landscape)
		$dompdf->setPaper('A4', 'landscape');

    // Render PDF
		$dompdf->render();

    // Output PDF ke browser
    $dompdf->stream('laporan_daftardom.pdf', ["Attachment" => false]);  // "false" untuk membuka di browser, "true" untuk download otomatis
}

public function excel_rm()
{
	$Joyce= new M_gudang;
	$a=$this->request->getpost('tanggalawal');
	$b=$this->request->getpost('tanggalakhir');
	$where= ('id_rm');
	$wendy['takdirestui'] = $Joyce->rmfilter('tanggal_berobat >=', 'tanggal_berobat <=', $a, $b, $where);
    // Fetch data for the view
	echo view ('excel_rm',$wendy);
}

public function dashrm()
{
	if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
		$Joyce= new M_gudang;
		date_default_timezone_set('Asia/Jakarta');
			// $id_user = session()->get('id');
			$hariini = ['tanggal_berobat' => date('Y-m-d')];
			$wendy['takdirestui']= $Joyce->filtertanggal($hariini);
			// $id_pasien = $pasien->id_pasien;
  //       // Get the status filter from the URL (GET request)
		// $where1=array('status'=>'1');
		// 	//getwhere kata bapak//
		// $status_filter = $this->request->getGet('status');

  //       // Build the query condition
		// $where1 = [];
		// if ($status_filter !== null) {
		// 	$where1['status'] = $status_filter;
		// }

        // Fetch records with the status filter applied
        // $wendy['takdirestui'] = $Joyce->rm2($where1,$id_pasien); // Assuming rm2() accepts the where condition
        
        echo view('header', $this->data);
        echo view ('menu.php');
        echo view ('dashrm.php',$wendy);
        echo view ('footer.php');
    }else if (session()->get('level')>0) {
    	return redirect()->to('home/error');
    }else{
    	return redirect()->to('home/login');
    }
}
public function dashrm2()
{
	if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
		$Joyce= new M_gudang;
			// $id_user = session()->get('id');
		$where= ('id_rm');
			$wendy['takdirestui']= $Joyce->join4('rekam_medis','dokter','pasien','obat', 'rekam_medis.id_dokter = dokter.id_dokter', 'rekam_medis.id_pasien = pasien.id_pasien', 'rekam_medis.id_obat = obat.id_obat',$where);
			// $id_pasien = $pasien->id_pasien;
  //       // Get the status filter from the URL (GET request)
		// $where1=array('status'=>'1');
		// 	//getwhere kata bapak//
		// $status_filter = $this->request->getGet('status');

  //       // Build the query condition
		// $where1 = [];
		// if ($status_filter !== null) {
		// 	$where1['status'] = $status_filter;
		// }

        // Fetch records with the status filter applied
        // $wendy['takdirestui'] = $Joyce->rm2($where1,$id_pasien); // Assuming rm2() accepts the where condition
        
        echo view('header', $this->data);
        echo view ('menu.php');
        echo view ('dashrm.php',$wendy);
        echo view ('footer.php');
    }else if (session()->get('level')>0) {
    	return redirect()->to('home/error');
    }else{
    	return redirect()->to('home/login');
    }
}

public function dashbayar2()
{
	if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
        $Joyce = new M_gudang;
        $where = 'rekam_medis.id_rm';
        $status2 = ['status' => 2];
        $wendy['takdirestui'] = $Joyce->joinbayar('rekam_medis', 'dokter', 'pasien', 'obat', 
            'rekam_medis.id_dokter = dokter.id_dokter', 
            'rekam_medis.id_pasien = pasien.id_pasien', 
            'rekam_medis.id_obat = obat.id_obat', 
            $where, 
            $status2
        );
        echo view('header', $this->data);
        echo view ('menu.php');
        echo view ('dashbayar.php',$wendy);
        echo view ('footer.php');
    }else if (session()->get('level')>0) {
    	return redirect()->to('home/error');
    }else{
    	return redirect()->to('home/login');
    }
}
public function dashbayar()
{
    if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
        $Joyce = new M_gudang;
        $where = 'rekam_medis.id_rm';
        $status2 = ['status' => 2];
        $hariini = ['tanggal_berobat' => date('Y-m-d')];
        $wendy['takdirestui'] = $Joyce->joinbayar2('rekam_medis', 'dokter', 'pasien', 'obat', 
            'rekam_medis.id_dokter = dokter.id_dokter', 
            'rekam_medis.id_pasien = pasien.id_pasien', 
            'rekam_medis.id_obat = obat.id_obat', 
            $where, 
            $status2,$hariini
        );
        
        echo view('header', $this->data);
        echo view('menu.php');
        echo view('dashbayar.php', $wendy);
        echo view('footer.php');
    } elseif (session()->get('level') > 0) {
        return redirect()->to('home/error');
    } else {
        return redirect()->to('home/login');
    }
}

public function pembayaran($id)
	{
		$Joyce= new M_gudang;
		$where= array('id_rm' =>$id);
		$by= ('id_rm');
    	$wendy['takdirestui']= $Joyce->joinw4('rekam_medis','dokter','pasien','obat', 'rekam_medis.id_dokter = dokter.id_dokter', 'rekam_medis.id_pasien = pasien.id_pasien', 'rekam_medis.id_obat = obat.id_obat',$by,$where);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('pembayaran',$wendy);
		echo view ('footer.php');
	}
public function submit_pembayaran()
{
    $model = new M_gudang;

    // Collect form data
    $data = [
        'id_rm' => $this->request->getPost('id_rm'),
        'biaya_dokter' => $this->request->getPost('biaya_dokter'),
        'biaya_fasilitas' => $this->request->getPost('biaya_fasilitas'),
        'biaya_obat' => $this->request->getPost('biaya_obat'),
        'total' => $this->request->getPost('total'),
        "tanggal"=> date('Y-m-d'),
		"waktu" => date('H:i:s'),
        'metode_pembayaran' => $this->request->getPost('metode_pembayaran')
    ];

    // Insert data into transactions table
    $model->insert_transaction($data);

    // Update status in patient_visits table
    $model->update_status($data['id_rm'], 3);

    return redirect()->to(base_url('home/printnota'))->with('message', 'Payment recorded successfully');
}

	// public function dashrm()
	// {
	// 	if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3 || session()->get('level')==4) {
	// 		$Joyce= new M_gudang;
	// 		$where= ('id_rm' != 0);
	// 		$wendy['takdirestui']=$Joyce-> rm ($where);
	// 		echo view ('header.php');
	// 		echo view ('menu.php');
	// 		echo view ('dashrm.php',$wendy);
	// 		echo view ('footer.php');
	// 	}else if (session()->get('level')>0) {
	// 		return redirect()->to('home/error');
	// 	}else{
	// 		return redirect()->to('home/login');
	// 	}
	// }
public function input_rm()
{
	$Joyce= new M_gudang;
	$where= ('id_pasien');
	$wendy['takdirestui']=$Joyce->tampil ('pasien',$where);
	$where= ('id_dokter');
	$wendy['dokter']=$Joyce->tampil ('dokter',$where);
		// $where= ('id_ro');
		// $wendy['ro']=$Joyce->tampil ('resep_obat',$where);
		// $where= ('id_nota');
		// $wendy['nota']=$Joyce->tampil ('nota',$where);
	echo view('header', $this->data);
	echo view ('menu.php');
	echo view ('tambah_rm.php',$wendy);
	echo view ('footer.php');
}
public function simpan_rm1()
{
	date_default_timezone_set('Asia/Jakarta');
    // Ambil data dari form
    $a = $this->request->getPost('idpasien');
    $b = $this->request->getPost('antrean');
    $c = $this->request->getPost('iddokter');
    $d = $this->request->getPost('golongan');
    $e = $this->request->getPost('tekanan');
    $p = $this->request->getPost('suhu');
    $q = $this->request->getPost('tinggi');
    $r = $this->request->getPost('berat');
    $f = $this->request->getPost('penyakit');
    $g = $this->request->getPost('alergi_obat');
    $h = $this->request->getPost('alergi_makanan');
    $i = $this->request->getPost('berobat') ?: date('Y-m-d'); // Gunakan input atau default ke hari ini
    $j = $this->request->getPost('keluhan');
    $k = $this->request->getPost('diagnosa');
    $l = $this->request->getPost('tindakan');
    $m = $this->request->getPost('resep');

    $Joyce = new M_gudang();

    $today = $i;
    $queueData = $Joyce->filterque('rekam_medis','tanggal_berobat', $today);
    if (!empty($queueData)) {
        $no_antrean = 1;
        foreach ($queueData as $queue) {
            if ($queue->no_antrean > $no_antrean) {
                $no_antrean = $queue->no_antrean;
            }
        }
        $no_antrean++;
    } else {
        $no_antrean = 1;
    }
    $data = [
        "id_pasien" => $a,
        "no_antrean" => $no_antrean,
        "id_dokter" => $c,
        "gol_darah" => $d,
        "tek_darah" => $e,
        "suhu" => $p,
        "tinggi_badan" => $q,
        "berat_badan" => $r,
        "riwayat_penyakit" => $f,
        "alergi_obat" => $g,
        "alergi_makanan" => $h,
        "tanggal_berobat" => $i,
        "keluhan_pasien" => $j,
        "hasil_diagnosa" => $k,
        "tindakan" => $l,
        "id_obat" => $m,
        "status" => "1"
    ];

 
    $result = $Joyce->input('rekam_medis', $data);
    return redirect()->to('home/dashrm');
}
public function hapus_rm($id)
{
	$Joyce= new M_gudang;
	$wece= array('id_rm' =>$id);
	$wendy['takdirestui']=$Joyce->hapus('rekam_medis',$wece);
	return redirect()->to('home/dashrm');
}
public function edit_rm($id)
{
	$Joyce= new M_gudang;
	$wece= array('id_rm' =>$id);
	$where= ('id_obat');
	$wendy['direstui']=$Joyce->tampil('obat', $where);
	$wendy['takdirestui']=$Joyce->getWhere2($wece);
	$wendy['dokter']=$Joyce->getWhere2($wece);
	echo view('header', $this->data);
	echo view ('menu.php');
	echo view ('rekammedis',$wendy);
	echo view ('footer.php');
}
public function simpan_rm()
{
		// $a=$this->request->getPost('idpasien');
		// $b=$this->request->getPost('antrean');
		// $c=$this->request->getPost('iddokter');
		// $d=$this->request->getPost('golongan');
		// $e=$this->request->getPost('tekanan');
		// $f=$this->request->getPost('penyakit');
		// $g=$this->request->getPost('alergi_obat');
		// $h=$this->request->getPost('alergi_makanan');
		// $i=$this->request->getPost('berobat');
		$j=$this->request->getPost('keluhan');
	$k=$this->request->getPost('diagnosa');
	$l=$this->request->getPost('tindakan');
	$m=$this->request->getPost('resep');
		// $n=$this->request->getPost('nota');
		// $o=$this->request->getPost('status');
	$id=$this->request->getPost('id');
	$Joyce= new M_gudang;
	$wece= array('id_rm' =>$id);
	$data = array(
			// "id_pasien"=>$a,
			// "no_antrean"=>$b,
			// "id_dokter"=>$c,
			// "gol_darah"=>$d,
			// "tek_darah"=>$e,
			// "riwayat_penyakit"=>$f,
			// "alergi_obat"=>$g,
			// "alergi_makanan"=>$h,
			// "tanggal_berobat"=>$i,
		"keluhan_pasien"=>$j,
		"hasil_diagnosa"=>$k,
		"tindakan"=>$l,
		"id_obat"=>$m,
			// "id_nota"=>$n,
		"status"=>"2"
	);

	$Joyce->edit('rekam_medis',$data, $wece);
	return redirect ()->to('home/halamandokter');
}
public function detail_nota($id)
{
	$Joyce= new M_gudang;
	$wece= array('id_bayar' =>$id);
	$wendy['takdirestui']=$Joyce->getWhere('bayar',$wece);
	echo view('header', $this->data);
	echo view ('menu.php');
	echo view ('detail_nota',$wendy);
	echo view ('footer.php');
		//echo view "barang", itu dari view, bukan database gudang//
}
public function tabelnota()
{
	$Joyce= new M_gudang;
	$a=$this->request->getpost('tanggalawal');
	$b=$this->request->getpost('tanggalakhir');
	$where= ('id_nota');
	$wendy['takdirestui'] = $Joyce->filter2('nota', 'tanggal >=', 'tanggal <=', $a, $b, $where);
	echo view ('tabelnota',$wendy);
}
public function dashnota()
{
	if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3) {
		$Joyce= new M_gudang;
		$where= ('id_bayar');
		$wendy['takdirestui']=$Joyce->join3('bayar','rekam_medis','pasien','bayar.id_rm=rekam_medis.id_rm','rekam_medis.id_pasien=pasien.id_pasien', $where);
		echo view('header', $this->data);
		echo view ('menu.php');
		echo view ('dashnota.php',$wendy);
		echo view ('footer.php');
	}else if (session()->get('level')>0) {
		return redirect()->to('home/error');
	}else{
		return redirect()->to('home/login');
	}
}
public function input_nota()
{
	echo view('header', $this->data);
	echo view ('menu.php');
	echo view ('tambah_nota.php');
	echo view ('footer.php');
}
public function simpan_nota1()
{
	date_default_timezone_set('Asia/Jakarta');
	$Joyce= new M_gudang;
	$data = array(
		'jumlah_bayar'=> $this->request->getPost('bayar'),
		'metode_pembayaran'=> $this->request->getPost('pembayaran'),
			// 'tanggal'=> $this->request->getPost('tanggal'),
		"tanggal"=> date('Y-m-d'),
		"waktu" => date('H:i:s') 
			// 'waktu'=> $this->request->getPost('waktu')
	);

	$Joyce= new M_gudang;
	$Joyce->input('nota',$data);
	return redirect ()->to('home/dashnota');
}
public function hapus_nota($id)
{
	$Joyce= new M_gudang;
	$wece= array('id_nota' =>$id);
	$wendy['takdirestui']=$Joyce->hapus('nota',$wece);
	return redirect()->to('home/dashnota');
}
public function edit_nota($id)
{
	$Joyce= new M_gudang;
	$wece= array('id_nota' =>$id);
	$wendy['takdirestui']=$Joyce->getWhere('nota',$wece);
	echo view('header', $this->data);
	echo view ('menu.php');
	echo view ('nota',$wendy);
	echo view ('footer.php');
		//echo view "barang", itu dari view, bukan database gudang//
}
public function simpan_nota()
{
	$a=$this->request->getPost('bayar');
	$b=$this->request->getPost('pembayaran');
	$c=$this->request->getPost('tanggal');
	$d=$this->request->getPost('waktu');
	$id=$this->request->getPost('id');
	$Joyce= new M_gudang;
	$wece= array('id_nota' =>$id);
	$data = array(
		"jumlah_bayar"=>$a,
		"metode_pembayaran"=>$b,
		"tanggal"=>$c,
		"waktu"=>$d
	);

	$Joyce= new M_gudang;
	$Joyce->edit('nota',$data, $wece);
	return redirect ()->to('home/dashnota');
}
// public function detail_daftar($id)
// {
// 	$Joyce= new M_gudang;
// 	$wece= array('id_pendaftaran' =>$id);
// 	$wendy['takdirestui']=$Joyce->getWhere('pendaftaran',$wece);
// 	echo view ('header.php');
// 	echo view ('menu.php');
// 	echo view ('detail_daftar',$wendy);
// 	echo view ('footer.php');
// }
// public function dashdaftar()
// {
// 	if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==3 || session()->get('level')==4) {
// 		$Joyce= new M_gudang;
// 		$where= ('id_pendaftaran');
// 		$wendy['takdirestui']=$Joyce->tampil('pendaftaran', $where);
// 		echo view ('header.php');
// 		echo view ('menu.php');
// 		echo view ('dashdaftar.php',$wendy);
// 		echo view ('footer.php');
// 	}else if (session()->get('level')>0) {
// 		return redirect()->to('home/error');
// 	}else{
// 		return redirect()->to('home/login');
// 	}
// }
// public function input_daftar()
// {
// 	echo view ('header.php');
// 	echo view ('menu.php');
// 	echo view ('tambah_daftar.php');
// 	echo view ('footer.php');
// }
// public function simpan_daftar1()
// {
// 	date_default_timezone_set('Asia/Jakarta');
// 		// $a=$this->request->getPost('tanggalpendaftaran');
// 	$b=$this->request->getPost('idrm');
// 	$c=$this->request->getPost('no');
// 	$d=$this->request->getPost('keluhan');
// 	$Joyce= new M_gudang();

//     // Get the highest current "no_antrean"
// 		$lastQueueNumber = $Joyce->selectMax('no_antrean')->from('rekam_medis')->get()->getRow()->no_antrean;

//     // If no queue number exists (first record), start from 1
// 		if ($lastQueueNumber === null) {
// 			$newQueueNumber = 1;
// 		} else {
//         // Otherwise, increment the highest queue number by 1
// 			$newQueueNumber = $lastQueueNumber + 1;
// 		}


// 	$data = array(
// 		"tgl_pendaftaran"=> date('Y-m-d'),
// 		// "id_rm"=>$b,
// 		"no_antrean"=>$lastQueueNumber,
// 		"keluhan_pasien"=>$d
// 	);
// 	$Joyce->input('pendaftaran',$data);
// 	return redirect ()->to('home/dashdaftar');
// }
// public function hapus_daftar($id)
// {
// 	$Joyce= new M_gudang;
// 	$wece= array('id_pendaftaran' =>$id);
// 	$wendy['takdirestui']=$Joyce->hapus('pendaftaran',$wece);
// 	return redirect()->to('home/dashdaftar');
// }
// public function edit_daftar($id)
// {
// 	$Joyce= new M_gudang;
// 	$wece= array('id_pendaftaran' =>$id);
// 	$wendy['takdirestui']=$Joyce->getWhere('pendaftaran',$wece);
// 	echo view ('header.php');
// 	echo view ('menu.php');
// 	echo view ('daftar',$wendy);
// 	echo view ('footer.php');
// }
// public function simpan_daftar()
// {
// 	$a=$this->request->getPost('tanggalpendaftaran');
// 	$b=$this->request->getPost('idrm');
// 	$c=$this->request->getPost('no');
// 	$d=$this->request->getPost('keluhan');
// 	$id=$this->request->getPost('id');
// 	$Joyce= new M_gudang;
// 	$wece= array('id_pendaftaran' =>$id);
// 	$data = array(
// 		"tgl_pendaftaran"=>$a,
// 		"id_rm"=>$b,
// 		"no_antrean"=>$c,
// 		"keluhan_pasien"=>$d
// 	);
// 	$Joyce->edit('pendaftaran',$data, $wece);
// 	return redirect ()->to('home/dashdaftar');
// }
// public function formdaftar()
// {
// 	echo view ('header.php');
// 	echo view ('menu.php');
// 	echo view ('tambah_daftar.php');
// 	echo view ('footer.php');
public function printnota()
{
		$Joyce= new M_gudang;
		$where= ('id_bayar');
		$wendy['takdirestui']=$Joyce->join3('bayar','rekam_medis','pasien','bayar.id_rm=rekam_medis.id_rm','rekam_medis.id_pasien=pasien.id_pasien', $where);
		echo view ('printnota',$wendy);
}
public function printhistorinota($id)
{
    $Joyce = new M_gudang;
    $where=['bayar.id_bayar' => $id];
    $wendy['takdirestui'] = $Joyce->join32(
        'bayar', 
        'rekam_medis', 
        'pasien',
        'bayar.id_rm = rekam_medis.id_rm', 
        'rekam_medis.id_pasien = pasien.id_pasien',
        $where
    );

    echo view('printnota', $wendy);
}
}