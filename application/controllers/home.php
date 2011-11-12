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
	


	public function test(){
	
			chmod('uploads/showpage_photos_items_images', 0755);
		
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
	
		$thumb_array = array(
			'folder'=> 'showpage_photos_items_images', 
			'showpage_item_id'=> $this->input->get('showpage_item_id'),
			'showpage_photos_item_id'=> $this->input->get('showpage_photos_item_id'),
			'sub_folder'=> 'thumb'
		);
		
		$this->tools->set_directory_for_upload( $thumb_array );
	
		$path_array = array(
			'folder'=> 'showpage_photos_items_images', 
			'showpage_item_id'=> $this->input->get('showpage_item_id'),
			'showpage_photos_item_id'=> $this->input->get('showpage_photos_item_id'),
			'sub_folder'=> 'fullsize'
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
		{?>
				<?php  echo $_FILES["Filedata"]['name'] . " has been successfully uploaded."."<br><br>";   ?>
				<iframe   style='0px;height:0px'   src='<?php  echo base_url()   ?>index.php/home/resize_images?filename=<?php  echo $_FILES["Filedata"]['name']   ?>&showpage_item_id=<?php echo $this->input->get('showpage_item_id') ?>&showpage_photos_item_id=<?php echo $this->input->get('showpage_photos_item_id')    ?>'></iframe>
		<?php     	
		}
	
	
	
	
	
}  
	

	
/**
	 * resize_images
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/resize_images
	 * @access public
	 **/ 
	 
	public function resize_images(){

	
	$dir_path = 'uploads/showpage_photos_items_images/'. $this->input->get('showpage_item_id').'/'. $this->input->get('showpage_photos_item_id').'/fullsize/'.$this->input->get('filename'); 
		
	$image_information = getimagesize($dir_path );
	
	$width_of_file = $image_information[0];
	$height_of_file = $image_information[1];

	
	$new_width  = '146';

	$new_height = $this->tools->get_new_size_of ($what = 'height', $based_on_new = $new_width, $orig_width = $width_of_file, $orig_height = $height_of_file );

	$this->tools->clone_and_resize_append_name_of(
		$appended_suffix = '_thumb', 
		$full_path = $dir_path, 
		$width = $new_width, 
		$height = $new_height
		);
		
	$new_name_array = explode('.',$this->input->get('filename'));
	$new_name = $new_name_array[0].'_thumb.'.$new_name_array[1];
	rename(
		'uploads/showpage_photos_items_images/'. $this->input->get('showpage_item_id').'/'. $this->input->get('showpage_photos_item_id').'/fullsize/' . $new_name, 
		'uploads/showpage_photos_items_images/'. $this->input->get('showpage_item_id').'/'. $this->input->get('showpage_photos_item_id').'/thumb/' . $new_name
	);
	
			
	}


function get_thumb_photos(){
	
		$dir = "./uploads/showpage_photos_items_images/".$this->input->post('showpage_item_id')."/".$this->input->post('showpage_photos_item_id')."/thumb";
		
		
		$images = ( file_exists($dir) ? scandir( $dir ): array() );

		for($i=2;$i<count($images);$i++){
			?>
			
			<img src='<?php echo base_url()    ?>uploads/showpage_photos_items_images/<?php echo  $this->input->post('showpage_item_id')   ?>/<?php echo  $this->input->post('showpage_photos_item_id')   ?>/thumb/<?php  echo $images[$i]   ?>'  />
			
			<?php     
		}
		
	
}


	
}
/* End of file main.php */
/* Location: ./application/controllers/home.php */