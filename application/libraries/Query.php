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
	    
	    		$table = $post_array['table'];

					$fields = explode('&', $post_array['set_what_array']);
					foreach($fields as $field){
						$field_key_value = explode("=",$field);
						$key = urldecode($field_key_value[0]);
						$value = urldecode($field_key_value[1]);
						eval("$$key = \"$value\";");
						$set_where_array[$key] = $value;
					};	  
  
  
  				foreach( $set_where_array  as  $key => $value){
							$fields_array = array(
										$key => array('type' => 'varchar(255)')                                          
		              	); 
		  
							$this->CI->my_database_model->add_column_to_table_if_exist(
								$table, 
								$fields_array
							);    					
  				};
 

					$db_response = $this->CI->my_database_model->update_table_where(
								$table, 
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


			$image_types_array = array(
								'hero_carousel_items_image_id' => 1,
								'right_tab_carousel_items_image_id' => 6,
								'tune_in_carousel_items_image_id' => 3,
								'hero_iphone_carousel_items_image_id' => 7,
								'hero_android_carousel_items_image_id' => 32,
								'right_tab_iphone_carousel_items_image_id' => 8,
								'right_tab_border_iphone_carousel_items_image_id' => 9,
								'hero_ipad_carousel_items_image_id' => 33,
								'hero_ipad_carousel_landscape_id' => 43,
								'hero_ipad_carousel_thumb_inactive_id' => 46,
								'hero_ipad_carousel_thumb_active_id' => 47
							);
				
			$carousel_items = $this->prepare_array(
				$items_tables_raw = $this->CI->tools->object_to_array($carousel_items_raw),
				$name_of_item_id	 = 'carousel_item_id',
				$image_table = 'carousel_items_images',
				$image_types_array);

			return $carousel_items;	
		
	}




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

			$image_types_array = array(
								'feature_nu_spotlight_items_image_id' => 4,
								'thumb_nu_spotlight_items_image_id' => 5,
								'nuspotlight_rect_spotlight_items_image_id' => 42
							);
				
			$nu_spotlight_items_raw = 	$this->CI->tools->object_to_array($nu_spotlight_items_raw);
				
			$nu_spotlight_items = $this->prepare_array(
				$items_tables_raw = $nu_spotlight_items_raw,
				$name_of_item_id	 = 'nu_spotlight_item_id',
				$image_table = 'nu_spotlight_items_images',
				$image_types_array);
			

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

			$image_types_array = array(
								'feature_large_items_image_id' => 17,
								'feature_title_graphic_items_image_id' => 20
							);
				
			$feature_items_raw = 	$this->CI->tools->object_to_array($feature_items_raw);
				
			$feature_items = $this->prepare_array(
				$items_tables_raw = $feature_items_raw,
				$name_of_item_id	 = 'feature_item_id',
				$image_table = 'feature_items_images',
				$image_types_array);

			if( isset($feature_items)){
				return $feature_items;
			}else{
				return;
			};
			
			
	}



/**
 * get_event_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_event_items( $where_array = array() ){
		
			$event_items = $this->CI->my_database_model->select_from_table( 
			$table = 'event_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'order', 
			$order_direction = 'asc', 
			$limit = -1
			);

			if( isset($event_items)){
				return $event_items;
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
			$order_field = 'name', 
			$order_direction = 'asc', 
			$limit = -1
			);
			

			$image_types_array = array(
								'showpage_hero_items_image_id' => 10,
								'showpage_title_items_image_id' => 12,
								'showpage_dropdown_items_image_id' => 19,
								'showpage_hero_iphone_items_image_id' => 11,
								'showpage_hero_android_items_image_id' => 29,
								'showpage_hero_mobile_thumb_items_image_id' => 30,
								'showpage_hero_ipad_id' => 37,
								'showpage_hero_ipad_landscape_id' => 44,
								'showpage_ipad_hero_thumb_active_items_id' => 36,
								'showpage_ipad_hero_thumb_inactive_items_id' => 48
							);
				
			$showpage_items = $this->prepare_array(
				$items_tables_raw = $this->CI->tools->object_to_array($showpage_items_raw),
				$name_of_item_id	 = 'showpage_item_id',
				$image_table = 'showpage_items_images',
				$image_types_array);


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

	function get_showpage_cast_items( $where_array = array(), $select_what = ' * ' ){
		
		
		
		if( $select_what == ' * ' ){
			

					$showpage_cast_items_raw = $this->CI->my_database_model->select_from_table( 
								$table = 'showpage_cast_items', 
								$select_what, 
								$where_array, 
								$use_order = FALSE, 
								$order_field = '', 
								$order_direction = 'asc', 
								$limit = -1
								);
								

											
		}else{
			
					$join_array = array(
									'showpage_cast_items_images' => 'showpage_cast_items_images.showpage_cast_item_id = showpage_cast_items.id'
									);
				

					$showpage_cast_items_raw = $this->CI->my_database_model->select_from_table( 
								$table = 'showpage_cast_items', 
								$select_what, 
								$where_array, 
								$use_order = TRUE, 
								$order_field = 'showpage_cast_items_images.order', 
								$order_direction = 'asc', 
								$limit = -1,
								$use_join = TRUE, 
								$join_array
								);
											
			
			
		};
		

								
								
								
								
								

		$image_types_array = array(
								'showpage_cast_items_image_id' => 13,
								'showpage_cast_iphone_items_image_id' => 22
							);
				
			$showpage_cast_items = $this->prepare_array(
				$items_tables_raw = $this->CI->tools->object_to_array($showpage_cast_items_raw),
				$name_of_item_id	 = 'showpage_cast_item_id',
				$image_table = 'showpage_cast_items_images',
				$image_types_array);



			if( isset($showpage_cast_items)){
				if( isset($showpage_item['order'])){
					$this->CI->tools->aasort($showpage_cast_items,'order');
				};
				return $showpage_cast_items;
			}else{
				return;
			};


	}


/**
 * get_showpage_episodes_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 

	function get_showpage_episodes_items( $where_array = array() ){

			$showpage_episodes_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'showpage_episodes_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'ORDER', 
			$order_direction = 'asc', 
			$limit = -1
			);




			$image_types_array = array(
								'showpage_episodes_items_image_id' => 50
							);
				
			$showpage_episodes_items = $this->prepare_array(
				$items_tables_raw = $this->CI->tools->object_to_array($showpage_episodes_items_raw),
				$name_of_item_id	 = 'showpage_episodes_item_id',
				$image_table = 'showpage_episodes_items_images',
				$image_types_array);



			if( isset($showpage_episodes_items)){
				if( isset($showpage_item['order'])){
					$this->CI->tools->aasort($showpage_episodes_items,'order');
				};
				return $showpage_episodes_items;
			}else{
				return;
			};


	}





	
/**
 * get_showpage_photos_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_showpage_photos_items( $where_array = array() ){
		
			$showpage_photos_items = $this->CI->my_database_model->select_from_table( 
			$table = 'showpage_photos_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'order', 
			$order_direction = 'asc', 
			$limit = -1
			);
			

			$showpage_photos_items = $this->CI->tools->object_to_array($showpage_photos_items);


			return $showpage_photos_items;

			
	}
	
	
/**
 * get_showpage_mobile_gallery_photo_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_showpage_mobile_gallery_photo_items( $where_array = array() ){
		
			$showpage_mobile_gallery_photo_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'showpage_mobile_gallery_photo_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = FALSE, 
			$order_field = 'created', 
			$order_direction = 'desc', 
			$limit = -1
			);
			

			$image_types_array = array(
			
								'showpage_mobile_gallery_photo_items_image_id' => 23,
								'showpage_mobile_gallery_photo_thumb_inactive_items_image_id' => 24,
								'showpage_mobile_gallery_photo_thumb_active_items_image_id' => 25,
								
								'showpage_android_gallery_photo_items_image_id' => 26,
								
								'showpage_ipad_gallery_photo_items_image_id' => 39,
								'showpage_ipad_gallery_photo_items_landspage_image_id' => 49,
								'showpage_ipad_gallery_photo_thumb_inactive_items_image_id' => 41,
								'showpage_ipad_gallery_photo_thumb_active_items_image_id' => 40
								
							);
				
			$showpage_mobile_gallery_photo_items = $this->prepare_array(
				$items_tables_raw = $this->CI->tools->object_to_array($showpage_mobile_gallery_photo_items_raw),
				$name_of_item_id	 = 'showpage_mobile_gallery_photo_item_id',
				$image_table = 'showpage_mobile_gallery_photo_items_images',
				$image_types_array);
				

			if( isset($showpage_mobile_gallery_photo_items)){
				if( isset($showpage_item['order'])){
					$this->CI->tools->aasort($showpage_mobile_gallery_photo_items,'order');
				};
				
			
				return $showpage_mobile_gallery_photo_items;
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
			$order_field = 'order', 
			$order_direction = 'asc', 
			$limit = -1
			);
			
			$image_types_array = array(
								'showpage_feature_large_items_image_id' => 16,
								'showpage_feature_small_items_image_id' => 15
							);
				
			$showpage_feature_items_raw = 	$this->CI->tools->object_to_array($showpage_feature_items_raw);
				
			$showpage_feature_items = $this->prepare_array(
				$items_tables_raw = $showpage_feature_items_raw,
				$name_of_item_id	 = 'showpage_feature_item_id',
				$image_table = 'showpage_feature_items_images',
				$image_types_array);


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
	




		function prepare_array(
			$items_tables_raw,
			$name_of_item_id,
			$image_table,
			$image_types_array){
			

		
					foreach( $items_tables_raw  as  $keyA => $items_table_raw){
		
						foreach( $items_table_raw  as  $field => $value){
							
							$items_table[$field] = $value;
							
							if( $field == 'id' ){
								
								foreach( $image_types_array  as  $name_of_hero_items_image_id => $image_type_id){
									
									
									
									$items_images = $this->CI->my_database_model->select_from_table( 
												$table = $image_table, 
												$select_what = '*', 
												$where_array = array(
																				$name_of_item_id=> $value,
																				'image_type_id' => $image_type_id  
																				), 
												$use_order = FALSE, 
												$order_field = '', 
												$order_direction = 'desc', 
												$limit = -1
												);
												
								
								
								if( count($items_images) > 0){				
									
									$items_table[$name_of_hero_items_image_id] = $items_images[0]->id;
									
									
								}else{
									
									$items_table[$name_of_hero_items_image_id] = 0;
									
								};
								}
			
							};
							
							
		
						};
						
				
						$items_tables[] = $items_table;
						
					};
					
					
					return ( isset( $items_tables) ? $items_tables:array() );
			
		}
	
}


/* End of file Query.php */ 
/* Location: \system\application\libraries\Query.php */
