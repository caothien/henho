<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ConfessionModel;
use App\LienheModel;
use App\TruongModel;
use App\QuequanModel;
use Validator;
use DB;

class IndexController extends Controller
{
    public function index(){
        $members = DB::table('thanhviens')
        	->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
            ->where('thanhviens.duyet', '=', 'yes')
            ->orderBy('id', 'asc')
        	->paginate(16);
        return view('index', ['thanhviens' => $members]);
    }

    public function getProfile($id = ''){
    	$profile = DB::table('thanhviens')
        	->join('truongs', 'thanhviens.id_truong', '=', 'truongs.id_truong')
        	->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        	->where('thanhviens.id', $id)->first();
        return view('profile', ['profile' => $profile]);
    }

    public function getListConfession(){
        $confessions = DB::table('confessions')
                ->where('duyet', '=', 'yes')
                ->orderBy('id', 'desc')
                ->paginate(20);
        return view('listconfession', ['cfs' => $confessions]);
    }

    public function postConfession(Request $request){
        $validator = Validator::make($request->all(), 
            [
            'confession' => 'required | min: 50',
            'tong' => 'required',
            ],[
            'confession.required' => 'Vui lòng điền nội dung Confession trước khi Submit !', 
            'confession.min' => 'Nội dung Confession tối thiểu 50 kí tự !', 
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
            $data_save = new ConfessionModel;
            $data_save->content = $data_input["confession"];
            $data_save->comment = $data_input["comment"];
            $data_save->duyet = "no";       
            $data_save->save();
            return redirect()->back()->with('sendsuccess','Confession của bạn đã được lưu lại. Chúng tôi sẽ đăng lên sớm nhất có thể. Cảm ơn bạn !'); 
        }else{
            return redirect()->back()->withInput()->with('tinh_sai','Tính sai rồi !'); 
        }      
    }

    public function getConfession($id='', $stt=''){
        $confession = DB::table('confessions')
            ->where('id', $id)->first();
        return view('confession', ['confession' => $confession, 'stt' => $stt]);
    }

    public function getEvents(){
        $events = DB::table('events')
            ->paginate(16);
        return view('events', ['events' => $events]);
    }

    public function getEvent($id = ''){
        $event = DB::table('events')
            ->where('id', $id)->first();
        return view('event', ['event' => $event]);
    }

    public function getLienhe(){
        return view('lienhe');
    }

    public function postLienhe(Request $request){
        $validator = Validator::make($request->all(), 
            [
            'ten' => 'max:20',  
            'email' => 'required',
            'noidung' => 'required', 
            'tong' => 'required',     
            ],[
            'ten.max' => 'Tên không quá 20 kí tự !',
            'email.required' => 'Vui lòng nhập email !',
            'noidung.required' => 'Vui lòng nhập nội dung !',  
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
            $data_save = new LienheModel;
            $data_save->ten = $data_input["ten"];
            $data_save->sdt = $data_input["sdt"];
            $data_save->email = $data_input["email"];
            $data_save->noidung = $data_input["noidung"];
            $data_save->check = "no";       
            $data_save->save();
            
            return redirect()->back()->with('sendsuccess','Tin nhắn của bạn đã gửi thành công. Xin cảm ơn !');   
        }else{
            return redirect()->back()->withInput()->with('tinh_sai','Tính sai rồi !'); 
        }       
    }
}
