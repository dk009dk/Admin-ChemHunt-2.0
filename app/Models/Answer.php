<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Orchid\Access\UserAccess;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;
use Ramsey\Uuid\Uuid;

class Answer extends Model
{
    use Notifiable, UserAccess, AsSource, Filterable, Chartable, HasFactory;

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
    protected $table = 'answers';

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
        'day_1_q_1',
        'day_1_q_2',
        'day_1_q_3',
        'day_1_q_4',
        'day_2_q_1',
        'day_2_q_2',
        'day_2_q_3',
        'day_2_q_4',
        'day_3_q_1',
        'day_3_q_2',
        'day_3_q_3',
        'day_3_q_4',
        'day_4_q_1',
        'day_4_q_2',
        'day_4_q_3',
        'day_4_q_4',
        'day_5_q_1',
        'day_5_q_2',
        'day_5_q_3',
        'day_5_q_4',
        'day_6_q_1',
        'day_6_q_2',
        'day_6_q_3',
        'day_6_q_4',
        'day_7_q_1',
        'day_7_q_2',
        'day_7_q_3',
        'day_7_q_4',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'day_1_q_1',
        'day_1_q_2',
        'day_1_q_3',
        'day_1_q_4',
        'day_2_q_1',
        'day_2_q_2',
        'day_2_q_3',
        'day_2_q_4',
        'day_3_q_1',
        'day_3_q_2',
        'day_3_q_3',
        'day_3_q_4',
        'day_4_q_1',
        'day_4_q_2',
        'day_4_q_3',
        'day_4_q_4',
        'day_5_q_1',
        'day_5_q_2',
        'day_5_q_3',
        'day_5_q_4',
        'day_6_q_1',
        'day_6_q_2',
        'day_6_q_3',
        'day_6_q_4',
        'day_7_q_1',
        'day_7_q_2',
        'day_7_q_3',
        'day_7_q_4',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'day_1_q_1',
        'day_1_q_2',
        'day_1_q_3',
        'day_1_q_4',
        'day_2_q_1',
        'day_2_q_2',
        'day_2_q_3',
        'day_2_q_4',
        'day_3_q_1',
        'day_3_q_2',
        'day_3_q_3',
        'day_3_q_4',
        'day_4_q_1',
        'day_4_q_2',
        'day_4_q_3',
        'day_4_q_4',
        'day_5_q_1',
        'day_5_q_2',
        'day_5_q_3',
        'day_5_q_4',
        'day_6_q_1',
        'day_6_q_2',
        'day_6_q_3',
        'day_6_q_4',
        'day_7_q_1',
        'day_7_q_2',
        'day_7_q_3',
        'day_7_q_4',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
            }
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}



