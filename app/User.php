<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Log;
use DB;

use App\Role;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department()
    {
        return $this->hasOne('App\Department');
    }

    public function historial()
    {
        return $this->hasOne('App\Historial');
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }

    public function doctors()
    {
        return $this->hasMany('App\PatientAssignation');
    }

    public function roles() {
        return $this->belongsToMany('App\Role', 'asignation_roles', 'id_user', 'id_rol');
    }

    /*public function assignations() {
        return $this->belongsToMany('App\PatientAssignation', 'asignation_patients', 'id_user_pat', 'id_user_med');
    }*/

    public function getAssignations() {

        $assignations = [];
        if ($this->doctors()) {
            $assignations = $this->doctors()->get();
        }

        $doctors = [];
        foreach($assignations as $iddoctor){
            $arreglo_nombre_id = [];
            $id = $iddoctor->id_user_med;
            $doctor = DB::table('users')->where('id', $id)->first();
            array_push ($doctors, $doctor);
        }
        return $doctors;

    }

    public function attachRole($role) {
        if (is_object($role)) {
            $role = $role->getKey();
        }
        if (is_array($role)) {
            $role = $role['id'];
        }
        $this->roles()->attach($role);
    }

    public function detachRole($role) {
        if (is_object($role)) {
            $role = $role->getKey();
        }
        if (is_array($role)) {
            $role = $role['id'];
        }
        $this->roles()->detach($role);
    }

    public function attachRoles($roles) {
        foreach ($roles as $role) {
            $this->attachRole($role);
        }
    }

    public function detachRoles($roles) {
        foreach ($roles as $role) {
            $this->detachRole($role);
        }
    }

    public function getRoles() {

        $roles = [];
        if ($this->roles()) {
            $roles = $this->roles()->get();
        }
        Log::info('Roles en modelo:' . $roles);

        return $roles;

    }



}
