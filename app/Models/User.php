<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DateTimeInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'birthdate',
        'avatar',
        'role',
    ];

    protected $appends = ['avatar_image_url']; 

    public function getAvatarImageUrlAttribute() 
    {
        return asset('storage/avatars/' . $this->avatar);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getTotalIncomeAttribute() {
        return $this->transactions->where('type', 'income')->sum('amount');
    }
    
    public function getTotalExpensesAttribute() {
        return $this->transactions->where('type', 'expenses')->sum('amount');
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

        //format date
        protected function serializeDate(DateTimeInterface $date)
        {
            return $date->format('Y-m-d H:i:s');
        }
}
