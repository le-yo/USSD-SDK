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

class UssdController extends Zend_Controller_Action {

	public function init() {
		/* Initialize action controller here */
	}

	public function indexAction() {

		$sessionId = $_REQUEST["sessionId"];
		$no = $_REQUEST["phoneNumber"];
		$no = str_replace("+", "", $no);
		$no2 = substr($no, -9);

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
				$dataa = array('phoneno' => $no, 'menu_item_id' => 1);

				$result = $userModel -> createUser($dataa);
				$user = $userModel -> getUserWithPhone($no);

				if ($result) {
					$output = $this -> mainMenu($user, $no);

					$response = "CON ";
					$response .= $output;
					echo $response;
					exit ;

					//print_r($output);
					//exit;
				}

			} else {

				if ($user -> role == 102) {

					$this -> agrovet($user, $message, $sessionId);
				}
			}

		} else {

			$this -> main($user, $message, $sessionId);
			exit ;
		}

	}

	public function main($user, $message, $sessionId) {
		//check session
		$session = $user -> session;
		$userSessionID = $user -> sessionID;
		$no = $user -> phoneno;

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
				break;
			default :
				$output = $this -> mainMenu($user, $no);
				break;
		}

		//print_r($output);

		$data = array('sessionID' => $sessionId);

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

		return "Unauthorized";

	}

	public function ussdConfirmation($user, $message = null) {
		//we need to update the status of the responses confirmed to 1
		if($message == 2){
			return "end Process aborted.".PHP_EOL.$this->mainMenu($user, $user['phoneno']);
		}elseif($message != 1){
			return "Please reply with either 1 to confirm or 2 to abort this process";
			
		}
		$Response_Model = new Model_Response();

		$result = $Response_Model -> confirmResponses($user);

		$menuModel = new Model_Menu();

		$menu = $menuModel -> getMenu($user['confirm_from']);

		if ($menu['id'] == 2) {
			//this person just signed up
			$menuItemsModel = new Model_MenuItems();

			$MenuItems = $menuItemsModel -> getMenuItems($menu['id']);
			// print_r($MenuItems);
			// exit;
			$data = array();
			//$confirmation = "Confirm?: ".$menu->description;
			foreach ($MenuItems as $key => $value) {

				$phrase = $value[4];
				$response = $Response_Model -> getResponse($user['id'], $menu['id'], $value[3]);

				switch ($value[0]) {
					case '5' :
						$data['phoneno'] = $user['phoneno'];
						$data['names'] = $response['response'];
						break;
					case '6' :
						$data['national_id'] = $response['response'];

						break;
					case '7' :
						$data['age'] = $response['response'];

						break;
					case '8' :
						if ($response['response'] == 1) {
							$data['gender'] = 'Male';

						} elseif ($response['response'] == 2) {
							$data['gender'] = 'Female';

						}
						break;
					case '9' :
						$data['beneficiary_no'] = $response['response'];

						break;
					case '10' :
						$data['plan'] = $response['response'];

						break;

						break;
				}

			}
			$userModel = new Model_User();

			$result = $userModel -> updateUserData($data, $user['id']);

			if ($result == 1) {

				$message33 = "BEBABIMA" . PHP_EOL . "Your have successfully registered for bebabima";
				//$phone = "+254728355429";
				$phone = "+254" . substr($user['phoneno'], -9);
				$this -> sendSMS($phone, $message33);

				$message44 = "BEBABIMA" . PHP_EOL . "You have been successfully registered as a beneficiary by " . ucwords($data['names'] . ", phone" . $phone);

				$beneficiary = "+254" . substr($data['beneficiary_no'], -9);
				$this -> sendSMS($beneficiary, $message44);

			}

		}
			if ($menu['id'] == 3) {
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
					case '12' :
						$data['user_id'] = $user['id'];
					
						if ($response['response'] == 1) {
							$data['card_type_id'] = 1;
							$card = "Bebapay";
							
						} elseif ($response['response'] == 2) {
							$data['card_type_id'] =2;
							$card = "Abiria";
							

						} elseif ($response['response'] == 3) {
							$data['card_type_id'] = 3;
							$card = "1963";

						}
						break;
					case '13' :
						$data['no'] = $response['response'];

						break;

					default :
						break;
				}
				//}

			}

			//post making of the data
			//feed into user cards the user id, card type and card number
			$cardModel = new Model_Usercard();
			
			$result = $cardModel -> create($data);
			
			if ($result == 1) {

				$message33 = "BEBABIMA" . PHP_EOL .PHP_EOL. "Hi, ".ucwords($user['names'])." you have successfully added ".$card." card no: ".$data['no']." to your Bebabima account. Thanks for using Bebabima";
				$phone = "+254" . substr($user['phoneno'], -9);
				$this -> sendSMS($phone, $message33);
			}
			
			

		}
		if ($menu['id'] == 4) {
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
					case '14' :
						$data['user_id'] = $user['id']; //vehicle, date, location, hospital
					
						$data['vehicle'] = $response['response'];
						
						break;
					case '15' :
						$data['date'] = $response['response'];

						break;
					case '16' :
						$data['location'] = $response['response'];

						break;
					case '17' :
						$data['hospital'] = $response['response'];

						break;				
					default :
						break;
				}
				//}

			}
			// print_r($data);
			// exit;
			//post making of the data
			//feed into user cards the user id, card type and card number
			$claimModel = new Model_Userclaim();
			
			// print_r($claimModel);
			// exit;
			
			$result = $claimModel -> create($data);
			
			if ($result == 1) {

				$message33 = "BEBABIMA" . PHP_EOL .PHP_EOL. "Hi, ".ucwords($user['names'])." your claim has been received and is being processed. You will receive communication from our team shortly. Thanks for using Bebabima";
				$phone = "+254" . substr($user['phoneno'], -9);
				$this -> sendSMS($phone, $message33);
			}
			
			

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

		//$result = $this -> sendSMS($user['phoneno'], $sms_message);

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
		$farmerModel = new Model_User();

		$data = array('session' => 1, 'step' => 1, 'menu_item_id' => 15);

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

		// print_r($menu_item_id);
		// exit;

		$step = $user -> step;
		$menuModel = new Model_Menu();

		$menu = $menuModel -> getMenu($menu_item_id);

		// print_r($menu);
		// exit;
		if ($menu['id'] == 0) {
			$reply = "We could not understand your response";
			$output = $this -> mainMenu($user, $user['phoneno']);
			return $reply . PHP_EOL . $output;

		}
		//

		$menuType = $menu -> type;
		// print_r($menuType);
		// exit;
		// print_r($step);
		// exit;
		if ($menuType == 2) {

			//no verification but feed it response and update step as you move on
			if ($step > 0) {

				$message = strtolower($message);
				//feed the response to the table
				// print_r($message);
				// exit;
				$valid = 1;
				$valid = $this -> validateResponse($menu -> id, $message, $step);
				// print_r($valid);
				// exit;
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

								} elseif ($value[4] == 'Card') {
									if ($response['response'] == 1) {
										$response['response'] = 'Bebapay';

									} elseif ($response['response'] == 2) {
										$response['response'] = 'Abiria';

									} elseif ($response['response'] == 3) {
										$response['response'] = '1963';

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

			// print_r($message);
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
					// print_r($menu);
					// exit;
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
		// print_r($menu_item_id);
		// exit;

		$output = array();
		$output['valid'] = 1;
		switch ($menu_item_id) {
			case '2' :
				//get user whose ID is given:
				switch ($step) {
					case '1' :
						$output['valid'] = 1;

						if (is_numeric($message)) {
							$output['valid'] = 0;
							$output['message'] = "Invalid Name, only letters are allowed for the name." . PHP_EOL . "Please enter your Name";

						} elseif (count(explode(" ", $message)) < 2) {
							$output['valid'] = 0;
							$output['message'] = "Please enter at least two names e.g. 'Leonard Mambo'";

						}
						break;
					case '2' :
						if (!is_numeric($message)) {
							$output['valid'] = 0;
							$output['message'] = "Invalid ID No, only numbers are allowed for the ID." . PHP_EOL . "Please enter your ID";

						}

						break;
					case '3' :
						if (!is_numeric($message)) {
							$output['valid'] = 0;
							$output['message'] = "For your age, please enter only numbers for example '18'";
						}

						break;
					case '4' :
						if (($message != 1) && ($message != 2)) {
							$output['valid'] = 0;
							$output['message'] = "For gender, please reply with 1 or 2." . PHP_EOL . "1. Male." . PHP_EOL . "2. Female";
						}

						break;
					case '5' :
						if ((!is_numeric($message)) || (strlen($message) < 9)) {
							$output['valid'] = 0;
							$output['message'] = "Invalid Beneficiary number, please enter a valid beneficiary's phone number.";

						}
						break;
					default :
						$output['valid'] = 1;
						break;
				}

				break;

			case '3' :
				//print_r($step);
				//exit;
				switch ($step) {
					case '1' :
						if (($message != 1) && ($message != 2) && ($message != 3)) {
							$output['valid'] = 0;
							$output['message'] = "Invalid response, please reply with" . PHP_EOL . "1. Bebapay." . PHP_EOL . "2. Abiria" . PHP_EOL . "3. 1963";
						}

						break;
					case '2' :
						if (!is_numeric($message)) {
							$output['valid'] = 0;
							$output['message'] = "Invalid Card or Account No, please enter only numbers for example '12345'";
						}
						break;
					default :
						break;
				}
				break;
			case '4' :
				//print_r($step);
				//exit;
				switch ($step) {
					case '1' :


						break;
					case '2' :
						
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

	public function singleProcess($menu_item_id, $user) {

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
