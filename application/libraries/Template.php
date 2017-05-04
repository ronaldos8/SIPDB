<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function ShowAdmin($content, $data)
	{
		$data['__header'] = $this->ci->load->view('template/admin/header', $data, TRUE);
		$data['__navigation'] = $this->ci->load->view('template/admin/navigation', $data, TRUE);
		if (is_array($content)) {
			// jika body atau konten lebih dari satu
			foreach ($content as $value) {
				$data['__body'][] = $this->ci->load->view('admin/'.$value, $data, TRUE);
			}
		}else $data['__body'] = $this->ci->load->view('admin/'.$content, $data, TRUE);
		$data['__footer'] = $this->ci->load->view('template/admin/footer', $data, TRUE);

		$this->ci->load->view('template/admin/main', $data, FALSE);
	}

	function ShowUser($content, $data, $isLanding = FALSE)
	{
		$config['__header'] = $this->ci->load->view('template/user/header', $data, TRUE);
		if ($isLanding == FALSE) {
			$config['__navigation'] = $this->ci->load->view('template/user/navigation', $data, TRUE);
		}else {
			$config['__navigation'] = $this->ci->load->view('template/user/navigation2', $data, TRUE);
		}
		if (is_array($content)) {
			// jika body atau konten lebih dari satu
			foreach ($content as $value) {
				$config['__body'][] = $this->ci->load->view('user/'.$value, $data, TRUE);
			}
		}else $config['__body'] = $this->ci->load->view('user/'.$content, $data, TRUE);
		$data['isLanding'] = $isLanding;
		$config['__footer'] = $this->ci->load->view('template/user/footer', $data, TRUE);
		$this->ci->load->view('template/user/main', $config, FALSE);
	}
}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
