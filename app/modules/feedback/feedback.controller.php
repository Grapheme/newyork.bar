<?php

class FeedbackController extends BaseController {

    public static $name = 'feedback';
    public static $group = 'feedback';

    /****************************************************************************/

    ## Routing rules of module
    public static function returnRoutes($prefix = null) {
        $class = __CLASS__;
        Route::post("/contacts/feedback", array('as' => 'contact_feedback', 'uses' => $class . "@postContactFeedback"));

    }

    /****************************************************************************/

    public function __construct() {

        $this->module = array(
            'name' => self::$name,
            'group' => self::$group,
            #'rest' => self::$group."/actions",
            #'tpl' => static::returnTpl('admin/actions'),
            'gtpl' => static::returnTpl(),
        );
        View::share('module', $this->module);
    }

    public function postContactFeedback() {

        $validation = Validator::make(Input::all(), array('name' => 'required', 'email' => 'required|email',
            'phone' => 'required', 'text' => 'required'));
        if ($validation->passes()):
            $feedback_mail = Config::get('mail.feedback.address');
            $feedback_mail = 'vkharseev@gmail.com';
            Config::set('mail.sendto_mail', $feedback_mail);
            $this->postSendmessage(NULL, array('subject' => 'Форма обратной связи', 'name' => Input::get('name'),
                'email' => Input::get('email'), 'phone' => Input::get('phone'), 'content' => Input::get('text')));
            return Redirect::back()->with('message','Сообщение отправлено');
        else:
            return Redirect::back()->withInput()->with('message','Неверно заполнены поля');
        endif;
    }

    private function postSendmessage($email = null, $data = null, $template = 'feedback') {

        return Mail::send($this->module['gtpl'] . $template, $data, function ($message) use ($email, $data) {
            $message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));
            $message->to(Config::get('mail.sendto_mail'))->subject(@$data['subject']);
        });
    }
}


