<?php 

	class Layout
	{

		private $CI;
		
		function __construct()
		{
			$this->CI =& get_instance();
		}

		function view($view, $data = array())
		{
			$sub_view_html = $this->CI->load->view($view, $data, true);

			$master_data = array(
				'sub_view' => $sub_view_html
			);

			$this->CI->load->view("layout/layout", $master_data);
		}

		
	}

 ?>