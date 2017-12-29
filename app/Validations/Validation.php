<?php

namespace App\Validations;

use Illuminate\Validation\Validator;

class Validation extends Validator
{
	//自定义手机号码验证规则
	public function ValidateMobile($attribute, $value, $parameters)
	{
		$myreg = '/^[1][3,4,5,7,8,9][0-9]{9}$/';
        return preg_match($myreg, $value);
	}


	//自定义特殊字符验证（字符串中不能包含特殊字符）
	public function ValidateExceptCharacter($attribute, $value, $parameters)
	{
		$pattern = "/[【\'.,:;*?~`!！@#$%^&+=)(<>{}]|~@#￥……&*（）——|{}】‘；：”“'。，、？\]|\[|\/|\\\|\"|\|/";

		return !preg_match($pattern, $value);
	}
}