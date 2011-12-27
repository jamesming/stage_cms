<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();
        



   }

	
	/**
	 * index
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/index
	 * @access public
	 */
	 
	public function index(){
		 $this->inserts();    
	}
	
	/**
	 * questions
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/questions
	 * @access public
	 */
	 
	public function inserts(){
		
				$data = array();
		
				$this->load->view('questions/inserts_view', 
					array('data' => $data)
				);   
	}
	
	
	/**
	 * insert_questions
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/insert_questions
	 * @access public
	 */
	 
	public function insert_questions(){
		
		$db_response = $this->my_database_model->insert_table(
								'polls_questions', 
								$insert_what = array(
										'polls_name_id' => 1,
										'question' => $this->input->post('question') 
									)
								); 

		$this->show_list_of_questions();
				
	}	
	
	
	
	 /**
	 * show questions
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/show_questions
	 * @access public
	 */
	 
	public function show_list_of_questions(){

		$questions = $this->custom->get_polls_questions();
			
		foreach( $questions  as  $question){
			?><li> <?php  echo $question->question;   ?> </li><?php     

		}

	}
	
	
	
	/**
	 * ask
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/ask
	 * @access public
	 */
	 
	public function ask(){
		
		$data['questions'] = $this->custom->get_polls_questions();
			
		$this->load->view('questions/ask_view', 
			array('data' => $data)
		);   
				
	}		
	
	
	
	/**
	 * submit_answers
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/submit_answers
	 * @access public
	 */
	 
	public function submit_answers(){
		
		$polls_responder_id = $this->my_database_model->insert_table(
								'polls_responders', 
								$insert_what = array(
										'email' => $this->input->post('email') 
									)
								);

		foreach( $this->input->post()  as  $key => $value){
			
			if( $key != 'email'){
				
					$this->my_database_model->insert_table(
											'polls_answers', 
											$insert_what = array(
													'polls_responder_id' => $polls_responder_id,
													'polls_question_id' => $key,
													'answer' => $value
												)
											);		
				
			};
			
		}
		
?>	
<style>	
body { 
	font: 14px/1.5 Helvetica,Arial,'Liberation Sans',FreeSans,sans-serif;
	margin:0px;
	width:650px;
	}	
</style>
Thank you! We appreciate your feedback on Curvy Girls as we strive to bring nuvoTV's audience of vibrant, bold, driven bi-cultural Latinos the best in television entertainment.		
<?php     

	}		
	
	
	
	
	
	/**
	 * report
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/report
	 * @access public
	 */
	 
	public function report(){
		
		$data['responses'] = $this->custom->get_responses();
			
			$data['responses'] = $this->tools->object_to_array($data['responses']);
			
			
			$data['responses'] = $this->tools->arr_to_csv($data['responses'] );
			
			
			echo '<pre>';print_r(  $data['responses']  );echo '</pre>';  exit;
			
			
			exit;
			
		$this->load->view('questions/report_view', 
			array('data' => $data)
		);   
				
	}	
	
	
	
	
	function osmin_castings(){
		
		$this->load->view('questions/osmin_castings_view', 
			array('data' => array())
		); 
		
	}
	
	
	
	function osmin_thank_you(){	
		$this->load->view('questions/osmin_castings_thank_you_view', 
			array('data' => array())
		);   
	}	
	
	function insert_osmin_castings(){
		
		
//		$table = $this->input->post('table');
//		
//
//		$fields = explode('&', $this->input->post('set_what_array'));
//		foreach($fields as $field){
//			$field_key_value = explode("=",$field);
//			$key = urldecode($field_key_value[0]);
//			$value = urldecode($field_key_value[1]);
//			eval("$$key = \"$value\";");
//			$set_where_array[$key] = $value;
//		};	  
//
//
//		foreach( $set_where_array  as  $key => $value){
//				$fields_array = array(
//							$key => array('type' => 'varchar(255)')                                          
//            	); 
//
//				$this->my_database_model->add_column_to_table_if_exist(
//					$table, 
//					$fields_array
//				);    					
//		};
//		

		$table = 'osmin_castings';
		
		
		foreach( $this->input->post()  as  $key => $value){
				$fields_array = array(
							$key => array('type' => 'varchar(255)')                                          
            	); 

				$this->my_database_model->add_column_to_table_if_exist(
					$table, 
					$fields_array
				);    					
		};
		
		

		$last_insert_id = $this->my_database_model->insert_table(
										$table, 
										$insert_what = $this->input->post()
									); 
		
		$db_response = $this->my_database_model->update_table_where(
					$table, 
					$where_array = array('id'=>$last_insert_id),
					$set_what_array = $this->input->post()
					);
					
					
		$path_array = array(
			'folder'=> 'osmin_castings', 
			'osmin_casting_id'=> $last_insert_id
		);
		
		$upload_path = $this->tools->set_directory_for_upload( $path_array );
		
		$config['upload_path'] = './' . $upload_path;
//		$config['allowed_types'] = 'bmp|jpeg|gif|jpg|png|mp3|wmv|avi|flv|mpeg|mp4';
		$config['allowed_types'] = '*';
		$config['overwrite'] = 'TRUE';
		
		$this->load->library('upload', $config);
		
		
		
		if ( ! $this->upload->do_upload("Filedata")){
					 echo $this->upload->display_errors(); 
		}				
		
			$this->load->view('questions/osmin_castings_thank_you_view', 
			array('data' => array())
			); 

		
	}
	
	function osmin_casting_candidate(){
		
		$reports_raw = $this->my_database_model->select_from_table( 
			$table = 'osmin_castings', 
			$select_what = '*', 
			$where_array = array(), 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			);	
			
			
//		foreach( $reports_raw  as  $key => $value){
//			
//			$reports[$key] = $value;
//			
//			if( $key == id){
//				
//				$reports['file_location'] = base_url().'uploads/'';
//					
//			};
//			
//		}
			
		echo '<pre>';print_r(  $reports_raw  );echo '</pre>';  exit;
		
	}
	
	
	
	
	function model_latinas_castings(){
		
		$this->load->view('questions/model_latinas_castings_view', 
			array('data' => array())
		); 
		
	}
	
	
	
	function model_latinas_thank_you(){	
		$this->load->view('questions/model_latinas_castings_thank_you_view', 
			array('data' => array())
		);   
	}	
	
	function insert_model_latinas_castings(){
	
		$table = 'model_latinas_castings';
		
		
		foreach( $this->input->post()  as  $key => $value){
				$fields_array = array(
							$key => array('type' => 'varchar(255)')                                          
            	); 

				$this->my_database_model->add_column_to_table_if_exist(
					$table, 
					$fields_array
				);    					
		};
		
		

		$last_insert_id = $this->my_database_model->insert_table(
										$table, 
										$insert_what = $this->input->post()
									); 
		
		$db_response = $this->my_database_model->update_table_where(
					$table, 
					$where_array = array('id'=>$last_insert_id),
					$set_what_array = $this->input->post()
					);
					
					
		$path_array = array(
			'folder'=> 'model_latinas_castings', 
			'model_latinas_casting_id'=> $last_insert_id
		);
		
		$upload_path = $this->tools->set_directory_for_upload( $path_array );
		
		$config['upload_path'] = './' . $upload_path;
//		$config['allowed_types'] = 'bmp|jpeg|gif|jpg|png|mp3|wmv|avi|flv|mpeg|mp4';
		$config['allowed_types'] = '*';
		$config['overwrite'] = 'TRUE';
		
		$this->load->library('upload', $config);
		
		
		
		if ( ! $this->upload->do_upload("Filedata")){
					 echo $this->upload->display_errors(); 
		}				
		
			$this->load->view('questions/model_latinas_castings_thank_you_view', 
			array('data' => array())
			); 

		
	}
	
	function model_latinas_casting_candidate(){



		$reports_raw = $this->my_database_model->select_from_table( 
			$table = 'model_latinas_castings', 
			$select_what = '*', 
			$where_array = array(
			'first_name !='  => ''
			), 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			);	
			
			
//		foreach( $reports_raw  as  $key => $value){
//			
//			$reports[$key] = $value;
//			
//			if( $key == id){
//				
//				$reports['file_location'] = base_url().'uploads/'';
//					
//			};
//			
//		}
			
			
		foreach( $reports_raw  as  $key => $report_raw){
			
			
			foreach( $report_raw  as  $key => $value){
					if( $key == 'id'){
						
						$files = scandir("uploads/model_latinas_castings/".$report_raw->id);
						
						$report['image'] = ( isset( $files[2]) ? "<img src='".base_url()."uploads/model_latinas_castings/".$report_raw->id."/".$files[2]."' />":'' ) ;
					};
			}
			$report[$key] = $report_raw;
			$reports[] = $report;
			unset($report);
		}
		
		
		
		
		echo '<pre>';print_r(  $reports );echo '</pre>';  exit;
		
	}
	
	
		function t(){

			$table = 'model_latinas_castings';
			
			$this->my_database_model->	create_generic_table($table );
			

		}
	
	
	
	
	
	
	
	
}
/* End of file main.php */
/* Location: ./application/controllers/questions.php */