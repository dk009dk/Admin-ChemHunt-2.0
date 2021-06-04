<?php

namespace App\Models;

use App\Orchid\Presenters\Chemhunt\UserPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Orchid\Access\UserAccess;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
use Ramsey\Uuid\Uuid;

class User extends Model
{
    Use Notifiable, UserAccess, AsSource, Filterable, Chartable, HasFactory;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'college',
        'year',
        'state',
        'phone_number',
        'phone_number_wapp',
        'user_email',
        'user_password',
        'email',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'first_name',
        'middle_name',
        'last_name',
        'college',
        'year',
        'state',
        'phone_number',
        'phone_number_wapp',
        'user_email',
        'email',
        'user_password',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'first_name',
        'middle_name',
        'last_name',
        'college',
        'year',
        'state',
        'phone_number',
        'phone_number_wapp',
        'user_email',
        'email',
        'user_password',
    ];

    /**
     * @return UserPresenter
     */
    public function presenter()
    {
        return new UserPresenter($this);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $uuid = Uuid::uuid4()->toString();
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = $uuid;
            };
            do{
                $id = mt_rand(100000000,999999999);
                $email =['email'=>'cid'.$id.'@chemhunt2.0'] ;
                $validator = Validator::make($email, ['email' => 'unique:users',]);
                if ($validator->fails()) {
                    $unique = 0;
                }else{
                    $model->email =$email['email'];
                    $unique = 1;
                };
            } while ($unique===0);
            $model->user_password = Str::random('9');
            $model->password = Hash::make($model->user_password);
        });

    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public function answer(){
        return $this->hasOne(Answer::class,'user_id');
    }

    public function result(){
        return $this->hasOne(Result::class,'user_id');
    }

    public function task()
    {
        return $this->hasOne(Task::class,'user_id');
    }
}
