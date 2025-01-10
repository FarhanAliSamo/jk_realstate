<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Messages;
use Validator;
use Response;
use App\Models\EmailSubscribe;
use App\Models\BlogMessage;
use App\Models\Appointment;
use Mail;
class ContactFormController extends Controller
{
    //
    //
    
    function saveComments(Request $request){

        
        $rules = [
            'name' => 'inquiry_form_name',
            'email' => 'inquiry_form_email',
            'phone' => 'inquiry_form_phone',
            'message'   => 'inquiry_form_message',
            
            
        ];

        $customMessages = [
            'captcha' => 'Invalid captcha Entered_'.captcha_img(),
        ];

        $this->validate($request, $rules, $customMessages);
    
        

    	$message = new BlogMessage();
		$message->bname = $request->inquiry_form_name;
		$message->bemail = $request->inquiry_form_email;
		$message->product_id = $request->inquiry_form_product_id;
		$message->bphone = $request->inquiry_form_phone;
		$message->bmessage = $request->inquiry_form_message;
		$message->product_id = $request->inquiry_form_product_id;
		$message->page_url = \URL::previous();
		$message->user_ip = get_client_ip();
		
		$message->save();
    
    }
    
    function save_contact(Request $request,$id){

        if($id == 1){
            $rules = [
                'captcha'   => 'required|captcha',
                'name' => 'inquiry_name',
                'email' => 'inquiry_email',
                'phone' => 'inquiry_phone',
                'message'   => 'inquiry_message'
            ];

            $customMessages = [
                'captcha' => 'Invalid captcha Entered_'.captcha_img(),
            ];

            $this->validate($request, $rules, $customMessages);
        }

        if($id == 2 || $id == 3){
            $rules = [
                'captcha'   => 'required|captcha',
                'name' => 'inquiry_form_name',
                'email' => 'inquiry_form_email',
                'phone' => 'inquiry_form_phone',
                'message'   => 'inquiry_form_message'
            ];

            $customMessages = [
                'captcha' => 'Invalid captcha Entered_'.captcha_img(),
            ];

            $this->validate($request, $rules, $customMessages);
        }


    	if($id == 1){
	    	$message = new Messages();
    		$message->name = $request->inquiry_name;
    		$message->email = $request->inquiry_email;
    		$message->phone_no = $request->inquiry_phone;
    		$message->subject = $request->inquiry_subject;
    		$message->message = $request->inquiry_message;
    		$message->page_url = \URL::previous();
    		$message->user_ip = get_client_ip();
    		$message->form_id = $id;
    		$message->save();
    	}else{
	    	$message = new Messages();
    		$message->name = $request->inquiry_form_name;
    		$message->email = $request->inquiry_form_email;
    		$message->phone_no = $request->inquiry_form_phone;
    		$message->subject = $request->inquiry_form_subject;
    		$message->message = $request->inquiry_form_message;
    		$message->page_url = \URL::previous();
    		$message->user_ip = get_client_ip();
    		$message->form_id = $id;
    		$message->save();
    	}
    	
    	$this->_sendAdminNotification($message);

    	if($id == 1 || $id == 2){
    		return "1";
    	}else{
	    	return redirect()->back()->with(['success' => 'Message Sent Successfully!']);
	    }
	    
    }
    
    
    
	private function _sendAdminNotification($msg)
	{
		$view = 'frontend.inquiry_alert';
		
		$html = "";
        $html .= "<table cellspacing='0' border='1' cellpadding='2' >";
        $html .= "<tr><td>Name </td><td> ".$msg->name."</td></tr>";
        $html .= "<tr><td>Email </td><td> ".$msg->email."</td></tr>";
        $html .= "<tr><td>Phone </td><td> ".$msg->phone_no."</td></tr>";
        $html .= "<tr><td>Subject </td><td> ".$msg->subject."</td></tr>";
        $html .= "<tr><td>Message </td><td> ".$msg->message."</td></tr>";
        $html .= "<tr><td>Page Url </td><td> ".$msg->page_url."</td></tr>";
        $html .= "<tr><td>User IP </td><td> ".$msg->user_ip."</td></tr>";
        $html .= "</table>";

        $data['html'] = $html;

    $from_name = "perfectclothza.com";
        $from_email = "no-reply@perfectclothza.com";
    
        $to_emails[] = "info@perfectclothza.com";
        
        $to_bcc[] =  "ism.inquiry.notification@tradewheel.com";
        
    $subject = "perfectclothza Inquiry Alert";
        
      \Mail::send($view, $data, function($message) use ($to_emails,$to_bcc,$subject,$from_email,$from_name) {
      $message->to($to_emails)->subject($subject);
      $message->bcc($to_bcc)->subject($subject);
      $message->from($from_email,$from_name);
    });
		

	}
	
	
	public function emailSubscribe(Request $request)
	{
	    $rules = ['email'=>'required|email|unique:email_subscribe,email_address'];
	    $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails())
        {
        	$errors = $validator->errors();
			return Response::json([
									'error'	=>  $errors,
									'status'	=>  false,
									'message'	=>  'Something went wrong',
                ], 401);
        }
        else
        {
            
            $newsletter = new EmailSubscribe();
            $newsletter->email_address = $request->email;
            $newsletter->save();
            
			return Response::json([
									'error'	=>  [],
									'status'	=>  true,
									'message'	=>  'Your have successfully subscribed to our newsletter.',
                ]);            
        }
	}
	

	


	


 


}

	