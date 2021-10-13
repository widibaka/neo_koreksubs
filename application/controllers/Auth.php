<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function login()
	{

		$this->load->model('AuthModel');

		//**
	    // Login with Google
	    //**

		    //include the google OAuth configuration
		    require("assets/google_api/vendor/autoload.php");
		    //Step 1: Enter you google account credentials

			$jwt = new \Firebase\JWT\JWT;
			$jwt::$leeway = 5*60; // adjust this value

			// we explicitly pass jwt object whose leeway is set to 60
			$g_client = new \Google_Client(['jwt' => $jwt]);


			$g_client->setClientId("91581392252-8967kib5tsjpks14vsd0scoqno5v0477.apps.googleusercontent.com");
	 		$g_client->setClientSecret("HrC_h2qr6BsuLFwYOGXkeXqH");
	 		$g_client->setRedirectUri( base_url('auth/login') );
	 		$g_client->addScope("email");
	 		$g_client->addScope("profile");

		    //Step 2 : Create the url
		    $auth_url = $g_client->createAuthUrl();
		    $data['auth_url'] = $auth_url;

		    //Step 3 : Get the authorization  code
		    $code = isset($_GET['code']) ? $_GET['code'] : NULL;

		    //Step 4: Get access token
		    if (isset($code)) {

		      try {

		        $token = $g_client->fetchAccessTokenWithAuthCode($code);
		        $g_client->setAccessToken($token);
		      } catch (Exception $e) {
		        $e->getMessage();
		      }

		      try {
		        $pay_load = $g_client->verifyIdToken(); // ini kalo berhasil

		      } catch (Exception $e) {
		        $e->getMessage();
		        $this->session->set_flashdata('msg', 'error#Silakan coba lagi.' . $e->getMessage() ); // <-- untuk testing
		        redirect( base_url() . $this->uri->uri_string() );
		      }
		    } else {
		      $pay_load = null;
		    }

	    //**
	    // /.Login with Google
	    //**
		if ( !empty($pay_load) ) {
			$check_result = $this->AuthModel->check_user( $pay_load );

			if ( $check_result['diblokir'] == '1' ) {
				$this->session->set_flashdata('msg', 'error#Akun ini telah diblokir!');
				redirect(base_url() . 'auth/login' );
			}

			if ($check_result) {
				$this->session->set_userdata($check_result);
				redirect(base_url() );
			}
			if (!$check_result) {
				$this->session->set_flashdata('msg', 'error#Login gagal');
				redirect(base_url() . 'auth/login' );
			}
		}

		$this->load->view('auth/v_login', $data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
