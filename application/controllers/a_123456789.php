<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A_123456789 extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		echo "redirecting...";
		header("Location: ../");
	}
}
?> 