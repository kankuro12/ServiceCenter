<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageConfig;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /*
    image,
    text,
    desc,
    link,
    link_group
    */
    private $c=[
        'logo'=>[
            'name'=>"logo",
            'type'=>'image'
        ],
        'tagline'=>[
            'name'=>"Tag Line",
            'type'=>'text'
        ],
        'phone'=>[
            'name'=>"Phone Number",
            'type'=>'text'
        ],
        'banner_msg1'=>[
            'name'=>"Primary Banner Message",
            'type'=>'text'
        ],
        'banner_msg2'=>[
            'name'=>"Secondary Banner Message",
            'type'=>'text'
        ],
        'banner_image'=>[
            'name'=>"Banner Image",
            'type'=>'image'
        ],
        'bs_short'=>[
            'name'=>"Bike Serivce Short Description",
            'type'=>'desc'
        ],
        'bs_long'=>[
            'name'=>"Bike Serivce Long Description",
            'type'=>'desc'
        ],
        'bs_image'=>[
            'name'=>"Bike Serivce image",
            'type'=>'image'
        ],
        'hd_short'=>[
            'name'=>"Home Delivery Short Description",
            'type'=>'desc'
        ],
        'hd_long'=>[
            'name'=>"Home Delivery Long Description",
            'type'=>'desc'
        ],
        'hd_image'=>[
            'name'=>"Home Delivery image",
            'type'=>'image'
        ],
        'fj_short'=>[
            'name'=>"Find Job Short Description",
            'type'=>'desc'
        ],
        'fj_long'=>[
            'name'=>"Find Job Long Description",
            'type'=>'desc'
        ],
        'fj_image'=>[
            'name'=>"Find Job image",
            'type'=>'image'
        ],
        'pj_short'=>[
            'name'=>"Post Job Short Description",
            'type'=>'desc'
        ],
        'pj_long'=>[
            'name'=>"Post Job Long Description",
            'type'=>'desc'
        ],
        'pj_image'=>[
            'name'=>"Post Job image",
            'type'=>'image'
        ],

       
    ];
    public function index(Request $request){
        $configs=PageConfig::all();
        $data=[];
        foreach ($configs as $config) {
            $data[$config->identifire]=$config->value;
            if($config->secondary_value!=null){
                $data[$config->identifire."_secondary"]=$config->secondary_value;
            }
        }
        $cs=$this->c;
        return view('back.config.index',compact('data','cs'));
    }

    public function store(Request $request){
        // dd($request->all());

        foreach ($this->c as $key => $config) {
            $con=PageConfig::where('identifire',$key)->first();
            if($con==null){
                $con=new PageConfig();
                $con->identifire=$key;
            }
            if(strtolower($config['type'])=="image"){
                if($request->hasFile('input_'.$key)){
                    $con->value=$request->file('input_'.$key)->store("uploads/config");
                }
            }elseif(strtolower($config['type'])=="desc"){
                    $con->value=$request->input('input_'.$key);
            }elseif(strtolower($config['type'])=="text"){
                $con->value=$request->input('input_'.$key);
            }elseif(strtolower($config['type'])=="link"){
                $con->value=$request->input('input_'.$key);
                $con->secondary_value=$request->input('input_secondary_'.$key);
            }elseif(strtolower($config['type'])=="link_group"){
               if($request->has('input_'.$key)){
                   $d=[];
                   foreach ($request->all()['input_'.$key] as $id) {
                       $d[$key."_".$id]=(object)[
                           'id'=>$id,
                           'text'=>$request->input("link_text_".$key.'_'.$id),
                           'link'=>$request->input("link_link_".$key.'_'.$id)
                       ];
                   }
                   $do=(object)($d);
                   $doj=json_encode($do);
                   $con->value=$doj;
               }
            }elseif(strtolower($config['type'])=="link_image"){
                if($request->hasFile('input_'.$key)){
                    $con->value=$request->file('input_'.$key)->store("uploads/config");
                }
                $con->secondary_value=$request->input('input_secondary_'.$key);
            }elseif(strtolower($config['type'])=="link_image_group"){
                if($request->has('input_'.$key)){
                    $d=[];
                    foreach ($request->all()['input_'.$key] as $id) {
                        if($request->hasFile("link_image_".$key.'_'.$id)){

                            $d[$key."_".$id]=(object)[
                                'id'=>$id,
                                'image'=>$request->file("link_image_".$key.'_'.$id)->store("uploads/config"),
                                'link'=>$request->input("link_link_".$key.'_'.$id)
                            ];
                        }else{
                            $d[$key."_".$id]=(object)[
                                'id'=>$id,
                                'image'=>$request->input("link_text_".$key.'_'.$id),
                                'link'=>$request->input("link_link_".$key.'_'.$id)
                            ];
                        }
                    }
                    $do=(object)($d);
                    $doj=json_encode($do);
                    $con->value=$doj;
                }
             }

            $con->save();
        }
        return redirect()->back();

    }
}
