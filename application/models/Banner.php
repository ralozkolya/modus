<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Model {

	protected $upload_path = 'static/uploads/banners/';

	protected $table = 'banners';
	protected $with_image = TRUE;
	protected $image_required = TRUE;

}

/* End of file Banner.php */
/* Location: ./application/models/Banner.php */