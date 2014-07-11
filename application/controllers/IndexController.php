<?php
header('content-type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
/**

 * @package		USSDPro
 * @subpackage	Stuf
 * @category	Controller
 * @author		Leonard Korir
 * @email		leo@devs.mobi
 * @link		http://devs.mobi
 */

class IndexController extends Zend_Controller_Action {

	public function init() {
		/* Initialize action controller here */
	}

	public function indexAction() {
		//Let's retrieve the details as per Africa's talking API
		//exit;
		$sessionId = $_REQUEST["sessionId"];
		$serviceCode = $_REQUEST["serviceCode"];
		$no = $_REQUEST["phoneNumber"];

		//we need to find out if the user is beginning the process
		if (!empty($_REQUEST['text'])) {
			$message = $_REQUEST["text"];
			$result = explode("*", $message);
			if (empty($result)) {
				$message = $message;
			} else {
				end($result);
				// move the internal pointer to the end of the array
				$message = current($result);
			}

		} else {
			$message = 'start';
		}

		// so we have determined if the user is starting or not

		$data = array('content' => $message);
		//$tablee = "ussd";
		$userModel = new Model_User();
		
		$user = $userModel -> getUserWithPhone($no);
		//check if user exists
		if ($user['id'] == 0) {
			//register the user
			$dataa = array('phone' => $no, 'menu_item_id' => 1);
			//print_r($dataa);
			//exit;
			$result = $userModel -> createUser($dataa);
			//print_r($result);
			//exit;
			//die($result);
			//send the first menu and update the progress
			
		}else{
			//check session
			$session = $user->session;
			switch ($session) {
				case 0:
					$output = $this->mainMenu($user,$no);
					break;
				case 1:
					$output = $this->ussdProgress($user,$message);
					break;
				case 2:
					$output = $this->ussdConfirmation($user);
					break;
				
				default:
					$output = $this->mainMenu();
					break;
			}
			
			print_r($output);
			exit;
		}
		
}

	public function ussdConfirmation($user,$message = 1){
		//we need to update the status of the responses confirmed to 1
		$Response_Model = new Model_Response();
		
		$result = $Response_Model -> confirmResponses($user);
		
		//set user session to zero
		
		$userModel = new Model_User();
		
		//$result = $userModel -> updateUserSession($user['id'],0);
		//update user steps
		//$result = $userModel -> updateUserMenuStep($user['id'],0);
		
		//update user
		$data = array('session' => 0,'step' => 0, 'menu_item_id' => 0 );
		
		$result = $userModel -> updateUserData($data,$user['id']);
		
				
		
		return "Confirmed successfully";
			
		
		
	}
	public function mainMenu($user,$no){
			$menuModel = new Model_Menu();
			
			$menu = $menuModel -> getMenu(1);
			$menu_id = $menu->id;
			//get the description
			$description = $menu->description;
			
			//build up the options
			$menuItemsModel = new Model_MenuItems();
			$menuOptions = $menuItemsModel -> getMenuOptions($menu_id);
			$userModel = new Model_User();
			
			$data = array('session' => 1,'step' => 0, 'menu_item_id' => 1 );
		
			
			$result = $userModel -> updateUserData($data,$user['id']);
			
			//$result = $userModel -> updateUserSession($user['id'],1);
			
			return $description.PHP_EOL.$menuOptions;
			//exit;
		
		
	}
	
	public function ussdProgress($user,$message){
			$menu_item_id = $user->menu_item_id;
			$step = $user->step;
			$menuModel = new Model_Menu();
			
			$menu = $menuModel -> getMenu($menu_item_id);
			// print_r($menu);
			// exit;
// 			
			
			$menuType = $menu['type'];
			// print_r($step);
			// exit;
			if ($menuType == 2) {
				
				//no verification but feed it response and update step as you move on
			if ($step > 0) {
				
		    $message = strtolower($message);
				//feed the response to the table
			$dataa = array('user_id' => $user['id'], 'menu_id' => $menu_item_id,'step'=> $step, 'response' => $message );
			//print_r($dataa);
			//exit;
			$Response_Model = new Model_Response();
		
			$result = $Response_Model -> createResponse($dataa);
			if ($result) {
				//check if we have another step, if we do, request, if we dont, compile the summary and confirm
				$next_step = $step+1;
				// print_r($step);
				// exit;
				$menuItemsModel = new Model_MenuItems();
				$menuItem = $menuItemsModel -> getNextMenuStep($menu_item_id,$next_step);
				//print_r($menuItem);
				//exit;
				if ($menuItem['id'] != 0) {
					//update user data and next request and send back
					$userModel = new Model_User();
		
				$result = $userModel -> updateUserMenuStep($user['id'],$next_step);
				return $menuItem->description;
				//exit;
					
				}else{
					//compile summary for confirmation
					//$menuItemsModel = new Model_MenuItems();
				$MenuItems = $menuItemsModel -> getMenuItems($menu_item_id);
				//build up the responses
				$confirmation = "Confirm?: ".$menu->description.PHP_EOL;
				foreach ($MenuItems as $key => $value) {
					//print_r($confirmation);
					//exit;
					//select the corresponding response
					if ($value[4] != 'PIN') {
						$phrase = $value[4];
						$response = $Response_Model -> getResponse($user['id'],$menu_item_id,$value[3]);
						
						$confirmation = $confirmation.$phrase.": ".$response['response'].PHP_EOL;
						//print_r($response['response']);
						//exit;
						
					
					}
					
					
				}
					//update the status to waiting for confirmation
					$userModel = new Model_User();
		
					$result = $userModel -> updateUserSession($user['id'],2);
				
					
					
					return $confirmation;
					//exit;
					
				}
				//print_r($menuItem);
				//exit;
				
			}
			
				
				
			}else{
				
				//when the user has not started the steps
				$userModel = new Model_User();
		
				$result = $userModel -> updateUserMenuStep($user['id'],1);
				
				$menuItemsModel = new Model_MenuItems();
				$menuItem = $menuItemsModel -> getNextMenuStep($menu_item_id,1);
				return $menuItem->description;
				//exit;
				
				
			}
			
			
			}else{
			
			//verify response
			
				$menuItemsModel = new Model_MenuItems();
				$MenuItems = $menuItemsModel -> getMenuItems($menu_item_id);
				
				//now we have the menu items it is time to create the USSD Menu
				
				// print_r($MenuItems);
				// exit;

				if (empty($MenuItems)) {
					$selected_option = $message;
				} else {
				
					// echo "hapa";
					// exit;
					$message = strtolower($message);
					// print_r($message);
					// exit;
					foreach ($MenuItems as $key => $value) {
						//check if they are equal
						// print_r($value);
						// exit;

						if ((trim(strtolower($key)) == $message)) {
							//foreach ($value as $key1 => $value1) {
								$selected_option = $key;
								$next_menu_id = $value[2];
							//}
							//if they fail to map then selected option is empty but we don't stop there,
							//do a second check to check if the user sent the value instead
						}
				
						if (empty($selected_option)) {
							foreach ($value as $key1 => $value1) {
								//print_r($value1);
								//exit;
								if ((trim(strtolower($value1)) == $message)) {
									$selected_option = $value1;
								}
							}
						}
					}
				}
			
			// print_r($selected_option);
			// exit;
// 			
			if(empty($selected_option)){
				$selected_option = 0;
			}
			if (empty($next_menu_id)) {
				$next_menu_id = 0;
				
			}
			//update the progress with the next menu id
			$userModel = new Model_User();
			$no = $user ['phone'];
			$result = $userModel -> updateUser($next_menu_id,$no);
			if ($result) {
				$menuModel = new Model_Menu();
			
			$menu = $menuModel -> getMenu($next_menu_id);
			$menu_id = $menu['id'];
			$menuType = $menu['type'];
			// print_r($step);
			// exit;
			if ($menuType == 2) {
				//$menu
				//print_r($menu);
				//exit;
				$output = $this->singleProcess($menu_id,$user);
				//$output = $this->singleProcess($menu_item_id);
				
				return $output;
			
			}else{
			//get the description
			$description = $menu->description;
			
			//build up the options
			$menuItemsModel = new Model_MenuItems();
			$menuOptions = $menuItemsModel -> getMenuOptions($menu_id);
				
			
			
			return $description.PHP_EOL.$menuOptions;
			//exit;
			}
				
			}
			
				
			}


		
	}

public function singleProcess($menu_item_id,$user){
				// echo "hapa";
				// exit;
				
	
				$menuItemsModel = new Model_MenuItems();
				$menuItem = $menuItemsModel -> getNextMenuStep($menu_item_id,1);
				//print_r($menuItem);
				//exit;
				if ($menuItem['id'] != 0) {
					//update user data and next request and send back
					$userModel = new Model_User();
		
				$result = $userModel -> updateUserMenuStep($user['id'],1);
				return $menuItem->description;
				//exit;
					
				}
	
}
			//check progress
			
				//continuing user
			//before verifying response, lets find out what type it is:

			
			// }
			// // print_r($progress);
			// // exit;
			// //send the menu whose progress is stated
			// //check if there is a menu after the current menu or an action after the current menu
// 			
			// //send the menu or end the transaction
		// }
// 
		// print_r($user);
		// exit;
		// //$user =
// 
		// $where = "phone='" . $no . "'";
		// //check if user exists
		// //$this->load->model('Users_model');
		// $user = $masterModel -> readData('*', 'users', $where);
		// print_r($user);
		// exit ;
		// if ($user -> id == 0) {
			// //This user needs to go to registration
			// $data = array('phone_number' => $no, 'session' => '1');
// 
			// $result = $this -> Master_model -> createData('users', $data);
			// $user = $this -> Master_model -> readData('*', 'users', $where);
			// //print_r($result);
			// //exit();
			// if ($result != 0) {
				// //take him/her to the switch
				// //$level = 1;
				// //$user = $this->Master_model->read('*','users',$where);
				// $output = $this -> gameplay($user -> id, $message, $user -> level);
			// } else {
				// $output = "We had an error processing your message";
			// }
// 
		// } else {
			// //we do a switch
			// //$this->load->model('Switch_model');
// 
			// $user = $this -> Master_model -> read('*', 'users', $where);
// 
			// $output = $this -> gameplay($user -> id, $message, $user -> level);
// 
		// }
		// $response = "CON ";
		// $response .= $output;
		// //$output =
		// echo $response;
		// exit();
		//$this->send_output($response,$no);
	//}

	//$result = $masterModel -> create($tablee, $data);

	//print_r($result);
	//exit ;
	//}

}
