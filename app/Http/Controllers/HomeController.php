<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\ConfessionModel;
use App\ThanhvienModel;
use App\EventModel;
use App\LienheModel;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function confessions()
    {
        $cfsdaduyet = DB::table('confessions')
        ->where('duyet', '=', 'yes')
        ->paginate(20);
        return view('admin.manageconfession', ['cfs' => $cfsdaduyet] );
    }

    public function deleteConfession($id = '')
    {
        ConfessionModel::where('id', $id)->delete();
        return redirect('/manage-confession');
    }

    public function editConfession($id = '')
    {
        $confession = DB::table('confessions')
        ->where('id', $id)->first();
        return view('admin.editconfession', ['cfs' => $confession]);
    }

    public function updateConfession(Request $request) {
        $validator = Validator::make($request->all(), 
            [
            'content' => 'required',
            'comment' => 'required',
            ],[
            'content.required' => 'Vui lòng nhập confession !', 
            'comment.required' => 'Vui lòng nhập comment !', 
            ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $dulieu_tu_input = $request->all();
        $idUpdate = $dulieu_tu_input["id"];
        ConfessionModel::where('id', $idUpdate)
        ->update(['content' => $dulieu_tu_input["content"], 'comment' => $dulieu_tu_input["comment"],]);
        return redirect('/manage-confession');
    }

    public function duyetConfession()
    {
        $cfschuaduyet = DB::table('confessions')
        ->where('duyet', '=', 'no')
        ->paginate(20);
        return view('admin.duyetconfession', ['duyetcfs' => $cfschuaduyet] );
    }

    public function duyetDeleteConfession($id = '')
    {
        ConfessionModel::where('id', $id)->delete();
        return redirect('/duyet-confession');
    }

    public function duyetEditConfession($id = '')
    {
        $confession = DB::table('confessions')
        ->where('id', $id)->first();
        return view('admin.duyeteditconfession', ['cfs' => $confession]);
    }

    public function duyetUpdateConfession(Request $request) {
        $validator = Validator::make($request->all(), 
            [
            'content' => 'required',
            'comment' => 'required',
            'duyet' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $dulieu_tu_input = $request->all();
        $idUpdate = $dulieu_tu_input["id"];
        ConfessionModel::where('id', $idUpdate)
        ->update([
            'content' => $dulieu_tu_input["content"],
            'comment' => $dulieu_tu_input["comment"],
            'duyet' => $dulieu_tu_input["duyet"]]);
        return redirect('/duyet-confession');
    }

    public function members()
    {
        $thanhviens = DB::table('thanhviens')
        ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        ->where('thanhviens.duyet', '=', 'yes')
        ->orderBy('id', 'asc')
        ->paginate(16);
        return view('admin.members', ['thanhviens' => $thanhviens]);
    }

    public function showMember($id = '')
    {
        $profile = DB::table('thanhviens')
        ->join('truongs', 'thanhviens.id_truong', '=', 'truongs.id_truong')
        ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        ->where('thanhviens.id', $id)->first();
        return view('admin.member', ['member' => $profile]);
    }

    public function deleteMember($id = '')
    {
        $member = ThanhvienModel::where('id', $id)->first();
        @unlink("$member->avatar");
        ThanhvienModel::where('id', $id)->delete();
        return redirect('/manage-member')->with('deletesuccess','Xóa thành công !');
    }

    public function updateIdMember(Request $request) {
        $dulieu_tu_input = $request->all();
        $idMember = $dulieu_tu_input["idmember"];
        $newIdMember = $dulieu_tu_input["newidmember"];
        $count_member = DB::table('thanhviens')
        ->where('id', $newIdMember)
        ->count();

        if($count_member == 1){
            return redirect()->back()
            ->with('updateid','Trùng ID !');
        }else{
            ThanhvienModel::where('id', $idMember)
            ->update(['id' => $newIdMember]);
            return redirect('/manage-member');
        }
    }

    public function duyetMembers()
    {
        $thanhviens = DB::table('thanhviens')
        ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        ->where('thanhviens.duyet', '=', 'no')
        ->paginate(16);
        return view('admin.duyetmembers', ['thanhviens' => $thanhviens]);
    }

    public function showDuyetMember($id = '')
    {
        $profile = DB::table('thanhviens')
        ->join('truongs', 'thanhviens.id_truong', '=', 'truongs.id_truong')
        ->join('quequans', 'thanhviens.id_quequan', '=', 'quequans.id_quequan')
        ->where('thanhviens.id', $id)->first();
        return view('admin.duyetmember', ['member' => $profile]);
    }

    public function updateMember(Request $request) {
        $dulieu_tu_input = $request->all();
        $idUpdate = $dulieu_tu_input["id"];
        ThanhvienModel::where('id', $idUpdate)
        ->update(['duyet' => $dulieu_tu_input["duyet"]]);
        return redirect('/duyet-member');
    }

    public function events() {
        $events = DB::table('events')
        ->paginate(16);
        return view('admin.events', ['events' => $events]);
    }

    public function addEvent() {
        return view('admin.addevent');
    }

    public function postEvent(Request $request){
        $validator = Validator::make($request->all(), 
            [
            'title' => 'required | min: 10',
            'content' => 'required | min: 10'
            ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $data_input = $request->all();        
        $data_save = new EventModel;
        $data_save->title = $data_input["title"];
        $data_save->content = $data_input["content"];      
        $data_save->save();       
        return redirect('/events')->with('addeventsuccess','Đăng thông báo thành công !');      
    }

    public function editEvent($id = '')
    {
        $event = DB::table('events')
        ->where('id', $id)->first();
        return view('admin.editevent', ['event' => $event]);
    }

    public function updateEvent(Request $request) {
        $validator = Validator::make($request->all(), 
            [
            'title' => 'required | min: 10',
            'content' => 'required | min: 10'
            ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        
        $dulieu_tu_input = $request->all();
        $idUpdate = $dulieu_tu_input["id"];
        EventModel::where('id', $idUpdate)
        ->update(['title' => $dulieu_tu_input["title"], 'content' => $dulieu_tu_input["content"],]);
        return redirect('/events');
    }

    public function deleteEvent($id = '')
    {
        EventModel::where('id', $id)->delete();
        return redirect('/events');
    }

    public function checkLienhe() {
        $lh = DB::table('lienhes')
        ->paginate(16);
        return view('admin.checklienhe', ['lienhes' => $lh]);
    }

    public function deleteLienhe($id = '')
    {
        LienheModel::where('id', $id)->delete();
        return redirect('/check-lienhe');
    }
}
