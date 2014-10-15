<?php
header('Content-type: text/plain');

//header("Access-Control-Allow-Origin: *");

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

class UssddController extends Zend_Controller_Action {

	public function init() {
		/* Initialize action controller here */
	}

	public function indexAction() {

		// echo "hapa";
		// exit;
		//Let's retrieve the details as per Africa's talking API
		//exit;
		$sessionId = $_REQUEST["sessionId"];
		$serviceCode = $_REQUEST["serviceCode"];
		$no = $_REQUEST["phoneNumber"];
		$no = str_replace("+", "", $no);
		$no2 = substr($no, -9);

		//print_r($no);
		//exit;

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

		// print_r($message);
		// exit;

		$data = array('content' => $message);
		//$tablee = "ussd";
		$userModel = new Model_User();

		$user = $userModel -> getUserWithPhone($no);

		// print_r($user);
		// exit;
		if ($user['id'] == 0) {
			$user = $userModel -> getUserWithPhone($no2);
			if ($user['id'] == 0) {
				//register user
				//$this->registerfarmer();
				echo $this -> farmerussd($no,$message,$sessionId);
				exit ;

			} else {
				if ($user -> role == 102) {

					$this -> agrovet($user, $message, $sessionId);
				}
			}

		} else {

			if ($user -> role == 102) {

				$this -> agrovet($user, $message, $sessionId);

			} else {
				echo $this -> farmerussd($no,$message,$sessionId);
				exit ;
				
				
			}
		}
		//
		// //print_r($user);
		// //exit;
		//
		// //check if user exists
		// if ($user['id'] == 0) {
		// //register the user
		// $dataa = array('phoneno' => $no, 'menu_item_id' => 1);
		// //print_r($dataa);
		// //exit;
		// $result = $userModel -> createUser($dataa);
		//
		// //print_r($result);
		// //exit;
		//
		// //$userModel = new Model_User();
		//
		// $user = $userModel -> getUserWithPhone($no);
		//
		// //print_r($result);
		// //exit;
		// if ($result) {
		// $output = $this -> mainMenu($user, $no);
		//
		// $response = "CON ";
		// $response .= $output;
		// echo $response;
		// exit ;
		//
		// //print_r($output);
		// //exit;
		// }
		// //print_r($result);
		// //exit;
		// //die($result);
		// //send the first menu and update the progress
		//
		// } else {
		// //check if it is a revisit
		//
		// //check session
		// $session = $user -> session;
		// $userSessionID = $user -> sessionID;
		//
		// //check if it is a revist
		//
		// // print_r($session);
		// // exit;
		// switch ($session) {
		// case 0 :
		// $output = $this -> mainMenu($user, $no);
		// break;
		// case 1 :
		// $output = $this -> ussdProgress($user, $message);
		// break;
		// case 2 :
		// $output = $this -> ussdConfirmation($user, $message);
		// break;
		// case 3 :
		// $output = $this -> takeSurvey($user, $message, $sessionId);
		// //$output = $this->ussdConfirmation($user,$message);
		// break;
		//
		// default :
		// $output = $this -> mainMenu();
		// break;
		// }
		//
		// //print_r($output);
		//
		// //update user session id
		//
		// $data = array('sessionID' => $sessionId);
		//
		// // print_r($data);
		// // exit;
		//
		// $userModel = new Model_User();
		// //print_r($user['id']);
		// //exit;
		//
		// $result = $userModel -> updateUserData($data, $user['id']);
		//
		// if (substr($output, 0, 3) === 'end') {
		// $output = substr($output, 3);
		// $output = str_replace("<br>", PHP_EOL, $output);
		//
		// $response = "END ";
		// $response .= $output;
		// echo $response;
		// exit ;
		//
		// } else {
		//
		// $output = str_replace("<br>", PHP_EOL, $output);
		//
		// $response = "CON ";
		// $response .= $output;
		// echo $response;
		// exit ;
		// }
		// //print_r($output);
		// //exit;
		// }

	}
	
	
	public function agrovetMenu($no){
		$dataa = array('phoneno' => $no, 'menu_item_id' => 1);
		//print_r($dataa);
		//exit;
		$farmerModel = new Model_Farmers();

			//$data = array('session' => 2,'confirm_from' => $menu->id );

			//print_r($user['id']);
			//exit;
		$result = $farmerModel -> addData($dataa);
		
		//$farmer_model = 
		$result = $userModel -> createUser($dataa);
		
		//print_r($result);
		//exit;
		
		//$userModel = new Model_User();
		
		$user = $userModel -> getUserWithPhone($no);
		
		//print_r($result);
		//exit;
		if ($result) {
		$output = $this -> mainMenu($user, $no);
		
		$response = "CON ";
		$response .= $output;
		echo $response;
		exit ;
		
		//print_r($output);
		//exit;
		}
	}
	public function agrovet($user, $message, $sessionId) {
		//check session
		$session = $user -> session;
		$userSessionID = $user -> sessionID;
		$no = $user -> phoneno;

		//check if it is a revist

		// print_r($session);
		// exit;
		switch ($session) {
			case 0 :
				$output = $this -> mainMenu($user, $no);
				break;
			case 1 :
				$output = $this -> ussdProgress($user, $message);
				break;
			case 2 :
				$output = $this -> ussdConfirmation($user, $message);
				break;
			case 3 :
				$output = $this -> takeSurvey($user, $message, $sessionId);
				//$output = $this->ussdConfirmation($user,$message);
				break;

			default :
				$output = $this -> mainMenu();
				break;
		}

		//print_r($output);

		//update user session id

		$data = array('sessionID' => $sessionId);

		// print_r($data);
		// exit;

		$userModel = new Model_User();
		//print_r($user['id']);
		//exit;

		$result = $userModel -> updateUserData($data, $user['id']);

		if (substr($output, 0, 3) === 'end') {
			$output = substr($output, 3);
			$output = str_replace("<br>", PHP_EOL, $output);

			$response = "END ";
			$response .= $output;
			echo $response;
			exit ;

		} else {

			$output = str_replace("<br>", PHP_EOL, $output);

			$response = "CON ";
			$response .= $output;
			echo $response;
			exit ;
		}
	}

	public function unauthorized() {

		return "END USSD Access is only for registered Agrovets";

	}

	public function ussdConfirmation($user, $message = null) {
		//we need to update the status of the responses confirmed to 1
		$Response_Model = new Model_Response();

		$result = $Response_Model -> confirmResponses($user);

		$menuModel = new Model_Menu();

		$menu = $menuModel -> getMenu($user['confirm_from']);

		if ($menu['id'] == 4) {
			//echo "hapa";
			//exit;
			$menuItemsModel = new Model_MenuItems();

			$MenuItems = $menuItemsModel -> getMenuItems($menu['id']);
			//build up the array
			//print_r($MenuItems);
			//exit;
			$data = array();
			//$confirmation = "Confirm?: ".$menu->description;
			foreach ($MenuItems as $key => $value) {

				$phrase = $value[4];
				//print_r($value[4]);

				//$menu_item_id = $value['']
				$response = $Response_Model -> getResponse($user['id'], $menu['id'], $value[3]);
				//lets build the data array
				switch ($value[0]) {
					case '3' :
						$data['names'] = ucwords($response['response']);
						break;
					case '4' :
						$data['phoneno'] = $response['response'];

						break;
					case '5' :
						$data['idno'] = $response['response'];

						break;
					case '6' :
						if ($response['response'] == 1) {
							$data['gender'] = 'Male';

						} elseif ($response['response'] == 2) {
							$data['gender'] = 'Female';

						}

						break;
					case '7' :
						if ($response['response'] == 1) {
							$data['language'] = 'English';

						} elseif ($response['response'] == 2) {
							$data['language'] = 'Kiswahili';

						}
						break;
					default :
						break;
				}
				//}

			}
			//print_r($data);
			//exit;

			// print_r($confirmation);
			// exit;
			//update the status to waiting for confirmation
			$farmerModel = new Model_Farmers();

			//$data = array('session' => 2,'confirm_from' => $menu->id );

			//print_r($user['id']);
			//exit;
			$result = $farmerModel -> addData($data);

			//$result = $userModel -> updateUserData($data,$user['id']);
			//if ($result == 1) {
				$message33 = "You have been successfully registered as a farmer. Thanks for using ACILD";

				$phone = "+254" . substr($data['phoneno'], -9);
				$this -> sendSMS($phone, $message33);

			//}
			//rudihapa
			//print_r($result);
			//exit;

		}
		if ($menu['id'] == 2) {
			//this person just bought produce
			$menuItemsModel = new Model_MenuItems();

			$MenuItems = $menuItemsModel -> getMenuItems($menu['id']);
			//build up the array
			// print_r($MenuItems);
			// exit;
			$data = array();
			//$confirmation = "Confirm?: ".$menu->description;
			foreach ($MenuItems as $key => $value) {

				$phrase = $value[4];
				//print_r($value[4]);

				//$menu_item_id = $value['']
				$response = $Response_Model -> getResponse($user['id'], $menu['id'], $value[3]);
				//lets build the data array
				switch ($value[0]) {
					case '9' :
						$userModel = new Model_User();

						$farmer = $userModel -> getUserWithNationaID($response['response']);

						$data['user_id'] = $farmer['id'];
						//$data['national_id'] = ucwords($response['response']);
						break;
					case '10' :
						$data['commodity'] = $response['response'];

						break;
					case '11' :
						$data['quantity'] = $response['response'];

						break;
					case '12' :
						$data['price'] = $response['response'];
						$data['points_earned'] = $data['price'] / 10;
						$whole = floor($data['points_earned']);

						break;

						break;
				}
				//}

			}
			//print_r($farmer);
			//exit;

			//print_r($farmer['points']);
			//exit;
			//update the status to waiting for confirmation
			$Farmer_purchases = new Model_FarmerPurchases();

			$result = $Farmer_purchases -> createPurchase($data);

			$farmer_total_points = $farmer['points'] + $data['points_earned'];

			$whole_total = floor($farmer_total_points);

			$userModel = new Model_User();

			//update user
			$data = array('points' => $farmer_total_points);

			$result = $userModel -> updateUserData($data, $farmer['id']);

			//print_r($Response_Model);
			//exit;
			if ($result == 1) {

				$message33 = "Congratulations! You have been awarded " . $whole . " points for your purchase. Your total points is " . $whole_total . ". Thanks for using ACILD";

				$phone = "+254" . substr($farmer['phoneno'], -9);
				$this -> sendSMS($phone, $message33);

			}
			//rudihapa
			//print_r($result);
			//exit;

		}
		//print_r($menu);
		//exit;

		$sms_message = $menu -> message;

		//set user session to zero

		$userModel = new Model_User();

		//update user
		$data = array('session' => 0, 'step' => 0, 'menu_item_id' => 0);

		$result = $userModel -> updateUserData($data, $user['id']);

		//lets send a message to the user

		$result = $this -> sendSMS($user['phoneno'], $sms_message);

		return "end" . $sms_message;

	}

	//public function sendSMS($message,$phone){

	public function sendSMS($phone_number, $output, $shortcode = 20151, $sms_gateway_id = null) {
		// echo "hapa";
		// exit;
		//$phone_number = "+254728355429";
		//invalidating stuff
		//$phone_number = "+254728355429dfsdg";

		$shortcode = 20151;
		if ($shortcode > 1) {
			//print_r($output);
			//echo "shortcode";
			//exit;

			//require_once ('AfricasTalkingGateway.php');

			$username = "lenykoskey";
			$apiKey = "abbfa09e621a6ece272a254e3fcd910657ff46e88f82db205499603d06dda908";
			$gateway = new AfricasTalkingGateway($username, $apiKey);

			//print_r(is_array($output));
			//exit;
			if (is_array($output)) {
				//print_r($output);
				//exit;
				foreach ($output as $key => $value) {
					//print_r($shortcode);
					//exit;
					$value = $value;

					try {

						// Send a response originating from the short code that received the message
						$results = $gateway -> sendMessage($phone_number, $value, $shortcode);
						//$results = $gateway -> sendMessage("+254728355429", $value, $shortcode);
						// Read in the gateway response and persist if necessary
						$response = $results[0];
						$status = $response -> status;
						$cost = $response -> cost;
						//print_r($value);
						//print_r($status);
						//exit;

					} catch ( AfricasTalkingGatewayException $e ) {

						// Log the error
						$errorMessage = $e -> getMessage();
						//print_r($errorMessage);
						//exit;
					}
					//print_r($value);
					//exit;

				}
				//exit;

			} else {
				try {

					//Send a response originating from the short code that received the message
					//$results = $gateway -> sendMessage('+254728355429', $output, $shortcode);
					$output = $output;
					//print_r($append);
					//exit;
					$results = $gateway -> sendMessage($phone_number, $output, $shortcode);
					// Read in the gateway response and persist if necessary
					$response = $results[0];
					$status = $response -> status;
					$cost = $response -> cost;
					//print_r($output);
					//print_r($status);
					//exit ;

				} catch ( AfricasTalkingGatewayException $e ) {

					// Log the error
					$errorMessage = $e -> getMessage();

				}

			}
		} elseif ($sms_gateway_id = 3) {
			//telerivet magic over here
			//require_once ('AfricasTalkingGateway.php');
			header("Content-Type: application/json");
			echo json_encode(array('messages' => array( array('content' => $output))));

			//echo "tel".$output;
			exit ;

		} else {
			//$output = json_decode($output);
			if (is_array($output)) {
				foreach ($output as $key => $value) {
					print_r("array " . $value);
					exit ;

				}

			} else {
				//echo "hapa";
				//print_r($output);
				//exit ;

			}

		}
		//exit;

	}



		public function farmerMenu($user, $no) {
		$menuModel = new Model_Menu();

		$menu = $menuModel -> getMenu(5);

		// print_r($menu);
		// exit;
		$menu_id = $menu -> id;
		//get the description
		$description = $menu -> description;
		// print_r($description);
		// exit;
		//build up the options
		$menuItemsModel = new Model_MenuItems();

		$menuOptions = $menuItemsModel -> getMenuOptions($menu_id);

		// print_r($menuOptions);
		// exit;
		$farmerModel = new Model_Farmers();

		$data = array('session' => 1, 'step' => 1, 'menu_item_id' => 5);

		//$userModel = new Model_User();

		$result = $farmerModel -> updateUserData($data, $user['id']);

		//print_r($result);
		//exit;
		//$result = $userModel -> updateUserSession($user['id'],1);

		return $description . PHP_EOL . $menuOptions;
		//exit;

	}
		
	public function mainMenu($user, $no) {
		$menuModel = new Model_Menu();

		$menu = $menuModel -> getMenu(1);

		// print_r($menu);
		// exit;
		$menu_id = $menu -> id;
		//get the description
		$description = $menu -> description;
		// print_r($description);
		// exit;
		//build up the options
		$menuItemsModel = new Model_MenuItems();

		$menuOptions = $menuItemsModel -> getMenuOptions($menu_id);

		// print_r($menuOptions);
		// exit;
		$userModel = new Model_User();

		$data = array('session' => 1, 'step' => 1, 'menu_item_id' => 1);

		//$userModel = new Model_User();

		$result = $userModel -> updateUserData($data, $user['id']);

		//print_r($result);
		//exit;
		//$result = $userModel -> updateUserSession($user['id'],1);

		return $description . PHP_EOL . $menuOptions;
		//exit;

	}

	public function ussdProgress($user, $message) {
		$menu_item_id = $user -> menu_item_id;

		//print_r($menu_item_id);
		//exit;

		$step = $user -> step;
		$menuModel = new Model_Menu();

		$menu = $menuModel -> getMenu($menu_item_id);
		if ($menu['id'] == 0) {
			$reply = "We could not understand your response";
			$output = $this -> mainMenu($user, $user['phoneno']);
			return $reply . PHP_EOL . $output;

		}
		//

		$menuType = $menu -> type;
		// print_r($step);
		// exit;
		if ($menuType == 2) {

			//no verification but feed it response and update step as you move on
			if ($step > 0) {

				$message = strtolower($message);
				//feed the response to the table

				$valid = $this -> validateResponse($menu -> id, $message, $step);
				//print_r($valid);
				//exit;
				if ((is_array($valid)) && ($valid['valid'] == 0)) {

					$output = $valid['message'];

					//print_r($output);
					return $output;

				}

				$dataa = array('user_id' => $user['id'], 'menu_id' => $menu_item_id, 'step' => $step, 'response' => $message);
				//print_r($dataa);
				//exit;
				$Response_Model = new Model_Response();

				$result = $Response_Model -> createResponse($dataa);

				// print_r($result);
				// exit;
				if ($result) {
					//check if we have another step, if we do, request, if we dont, compile the summary and confirm
					$next_step = $step + 1;
					// print_r($step);
					// exit;
					$menuItemsModel = new Model_MenuItems();
					$menuItem = $menuItemsModel -> getNextMenuStep($menu_item_id, $next_step);
					// print_r($menuItem);
					// exit;
					if ($menuItem['id'] != 0) {
						//update user data and next request and send back
						$userModel = new Model_User();

						$result = $userModel -> updateUserMenuStep($user['id'], $next_step);
						//$menuItem = $menuItemsModel -> getNextMenuStep($menu_item_id,$step);

						return $menuItem -> description;
						//exit;

					} else {
						//compile summary for confirmation
						//$menuItemsModel = new Model_MenuItems();
						$MenuItems = $menuItemsModel -> getMenuItems($menu_item_id);
						
						//print_r($MenuItems);
						//exit;
						//build up the responses
						$confirmation = "Confirm?: " . $menu -> description;
						foreach ($MenuItems as $key => $value) {
							// print_r($value);
							// exit;
							//print_r($confirmation);
							//exit;
							//select the corresponding response
							if ($value[4] != 'PIN') {
								$phrase = $value[4];
								//print_r($value[4]);

								//$menu_item_id = $value['']
								$response = $Response_Model -> getResponse($user['id'], $menu_item_id, $value[3]);
								//print_r($response['response']."<br>");
								if ($value[4] == 'Gender') {

									if ($response['response'] == 1) {
										$response['response'] = 'Male';

									} elseif ($response['response'] == 2) {
										$response['response'] = 'Female';

									}

								} elseif ($value[4] == 'Language') {

									if ($response['response'] == 1) {
										$response['response'] = 'English';

									} elseif ($response['response'] == 2) {
										$response['response'] = 'Kiswahili';

									}

								}
								
								$confirmation = $confirmation . PHP_EOL . $value[4] . ": " . $response['response'];
									
							
								//print_r($response['response']);
								//exit;

							}

						}

						// print_r($confirmation);
						// exit;
						//update the status to waiting for confirmation
						$userModel = new Model_User();

						$data = array('session' => 2, 'confirm_from' => $menu -> id);

						//print_r($user['id']);
						//exit;

						$result = $userModel -> updateUserData($data, $user['id']);

						//print_r($result);
						//exit;
						//$result = $userModel -> updateUserSession($user['id'],2);

						return $confirmation . PHP_EOL . "1. Yes" . PHP_EOL . "2. No";
						//exit;

					}
					//print_r($menuItem);
					//exit;

				}

			} else {

				//when the user has not started the steps
				$userModel = new Model_User();

				$result = $userModel -> updateUserMenuStep($user['id'], 1);

				$menuItemsModel = new Model_MenuItems();
				$menuItem = $menuItemsModel -> getNextMenuStep($menu_item_id, 1);
				return $menuItem -> description;
				//exit;

			}

		} else {

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

						//check for the type of menu_item_id
						if ($value[5] == 3) {
							//survey
							$output = $this -> takeSurvey($user, $message);
							return $output;

						}
						//print_r($value);
						//exit;
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
			if (empty($selected_option)) {
				$selected_option = 0;
			}
			if (empty($next_menu_id)) {
				$next_menu_id = 0;

			}
			//update the progress with the next menu id
			$userModel = new Model_User();
			$no = $user['phoneno'];
			$result = $userModel -> updateUser($next_menu_id, $no);
			if ($result) {
				$menuModel = new Model_Menu();

				$reply = "";
				//print_r($user);
				//exit;
				if ($next_menu_id == 0) {
					//if ($menu['id'] == 0) {
					$reply = "We could not understand your response";
					$next_menu_id = $user['menu_item_id'];

					//$output = $this->mainMenu($user, $user['phoneno']);
					//return $reply.PHP_EOL.$output;

					//}

				}
				//print_r($next_menu_id);
				//exit;
				$menu = $menuModel -> getMenu($next_menu_id);

				//print_r($menu);
				//exit;
				$menu_id = $menu['id'];
				$menuType = $menu['type'];
				// print_r($step);
				// exit;
				if ($menuType == 2) {
					//$menu
					//print_r($menu);
					//exit;
					$output = $this -> singleProcess($menu_id, $user);
					//$output = $this->singleProcess($menu_item_id);

					return $output;

				} else {
					//get the description
					$description = $menu -> description;

					//build up the options
					$menuItemsModel = new Model_MenuItems();
					$menuOptions = $menuItemsModel -> getMenuOptions($menu_id);

					return $description . PHP_EOL . $menuOptions;
					//exit;
				}

			}

		}

	}

	public function validateResponse($menu_item_id, $message, $step) {
		//print_r($message);
		//exit;

		$output = array();
		$output['valid'] = 1;
		switch ($menu_item_id) {
			case '2' :
				//get user whose ID is given:
				switch ($step) {
					case '1' :
						$userModel = new Model_User();

						$user = $userModel -> getUserWithNationaID($message);
						if ($user['id'] != 0) {
							$output['valid'] = 1;

						} else {
							$output['valid'] = 0;
							$output['message'] = "Sorry there is no farmer with that National ID:" . PHP_EOL . "Verify Farmer ID or please register the farmer";
						}
						return $output;
						break;

					default :
						$output['valid'] = 1;
						break;
				}

				break;

			case '4' :
				//print_r($step);
				//exit;
				switch ($step) {
					case '1' :
						if (!is_numeric($message)) {
							$output['valid'] = 1;

						} else {
							$output['valid'] = 0;
							$output['message'] = "Invalid Name, only letters are allowed for the name." . PHP_EOL . "Please enter Farmer Names";
						}

						break;
					case '2' :
						//print_r(strlen($message));
						//exit;
						if ((is_numeric($message)) && (strlen($message) > 8)) {
							$output['valid'] = 1;
							//print_r("hapa1");
							//exit;
						} else {
							//print_r("hapa2");
							//exit;
							$output['valid'] = 0;
							$output['message'] = "Invalid Phone number, please enter a valid farmer phone number";
						}
						break;
					case '3' :
						if (is_numeric($message)) {
							$output['valid'] = 1;

						} else {
							$output['valid'] = 0;
							$output['message'] = "Invalid National ID, please enter a valid farmer National ID";
						}
						break;
					case '4' :
						if (($message == 1) || ($message == 2)) {
							$output['valid'] = 1;

						} else {
							$output['valid'] = 0;
							$output['message'] = "Invalid Gender, please reply with either" . PHP_EOL . "1 for Male" . PHP_EOL . "2 for Female";
						}
						break;
					case '5' :
						if (($message == 1) || ($message == 2)) {
							$output['valid'] = 1;

						} else {
							$output['valid'] = 0;
							$output['message'] = "Invalid Language, please reply with either" . PHP_EOL . "1 for English" . PHP_EOL . "2 for Kiswahili";
						}
						break;

					default :
						break;
				}
				break;
			default :
				$output['valid'] = 1;

				break;
		}

		return $output;

	}
		public function farmerussd($no, $message, $sessionID = null) {
		//print_r($message);

		$phone = $no;
		$url = $_SERVER['HTTP_HOST'] . "/farmerussd/index";
		$ch = curl_init();
		// if (strtolower($_REQUEST['message']) == 'demo') {
		// $qry_str = "?from=" . $received_msg['from_number'] . "&message=&sms_gateway_id=" . $sms_gateway_id;
		//
		// } else {
		//print_r($message);
		//exit;
		$qry_str = "?from=" . $phone . "&message=" . urlencode($message) . "&sessionId=" . $sessionID;
		//}

		//print_r($url);
		//print_r($qry_str);
		//exit;

		$ch = curl_init();

		// Set query data here with the URL
		curl_setopt($ch, CURLOPT_URL, $url . $qry_str);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, '3');
		$content = trim(curl_exec($ch));
		curl_close($ch);
		return $content;

		//exit;
	}

	public function takeSurvey($user, $message, $sessionID = null) {
		//print_r($message);

		$phone = $user['phoneno'];
		$url = $_SERVER['HTTP_HOST'] . "/survey/index";
		$ch = curl_init();
		// if (strtolower($_REQUEST['message']) == 'demo') {
		// $qry_str = "?from=" . $received_msg['from_number'] . "&message=&sms_gateway_id=" . $sms_gateway_id;
		//
		// } else {

		$qry_str = "?from=" . $phone . "&message=" . urlencode($message) . "&sessionID=" . $sessionID;
		//}

		//print_r($url);
		//print_r($qry_str);
		//exit;

		$ch = curl_init();

		// Set query data here with the URL
		curl_setopt($ch, CURLOPT_URL, $url . $qry_str);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, '3');
		$content = trim(curl_exec($ch));
		curl_close($ch);
		return $content;

		//exit;
	}

	public function singleProcess($menu_item_id, $user) {
		// echo "hapa";
		// exit;

		$menuItemsModel = new Model_MenuItems();
		$menuItem = $menuItemsModel -> getNextMenuStep($menu_item_id, 1);
		//print_r($menuItem);
		//exit;
		if ($menuItem['id'] != 0) {
			//update user data and next request and send back
			$userModel = new Model_User();

			$result = $userModel -> updateUserMenuStep($user['id'], 1);
			return $menuItem -> description;
			//exit;

		}

	}

}
