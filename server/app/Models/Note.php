<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $status
 * @property string $name
 * @property string $message
 */
class Note extends Model
{
    use HasFactory;

    public const ID = 'id';
    public const USER_ID = 'user_id';
    public const STATUS = 'status';
    public const NAME = 'name';
    public const MESSAGE = 'message';

    public const NOT_COMPLETED = 0;
    public const COMPLETED = 1;

    protected $fillable = [
        self::USER_ID,
        self::STATUS,
        self::NAME.
        self::MESSAGE
    ];
}
