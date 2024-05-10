<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public static function ExamType()
    {
        return $type = [
            ''=>'Select Type',
            '1'=>'IELTS',
            '2'=>'Wings Ielts Prep. Exam',
            '3'=>'Normal',
        ];
    }
    
    public static function ActiveStatus(){
        return $is_active = [
            ''=>'Select',
            '0'=>'Deactive',
            '1'=>'Active',
        ];

    }

    public static function ApprovalStatus(){
        return $is_approved = [
            ''=>'Select',
            '0'=>'Pending',
            '1'=>'Approved',
        ];

    }
    
        public static function EnrollStatus(){
            return $enroll_status = [
                ''=>'Select',
                '1'=>'Enrolled',
                '0'=>'Not Enrolled',
            ];
        }

        public static function PaymentStatus(){
            return $payment_status = [
                ''=>'Select',
                '1'=>'Received',
                '0'=>'Not Received',
            ];
        }
        
        public static function ContactStatus(){
            return $contact_status = [
                ''=>'Select',
                '1'=>'Contacted',
                '0'=>'Not Yet',
            ];
        }
    
}
