<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\TruongModel;
use App\QuequanModel;
use App\Http\Requests;
use DB;

class SearchController extends Controller
{
    public function searchSdt(Request $request){
    	$validator = Validator::make($request->all(), 
            ['searchsdt' => 'required | max:12',]);
        if ($validator->fails()) {
            return redirect()->back();
        }
        $data_input = $request->all();
        $sdt = $data_input["searchsdt"];
        $profile_search = DB::table('thanhviens')
        	->join('truongs', 'thanhviens.id_truong', '=', 'truongs.id_truong')
        	->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        	->where('thanhviens.sdt', $sdt)->where('thanhviens.duyet', 'yes')->first();
            
        if($profile_search == null){
        	return redirect('/')
            ->withInput()
            ->with('timsdt','Không tìm thấy thành viên có số điện thoại này !');
        }else{
        	return view('profile', ['profile' => $profile_search]);
        }
        
    }

    public function searchNam(){
        $thanhvien_nam = DB::table('thanhviens')
        	->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        	->where('thanhviens.gioitinh', 'Nam')
            ->where('thanhviens.duyet', 'yes')
        	->paginate(16);
        
        $tong_nam = DB::table('thanhviens')
        	->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        	->where('thanhviens.gioitinh', 'Nam')
            ->where('thanhviens.duyet', 'yes')
        	->count();

        return view('searchresult', ['search_thanhvien' => $thanhvien_nam , 'tong' => $tong_nam]);
    }

    public function searchNu(){
        $thanhvien_nu = DB::table('thanhviens')
        	->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        	->where('thanhviens.gioitinh', 'Nữ')
            ->where('thanhviens.duyet', 'yes')
        	->paginate(16);

        $tong_nu = DB::table('thanhviens')
        	->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        	->where('thanhviens.gioitinh', 'Nữ')
            ->where('thanhviens.duyet', 'yes')
        	->count();

        return view('searchresult', ['search_thanhvien' => $thanhvien_nu , 'tong' => $tong_nu]);
    }

    public function searchNangcao(){
        $quequans = QuequanModel::all();
        $truongs = TruongModel::all();
        return view('searchnangcao', ['truongs' => $truongs, 'quequans' => $quequans]);
    }

    public function searchTruong(Request $request){
        $validator = Validator::make($request->all(), 
            [
            'truong' => 'required',
            ],[
            'truong.required' => 'Vui lòng chọn trường !',          
            ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $data_input = $request->all();
        $idtruong = $data_input["truong"];

        $sinhvientruong = DB::table('thanhviens')
            ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
            ->where('thanhviens.id_truong', $idtruong)
            ->where('thanhviens.duyet', 'yes')
            ->paginate(16);

        $tongkq = DB::table('thanhviens')
            ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
            ->where('thanhviens.id_truong', $idtruong)
            ->where('thanhviens.duyet', 'yes')
            ->count();

        if($tongkq == 0){
            return redirect()->back()
            ->with('status', 'Không tìm thấy kết quả nào !');
        }else{
            return view('searchresult', ['search_thanhvien' => $sinhvientruong , 'tong' => $tongkq]);
        }
        
    }

    public function searchQuequan(Request $request){
        $validator = Validator::make($request->all(), 
            [
            'quequan' => 'required',
            ],[
            'quequan.required' => 'Vui lòng chọn quequan !',          
            ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $data_input = $request->all();
        $idquequan = $data_input["quequan"];

        $sinhvienquequan = DB::table('thanhviens')
            ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
            ->where('thanhviens.id_quequan', $idquequan)
            ->where('thanhviens.duyet', 'yes')
            ->paginate(16);

        $tongkq = DB::table('thanhviens')
            ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
            ->where('thanhviens.id_quequan', $idquequan)
            ->where('thanhviens.duyet', 'yes')
            ->count();

        if($tongkq == 0){
            return redirect()->back()
            ->with('status', 'Không tìm thấy kết quả nào !');
        }else{
            return view('searchresult', ['search_thanhvien' => $sinhvienquequan , 'tong' => $tongkq]);
        }        
    }

    public function searchNamsinh(Request $request){
        $validator = Validator::make($request->all(), 
            [
            'namsinh' => 'required',
            ],[
            'namsinh.required' => 'Vui lòng chọn namsinh !',          
            ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $data_input = $request->all();
        $namsinh = $data_input["namsinh"];

        $sinhviennamsinh = DB::table('thanhviens')
            ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
            ->where('thanhviens.namsinh', $namsinh)
            ->where('thanhviens.duyet', 'yes')
            ->paginate(16);

        $tongkq = DB::table('thanhviens')
            ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
            ->where('thanhviens.namsinh', $namsinh)
            ->where('thanhviens.duyet', 'yes')
            ->count();

        if($tongkq == 0){
            return redirect()->back()
            ->with('status', 'Không tìm thấy kết quả nào !');
        }else{
            return view('searchresult', ['search_thanhvien' => $sinhviennamsinh , 'tong' => $tongkq]);
        }
        
    }
}
