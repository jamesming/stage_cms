<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	

   public function __construct(){
        parent::__construct();
        
		/// TESTing this this again.


   }

	
	/**
	 * index.
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/index
	 * @access public
	 */
	 
	public function index(){
		$this->login();    
	}
	

	/**
	 * login
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/login
	 * @access public
	 */

	public function login(){
		
		if( $this->input->post() ){
			
			$this->load->library('custom');
			
			$validation = $this->custom->login_process($post_array = $this->input->post());
			
			if( $validation['is'] == 'true'	){
				
					$newdata = array('user_id' => $validation['id'] );						
						
					$this->session->set_userdata($newdata);
					
					
					
						redirect('/main/index/');

				
					
						
								
			}else{
				
					$this->load->view('home/login_view',
					array(
						'validation'=> $validation,
						'post_array'=> $this->input->post()
					)
					);		
								
			};
			
		}else{
				$this->load->view('home/login_view');			
		};
		

	}
	
	
	/**
	 * logout
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/logout
	 * @access public
	 */

	public function logout(){	
		
		$this->session->sess_create();	
		
		redirect('/home/login');
		
	}
	
	
/**
	* Flash will not pass through your existing PHP Session information, so if you are getting the 302 error it is likely that your application is returning the login URL to the Flash player. To resolve this issue, you could include the session information in scriptData and manage it manually in your application.
	* Using the home controller instead of the main controller since main contructor contains code to boot users that do not have sessions.
	*
	* upload_photos
	*
	* {@source }
	* @package BackEnd
	* @author James Ming <jamesming@gmail.com>
	* @path /index.php/home/upload_photos
	* @access public
	**/ 

function upload_photos(){
	
	$this->load->view('main/showpage/items/upload_photos_view', array(
		'showpage_item_id' => $this->input->get('showpage_item_id')
	));	
	
}



/**
	* Flash will not pass through your existing PHP Session information, so if you are getting the 302 error it is likely that your application is returning the login URL to the Flash player. To resolve this issue, you could include the session information in scriptData and manage it manually in your application.
	* Using the home controller instead of the main controller since main contructor contains code to boot users that do not have sessions.
	*
	* upload_photos success
	*
	* {@source }
	* @package BackEnd
	* @author James Ming <jamesming@gmail.com>
	* @path /index.php/home/upload_photos_success
	* @access public
	**/ 

function upload_photos_success(){
	
		$path_array = array(
			'folder'=> 'showpage_photos_items_images', 
			'showpage_item_id'=> $this->input->get('showpage_item_id')
		);
		
		$upload_path = $this->tools->set_directory_for_upload( $path_array );
		
		$config['upload_path'] = './' . $upload_path;
		$config['allowed_types'] = '*';
		$config['overwrite'] = 'TRUE';
		
		$this->load->library('upload', $config);
		
	
		if ( ! $this->upload->do_upload("Filedata")){
			
 			 		echo $this->upload->display_errors();
 			 		exit;	
			
		}	
		else
		{
				echo $_FILES["Filedata"]['name'] . " has been successfully uploaded."."<br><br>";
			
		}
	
	
	
	
	
}  
	
	
	
}
/* End of file main.php */
/* Location: ./application/controllers/home.php */