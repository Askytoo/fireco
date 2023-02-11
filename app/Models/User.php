<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 外部制約を解決したユーザーをGroupとAreaのデータと紐づけて作成する
     *
     * @return App\Models\User
     */
    public static function createTestUserSolvedForignKey()
    {
        $user = User::factory()->create([
            'group_id' => function() {
                return Group::factory()->create([
                    'area_id' => function() {
                        return Area::factory()->create([
                            'prefecture_id' => function() {
                                $prefecture = new Prefecture();
                                $prefecture->id   = 21;
                                $prefecture->code = 21;
                                $prefecture->name = '岐阜県';
                                $prefecture->save();
                                return 21;
                            }
                        ])->id; }
                ])->id;
            }
        ]);

        return $user;
    }

    /**
     * relation user to group
     *
     * @return 
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * relation user to events
     *
     * @return 
     */
    public function events()
    {
        return $this->hasMany(EventMember::class);
    }
    
    /**
     * relation user to positoon
     *
     * @return 
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
