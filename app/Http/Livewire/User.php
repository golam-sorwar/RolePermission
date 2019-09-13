<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User as UserInfo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    public $id, $name, $email, $password;
    public $edit = false;

    public function mounted()
    {
        UserInfo::created(function () {
            $this->refresh();
        });

        UserInfo::updated(function () {
            $this->refresh();
        });

        UserInfo::deleted(function () {
            $this->refresh();
        });
    }

    public function edit($id)
    {
        $info = UserInfo::find($id);
        $this->id = $info->id;
        $this->name = $info->name;
        $this->email = $info->email;
        $this->edit = true;
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:5'
        ]);

        $info = UserInfo::find($id);
        $info->name = $this->name;
        $info->email = $this->email;
        $info->email_verified_at = now();
        $info->password = Hash::make($this->password);
        $info->remember_token = Str::random(10);
        $info->save();

        $this->edit = false;
        $this->name = $this->email = $this->password = '';
    }

    public function delete($id)
    {
        UserInfo::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.user', [
            'users' => UserInfo::with('permissions', 'roles')->get()
        ]);
    }
}