<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Custom Library Related to SceneCredit
 * @autoloaded YES
 * @path \system\application\libraries\Custom.php
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0
 * 
 */
class Query {

private $CI;			// CodeIgniter instance


function query(){
	
	$this->CI =& get_instance();	
	
}


/**
 * update( 
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return string  */ 
	
	function update( $post_array, $user_id = 1 ){
		

		switch ( $post_array['crud'] ) {
	
	    case 'insert':

					$db_response = $this->CI->my_database_model->insert_table(
													$post_array['table'], 
													$insert_what = array()
													); 
	
	    break;
	    
	    case 'insert_with_showpage_id':

					$db_response = $this->CI->my_database_model->insert_table(
													$post_array['table'], 
													$insert_what = array(
														'showpage_item_id' => $post_array['showpage_item_id']
													)
													); 
	
	    break;	    
	    
	    
	    case 'update':

					$fields = explode('&', $post_array['set_what_array']);
					foreach($fields as $field){
						$field_key_value = explode("=",$field);
						$key = urldecode($field_key_value[0]);
						$value = urldecode($field_key_value[1]);
						eval("$$key = \"$value\";");
						$set_where_array[$key] = $value;
					};

					$db_response = $this->CI->my_database_model->update_table_where(
								$table = $post_array['table'], 
								$where_array = array('id'=>$post_array['id']),
								$set_what_array = $set_where_array
								);
	
	    break;
	    
	    
	    case 'delete_nu_spotlight_item':
	    
 
				$table = 'nu_spotlight_items_sets';
				$where_array = array(
						'nu_spotlight_item_id' => $post_array['nu_spotlight_item_id']
				);
		
				$result = $this->CI->my_database_model->check_if_exist($where_array, $table );
		
				if( $result == TRUE ){
					$db_response = 'Error.  You can not remove items that are already included in sets.';
				}else{
					$this->remove_nu_spotlight_item($post_array);
					$db_response = 'ok';
				};

	    break;
	    
	    
	    
	    case 'delete_carousel_item':
	    
 
				$table = 'carousel_items_sets';
				$where_array = array(
						'carousel_item_id' => $post_array['carousel_item_id']
				);
		
				$result = $this->CI->my_database_model->check_if_exist($where_array, $table );
		
				if( $result == TRUE ){
					$db_response = 'Error.  You can not remove items that are already included in sets.';
				}else{
					$this->remove_carousel_item($post_array);
					$db_response = 'ok';
				};

	    break;
	    
	    case 'delete_feature_item':
	    
 
				$db_response = 'This feature is not built yet.';

	    break;
		};

		return $db_response;
		
		
	}	







/**
 * get_carousel_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_carousel_items( $where_array = array()){
		
			$carousel_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'carousel_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			);
			
			$carousel_items_raw = $this->CI->tools->object_to_array($carousel_items_raw);
			
			foreach( $carousel_items_raw  as  $keyA => $carousel_item_raw){

				foreach( $carousel_item_raw  as  $field => $value){
					
					$carousel_item[$field] = $value;
					
					if( $field == 'id' ){
						
	


						$carousel_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'carousel_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'carousel_item_id'=> $value,
																		'image_type_id' => 1 // HERO IMAGE
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
										
						
						if( count($carousel_items_images) > 0){				
							
							$carousel_item['hero_carousel_items_image_id'] = $carousel_items_images[0]->id;
							
							
						}else{
							
							$carousel_item['hero_carousel_items_image_id'] = 0;
							
						};
						
						$carousel_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'carousel_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'carousel_item_id'=> $value,
																		'image_type_id' => 6 // RIGHT TAB
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
										
						
						if( count($carousel_items_images) > 0){				
							
							$carousel_item['right_tab_carousel_items_image_id'] = $carousel_items_images[0]->id;
							
							
						}else{
							
							$carousel_item['right_tab_carousel_items_image_id'] = 0;
							
						};
						
						
						$carousel_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'carousel_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'carousel_item_id'=> $value,
																		'image_type_id' => 3 // TUNE IN
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
										
						
						if( count($carousel_items_images) > 0){				
							
							$carousel_item['tune_in_carousel_items_image_id'] = $carousel_items_images[0]->id;
							
							
						}else{
							
							$carousel_item['tune_in_carousel_items_image_id'] = 0;
							
						};		
						
						$carousel_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'carousel_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'carousel_item_id'=> $value,
																		'image_type_id' => 7 // HERO IPHONE
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
										
						
						if( count($carousel_items_images) > 0){				
							
							$carousel_item['hero_iphone_carousel_items_image_id'] = $carousel_items_images[0]->id;
							
							
						}else{
							
							$carousel_item['hero_iphone_carousel_items_image_id'] = 0;
							
						};	
						
						$carousel_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'carousel_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'carousel_item_id'=> $value,
																		'image_type_id' => 8 // RIGHT_TAB IPHONE
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
										
						
						if( count($carousel_items_images) > 0){				
							
							$carousel_item['right_tab_iphone_carousel_items_image_id'] = $carousel_items_images[0]->id;
							
							
						}else{
							
							$carousel_item['right_tab_iphone_carousel_items_image_id'] = 0;
							
						};		
						
						
						
						$carousel_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'carousel_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'carousel_item_id'=> $value,
																		'image_type_id' => 9 // TUNE IN IPHONE
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
										
						
						if( count($carousel_items_images) > 0){				
							
							$carousel_item['tune_in_iphone_carousel_items_image_id'] = $carousel_items_images[0]->id;
							
							
						}else{
							
							$carousel_item['tune_in_iphone_carousel_items_image_id'] = 0;
							
						};																									
						
	
					};
					
					

				};
				
		
				$carousel_items[] = $carousel_item;
				
			};
			
			
			return $carousel_items;	
		
	}





//function get_carousel_items_image(
//	$carousel_item_id,
//	$image_type_id	
//){
//	
//	return $carousel_items_image_id
//}


/**
 * get_carousel_sets
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 

	function get_carousel_sets( $where_array = array()){
		
				$carousel_sets_raw = $this->CI->my_database_model->select_from_table( 
														$table = 'carousel_sets', 
														$select_what = '*', 
														$where_array, 
														$use_order = TRUE, 
														$order_field = 'created', 
														$order_direction = 'desc', 
														$limit = -1
														);
					
				
				$carousel_sets_raw = $this->CI->tools->object_to_array($carousel_sets_raw);
				
					
				foreach( $carousel_sets_raw  as  $carousel_set ){
					
					foreach( $carousel_set as  $field => $value){
						
						if( $field == 'id' ){
							
							
								$join_array = array(
												'carousel_items' => 'carousel_items_sets.carousel_item_id = carousel_items.id',
												'carousel_items_images' => 'carousel_items.id = carousel_items_images.carousel_item_id'
												);
							
							
								$carousel_items_sets = $this->CI->my_database_model->select_from_table( 
																				$table = 'carousel_items_sets', 
																				$select_what = 'carousel_items_sets.order, 
																												carousel_items_sets.carousel_item_id, 
																												carousel_items_images.id as carousel_items_image_id',
																				$where_array = array(
																					'carousel_set_id' => $value,
																					'carousel_items_images.image_type' => 'right_tab' 
																				), 
																				$use_order = TRUE, 
																				$order_field = 'order', 
																				$order_direction = 'asc', 
																				$limit = -1,
																				$use_join = TRUE, 
																				$join_array
																				);
																					
							$carousel_set['carousel_items_sets'] = $carousel_items_sets;
																			
						}else{
							$carousel_set[$field] = $value;				
						}
			
					}
					
					$carousel_sets[] = $carousel_set;				
					
				}
				
				
		if( isset($carousel_sets)  ){

				return $carousel_sets;		
					
		};


	}


/**
 * remove_carousel_item
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return   */ 
	
	function remove_carousel_item($post_array){

				$get_carousel_items =$this->get_carousel_items(
							$where_array = array( 'id' => $post_array['carousel_item_id']) 
				);

				$hero_carousel_items_image_id  = $get_carousel_items[0]['hero_carousel_items_image_id'];

							$dir_path = 'uploads/carousel_items_images/' 
							. $hero_carousel_items_image_id . '/';
					
							$this->CI->tools->recursiveDelete($dir_path);
							
							$this->CI->my_database_model->delete_from_table(
								$table = 'carousel_items_images', 
								$where_array = array(
									'id' => $hero_carousel_items_image_id 
								)
							);	
							
				
				$right_tab_carousel_items_image_id  = $get_carousel_items[0]['right_tab_carousel_items_image_id'];

							$dir_path = 'uploads/carousel_items_images/' 
							. $right_tab_carousel_items_image_id . '/';
					
							$this->CI->tools->recursiveDelete($dir_path);
							
							$this->CI->my_database_model->delete_from_table(
								$table = 'carousel_items_images', 
								$where_array = array(
									'id' => $right_tab_carousel_items_image_id 
								)
							);	
				

				$tune_in_carousel_items_image_id  = $get_carousel_items[0]['tune_in_carousel_items_image_id'];

							$dir_path = 'uploads/carousel_items_images/' 
							. $tune_in_carousel_items_image_id . '/';
					
							$this->CI->tools->recursiveDelete($dir_path);
							
							$this->CI->my_database_model->delete_from_table(
								$table = 'carousel_items_images', 
								$where_array = array(
									'id' => $tune_in_carousel_items_image_id 
								)
							);	
				
				$this->CI->my_database_model->delete_from_table(
					$table = $post_array['table'], 
					$where_array = array(
						'id' => $post_array['carousel_item_id']
					)
				);	
				

	}




/**
 * remove_nu_spotlight_item
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return   */ 
	
	function remove_nu_spotlight_item($post_array){

				$get_nu_spotlight_items =$this->get_nu_spotlight_items(
							$where_array = array( 'id' => $post_array['nu_spotlight_item_id']) 
				);

				$feature_nu_spotlight_items_image_id  = $get_nu_spotlight_items[0]['feature_nu_spotlight_items_image_id'];

							$dir_path = 'uploads/nu_spotlight_items_images/' 
							. $feature_nu_spotlight_items_image_id . '/';
					
							$this->CI->tools->recursiveDelete($dir_path);
							
							$this->CI->my_database_model->delete_from_table(
								$table = 'nu_spotlight_items_images', 
								$where_array = array(
									'id' => $feature_nu_spotlight_items_image_id 
								)
							);	
							
				
				$thumb_nu_spotlight_items_image_id  = $get_nu_spotlight_items[0]['thumb_nu_spotlight_items_image_id'];

							$dir_path = 'uploads/nu_spotlight_items_images/' 
							. $thumb_nu_spotlight_items_image_id . '/';
					
							$this->CI->tools->recursiveDelete($dir_path);
							
							$this->CI->my_database_model->delete_from_table(
								$table = 'nu_spotlight_items_images', 
								$where_array = array(
									'id' => $thumb_nu_spotlight_items_image_id 
								)
							);	
				
				$this->CI->my_database_model->delete_from_table(
					$table = $post_array['table'], 
					$where_array = array(
						'id' => $post_array['nu_spotlight_item_id']
					)
				);	

	}

/**
 * get_nu_spotlight_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_nu_spotlight_items( $where_array = array() ){
		
			$nu_spotlight_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'nu_spotlight_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc', 
			$limit = -1
			);
			
			$nu_spotlight_items_raw = $this->CI->tools->object_to_array($nu_spotlight_items_raw);
			
			foreach( $nu_spotlight_items_raw  as  $keyA => $nu_spotlight_item_raw){

				foreach( $nu_spotlight_item_raw  as  $field => $value){
					
					$nu_spotlight_item[$field] = $value;
					
					if( $field == 'id' ){
						
						$nu_spotlight_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'nu_spotlight_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'nu_spotlight_item_id'=> $value,
																		'image_type' => 'feature'
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
										
						
						if( count($nu_spotlight_items_images) > 0){				
							
							$nu_spotlight_item['feature_nu_spotlight_items_image_id'] = $nu_spotlight_items_images[0]->id;
							
							
						}else{
							
							$nu_spotlight_item['feature_nu_spotlight_items_image_id'] = 0;
							
						};
						
						$nu_spotlight_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'nu_spotlight_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'nu_spotlight_item_id'=> $value,
																		'image_type' => 'thumb'
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
										
						
						if( count($nu_spotlight_items_images) > 0){				
							
							$nu_spotlight_item['thumb_nu_spotlight_items_image_id'] = $nu_spotlight_items_images[0]->id;
							
							
						}else{
							
							$nu_spotlight_item['thumb_nu_spotlight_items_image_id'] = 0;
							
						};
	
					};
					
					

				};
				
		
				$nu_spotlight_items[] = $nu_spotlight_item;
				
			};
			

			
			return $nu_spotlight_items;
			
	}


/**
 * get_feature_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_feature_items( $where_array = array() ){
		
			$feature_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'feature_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc', 
			$limit = -1
			);
			


			$feature_items_raw = $this->CI->tools->object_to_array($feature_items_raw);
			
			foreach( $feature_items_raw  as  $keyA => $feature_item_raw){

				foreach( $feature_item_raw  as  $field => $value){
					
					$feature_item[$field] = $value;
					
					if( $field == 'id' ){

						
						$feature_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'feature_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'feature_item_id'=> $value,
																		'image_type_id' => '17'
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
				
						
						if( count($feature_items_images) > 0){				
							
							$feature_item['feature_items_image_id'] = $feature_items_images[0]->id;
							
							
						}else{
							
							$feature_item['feature_items_image_id'] = 0;
							
						};
						

	
					};
					
					

				};
				
		
				$feature_items[] = $feature_item;
				
			};
			

			if( isset($feature_items)){
				return $feature_items;
			}else{
				return;
			};
			
			
	}

/**
 * get_showpage_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_showpage_items( $where_array = array() ){
		
			$showpage_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'showpage_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc', 
			$limit = -1
			);
			


			$showpage_items_raw = $this->CI->tools->object_to_array($showpage_items_raw);
			
			foreach( $showpage_items_raw  as  $keyA => $showpage_item_raw){

				foreach( $showpage_item_raw  as  $field => $value){
					
					$showpage_item[$field] = $value;
					
					if( $field == 'id' ){

						
						$showpage_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'showpage_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'showpage_item_id'=> $value,
																		'image_type_id' => '10'
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
				
						
						if( count($showpage_items_images) > 0){				
							
							$showpage_item['showpage_items_image_id'] = $showpage_items_images[0]->id;
							
							
						}else{
							
							$showpage_item['showpage_items_image_id'] = 0;
							
						};
						

	
					};
					
					

				};
				
		
				$showpage_items[] = $showpage_item;
				
			};
			

			if( isset($showpage_items)){
				return $showpage_items;
			}else{
				return;
			};
			
			
	}
	
	
	
/**
 * get_showpage_cast_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_showpage_cast_items( $where_array = array() ){
		
			$showpage_cast_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'showpage_cast_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc', 
			$limit = -1
			);
			


			$showpage_cast_items_raw = $this->CI->tools->object_to_array($showpage_cast_items_raw);
			
			foreach( $showpage_cast_items_raw  as  $keyA => $showpage_item_raw){

				foreach( $showpage_item_raw  as  $field => $value){
					
					$showpage_item[$field] = $value;
					
					if( $field == 'id' ){

						
						$showpage_cast_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'showpage_cast_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'showpage_cast_item_id'=> $value,
																		'image_type_id' => '13'
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
				
						
						if( count($showpage_cast_items_images) > 0){				
							
							$showpage_item['showpage_cast_items_image_id'] = $showpage_cast_items_images[0]->id;
							
							
						}else{
							
							$showpage_item['showpage_cast_items_image_id'] = 0;
							
						};
						

	
					};
					
					

				};
				
		
				$showpage_cast_items[] = $showpage_item;
				
			};
			

			if( isset($showpage_cast_items)){
				return $showpage_cast_items;
			}else{
				return;
			};
			
			
	}
	
/**
 * get_showpage_feature_feature_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_showpage_feature_items( $where_array = array() ){
		
			$showpage_feature_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'showpage_feature_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc', 
			$limit = -1
			);
			


			$showpage_feature_items_raw = $this->CI->tools->object_to_array($showpage_feature_items_raw);
			
			foreach( $showpage_feature_items_raw  as  $keyA => $showpage_feature_item_raw){

				foreach( $showpage_feature_item_raw  as  $field => $value){
					
					$showpage_feature_item[$field] = $value;
					
					if( $field == 'id' ){

						
						$showpage_feature_items_images = $this->CI->my_database_model->select_from_table( 
										$table = 'showpage_feature_items_images', 
										$select_what = '*', 
										$where_array = array(
																		'showpage_feature_item_id'=> $value,
																		'image_type_id' => '16'
																		), 
										$use_order = FALSE, 
										$order_field = '', 
										$order_direction = 'desc', 
										$limit = -1
										);
										
				
						
						if( count($showpage_feature_items_images) > 0){				
							
							$showpage_feature_item['showpage_feature_items_image_id'] = $showpage_feature_items_images[0]->id;
							
							
						}else{
							
							$showpage_feature_item['showpage_feature_items_image_id'] = 0;
							
						};
						

	
					};
					
					

				};
				
		
				$showpage_feature_items[] = $showpage_feature_item;
				
			};
			

			if( isset($showpage_feature_items)){
				return $showpage_feature_items;
			}else{
				return;
			};
			
			
	}
/**
 * get_carousel_sets_calendars
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 

	function get_carousel_sets_calendars(
						$month,
						$year
					){
						
					$join_array = array(
									'carousel_sets' => 'carousel_sets.id = carousel_sets_calendars.carousel_set_id'
									);
				
				
					$carousel_items_sets = $this->CI->my_database_model->select_from_table( 
																	$table = 'carousel_sets_calendars', 
																	$select_what = 'carousel_sets_calendars.id,
																									carousel_sets_calendars.month,
																	 								carousel_sets_calendars.day,
																	 								carousel_sets_calendars.year,
																									carousel_sets.name,
																									carousel_sets.id AS carousel_set_id
																									',
																	$where_array = array(
																		'carousel_sets_calendars.month' => $month,
																		'carousel_sets_calendars.year' => $year 
																	), 
																	$use_order = TRUE, 
																	$order_field = 'day', 
																	$order_direction = 'asc', 
																	$limit = -1,
																	$use_join = TRUE, 
																	$join_array
																	);
																	

		return $carousel_items_sets;
	}


/**
 * get_nu_spotlight_sets_calendars
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 

	function get_nu_spotlight_sets_calendars(
						$month,
						$year
					){
						
					$join_array = array(
									'nu_spotlight_sets' => 'nu_spotlight_sets.id = nu_spotlight_sets_calendars.nu_spotlight_set_id'
									);
				
				
					$nu_spotlight_items_sets = $this->CI->my_database_model->select_from_table( 
																	$table = 'nu_spotlight_sets_calendars', 
																	$select_what = 'nu_spotlight_sets_calendars.id,
																									nu_spotlight_sets_calendars.month,
																	 								nu_spotlight_sets_calendars.day,
																	 								nu_spotlight_sets_calendars.year,
																									nu_spotlight_sets.name,
																									nu_spotlight_sets.id AS nu_spotlight_set_id
																									',
																	$where_array = array(
																		'nu_spotlight_sets_calendars.month' => $month,
																		'nu_spotlight_sets_calendars.year' => $year 
																	), 
																	$use_order = TRUE, 
																	$order_field = 'day', 
																	$order_direction = 'asc', 
																	$limit = -1,
																	$use_join = TRUE, 
																	$join_array
																	);
																	

		return $nu_spotlight_items_sets;
	}
	
	
/**
 * get_nu_spotlight_videos_calendars
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 

	function get_nu_spotlight_videos_calendars(
						$where_array 
					){
						
				
					$nu_spotlight_videos_calendars = $this->CI->my_database_model->select_from_table( 
																	$table = 'nu_spotlight_videos_calendars', 
																	$select_what = 'nu_spotlight_videos_calendars.id AS nu_spotlight_videos_calendar_id,
																	 								nu_spotlight_videos_calendars.title,
																	 								nu_spotlight_videos_calendars.blurb,
																	 								nu_spotlight_videos_calendars.link,
																	 								nu_spotlight_videos_calendars.launch,
																	 								nu_spotlight_videos_calendars.day,
																	 								nu_spotlight_videos_calendars.month,
																	 								nu_spotlight_videos_calendars.year
																									',
																	$where_array, 
																	$use_order = TRUE, 
																	$order_field = 'day', 
																	$order_direction = 'asc', 
																	$limit = -1
																	);
																	

		return $nu_spotlight_videos_calendars;
	}

/**
 * get_nu_spotlight_sets
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 

	function get_nu_spotlight_sets( $where_array = array()){
		;
				$nu_spotlight_sets_raw = $this->CI->my_database_model->select_from_table( 
														$table = 'nu_spotlight_sets', 
														$select_what = '*', 
														$where_array, 
														$use_order = TRUE, 
														$order_field = 'created', 
														$order_direction = 'desc', 
														$limit = -1
														);
					
				
				$nu_spotlight_sets_raw = $this->CI->tools->object_to_array($nu_spotlight_sets_raw);
				
					
				foreach( $nu_spotlight_sets_raw  as  $nu_spotlight_set ){
					
					foreach( $nu_spotlight_set as  $field => $value){
						
						if( $field == 'id' ){
							
							
								$join_array = array(
												'nu_spotlight_items' => 'nu_spotlight_items_sets.nu_spotlight_item_id = nu_spotlight_items.id',
												'nu_spotlight_items_images' => 'nu_spotlight_items.id = nu_spotlight_items_images.nu_spotlight_item_id'
												);
							
							
								$nu_spotlight_items_sets = $this->CI->my_database_model->select_from_table( 
																				$table = 'nu_spotlight_items_sets', 
																				$select_what = 'nu_spotlight_items_sets.order, 
																												nu_spotlight_items_sets.nu_spotlight_item_id, 
																												nu_spotlight_items_images.id as nu_spotlight_items_image_id',
																				$where_array = array(
																					'nu_spotlight_set_id' => $value,
																					'nu_spotlight_items_images.image_type' => 'thumb' 
																				), 
																				$use_order = TRUE, 
																				$order_field = 'order', 
																				$order_direction = 'asc', 
																				$limit = -1,
																				$use_join = TRUE, 
																				$join_array
																				);
																					
							$nu_spotlight_set['nu_spotlight_items_sets'] = $nu_spotlight_items_sets;
																			
						}else{
							$nu_spotlight_set[$field] = $value;				
						}
			
					}
					
					$nu_spotlight_sets[] = $nu_spotlight_set;				
					
				}
				
				

		return $nu_spotlight_sets;

	}
	

	
}


/* End of file Query.php */ 
/* Location: \system\application\libraries\Query.php */
