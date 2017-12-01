<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class AdmUsuario extends Model implements Authenticatable
{
    protected $table = "bg_adm_usuario";
    protected $guarded = ["id", "created_at", "token", "remember_token"];
    protected $hidden = ["id", "created_at", "token", "remember_token"];
    protected $attributes = [
        "teste", "ola"
    ];

    public function perfils() {
        return $this->hasMany("\App\TblPerfil", "idusuario", "id");
    }

    public function redessociais() {
        return $this->hasMany("\App\AdmUsuarioRedeSocial", "idusuario", "id");
    }

    public function temUmPerfil() {
        return count($this->perfils()) == 1;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName() {
        // TODO: Implement getAuthIdentifierName() method.
        return $this->email;
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        // TODO: Implement getAuthIdentifier() method.
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        // TODO: Implement getAuthPassword() method.
        return $this->senha;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken() {
        // TODO: Implement getRememberToken() method.
        return $this->token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value) {
        // TODO: Implement setRememberToken() method.
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName() {
        // TODO: Implement getRememberTokenName() method.
        return $this->email;
    }

}
