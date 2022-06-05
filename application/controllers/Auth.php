<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$this->template->load('auth/template', 'auth/login');
	}

	public function profil()
	{
		$this->template->load(($this->session->userdata('level') == 1 ? 'admin' : 'user') . '/template', 'auth/profil');
	}

	function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('auth_m');
			$cek_username = $this->auth_m->auth($post);
			if ($cek_username->num_rows() > 0) {
				$cek_pass = $this->auth_m->auth_pass($post);
				if ($cek_pass->num_rows() > 0) {
					if ($cek_pass->row()->status_user == 1) {
						$user = [
							'user_id' => $cek_pass->row()->id_user,
							'nama' => $cek_pass->row()->nama_user,
							'email' => $cek_pass->row()->email_user,
							'level' => $cek_pass->row()->level_user,
						];
						$this->session->set_userdata($user);
						email_login();
						if ($cek_pass->row()->level_user == 1) {
							redirect('admin/dashboard');
						} else if ($cek_pass->row()->level_user == 2) {
							redirect('dashboard');
						} else {
							redirect('auth');
						}
					} else {
						$this->session->set_flashdata('Username', $post['username']);
						$this->session->set_flashdata('Password', $post['password']);
						$this->session->set_flashdata('warning', 'Akun Anda Belum Aktif, Silahkan Periksa Email Anda dan lakukan Activate!');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('Username', $post['username']);
					$this->session->set_flashdata('Password', $post['password']);
					$this->session->set_flashdata('error', 'Password Salah, Silahkan Coba Kembali!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('Username', $post['username']);
				$this->session->set_flashdata('Password', $post['password']);
				$this->session->set_flashdata('error', 'Username Salah, Silahkan Coba Kembali!');
				redirect('auth');
			}
		} else {
			redirect('auth');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function registrasi()
	{
		$post = $this->input->post(null, true);
		if (isset($post['cari'])) {
			$this->load->model('auth_m');
			$bynik = $this->auth_m->get_pemilih_unregistred('nik_pemilih', $post['key']);
			$byname = $this->auth_m->get_pemilih_unregistred('nama_pemilih', strtoupper($post['key']));
			if ($bynik->num_rows() > 0 || $byname->num_rows() > 0) {
				if ($bynik->num_rows() > 0) {
					$dpt = $bynik->row();
				} else if ($byname->num_rows() > 0) {
					$dpt = $byname->row();
				}
				if ($dpt->id_user != null) {
					$this->session->set_flashdata('Key', $post['key']);
					$this->session->set_flashdata('warning', 'Data Pemilih ini telah memiliki akun! <br> apabila lupa akun silahkan menuju ke halaman login dan pilih lupa password!');
					$this->template->load('auth/template', 'auth/registrasi');
				} else {
					$data['row'] = $dpt;
					$this->session->set_flashdata('succes', 'Data Daftar Pemilih Tetap anda ditemukan!');
					$this->template->load('auth/template', 'auth/registrasi', $data);
				}
			} else {
				$this->session->set_flashdata('Key', $post['key']);
				$this->session->set_flashdata('error', 'NIK/ID/NAMA anda tidak terdaftar!');
				redirect('registrasi');
			}
		} else {
			blocked_access(sistem()->fitur_registrasi, 'auth');
			$this->template->load('auth/template', 'auth/registrasi');
		}
	}

	public function registrasi_proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['register'])) {
			if (cek_user('email_user', $post['u_email'])->num_rows() == 0 && cek_user('username_user', $post['u_user'])->num_rows() == 0) {
				$this->load->model('admin/account_m');
				$post['id_usr'] = random_string('alnum', 25);
				$post['u_name'] = ucfirst($post['nama']);
				$post['u_level'] = 2;
				$post['u_status'] = 0;
				$this->account_m->insert($post);
				if ($this->db->affected_rows() > 0) {
					set_dpt_user($post['id'], $post['id_usr']);
					$messages = '
					Hai, ' . $post['nama'] . ' <br><br>
					Anda Telah berhasil Melakukan Registrasi Akun DPT pada Portal KPU Kota Yogyakarta. <br>
					
					Silahkan Klik link Aktivasi Dibawah ini : <br><br>
					<form action="' . site_url('registrasi/aktivasi') . '" method="POST">
						<input type="hidden" name="id" value="' . $post['id_usr'] . '" />
						<button type="submit" name="active" onclick="return confirm("Konfirmasi Aktivasi Akun ?")"> Aktivasi Akun </button>
					</form>

					<br>Jika Anda tidak mencoba melakukan Pendaftaran akun, silahkan hiraukan pesan ini<br>
					
					Terima kasih,<br>
					
					KPU Kota Yogyakarta';
					$recovery = [
						'destination' => $post['u_email'],
						'subject' => 'Pendaftaran Akun DPT KPU Kota Yogyakarta',
						'massage' => $messages
					];
					$send = smtp_email($recovery);
					if ($send == 1) {
						$this->session->set_flashdata('succes', 'Data Pengguna Baru Berhasil di Didaftarkan!<br> Silahkan Periksa Email anda untuk Aktivasi Akun!');
						redirect('auth');
					} else {
						$this->session->set_flashdata('warning', 'Data Pengguna Baru Berhasil di Didaftarkan!<br> Namun Email Aktivasi gagal dikirim, Silahkan hubungi admin!');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('Email', $post['u_mail']);
					$this->session->set_flashdata('Username', $post['u_user']);
					$this->session->set_flashdata('Password', $post['u_pass']);
					$this->session->set_flashdata('error', 'Data Gagal Didaftarkan, Sistem Error!');
					redirect('registrasi/' . $post['id']);
				}
			} else {
				$this->session->set_flashdata('Email', $post['u_mail']);
				$this->session->set_flashdata('Username', $post['u_user']);
				$this->session->set_flashdata('Password', $post['u_pass']);
				$this->session->set_flashdata('warning', 'Email atau Username sudah digunakan, silahkan coba email atau username lain!');
				redirect('registrasi/' . $post['id']);
			}
		} else if (isset($post['active'])) {
			$this->load->model('auth_m');
			$this->auth_m->activate($post['id']);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', 'Aktivasi Akun anda berhasil!<br> Silahkan Login ke sistem !');
				redirect('auth');
			} else {
				$this->session->set_flashdata('error', 'Aktivasi Gagal, <br> Sistem Error atau akun sudah Teraktivasi!');
				redirect('auth');
			}
		} else {
			redirect('auth');
		}
	}

	public function forgot()
	{
		$post = $this->input->post(null, true);
		if (isset($post['forgot'])) {
			$this->load->model('auth_m');
			if ($this->auth_m->get_user_bymail($post['email'])->num_rows() > 0) {
				$data = $this->auth_m->get_user_bymail($post['email'])->row();
				$messages = '
				Hai, ' . $data->nama_user . ' <br><br>
				Anda Telah berhasil Melakukan Permintaan Lupa Akun/Password Akun DPT pada Portal KPU Kota Yogyakarta. <br>
				
				Silahkan Klik Tombol Verifikasi Email Dibawah ini : <br><br>
				<form action="' . site_url('forgot') . '" method="POST">
					<input type="hidden" name="id" value="' . $data->id_user . '" />
					<input type="hidden" name="token" value="' . date('YdmH') . '" />
					<button type="submit" name="validation" > Verifikasi Email </button>
				</form>

				<br>Jika Anda tidak mencoba Permintaan Lupa Akun/Password akun, silahkan hiraukan pesan ini<br>
				
				Terima kasih,<br>
				
				KPU Kota Yogyakarta';
				$recovery = [
					'destination' => $post['email'],
					'subject' => 'Pendaftaran Akun DPT KPU Kota Yogyakarta',
					'massage' => $messages
				];
				$send = smtp_email($recovery);
				if ($send == 1) {
					$this->session->set_flashdata('succes', 'Pemintaan Lupa Akun/Password Berhasil dikirim<br> Silahkan Periksa Email anda untuk Verifikasi Akun!');
					redirect('auth');
				} else {
					$this->session->set_flashdata('error', 'Pemintaan Lupa Akun/Password Gagal dikirim!<br> Silahkan Lakukan Kembali Permintaan Lupa Akun/Password!');
					redirect('forgot');
				}
			} else {
				$this->session->set_flashdata('Email', $post['email']);
				$this->session->set_flashdata('error', 'Email Anda tidak terdaftar pada sistem! <br> silahkan periksa kembali email anda!');
				redirect('forgot');
			}
		} else if (isset($post['validation'])) {
			if ($post['token'] == date('YdmH')) {
				$this->load->model('auth_m');
				if ($this->auth_m->get_user_byid($post['id'])->num_rows() > 0) {
					$data['row'] = $this->auth_m->get_user_byid($post['id'])->row();
					$this->template->load('auth/template', 'auth/forgot', $data);
				} else {
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('warning', 'Link Sudah Usang! <br> silahkan melakukan permintaan reset akun kembali!');
				redirect('auth');
			}
		} else if (isset($post['proses'])) {
			$this->load->model('auth_m');
			$this->auth_m->update_forgot($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', 'Data Pengguna Berhasil di Diperbaharui!');
				redirect('auth');
			} else {
				$this->session->set_flashdata('error', 'Data Pengguna Gagal di Diperbaharui, <br> Sistem Error!');
				redirect('auth');
			}
		} else {
			$this->template->load('auth/template', 'auth/forgot');
		}
	}

	function get_kelurahan_multiple()
	{
		$this->load->model('user/pengajuan_m');
		$id_kec = $this->input->post('id', TRUE);
		$data = $this->pengajuan_m->get_kel($id_kec)->result();
		echo json_encode($data);
	}

	function profil_proses()
	{
		$post = $this->input->post(null, true);
		$this->load->model('auth_m');
		if (isset($post['images'])) {
			$config['upload_path']    = './assets/images/users';
			$config['allowed_types']  = 'jpg|png|jpeg|ico';
			$config['max_size']       = 2000;
			$config['file_name']       = 'user-' . profil()->nama_user;
			$this->load->library('upload', $config);
			$gambar = $this->upload->do_upload('image');
			if ($gambar == true) {
				if (profil()->image_user != null) {
					$target_file = './assets/images/users/' . profil()->image_user;
					unlink($target_file);
					$post['image'] = $this->upload->data('file_name');
				} else if (profil()->image_user == null) {
					$post['image'] = $this->upload->data('file_name');
				}
				$this->auth_m->update_img_user($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', 'Gambar Profil Berhasil Diperbaharui!');
					redirect('profil');
				} else {
					$this->session->set_flashdata('error', 'Gambar Profil Gagal Diperbaharui!, <br> Sistem Error!');
					redirect('profil');
				}
			} else {
				$this->session->set_flashdata('error', 'Gagal Memuat Gambar, <br> Sistem Error!');
				redirect('profil');
			}
		} else if (isset($post['profil'])) {
			$this->auth_m->update_profil($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', 'Data Pengguna anda berhasil Diperbaharui!');
				redirect('profil');
			} else {
				$this->session->set_flashdata('error', 'Data Pengguna anda Gagal Diperbaharui!, <br> Sistem Error!');
				redirect('profil');
			}
		} else {
			redirect('profil');
		}
	}
}
