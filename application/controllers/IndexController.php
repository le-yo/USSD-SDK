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
			
			//send the first menu and update the progress
			
		}else{
			//check progress
			
			//check if there is a menu after the current menu or an action after the current menu
			
			//send the menu or end the transaction
		}

		print_r($user);
		exit;
		//$user =

		$where = "phone='" . $no . "'";
		//check if user exists
		//$this->load->model('Users_model');
		$user = $masterModel -> readData('*', 'users', $where);
		print_r($user);
		exit ;
		if ($user -> id == 0) {
			//This user needs to go to registration
			$data = array('phone_number' => $no, 'session' => '1');

			$result = $this -> Master_model -> createData('users', $data);
			$user = $this -> Master_model -> readData('*', 'users', $where);
			//print_r($result);
			//exit();
			if ($result != 0) {
				//take him/her to the switch
				//$level = 1;
				//$user = $this->Master_model->read('*','users',$where);
				$output = $this -> gameplay($user -> id, $message, $user -> level);
			} else {
				$output = "We had an error processing your message";
			}

		} else {
			//we do a switch
			//$this->load->model('Switch_model');

			$user = $this -> Master_model -> read('*', 'users', $where);

			$output = $this -> gameplay($user -> id, $message, $user -> level);

		}
		$response = "CON ";
		$response .= $output;
		//$output =
		echo $response;
		exit();
		//$this->send_output($response,$no);
	}

	//$result = $masterModel -> create($tablee, $data);

	//print_r($result);
	//exit ;
	//}

}
