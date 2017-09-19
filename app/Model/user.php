<?php

namespace hkbp\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;

class user extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    //
    protected $primaryKey = 'user_id';

    protected $table = 'tbmaster_user';

    public $timestamps = false;

    protected $fillable = [
        'user_uname',
        'user_password',
        'user_email',
        'user_namalengkap',
        'user_level',
        'user_lastvisit',
        'user_createby',
        'user_createdt',
        'user_modifyby',
        'user_modifydt'
    ];


    //Authentication
    /*   public function getRememberToken()
       {
           return $this->remember_token;
       }


       public function setRememberToken($value)
       {
           $this->remember_token = $value;
       }


       public function getRememberTokenName()
       {
           return 'remember_token';
       }


       public function getAuthIdentifier()
       {
           return $this->username;
       }


       public function getAuthPassword()
       {
           return $this->password;
       }*/


    //Relationship
    //user bisa saja umat bisa saja tidak

    //user memiliki banyak forum post
    public function forumPost()
    {
        return $this->hasMany('stjo\Model\ForumPost', 'id_user', 'id');
    }

    public function forumTopik()
    {
        return $this->hasMany('\stjo\Model\ForumTopik', 'id_pembuat','id');
    }

    public function isUmat ()
    {
        return $this->hasOne('\stjo\Model\Umat', 'id_user', 'id_user');
    }
}
