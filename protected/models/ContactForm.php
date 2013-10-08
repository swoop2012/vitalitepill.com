<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
            array('email', 'required'),
            array('name, body', 'safe'),
            array('body','validateBody'),
            //array('name, email, subject, body', 'required'),
            // email has to be a valid email address
            array('email', 'email'),
            // verifyCode needs to be entered correctly
            //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    public function validateBody(){
        if($this->checkDomain($this->body))
            $this->addError('body','В теле сообщения находится ссылка');

    }

    private function checkDomain($str){
        preg_match("/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/",
            $str, $matches);
        return isset($matches[1]) && !empty($matches[1]);
    }
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
            'name'=>'Имя',
            'body'=>'Сообщение',
            'emsil'=>'E-mail',
			'verifyCode'=>'Verification Code',
		);
	}
}