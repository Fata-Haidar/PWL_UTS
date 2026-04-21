<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser, HasName
{
    use Notifiable;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getFilamentName(): string
    {
        return $this->nama ?? $this->username ?? 'User';
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'level_id');
    }

    public function stok()
    {
        return $this->hasMany(Stok::class, 'user_id', 'user_id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'user_id', 'user_id');
    }
}