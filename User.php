<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Eloquent, Request;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_user';
    protected $fillable = [
        'id',
		'v_name',		
		'password',
        'v_email',
        'e_gender',
        'v_hobby',
        'i_study_id',
        'v_image',
        'updated_at',
        'created_at'
    ];


    public function fieldLabel($key){
        return [
            'id'    =>'ID',
            'v_name' => 'User Name',
            'v_email' => 'Email Address',
            'password' => 'Password',
            'e_gender' => 'Gender',
            'v_hobby' => 'Hobby',
            'i_study_id' => 'Study',
            'v_image'   =>'Prfile',
        ][$key];
    }
	public function hasStudy(){
        return $this->hasOne('App\Models\Study', 'id', 'i_study_id' );
    }
}