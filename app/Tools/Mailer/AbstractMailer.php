<?php namespace ThreeAccents\Tools\Mailer;


use Illuminate\Contracts\Mail\Mailer;

class AbstractMailer
{
    /**
     * @var Mailer
     */
    protected $mailer;

    /**
     * @param Mailer $mailer
     */
    function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param $email
     * @param $subject
     * @param $view
     * @param array $data
     */
    public function sendTo($email, $subject, $view, $data = [])
    {
        $this->mailer->send($view, $data, function($message) use($email, $subject)
        {
            $message->to($email)
                ->subject($subject);
        });
    }
}