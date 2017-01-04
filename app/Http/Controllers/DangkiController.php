<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\QuequanModel;
use App\TruongModel;
use App\ThanhvienModel;
use Validator;
use DB;
use Image;

class DangkiController extends Controller
{

    public function getDangki(){
        $quequans = QuequanModel::all();
        $truongs = TruongModel::all();
        return view('dangki', ['quequans' => $quequans, 'truongs' => $truongs]);
    }

    public function postDangki(Request $request){
    	$validator = Validator::make($request->all(), 
            [
            'ten' => 'required|max:15',
            'gioitinh' => 'required',  
            'tinhtrang' => 'required', 
            'mongmuon' => 'required', 
            'truong' => 'required', 
            'sdt' => 'required', 
            'facebook' => 'required',
            'namsinh' => 'required',      
            'quequan' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'tong' => 'required',
            ],[
            'ten.required' => 'Vui lòng nhập họ tên !',
            'ten.max' => 'Tên không quá 15 kí tự !',
            'gioitinh.required' => 'Vui lòng nhập giới tính !',
            'namsinh.required' => 'Vui lòng nhập năm sinh !',
            'quequan.required' => 'Vui lòng nhập quê quán !',
            'tinhtrang.required' => 'Vui lòng nhập tình trạng hôn nhân !',
            'mongmuon.required' => 'Vui lòng nhập lý do đăng ký !',
            'truong.required' => 'Vui lòng nhập trường bạn đang học !',
            'sdt.required' => 'Vui lòng nhập số điện thoại !', 
            'facebook.required' => 'Vui lòng nhập link facebook !',
            'avatar.required' => 'Vui lòng chọn ảnh đại diện !',   
            'avatar.image' => 'Vui lòng chọn đúng định dạng ảnh !', 
            'avatar.mimes' => 'Vui lòng chọn file ảnh !', 
            'avatar.max' => 'Vui lòng chọn ảnh dưới 1024 Kb !',   
            'tong.required' => 'Trả lời câu hỏi IQ bắt buộc !',      
            ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $data_input = $request->all(); 
        $a = $data_input["a"];
        $b = $data_input["b"];
        $tong = $data_input["tong"];
        if($tong == ($a+$b)){
            $data_save = new ThanhvienModel;
            $data_save->ten = $data_input["ten"];
            $data_save->namsinh = $data_input["namsinh"];
            $data_save->gioitinh = $data_input["gioitinh"];
            $data_save->tinhtrang = $data_input["tinhtrang"];
            $data_save->mongmuon = $data_input["mongmuon"];
            $data_save->sdt = $data_input["sdt"];
            $data_save->facebook = $data_input["facebook"];
            $data_save->gioithieu = $data_input["gioithieu"];
            $data_save->id_quequan = $data_input["quequan"];
            $data_save->id_truong = $data_input["truong"];
            $data_save->duyet = "no";       
            // Xu ly anh
            $image = $data_input["avatar"];
            $image_mime = $image->getClientOriginalExtension();
            $image_name = time().str_random('30').".".$image_mime;
            $path = "images/thanhviens/".$image_name;
            $image->move("images/thanhviens", $image_name);

            // Resize image
            $img = Image::make('images/thanhviens/'.$image_name);
            $img->resize(500, 500);
            $img->save('images/thanhviens/'.$image_name);
            $data_save->avatar = $path;
            $data_save->save();
            
            return redirect('/')->with('success','Thông tin của bạn đã được đăng kí. Chúng tôi sẽ duyệt và cập nhật thông tin của bạn sớm nhất có thể. Xin cảm ơn !');
        }else{
            return redirect()->back()->withInput()->with('tinh_sai','Tính sai rồi !'); 
        }       
               
    }
}
