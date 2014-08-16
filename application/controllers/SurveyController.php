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

class SurveyController extends Zend_Controller_Action {

	public function init() {
		/* Initialize action controller here */
	}

	public function indexAction() {
		if (!empty($_POST['to'])) {
				$sms_gateway_id = 2; 
				
				//$shortcode = $received_msg['shortCode'];
			} else {
				$sms_gateway_id = 1; 
				
				//$shortcode = '22744';
			}
		
		$received_msg = $this -> get_message_details($sms_gateway_id);
		//count($received_msg);
		
		$userModel = new Model_User();
		
		$user = $userModel -> getUserWithPhone($received_msg['from_number']);
		
		if ($user['id'] == 0) {
			
		}else{
			//check if it a survey messsage
		if (count($received_msg['message']) > 4) {
			//verify if it a survey
			$survey_id = substr($received_msg['message'], 4);
			
			$surveyModel = new Model_Survey();
		
			$survey = $surveyModel -> getSurvey($survey_id);
			
			if ($survey['id'] != 0) {
			
			$output = $this->takeSurvey($user, $received_msg, $survey);
				
			}else{
			//check session
			$session = $user->session;
			//$progress = $user->progress;
			switch ($session) {
				case 0:
					$output = $this->mainMenu($user,$no);
					break;
				// case 1:
					// $output = $this->ussdProgress($user,$message);
					// break;
				// case 2:
					// $output = $this->ussdConfirmation($user);
					// break;
				case 3:
					$output = $this->takeSurvey($user,$received_msg);
					break;				
				default:
					$output = $this->mainMenu();
					break;
			}
			
			
			}
			
			
		}
			
			
			print_r($output);
			exit;
		}
		
}


	public function get_message_details($sms_gateway_id) {
		//$sms_gateway_id = 2;
		//If we are using SMSSync id=1 and we do the following
		if ($sms_gateway_id == 1) {
			if (!empty($_REQUEST['from'])) {
				$msg_details['from_number'] = urlencode(trim($_REQUEST['from']));
				//urlencode($str)
			}
			if (!empty($_REQUEST['message'])) {
				
				$message = trim($_REQUEST['message']);
				
				$message = urlencode(str_replace(" ", " ", $message));
				
				$msg_details['message'] = $message;
				
				// print_r($msg_details);
				// exit;
				
			}
			return $msg_details;

		}
		//If we are using Africastalking we do the following
		if ($sms_gateway_id == 2) {
			$phoneNumber = $_POST["from"];
			// sender's Phone Number
			$shortCode = $_POST["to"];
			// The short code that received the message
			$text = $_POST["text"];
			// Message text
			$linkId = $_POST["linkId"];
			// Used To bill the user for the response
			$date = $_POST["date"];
			// The time we received the message
			$id = $_POST["id"];
			// A unique id for this message

			//$msg_details

			$msg_details['from_number'] = trim($_REQUEST['from']);

			$msg_details['message'] = trim($_REQUEST['text']);
			$msg_details['shortCode'] = $_POST['to'];

			// if(!empty($_REQUEST['from'])){
			//
			// }
			// if(!empty($_REQUEST['message'])){
			// $msg_details['message'] = trim($_REQUEST['message']);
			// }
			return $msg_details; 
		}
		/* future sms gateway will be setup here to be used
		 if($sms_gateway_id==X){
		 we will write this code from Africastalking documentation

		 }
		 */
		else {
			//
		}

	}


//ngori

	public function mainMenu(){
			$mainMenu = "To Take a survey please reply with the survey code e.g. SURV101".PHP_EOL."To Register please dial *384*2014#";		
			return $mainMenu;
	}
	

public function takeSurvey($user,$survey=null,$received_message){
	$progress = $user->progress;
	
	$message = $received_message['message'];
	if ($progress>1) {
		//continuing
		//validate previous response
		$selected_option = '';
		$question_id = $progress;
		$surveyQuestionsOptions = new Model_Surveyquestionsoptions();
		
		$optionsdata = $surveyQuestionsOptions->getOptionsdata($question_id);
		
		//validations begins
		
		if (empty($optionsdata)) {
					$selected_option = $message;
				} else {
					// echo "hapa";
					// exit;
					$message = strtolower($message);
					//print_r($message);
					//exit;
					foreach ($optionsdata as $key => $value) {
						
						if ((trim(strtolower($key)) == $message)) {
							foreach ($value as $key1 => $value1) {
								$selected_option = $value1[0];
								
							}
							//if they fail to map then selected option is empty but we don't stop there,
							//do a second check to check if the user sent the value instead
						}
						if (empty($selected_option)) {
							foreach ($value as $key1 => $value1) {
								if ((trim(strtolower($value1[1])) == $message)) {
									$selected_option = $value1[0];
									
								}

							}
						}

					}
				}
		
		//now that we have the response we insert it where it is required
		$data  = array('user_id' => $user['id'],
		'survey_question_id' => $progress,
		'response_option_id' => $selected_option );
		
		$SurveyResponse_Model = new Model_SurveyResponse();
		
		$result = $SurveyResponse_Model -> createResponse($data);
		
		//once created it is time to call for the next question
		
		$next_question_id = $progress+1;
		
		$surveyQuestionsModel = new Model_Surveyquestions();
		
		$Question = $surveyQuestionsModel -> getQuestion($survey->id,$next_question_id);
		
		if ($Question['id'] == 0) {
			$output = "Thanks for completing the Survey";
			return $output;
			
		}else{
		
		//getQuestionOptions
		
		$surveyQuestionsOptions = new Model_Surveyquestionsoptions();
		
		$QuestionOptions = $surveyQuestionsOptions -> getQuestionOptions($Question->id);
		
		$output = $Question.PHP_EOL.$QuestionOptions;
		
		$data = array('session' => 3,'survey_id' => $survey['id'], 'progress' => $Question['id']);
		
		$userModel = new Model_User();
		
		$result = $userModel -> updateUserData($data,$user['id']);
		
		
		return $output;
		
		}
		
	}else{
		//starting the survey process
		//lets get survey intro text
		$intro_text = $survey->intro_text;
		//lets get the first survey question
		$surveyQuestionsModel = new Model_Surveyquestions();
		
		$Question = $surveyQuestionsModel -> getQuestion($survey->id,1);
		
		//getQuestionOptions
		
		$surveyQuestionsOptions = new Model_Surveyquestionsoptions();
		
		$QuestionOptions = $surveyQuestionsOptions -> getQuestionOptions($Question->id);
		
		$output = $intro_text.PHP_EOL.$Question.PHP_EOL.$QuestionOptions;
		
		$data = array('session' => 3,'survey_id' => $survey['id'], 'progress' => $Question['id'] );
		
		$userModel = new Model_User();
		
		$result = $userModel -> updateUserData($data,$user['id']);
		
		
		return $output;
		
		
		
		
		
	}
	
}

}
