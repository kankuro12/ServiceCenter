<?php

namespace App;

use App\Models\Resume;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable,HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phone', 'image', 'email', 'password', 'role'
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

    protected $routes = [
        'dashboard',
        'dashboard',
        'n.front.vendor.index',
        'n.front.user',
    ];

    public function hasResume()
    {
        return Resume::where('user_id',$this->id)->count()>0;
    }

    public function riskResume(){
        $resume_id= Resume::where('user_id',$this->id)->select('id')->first()->id;

        $datas=DB::selectOne("select
            (select count(*) from skills where resume_id={$resume_id}) as skills,
            (select count(*) from education where resume_id={$resume_id}) as education,
            (select count(*) from exps where resume_id={$resume_id}) as exps,
            (select count(*) from resume_socials where resume_id={$resume_id}) as resume_socials,
            (select count(*) from refs where resume_id={$resume_id}) as refs,
            (select count(*) from resume_files where resume_id={$resume_id}) as resume_files
        ");
        $dataArr=((array)$datas);
        $total=$this->hasResume()?14:0;
        foreach ($dataArr as $key => $value) {
            if($value>0){
                $total+=14;
            }
        }
        return $total;
    }
    public function getRoute()
    {
        // dd($this->routes[$this->role]);
        return $this->routes[$this->role];
    }
}
