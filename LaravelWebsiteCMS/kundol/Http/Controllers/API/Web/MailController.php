<?php

namespace App\Http\Controllers\API\Web;

use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUs;
use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Mail;
use App\Traits\ApiResponser;

class MailController extends Controller
{
    use ApiResponser;
    public function contact_us(ContactUsRequest $request)
    {
        $data = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => strtolower($request->email), 'message' => $request->message, 'phone' => $request->phone];
        
        $setting = Setting::where('type', 'email_notify_setting')->pluck('value', 'key');
        $senderEmail = explode(',',$setting['notify_email']);
        foreach($senderEmail as $email){
            Mail::to($email)->send(new ContactUs($data));
        }
        return $this->successResponse('', 'Email sent successfully!');
    }
}
