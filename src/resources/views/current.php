public function passes($attribute, $value)
{
$pass = Auth::user()->password;
return (Hash::check($value, $pass));
}

public function message()
{
return 'パスワードが一致しません';
}