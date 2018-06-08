<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hall;
use App\Hall_approved;
use App\Hall_images;
use App\Booking;
use App\Vendor_service_type;
use App\Vendor_service_booking;
use App\Vendor_service;
use App\Vendor_catering_deal;
use App\Vendor_catering_menus;
use App\Vendor_catering_items;
use App\Vendor_photography;
use App\Vendor_photography_images;
use App\Hall_role_type;
use App\Service;
use App\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Validator, Input,Session, Redirect;
use Illuminate\Support\Facades\Crypt;


class AdminController extends Controller
{
    public function index(){
        return view('adminpanel.dashboard');
    }

//    search filter
    public function search_filter(){
        $hall = DB::table('hall')
            ->select('*')
            ->get();
        return view('adminpanel.search_filter' , compact('hall'));
    }
    public function search_filter_data(Request $request){
        if($request->ajax()){
            $booking_hall = $request->input('hall_id');
            $hall_month = $request->input('hall_month');
            $hall_year = $request->input('hall_year');

            $results = DB::select( DB::raw('SELECT  booking.*,hall.hall_name , hall_roll_type.section_name FROM booking LEFT JOIN hall ON booking.hall_id = hall.id LEFT JOIN hall_roll_type ON booking.hall_role_type_id = hall_roll_type.id  Where booking.hall_id = '.$booking_hall.' AND YEAR(booking_date) = '.$hall_year.' AND MONTH(booking_date) = '.$hall_month.' ') );

            if(!empty($results)){
                return response()->json(['options'=>$results]);
            }else{
                return response()->json(["data not found"]);
            }
        }else{
//            $states = DB::table('hall_roll_type')->where('hall_id',$request->input('id_country'))->first();
//            return view('add_booking',compact('states'))->render();
        }
    }



//    hall request
    public function hall_table(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_request = DB::table('hall')
                ->select('*')
                ->get();
            return view('adminpanel.request_hall' , compact('hall_request'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_request_edit($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $hall = DB::table('hall')
                ->select('*')
                ->where('id' ,'=', $id)
                ->get();
            return view('adminpanel.request_add_hall' , compact('hall'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_request_edit_store(Request $request) {
//        dd($request);
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'hall_name' => 'required',
                    'contact' => 'required',
                    'email' => 'required|string|email|max:255|unique:users',
                    'address' => 'required',
                ]);

                $user_id = Auth::user()->id;
                $orignal_hall_id = $request->input('orignal_hall_id');
                $hall_id_get = $request->input('hall_id');
                $hall_name = $request->input('hall_name');
                $contact = $request->input('contact');
                $email = $request->input('email');
                $address = $request->input('address');
                $status = $request->input('status');

                $booking_id_get = DB::table('hall_approved')
                    ->select('*')
                    ->where('hall_id' ,'=', $hall_id_get)
                    ->get();
                $get_booking_id = '';
                foreach ($booking_id_get as $booking_id_gets) {
                    $get_booking_id = $booking_id_gets->hall_id;
                }

                if ($get_booking_id == '') {

                    $hall = new Hall_approved;
                    $hall->orignal_hall_id = $orignal_hall_id;
                    $hall->hall_id = $hall_id_get;
                    $hall->user_id = $user_id;
                    $hall->hall_name = $hall_name;
                    $hall->contact = $contact;
                    $hall->email = $email;
                    $hall->address = $address;
                    $hall->status = $status;
                    $hall->save();

                    $status1 = "approved";
                    $status2 = "pending";
                    if ($status == 'approved'){
                        DB::table('hall')
                            ->where('hall_id', $hall_id_get)
                            ->update(['status' => $status1]);
                    }else{
                        DB::table('hall')
                            ->where('hall_id', $hall_id_get)
                            ->update(['status' => $status2]);
                    }

                    if ($hall->save() == true){
                        $request->session()->flash('alert-success', 'Successfully Create!');
                        return redirect('/hall_table');
                    }else{
                        $request->session()->flash('alert-danger', 'Something Went Wrong!');
                        return redirect("/hall_table")->withInput($request);
                    }
                }else{
                    $request->session()->flash('alert-danger', 'Record is already exist..!');
                    return redirect("/hall_table");
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function hall_request_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('hall')->where('id', $id)->delete();
            DB::table('hall_approved')->where('hall_id', $id)->delete();
            DB::table('hall_roll_type')->where('hall_id', $id)->delete();
            DB::table('service')->where('hall_id', $id)->delete();
            DB::table('theme')->where('hall_id', $id)->delete();
            DB::table('hall_images')->where('hall_id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return Redirect::to('hall_table');
        }else{
            return redirect('/realestate_login');
        }
    }

//    hall approved
    public function approved_hall_table(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_table = DB::table('hall_approved')
                ->select('*')
                ->get();
            return view('adminpanel.hall_table' , compact('hall_table'));
        }else{
            return redirect('/login');
        }
    }
    public function approved_hall_status($id,$CurrentStatus){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $get_id = '';
            $booking_id_get = DB::table('hall_approved')->select('hall_id')->where('id', $id)->get();
            foreach ($booking_id_get as $booking_id_gets){
                $get_id =  $booking_id_gets->hall_id;
            }
            $booking = DB::table('hall_approved')->where('hall_id', $get_id);
            $booking1 = DB::table('hall')->where('hall_id', $get_id);
            if($CurrentStatus == 'pending'){
                $booking->update(['status' => 'approved']);
                $booking1->update(['status' => 'approved']);
            }else{
                $booking->update(['status' => 'pending']);
                $booking1->update(['status' => 'pending']);
            }
            return redirect('/approved_hall_table');

        }else{
            return redirect('/login');
        }
    }

    public function add_hall(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view('adminpanel.add_hall',compact('update'));
        }else{
            return redirect('/login');
        }
    }
    public function add_hall_store(Request $request) {

        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'hall_name' => 'required',
                    'contact' => 'required',
                    'email' => 'required|string|email|max:255|unique:users',
                    'address' => 'required',
                ]);

                $user_id = Auth::user()->id;
                $hall_name = $request->input('hall_name');
                $contact = $request->input('contact');
                $email = $request->input('email');
                $address = $request->input('address');
                $status = $request->input('status');

                $hall_id = rand(1, 1000000);
                $hall = new Hall_approved;
                $hall->hall_id = $hall_id;
                $hall->user_id = $user_id;
                $hall->hall_name = $hall_name;
                $hall->contact = $contact;
                $hall->email = $email;
                $hall->address = $address;
                $hall->status = $status;
                $hall->save();

                $hall_up = DB::table('hall_approved')->where('id', $hall->id);

                $hall_up->update(array(
                    'orignal_hall_id' => $hall->id,
                ));

                if ($hall->save() == true){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect()->back()->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect("/add_hall")->withInput($request);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function hall_edit(Request $request,$id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_section = DB::table('hall_approved')
                ->select('*')
                ->where('id' ,'=', $id)
                ->first();

            return view('adminpanel.add_hall' , compact('hall_section','update'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'hall_name' => 'required',
                'contact' => 'required',
                'email' => 'required|string|email|max:255',
                'address' => 'required',
            ]);

            $p_id = $request->input('p_id');
            $hall_name = $request->input('hall_name');
            $contact = $request->input('contact');
            $email = $request->input('email');
            $address = $request->input('address');
            $status = $request->input('status');

            $hall = DB::table('hall')->where('id', $p_id);

            $hall->update(array(
                'hall_name' => $hall_name,
                'contact' => $contact,
                'email' => $email,
                'address' => $address,
                'status' => $status,
            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/approved_hall_table');
        }else{
            return redirect('/login');
        }

    }
    public function hall_a_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('hall_approved')->where('id', $id)->delete();
            DB::table('hall_roll_type')->where('hall_id', $id)->delete();
            DB::table('service')->where('hall_id', $id)->delete();
            DB::table('theme')->where('hall_id', $id)->delete();
            DB::table('hall_images')->where('hall_id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return Redirect::to('hall_table');
        }else{
            return redirect('/realestate_login');
        }
    }

//    section
    public function hall_details_wd_section($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_details = DB::table('hall_roll_type as hr')
                ->leftJoin('hall_approved as h','h.orignal_hall_id','=','hr.hall_id')
                ->leftJoin('hall_images as hi','hi.sec_id','=','hr.id')
                ->select('hr.id as section_id','hr.amount','hr.detail as detail_section','hr.seating','hr.section_name','h.*','hi.images','hi.id as images_id')
//                ->where('h.id', '!=' ,'0')
                ->where('h.orignal_hall_id' ,'=', $id)
                ->groupBy('hr.id')
                ->get();

            $hall = DB::table('hall')
                ->select('*')
                ->where('id' ,'=', $id)
                ->get();
            $hall_service = DB::table('service')
                ->leftjoin('hall_images as hi','service.id','hi.service_id')
                ->select('service.*','hi.images')
                ->where('service.hall_id' ,'=', $id)
                ->groupBy('hi.service_id')
                ->get();


            $hall_theme = DB::table('theme')
                ->leftjoin('hall_images as hi','theme.id','hi.theme_id')
                ->select('theme.*','hi.images')
                ->where('theme.hall_id' ,'=', $id)
                ->groupBy('hi.theme_id')
                ->get();

            return view('adminpanel.hall_details' , compact('hall_details','hall','hall_service','hall_theme'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_section_details($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_section = DB::table('hall_roll_type as hr')
                ->leftJoin('hall as h','hr.hall_id','=','h.id')
                ->select('hr.*','h.*')
                ->where('hr.id' ,'=', $id)
                ->get();

            $hall_section_image = DB::table('hall_images as hi')
                ->select('hi.images')
                ->where('hi.sec_id' ,'=', $id)
                ->get();
            return view('adminpanel.hall_section_details' , compact('hall_section','update','hall_section_image'));
        }else{
            return redirect('/login');
        }
    }
    public function add_hall_section(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall = DB::table('hall_approved')
                ->select('*')
                ->get();

            return view("adminpanel.add_hall_section" , compact('hall','update'));
        }else{
            return redirect('/login');
        }

    }
    public function add_hall_section_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'hall_name' => 'required',
                    'section_name' => 'required',
                    'hall_seating' => 'required',
                    'amount' => 'required',
                    'detail' => 'required',
                ]);

                $user_id = Auth::user()->id;
                $hall_name = $request->input('hall_name');
                $section_name = $request->input('section_name');
                $hall_seating = $request->input('hall_seating');
                $amount = $request->input('amount');
                $detail = $request->input('detail');

                $hall = new Hall_role_type;
                $hall->user_id = $user_id;
                $hall->hall_id = $hall_name;
                $hall->section_name = $section_name;
                $hall->seating = $hall_seating;
                $hall->amount = $amount;
                $hall->detail = $detail;
                $hall->save();

                if ($files = $request->file('images')) {
                    foreach ($files as $file) {
                        $temp_name = rand(1, 1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath, $temp_name . "." . $file->getClientOriginalExtension());

                        $sales = new Hall_images();
                        $sales->images = $temp_name . "." . $file->getClientOriginalExtension();
                        $sales->sec_id = $hall->id;
                        $sales->save();
                    }
                }

                $request->session()->flash('alert-success', 'Successfully Create!');
                return redirect()->back()->withInput($request->all);
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function hall_section_edit_get($id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_section = DB::table('hall_roll_type as hr')
                ->leftJoin('hall_approved as h','hr.hall_id','=','h.id')
                ->select('hr.id as section_id','hr.hall_id','hr.section_name','hr.seating as hall_seating','hr.amount','hr.detail','h.*')
                ->where('hr.id' ,'=', $id)
                ->first();



            $hall_section_image = DB::table('hall_images as hi')
                ->select('hi.images','hi.id')
                ->where('hi.sec_id' ,'=', $id)
                ->get();



            $hall = DB::table('hall_approved')
                ->select('*')
                ->get();
            return view('adminpanel.add_hall_section' , compact('hall_section','hall_section_image','update','hall'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_section_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'section_id' => 'required',
                'hall_name' => 'required',
                'section_name' => 'required',
                'hall_seating' => 'required',
                'amount' => 'required',
                'detail' => 'required',
            ]);

            $section_id = $request->input('section_id');
            $p_id = $request->input('p_id');
            $hall_name = $request->input('hall_name');
            $section_name = $request->input('section_name');
            $hall_seating = $request->input('hall_seating');
            $amount = $request->input('amount');
            $detail = $request->input('detail');

            $hall = DB::table('hall_roll_type')->where('id', $section_id);

            $hall->update(array(
                'hall_id' => $hall_name,
                'section_name' => $section_name,
                'seating' => $hall_seating,
                'amount' => $amount,
                'detail' => $detail,
            ));

            if ($files = $request->file('images')) {
                foreach ($files as $file){
                    $temp_name = rand(1, 1000000);
                    $destinationPath = public_path('uploads');
                    $file->move($destinationPath, $temp_name . "." . $file->getClientOriginalExtension());
                    $sales = new Hall_images();
                    $sales->images = $temp_name . "." . $file->getClientOriginalExtension();
                    $sales->sec_id = $section_id;
                    $sales->save();
                }
            }

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/hall_info/'.$p_id);
        }else{
            return redirect('/login');
        }

    }
    public function hall_section_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('hall_roll_type')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }
    public function section_image_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $images = "NULL";
            $hall = DB::table('hall_images')->where('id', $id)->delete();
//            $hall->update(array(
//                'images' => $images,
//            ));
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }

//    service
    public function add_hall_service(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall = DB::table('hall')
                ->select('*')
                ->get();
            return view('adminpanel.add_hall_service',compact('hall','update'));
        }else{
            return redirect('/login');
        }
    }
    public function add_hall_service_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'hall_name' => 'required',
                    'service_name' => 'required',
                ]);

                $hall_name = $request->input('hall_name');
                $service_name = $request->input('service_name');


                $hall = new Service;
                $hall->hall_id = $hall_name;
                $hall->service_name = $service_name;
                $hall->save();
                if ($files = $request->file('images')) {
                    foreach ($files as $file){
                        $temp_name = rand(1, 1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath, $temp_name . "." . $file->getClientOriginalExtension());
                        $sales = new Hall_images();
                        $sales->images = $temp_name . "." . $file->getClientOriginalExtension();
                        $sales->service_id = $hall->id;
                        $sales->save();
                    }
                }


                if ($hall->save() == true){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect()->back()->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function service_edit(Request $request,$id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_service = DB::table('service')
                ->select('*')
                ->where('id' ,'=', $id)
                ->first();
            $hall = DB::table('hall_approved')
                ->select('*')
                ->get();
            $hall_service_image = DB::table('hall_images as hi')
                ->select('hi.images','hi.id')
                ->where('hi.service_id' ,'=', $id)
                ->get();

            return view('adminpanel.add_hall_service' , compact('hall_service','hall_service_image','update','hall'));
        }else{
            return redirect('/login');
        }
    }
    public function service_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $this->validate($request, [
                'hall_name' => 'required',
                'service_name' => 'required',

            ]);
            $hall_id = $request->input('hall_id');
            $p_id = $request->input('p_id');
            $hall_name = $request->input('hall_name');
            $service_name = $request->input('service_name');

            $hall = DB::table('service')->where('id', $p_id);
            $hall->update(array(
                'hall_id' => $hall_name,
                'service_name' => $service_name,
            ));
            if ($files = $request->file('images')) {
                foreach ($files as $file){
                    $temp_name = rand(1, 1000000);
                    $destinationPath = public_path('uploads');
                    $file->move($destinationPath, $temp_name . "." . $file->getClientOriginalExtension());
                    $sales = new Hall_images();
                    $sales->images = $temp_name . "." . $file->getClientOriginalExtension();
                    $sales->service_id = $p_id;
                    $sales->save();
                }
            }

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/hall_info/'.$hall_id);
        }else{
            return redirect('/login');
        }

    }
    public function hall_service_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('service')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }
    public function service_image_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $images = "NULL";
            $hall = DB::table('hall_images')->where('id', $id);
            $hall->update(array(
                'images' => $images,
            ));
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }
    public function hall_service_details($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_services = DB::table('service as s')
                ->select('s.*')
                ->where('s.id' ,'=', $id)
                ->get();

            $hall_service_images = DB::table('hall_images as hi')
                ->select('hi.images')
                ->where('hi.service_id' ,'=', $id)
                ->get();

            return view('adminpanel.hall_service_details' , compact('hall_services','update','hall_service_images'));
        }else{
            return redirect('/login');
        }
    }

//    theme
    public function add_hall_theme(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall = DB::table('hall')
                ->select('*')
                ->get();
            return view('adminpanel.add_hall_theme',compact('hall','update'));
        }else{
            return redirect('/login');
        }
    }
    public function add_hall_theme_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'hall_name' => 'required',
                    'name' => 'required',
                    'amount' => 'required',
                    'detail' => 'required',
                ]);

                $hall_name = $request->input('hall_name');
                $name = $request->input('name');
                $amount = $request->input('amount');
                $detail = $request->input('detail');


                $hall = new Theme;
                $hall->hall_id = $hall_name;
                $hall->name = $name;
                $hall->amount = $amount;
                $hall->detail = $detail;
                $hall->save();

                if ($files = $request->file('images')) {
                    foreach ($files as $file){
                        $temp_name = rand(1, 1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath, $temp_name . "." . $file->getClientOriginalExtension());
                        $sales = new Hall_images();
                        $sales->images = $temp_name . "." . $file->getClientOriginalExtension();
                        $sales->theme_id = $hall->id;
                        $sales->save();
                    }
                }

                if ($hall->save() == true){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect()->back()->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function theme_edit(Request $request,$id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_theme = DB::table('theme')
                ->select('*')
                ->where('id' ,'=', $id)
                ->first();
            $hall = DB::table('hall_approved')
                ->select('*')
                ->get();
            $hall_theme_image = DB::table('hall_images as hi')
                ->select('hi.images','hi.id')
                ->where('hi.theme_id' ,'=', $id)
                ->get();



            return view('adminpanel.add_hall_theme' , compact('hall_theme','hall_theme_image','update','hall'));
        }else{
            return redirect('/login');
        }
    }
    public function theme_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'hall_name' => 'required',
                'amount' => 'required',
                'detail' => 'required',

            ]);
            $hall_id = $request->input('hall_id');
            $p_id = $request->input('p_id');
            $hall_name = $request->input('hall_name');
            $name = $request->input('name');
            $amount = $request->input('amount');
            $detail = $request->input('detail');


            $hall_approved = DB::table('hall')
                ->select('*')
                ->where('id' ,'=', $hall_id)
                ->get();

            $back_hall_id = '';
            foreach ($hall_approved as $hall_approveds){
                $back_hall_id = $hall_approveds->hall_id;
                $back_hall_id_get = DB::table('hall_approved')
                    ->select('*')
                    ->where('hall_id' ,'=', $back_hall_id)
                    ->get();
                foreach ($back_hall_id_get as $back_hall_id_gets){
                    $id =  $back_hall_id_gets->id;
                }

            }

            $hall = DB::table('theme')->where('id', $p_id);
            $hall->update(array(
                'hall_id' => $hall_name,
                'name' => $name,
                'amount' => $amount,
                'detail' => $detail,
            ));
            if ($files = $request->file('images')) {
                foreach ($files as $file){
                    $temp_name = rand(1, 1000000);
                    $destinationPath = public_path('uploads');
                    $file->move($destinationPath, $temp_name . "." . $file->getClientOriginalExtension());
                    $sales = new Hall_images();
                    $sales->images = $temp_name . "." . $file->getClientOriginalExtension();
                    $sales->theme_id = $p_id;
                    $sales->save();
                }
            }

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/hall_info/'.$id);
        }else{
            return redirect('/login');
        }

    }
    public function hall_theme_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('theme')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }
    public function theme_image_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $images = "NULL";
            $hall = DB::table('hall_images')->where('id', $id);
            $hall->update(array(
                'images' => $images,
            ));
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }
    public function hall_theme_details($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall_theme = DB::table('theme as s')
                ->select('s.*')
                ->where('s.id' ,'=', $id)
                ->get();

            $hall_theme_images = DB::table('hall_images as hi')
                ->select('hi.images')
                ->where('hi.theme_id' ,'=', $id)
                ->get();

            return view('adminpanel.hall_service_details' , compact('hall_theme','update','hall_theme_images'));
        }else{
            return redirect('/login');
        }
    }

//    booking request
    public function booking_request(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $booking_request = DB::table('booking_request as bq')
                ->join('hall_roll_type as hr','bq.hall_roll_type','hr.id')
                ->join('hall as h','hr.hall_id','h.id')
                ->select('bq.id','bq.booking_id','bq.booking_date','bq.message','bq.status','hr.section_name','h.hall_name')
                ->get();

            return view('adminpanel.booking_request' , compact('booking_request'));
        }else{
            return redirect('/login');
        }
    }
    public function booking_request_edit($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $booking_request = DB::table('booking_request as bq')
                ->join('hall_roll_type as hr','bq.hall_roll_type','hr.id')
                ->join('hall as h','hr.hall_id','h.id')
                ->select('bq.id','bq.booking_id','bq.user_id','bq.hall_roll_type','bq.booking_date','bq.message','bq.status','hr.section_name','h.hall_name')
                ->where('bq.id','=',$id)
                ->get();
            return view('adminpanel.booking_request_edit' , compact('booking_request'));
        }else{
            return redirect('/login');
        }
    }
    public function booking_request_edit_store(Request $request,$id) {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'user_id' => 'required',
                    'booking_date' => 'required',
                    'hall_roll_type' => 'required',
                    'message' => 'required',
                    'status' => 'required',
                ]);

                $booking_id = $request->input('booking_id');
                $booking_date = $request->input('booking_date');
                $hall_roll_type = $request->input('hall_roll_type');
                $user_id = $request->input('user_id');
                $message= $request->input('message');
                $status= $request->input('status');
                $booking_id_get = DB::table('booking')
                    ->select('*')
                    ->where('booking_id' ,'=', $booking_id)
                    ->get();
                $get_booking_id = '';
                foreach ($booking_id_get as $booking_id_gets) {
                    $get_booking_id = $booking_id_gets->booking_id;
                }

                if ($get_booking_id == ''){
                    $booking = new Booking;
                    $booking->booking_id = $booking_id;
                    $booking->booking_date = $booking_date;
                    $booking->message = $message;
                    $booking->status = $status;
                    $booking->user_id = $user_id;
                    $booking->hall_role_type_id = $hall_roll_type;
                    $booking->save();

                    $status1 = "approved";
                    $status2 = "pending";
                    if ($status == 'approved'){
                        DB::table('booking_request')
                            ->where('booking_id', $booking_id)
                            ->update(['status' => $status1]);
                    }else{
                        DB::table('booking_request')
                            ->where('booking_id', $booking_id)
                            ->update(['status' => $status2]);
                    }

                    $request->session()->flash('alert-success', 'Successfully Update!');
                    return redirect("/booking_request");
                }else{
                    $request->session()->flash('alert-danger', 'Data Already Exist!');
                    return redirect("/booking_request");
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/booking_request");
            }
        }else{
            return redirect('/login');
        }
    }
    public function booking_request_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $booking_request = DB::table('booking_request')->where('id',$id)->get();
            $booking = '';
            $booking_id = '';
            foreach ($booking_request as $booking_requests){
                $booking_id = $booking_requests->booking_id;
                $booking = DB::table('booking')->where('booking_id',$booking_id)->get();
            }

            $get_booking_id = '';
            foreach ($booking as $bookings){
                $get_id = $bookings->id;
                $get_booking_id = $bookings->booking_id;
                if ($booking_id == $get_booking_id){
                    DB::table('booking')->where('id', $get_id)->delete();
                    DB::table('booking_request')->where('id', $id)->delete();
                }
            }
            DB::table('booking_request')->where('id', $id)->delete();



            $request->session()->flash('alert-success', 'Successfully Delete!');
            return Redirect::to('booking_request');
        }else{
            return redirect('/realestate_login');
        }
    }


    //booking approved
    public function booking_approved(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $booking_approved = DB::table('booking as bq')
                ->leftjoin('hall_roll_type as hr','bq.hall_role_type_id','hr.id')
                ->leftjoin('hall as h','hr.hall_id','h.id')
                ->select('bq.id','bq.booking_id','bq.booking_date','bq.message','bq.status','hr.section_name','h.hall_name')
                ->get();
            return view('adminpanel.booking_approved_table' , compact('booking_approved'));
        }else{
            return redirect('/login');
        }
    }
    public function booking_status($id,$CurrentStatus){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $get_id = '';
            $booking_id_get = DB::table('booking')->select('booking_id')->where('id', $id)->get();
            foreach ($booking_id_get as $booking_id_gets){
                $get_id =  $booking_id_gets->booking_id;
            }
            $booking = DB::table('booking')->where('booking_id', $get_id);
            $booking1 = DB::table('booking_request')->where('booking_id', $get_id);
            if($CurrentStatus == 'pending'){
                $booking->update(['status' => 'approved']);
                $booking1->update(['status' => 'approved']);
            }else{
                $booking->update(['status' => 'pending']);
                $booking1->update(['status' => 'pending']);
            }
            return redirect('/booking_approved');

        }else{
            return redirect('/login');
        }
    }
    public function add_booking(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall = DB::table('hall')
                ->select('*')
                ->get();

            $hall_section = DB::table('hall_roll_type')
                ->select('*')
                ->get();
            $users = DB::table('users')
                ->select('*')
                ->get();
            return view('adminpanel.add_booking',compact('update','hall','hall_section','users'));

        }else{
            return redirect('/login');
        }
    }
    public function add_booking_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')) {
                $this->validate($request, [
                    'id_country' => 'required',
                    'id_state' => 'required',
                    'booking_date' => 'required',
                    'message' => 'required',
                ]);

                $user_id = $request->input('user_id');
                $hall_name = $request->input('id_country');
                $section_name = $request->input('id_state');
                $booking_date = $request->input('booking_date');
                $message = $request->input('message');

                $booking_id = rand(1, 1000000);
                $booking_req = new Booking;
                $booking_req->booking_id = $booking_id;
                $booking_req->user_id = $user_id;
                $booking_req->hall_id = $hall_name;
                $booking_req->hall_role_type_id = $section_name;
                $booking_req->booking_date = $booking_date;
                $booking_req->message = $message;
                $booking_req->save();

                $request->session()->flash('alert-success', 'Successfully Create!');
                return redirect('/add_booking_a')->withInput($request->all);
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_booking_a")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function booking_edit(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $hall = DB::table('hall')
                ->select('*')
                ->get();
            $booking = DB::table('booking as bq')
                ->leftjoin('hall_roll_type as hr','bq.hall_role_type_id','hr.id')
                ->leftjoin('hall as h','bq.hall_id','h.id')
                ->select('bq.*','h.hall_name','hr.section_name')
                ->where('bq.id' ,'=', $id)
                ->get();
            $users = DB::table('users')
                ->select('*')
                ->get();

            return view('adminpanel.booking_edit', compact('booking','hall','users'));
        }else{
            return redirect('/login');
        }

    }
    public function booking_update(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'id_country' => 'required',
                'id_state' => 'required',
                'booking_date' => 'required',
                'message' => 'required',
            ]);

            $user_id = $request->input('user_id');
            $hall_name = $request->input('id_country');
            $section_name = $request->input('id_state');
            $booking_date = $request->input('booking_date');
            $message = $request->input('message');

            $hall = DB::table('booking')->where('id', $id);

            $hall->update(array(
                'user_id' => $user_id,
                'hall_id' => $hall_name,
                'hall_role_type_id' => $section_name,
                'booking_date' => $booking_date,
                'message' => $message,
            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/booking_approved');
        }else{
            return redirect('/login');
        }

    }
    public function selectAjax(Request $request)
    {
        if($request->ajax()){
            $states = DB::table('hall_roll_type')->where('hall_id',$request->input('id_country'))->first();
            return response()->json(['options'=>$states]);
        }else{
            $states = DB::table('hall_roll_type')->where('hall_id',$request->input('id_country'))->first();
            return view('add_booking',compact('states'))->render();
        }



    }
    public function booking_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $booking_request = DB::table('booking')->where('id',$id)->get();
            $booking = '';
            $booking_id = '';
            foreach ($booking_request as $booking_requests){
                $booking_id = $booking_requests->booking_id;
                $booking = DB::table('booking_request')->where('booking_id',$booking_id)->get();
            }

            $get_booking_id = '';
            foreach ($booking as $bookings){
                $get_id = $bookings->id;
                $get_booking_id = $bookings->booking_id;
                if ($booking_id == $get_booking_id){
                    DB::table('booking_request')->where('id', $get_id)->delete();
                    DB::table('booking')->where('id', $id)->delete();
                }
            }

            DB::table('booking')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return Redirect::to('booking_approved');
        }else{
            return redirect('/realestate_login');
        }
    }

//    users
    public function users_detail(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $users = DB::table('users')
                ->select('*')
                ->where('role','=',"users")
                ->get();
            return view('adminpanel.users' , compact('users'));
        }else{
            return redirect('/login');
        }
    }
    public function add_users(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $update = false;
            return view('adminpanel.add_users',compact('update'));
        }else{
            return redirect('/login');
        }
    }
    public function add_users_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'name' => 'required',
                    'contact' => 'required',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|min:6'
                ]);

                $name = $request->input('name');
                $contact = $request->input('contact');
                $email = $request->input('email');
                $password = $request->input('password');

                $user = new user;
                $user->name = $name;
                $user->contact = $contact;
                $user->email = $email;
                $user->password = \Hash::make($password);
                $user->role = "users";
                $user->save();

                if ($user->save() == true){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect()->back()->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function user_edit(Request $request,$id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $agent = DB::table('users')
                ->select('*')
                ->where('id' ,'=', $id)
                ->first();


            return view('adminpanel.add_users' , compact('agent','update'));
        }else{
            return redirect('/login');
        }
    }
    public function user_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'name' => 'required',
                'contact' => 'required',
                'email' => 'required|string|email|max:255',
            ]);

            $a_id = $request->input('a_id');
            $name = $request->input('name');
            $contact = $request->input('contact');
            $email = $request->input('email');
            $password = $request->input('password');

            $agent = DB::table('users')->where('id', $a_id);

            $agent->update(array(
                'name' => $name,
                'contact' => $contact,
                'email' => $email,
                'password' => \Hash::make($password),
            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/users');
        }else{
            return redirect('/login');
        }

    }
    public function user_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('users')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return Redirect::to('users');
        }else{
            return redirect('/realestate_login');
        }
    }

//    agent
    public function agents_detail(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $agent = DB::table('users')
                ->select('*')
                ->where('role','=',"agent")
                ->get();
            return view('adminpanel.agents' , compact('agent'));
        }else{
            return redirect('/login');
        }
    }
    public function add_agent(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view('adminpanel.add_agent',compact('update'));
        }else{
            return redirect('/login');
        }
    }
    public function add_agent_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'name' => 'required',
                    'contact' => 'required',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|min:6'
                ]);

                $name = $request->input('name');
                $contact = $request->input('contact');
                $email = $request->input('email');
                $password = $request->input('password');


                $user = new user;
                $user->name = $name;
                $user->contact = $contact;
                $user->email = $email;
                $user->password = \Hash::make($password);
                $user->role = "agent";
                $user->save();

                if ($user->save() == true){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect()->back()->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function agent_hall_detail($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $user = DB::table('users as u')
                ->leftjoin('hall as h','u.id','h.user_id')
                ->select('h.*')
                ->where('u.id','=',$id)
                ->get();
            return view('adminpanel.agent_details' , compact('user'));
        }else{
            return redirect('/login');
        }
    }
    public function agent_edit(Request $request,$id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $agent = DB::table('users')
                ->select('*')
                ->where('id' ,'=', $id)
                ->first();


            return view('adminpanel.add_agent' , compact('agent','update'));
        }else{
            return redirect('/login');
        }
    }
    public function agent_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'name' => 'required',
                'contact' => 'required',
                'email' => 'required|string|email|max:255',
            ]);

            $a_id = $request->input('a_id');
            $name = $request->input('name');
            $contact = $request->input('contact');
            $email = $request->input('email');
            $password = $request->input('password');

            $agent = DB::table('users')->where('id', $a_id);

            $agent->update(array(
                'name' => $name,
                'contact' => $contact,
                'email' => $email,
                'password' => \Hash::make($password),
            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/agents');
        }else{
            return redirect('/login');
        }

    }
    public function agent_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('users')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return Redirect::to('agents');
        }else{
            return redirect('/realestate_login');
        }
    }

//    admin
    public function admin_detail(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $admin = DB::table('users')
                ->select('*')
                ->where('role','=',"admin")
                ->get();
            return view('adminpanel.admin_details' , compact('admin'));
        }else{
            return redirect('/login');
        }
    }
    public function admin_hall($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $user = DB::table('users as u')
                ->leftjoin('hall as h','u.id','h.user_id')
                ->select('h.*')
                ->where('u.id','=',$id)
                ->get();
            return view('adminpanel.admin_hall' , compact('user'));
        }else{
            return redirect('/login');
        }
    }

//    vendor service
    public function vendor_service_type(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service = DB::table('vendor_service_type')->select('*')->get();
            return view('adminpanel.vendor_service_type' , compact('vendor_service'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_service_type_add(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view('adminpanel.vendor_service_type_add',compact('update'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_service_type_add_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'service_type' => 'required',
                ]);

                $service_type = $request->input('service_type');
                $images = $request->file('images');
                $temp_name = rand(1, 1000000);
                $destinationPath = public_path('uploads');
                $images->move($destinationPath, $temp_name . "." . $images->getClientOriginalExtension());


                $vendor_service_type = new Vendor_service_type;
                $vendor_service_type->service_type = $service_type;
                $vendor_service_type->image = $temp_name . "." . $images->getClientOriginalExtension();
                $vendor_service_type->save();

                if ($vendor_service_type->save() == true){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect()->back()->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else {
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function vendor_service_type_edit($id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service = DB::table('vendor_service_type')->select('*')->where('id',$id)->first();
            return view('adminpanel.vendor_service_type_add',compact('update','vendor_service'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_service_type_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'service_type' => 'required',
            ]);

            $service_type = $request->input('service_type');
            $a_id = $request->input('a_id');

            $vendor_service_type = DB::table('vendor_service_type')->where('id', $a_id);

            $vendor_service_type->update(array(
                'service_type' => $service_type,
            ));

            if ($files = $request->file('images')) {
                $temp_name = rand(1, 1000000);
                $destinationPath = public_path('uploads');
                $files->move($destinationPath, $temp_name . "." . $files->getClientOriginalExtension());

                $vendor_service_type_image = DB::table('vendor_service_type')->where('id', $a_id);
                $vendor_service_type_image->update(array(
                    'image' => $temp_name . "." . $files->getClientOriginalExtension(),
                ));
            }

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/vendor_service_type');
        }else{
            return redirect('/login');
        }

    }
    public function vendor_service_type_image_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $images = "NULL";
            $hall = DB::table('vendor_service_type')->where('id', $id);
            $hall->update(array(
                'image' => $images,
            ));
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/vendor_service_type_edit/'.$id);
        }else{
            return redirect('/realestate_login');
        }
    }
    public function vendor_service_type_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('vendor_service_type')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return Redirect::to('vendor_service_type');
        }else{
            return redirect('/realestate_login');
        }
    }

    public function vendor_service($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service = DB::table('vendor_service as vs')
                ->leftjoin('vendor_service_image as vsi','vs.id','vsi.vendor_service_id')
                ->select('vsi.image','vs.*')
                ->where('vs.type','=',$id)
                ->groupBy('vs.id')
                ->get();

            return view('adminpanel.vendor_service' , compact('vendor_service'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_service_add($id){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service = DB::table('vendor_service as vs')
                ->leftjoin('vendor_service_type as vst','vs.type','vst.id')
                ->select('vs.*','vst.*')
                ->where('vs.id',$id)
                ->get();

            return view('adminpanel.vendor_service_add',compact('update','vendor_service_type','vendor_service'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_service_add_store(Request $request) {
//        dd($request);
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'service_company' => 'required',
                    'name' => 'required',
                    'amount' => 'required',
                    'details' => 'required',

                ]);

                $type_id = $request->input('type');
                $service_company = $request->input('service_company');
                $name = $request->input('name');
                $amount = $request->input('amount');
                $details = $request->input('details');


                $vendor_service = new Vendor_service;
                $vendor_service->service_company = $service_company;
                $vendor_service->name = $name;
                $vendor_service->amount = $amount;
                $vendor_service->details = $details;
                $vendor_service->type = $type_id;
                $vendor_service->save();

                if ($vendor_service->save() == true){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect()->back()->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function vendor_service_edit(Request $request,$id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service_type = DB::table('vendor_service_type')->select('*')->get();
            $vendor_service = DB::table('vendor_service')->select('*')->where('id',$id)->first();

            return view('adminpanel.vendor_service_add' , compact('vendor_service','update','vendor_service_type'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_service_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'service_company' => 'required',
                'name' => 'required',
                'amount' => 'required',
                'details' => 'required',
            ]);

            $a_id = $request->input('a_id');
            $type_id = $request->input('type_id');
            $service_company = $request->input('service_company');
            $name = $request->input('name');
            $amount = $request->input('amount');
            $details = $request->input('details');

            $agent = DB::table('vendor_service')->where('id', $a_id);

            $agent->update(array(
                'service_company' => $service_company,
                'name' => $name,
                'amount' => $amount,
                'details' => $details,
            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/vendor_service/'.$type_id);
        }else{
            return redirect('/login');
        }

    }
    public function vendor_service_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('vendor_service')->where('id', $id)->delete();
            DB::table('vendor_service_image')->where('vendor_service_id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }

    public function vendor_catering_detail($id){

        $vendor_courses = DB::table('vendor_catering_deal')->where('service_id', $id)->select('*')->get();

        $vendor_menus = [];
        foreach ($vendor_courses as $vendor_course){
            $vendor_menu = DB::table('vendor_catering_menu')->where('vendor_catering_deal_id', $vendor_course->id)->select('*')->get();
            array_push($vendor_menus,$vendor_menu);
        }



        $menu_id = [];
        for($i = 0; $i < count($vendor_menus); $i++){
            foreach ($vendor_menus[$i] as $vendor_menu){
                $vendor_deal_item = DB::table('vendor_deal_item')->select('*')->where('menu_id', $vendor_menu->id)->get();
                array_push($menu_id,$vendor_deal_item);
            }
        }

        return view('adminpanel.vendor_catering_detail',compact('vendor_courses','vendor_menus','menu_id'));
    }

    // catering  services
    public function vendor_catering_deal($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_courses = DB::table('vendor_catering_deal')->where('service_id', $id)->select('*')->get();

            return view('adminpanel.vendor_catering_deals',compact('vendor_courses'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_deal_add(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service = DB::table('vendor_service')->select('*')->get();
            return view('adminpanel.vendor_catering_deal_add',compact('update','vendor_service'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_deal_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'course_name' => 'required',
                    'per_head' => 'required',
                ]);
                $service_name = $request->input('service_id');
                $course_name = $request->input('course_name');
                $per_head = $request->input('per_head');
                $url_id = $request->input('url_id');

                $vendor_detail = new Vendor_catering_deal;
                $vendor_detail->service_id = $url_id;
                $vendor_detail->course_name = $course_name;
                $vendor_detail->per_head = $per_head;
                $vendor_detail->save();

                if ($vendor_detail->save()){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect('/vendor_catering_deals/'.$url_id)->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/vendor_catering_deal_add")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_deal_edit(Request $request,$id, $string){

        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service_type = DB::table('vendor_service_type')->select('*')->get();
            $vendor_service = DB::table('vendor_catering_deal')->select('*')->where('id',$id)->first();



            return view('adminpanel.vendor_catering_deal_add' , compact('vendor_service','update','vendor_service_type'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_deal_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'course_name' => 'required',
                'per_head' => 'required',
            ]);

            $url_id = $request->input('url_id');
            $back_id = $request->input('back_id');
            $course_name = $request->input('course_name');
            $per_head = $request->input('per_head');

            $agent = DB::table('vendor_catering_deal')->where('id', $url_id);

            $agent->update(array(
                'course_name' => $course_name,
                'per_head' => $per_head,

            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/vendor_catering_deals/'.$back_id);
        }else{
            return redirect('/login');
        }

    }
    public function vendor_catering_deal_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('vendor_catering_deal')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }

    public function vendor_catering_menus($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_menu = DB::table('vendor_catering_menu')->where('vendor_catering_deal_id', $id)->select('*')->get();
            return view('adminpanel.vendor_catering_menus',compact('vendor_menu'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_menus_add(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_deal = DB::table('vendor_catering_deal')->select('*')->get();
            return view('adminpanel.vendor_catering_menu_add',compact('update','vendor_deal'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_menus_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'menu_name' => 'required',
                ]);
                $vendor_catering_deal_id = $request->input('vendor_catering_deal_id');
                $url_id = $request->input('url_id');
                $menu_name = $request->input('menu_name');

                $vendor_items = new Vendor_catering_menus;
                $vendor_items->vendor_catering_deal_id = $url_id;
                $vendor_items->menu_name = $menu_name;
                $vendor_items->save();

                if ($vendor_items->save()){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect('/vendor_catering_menus/'.$url_id)->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/vendor_catering_menus_add")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_menus_edit(Request $request,$id, $string){

        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service_type = DB::table('vendor_service_type')->select('*')->get();
            $vendor_service = DB::table('vendor_catering_menu')->select('*')->where('id',$id)->first();



            return view('adminpanel.vendor_catering_menu_add' , compact('vendor_service','update','vendor_service_type'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_menus_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'menu_name' => 'required',
            ]);

            $url_id = $request->input('url_id');
            $back_id = $request->input('back_id');
            $menu_name = $request->input('menu_name');

            $agent = DB::table('vendor_catering_menu')->where('id', $url_id);

            $agent->update(array(
                'menu_name' => $menu_name,

            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/vendor_catering_menus/'.$back_id);
        }else{
            return redirect('/login');
        }

    }
    public function vendor_catering_menus_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('vendor_catering_menu')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }

    public function vendor_catering_items($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_items = DB::table('vendor_deal_item')->where('menu_id', $id)->select('*')->get();
            return view('adminpanel.vendor_catering_items',compact('vendor_items'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_items_add(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_menu = DB::table('vendor_catering_menu')->select('*')->get();
            return view('adminpanel.vendor_catering_items_add',compact('update','vendor_menu'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_items_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'item_name' => 'required',
                ]);
                $url_id = $request->input('url_id');
                $menu_id = $request->input('menu_id');
                $item_name = $request->input('item_name');

                $vendor_items = new Vendor_catering_items;
                $vendor_items->menu_id = $url_id;
                $vendor_items->item_name = $item_name;
                $vendor_items->save();

                if ($vendor_items->save()){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect('/vendor_catering_items/'.$url_id)->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/dashboard")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_items_edit(Request $request,$id, $string){

        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service_type = DB::table('vendor_service_type')->select('*')->get();
            $vendor_service = DB::table('vendor_deal_item')->select('*')->where('id',$id)->first();



            return view('adminpanel.vendor_catering_items_add' , compact('vendor_service','update','vendor_service_type'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_catering_items_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'item_name' => 'required',
            ]);

            $url_id = $request->input('url_id');
            $back_id = $request->input('back_id');
            $item_name = $request->input('item_name');

            $agent = DB::table('vendor_deal_item')->where('id', $url_id);

            $agent->update(array(
                'item_name' => $item_name,

            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/vendor_catering_items/'.$back_id);
        }else{
            return redirect('/login');
        }

    }
    public function vendor_catering_items_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('vendor_deal_item')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }


    //photography service
    public function vendor_photography($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_photography = DB::table('vendor_service')->where('type',$id)->select('*')->get();
            return view('adminpanel.vendor_photography_service',compact('vendor_photography'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_photography_detail($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_photography = DB::table('vendor_service')->where('id',$id)->select('*')->get();
            $vendor_photography_images = DB::table('vendor_photography_images')->where('vendor_photography_id',$id)->select('*')->get();
            return view('adminpanel.vendor_photography_detail',compact('vendor_photography','vendor_photography_images'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_photography_add($id){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service_type = DB::table('vendor_service_type')
                                    ->where('id',$id)
                                    ->select('*')
                                    ->get();
            $vendor_photography_images = DB::table('vendor_photography_images')
                                            ->where('vendor_photography_id',$id)
                                            ->select('*')
                                            ->get();
            return view('adminpanel.vendor_photography_add',compact('update','vendor_service_type','vendor_photography_images'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_photography_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'service_company' => 'required',
                    'name' => 'required',
                    'amount' => 'required',
                    'details' => 'required',

                ]);

                $type_id = $request->input('type');
                $service_company = $request->input('service_company');
                $name = $request->input('name');
                $amount = $request->input('amount');
                $details = $request->input('details');


                $vendor_service = new Vendor_service;
                $vendor_service->service_company = $service_company;
                $vendor_service->name = $name;
                $vendor_service->amount = $amount;
                $vendor_service->details = $details;
                $vendor_service->type = $type_id;
                $vendor_service->save();

                if ($profile_images = $request->file('profile_images')) {
                    $temp_name = rand(1, 1000000);
                    $destinationPath = public_path('uploads');
                    $profile_images->move($destinationPath, $temp_name . "." . $profile_images->getClientOriginalExtension());
                    $sales =  DB::table('vendor_service')->where('id', $vendor_service->id);
                    $sales->update(array(
                        'profile_image' => $temp_name . "." . $profile_images->getClientOriginalExtension(),

                    ));
                }

                if ($cover_images = $request->file('cover_images')) {
                    $temp_name = rand(1, 1000000);
                    $destinationPath = public_path('uploads');
                    $cover_images->move($destinationPath, $temp_name . "." . $cover_images->getClientOriginalExtension());
                    $sales = DB::table('vendor_service')->where('id', $vendor_service->id);
                    $sales->update(array(
                        'cover_images' => $temp_name . "." . $cover_images->getClientOriginalExtension(),
                    ));

                }

                if ($portfolio_images = $request->file('portfolio_images')) {
                    foreach ($portfolio_images as $file){
                        $temp_name = rand(1, 1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath, $temp_name . "." . $file->getClientOriginalExtension());
                        $sales = new Vendor_photography_images();
                        $sales->images = $temp_name . "." . $file->getClientOriginalExtension();
                        $sales->vendor_photography_id = $vendor_service->id;
                        $sales->save();
                    }
                }

                if ($vendor_service->save() == true){
                    $request->session()->flash('alert-success', 'Successfully Create!');
                    return redirect()->back()->withInput($request->all);
                }else{
                    $request->session()->flash('alert-danger', 'Something Went Wrong!');
                    return redirect()->back()->withInput($request->all);
                }
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function vendor_photography_edit(Request $request,$id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service = DB::table('vendor_service')->where('id',$id)->select('*')->first();
            $vendor_photography_images = DB::table('vendor_photography_images')->where('vendor_photography_id',$id)->select('*')->get();

            return view('adminpanel.vendor_photography_add' , compact('vendor_service','vendor_photography_images','update'));
        }else{
            return redirect('/login');
        }
    }
    public function vendor_photography_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'service_company' => 'required',
                'name' => 'required',
                'amount' => 'required',
                'details' => 'required',

            ]);

            $a_id = $request->input('a_id');
            $type_id = $request->input('type_id');
            $service_company = $request->input('service_company');
            $name = $request->input('name');
            $amount = $request->input('amount');
            $details = $request->input('details');

            $agent = DB::table('vendor_service')->where('id', $a_id);

            $agent->update(array(
                'service_company' => $service_company,
                'name' => $name,
                'amount' => $amount,
                'details' => $details,

            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/vendor_catering_items/'.$type_id);
        }else{
            return redirect('/login');
        }

    }
    public function section_photography_profile_image_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $images = "NULL";
            $hall = DB::table('vendor_service')->where('id', $id);
            $hall->update(array(
                'profile_image' => $images,
            ));
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }
    public function section_photography_cover_image_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $images = "NULL";
            $hall = DB::table('vendor_service')->where('id', $id);
            $hall->update(array(
                'cover_images' => $images,
            ));
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect()->back();
        }else{
            return redirect('/realestate_login');
        }
    }

    public function vendor_add_catering(){
        return view('adminpanel.vendor_add_catering');
    }
    public function vendor_service_detail($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $vendor_service = DB::table('vendor_service as vs')
                ->leftjoin('vendor_service_image as vsi','vs.id','vsi.vendor_service_id')
                ->select('vsi.image','vs.*')
                ->where('vs.id','=',$id)
                ->get();

            return view('adminpanel.vendor_service' , compact('vendor_service'));
        }else{
            return redirect('/login');
        }
    }
}
