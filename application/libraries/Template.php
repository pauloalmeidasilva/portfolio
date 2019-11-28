<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Template {
 
		function showDashboard($view, $data=array()){
 
			$CI = & get_instance();
 
			// Load header
			$CI->load->view('template_dashboard/head',$data);

			// Load menu
			$CI->load->view('template_dashboard/menu',$data);
 
			// Load content
			$CI->load->view($view,$data);
 
			// Load footer
			$CI->load->view('template_dashboard/footer',$data);
		}

		function showLogin($view, $data=array()){
 
			$CI = & get_instance();
 
			// Load header
			$CI->load->view('template_dashboard/head',$data);
 
			// Load content
			$CI->load->view($view,$data);
 
			// Load footer
			$CI->load->view('template_dashboard/footer',$data);
		}

		function showsite($view, $data=array()){
 
			$CI = & get_instance();
 
			// Load header
			$CI->load->view('template_site/head',$data);

			// Load menu
			$CI->load->view('template_site/menu',$data);
 
			// Load content
			$CI->load->view($view,$data);
 
			// Load footer
			$CI->load->view('template_site/footer',$data);
		}
}