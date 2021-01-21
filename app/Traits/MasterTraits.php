<?php
namespace App\Traits;
use Illuminate\Support\Facades\Mail;

trait MasterTraits{
    public function sendMail($data)
    {
        if (!isset($data['user']) || !$data['user']) {
            return 'User object is invalid or not found';
        }
        if (!isset($data['template'])) {
            return 'Your email template is empty, or use email.general template';
        }
        if (!isset($data['subject'])) {
            return 'Your email subject is empty';
        }
        $template = $data['template'] ?? 'email.general';
        $isMailSent = Mail::send($template, ['data' => $data],
            function ($m) use ($data) {
                $data['template'] = $data['template'] ?? 'email.general';
                $admin_email = $data['email']??'info@myitedu.us';
                $subject = $data['subject'] ?? 'An important message from Admin';
                $user = $data['user'];
                $m->from($admin_email, $data['name']);
                $m->to($user->email, $user->name)->subject($subject);
                if (isset($data['toAdmin'])) {
                    $m->to($admin_email, 'Jon Admin')->subject($subject);
                }
            });
        if (count(Mail::failures()) > 0) {
            return 'There was a problem with sending email';
        }
        return ['An error has occured'];
    }

}
