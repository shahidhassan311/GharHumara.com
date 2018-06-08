<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hall;
use App\Hall_approved;
use App\Hall_images;
use App\Booking;
use App\Hall_role_type;
use App\Booking_request;
use App\Service;
use App\Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Validator, Input,Session, Redirect;

class AgentController extends Controller
{
    public function hall_table(){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall_table = DB::table('hall')
                ->select('*')
                ->where('user_id','=',Auth::user()->id)
//                ->where(['user_id' => Auth::user()->id, 'status' => "pending"])
                ->get();
            return view('agent.hall_table' , compact('hall_table'));
        }else{
            return redirect('/login');
        }
    }
    public function add_hall(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            return view('agent.add_hall',compact('update'));
        }else{
            return redirect('/login');
        }
    }
    public function add_hall_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            if($request->input('_token')){
                $this->validate($request, [
                    'hall_name' => 'required',
                    'contact' => 'required',
                    'email' => 'required|string|email|max:255',
                    'address' => 'required',
                ]);

                $user_id = Auth::user()->id;
                $hall_name = $request->input('hall_name');
                $contact = $request->input('contact');
                $email = $request->input('email');
                $address = $request->input('address');

                $hall_id = rand(1, 1000000);
                $hall = new Hall;
                $hall->hall_id = $hall_id;
                $hall->user_id = $user_id;
                $hall->hall_name = $hall_name;
                $hall->contact = $contact;
                $hall->email = $email;
                $hall->address = $address;
                $hall->status = "pending";
                $hall->save();

                if ($files = $request->file('cover_images')) {

                    $temp_name = rand(1, 1000000);
                    $destinationPath = public_path('uploads');
                    $files->move($destinationPath, $temp_name . "." . $files->getClientOriginalExtension());
                    $halls_image = DB::table('hall')->where('id', $hall->id);
                    $halls_image->update(array(
                        'cover_images' => $temp_name . "." . $files->getClientOriginalExtension(),
                    ));

                }

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
        if($type_check == "agent") {
            $hall_section = DB::table('hall')
                ->select('*')
                ->where('id' ,'=', $id)
                ->first();

            return view('agent.add_hall' , compact('hall_section','update'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {

            $this->validate($request, [
                'hall_name' => 'required',
                'contact' => 'required',
//                'email' => 'required|string|email|max:255|unique:users',
                'email' => 'required|string|email|max:255',
                'address' => 'required',
            ]);

            $p_id = $request->input('p_id');
            $hall_name = $request->input('hall_name');
            $contact = $request->input('contact');
            $email = $request->input('email');
            $address = $request->input('address');

            $hall = DB::table('hall')->where('id', $p_id);

            $hall->update(array(
                'hall_name' => $hall_name,
                'contact' => $contact,
                'email' => $email,
                'address' => $address,
            ));
            if ($files = $request->file('cover_images')) {

                $temp_name = rand(1, 1000000);
                $destinationPath = public_path('uploads');
                $files->move($destinationPath, $temp_name . "." . $files->getClientOriginalExtension());
                $halls_image = DB::table('hall')->where('id', $p_id);
                $halls_image->update(array(
                    'cover_images' => $temp_name . "." . $files->getClientOriginalExtension(),
                ));

            }

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/agent_hall');
        }else{
            return redirect('/login');
        }

    }
    public function hall_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            DB::table('hall')->where('id', $id)->delete();
            DB::table('hall_roll_type')->where('hall_id', $id)->delete();
            DB::table('service')->where('hall_id', $id)->delete();
            DB::table('theme')->where('hall_id', $id)->delete();
            DB::table('hall_images')->where('hall_id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return Redirect::to('agent_hall');
        }else{
            return redirect('/realestate_login');
        }
    }
    public function hall_image_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $images = "NULL";
            $hall = DB::table('hall')->where('id', $id)->update(['cover_images' => $images]);

            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/agent_hall_edit/'.$id);
        }else{
            return redirect('/realestate_login');
        }
    }

    public function add_hall_section(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall = DB::table('hall')
                ->select('*')
                ->where('user_id','=',Auth::user()->id)
                ->get();
            return view("agent.add_hall_section" , compact('hall','update'));
        }else{
            return redirect('/login');
        }

    }
    public function add_hall_section_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            if($request->input('_token')) {
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
                return redirect('/agent_add_hall_section')->withInput($request->all);
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/agent_add_hall")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function hall_details_wd_section($id){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall_details = DB::table('hall_roll_type as hr')
                ->leftJoin('hall as h','h.id','=','hr.hall_id')
                ->leftJoin('hall_images as hi','hi.sec_id','=','hr.id')
                ->select('hr.id as section_id','hr.amount','hr.detail as detail_section','hr.seating','hr.section_name','h.*','hi.images','hi.id as images_id')
                ->where('h.id', '!=' ,'0')
                ->where('h.id' ,'=', $id)
                ->groupBy('hr.id')
                ->get();

            $hall = DB::table('hall')
                ->select('*')
                ->where('id' ,'=', $id)
                ->get();
            $hall_service = DB::table('hall as h')
                ->leftJoin('service as s','h.id','=','s.hall_id')
                ->leftJoin('hall_images as hi','s.id','=','hi.id')
                ->select('hi.*','s.*','s.id as id_hall')
                ->where('h.id' ,'=', $id)
                ->get();

            $hall_theme = DB::table('hall as h')
                ->leftJoin('theme as t','h.id','=','t.hall_id')
                ->leftJoin('hall_images as hi','t.id','=','hi.id')
                ->select('hi.*','t.*')
                ->where('h.id' ,'=', $id)
                ->get();


            return view('agent.hall_details' , compact('hall_details','hall','hall_service','hall_theme'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_section_details($id){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall_section = DB::table('hall_roll_type as hr')
                ->leftJoin('hall as h','hr.hall_id','=','h.id')
                ->select('hr.*','h.*')
                ->where('hr.id' ,'=', $id)
                ->get();

            $hall_section_image = DB::table('hall_images as hi')
                ->select('hi.images')
                ->where('hi.sec_id' ,'=', $id)
                ->get();
            return view('agent.hall_section_details' , compact('hall_section','update','hall_section_image'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_section_edit_get($id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall_section = DB::table('hall_roll_type as hr')
                ->leftJoin('hall as h','hr.hall_id','=','h.id')
                ->select('hr.id as section_id','hr.hall_id','hr.section_name','hr.seating as hall_seating','hr.amount','hr.detail','h.*','h.id as halls_id')
                ->where('hr.id' ,'=', $id)
                ->first();

            $hall_section_image = DB::table('hall_images as hi')
                ->select('hi.images','hi.id')
                ->where('hi.sec_id' ,'=', $id)
                ->get();

            $hall = DB::table('hall')
                ->select('*')
                ->get();
            return view('agent.add_hall_section' , compact('hall_section','hall_section_image','update','hall'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_section_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {

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
                foreach ($files as $file) {
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
            return redirect('/agent_hall_info/'.$p_id);
        }else{
            return redirect('/login');
        }

    }
    public function hall_section_image_delete(Request $request,$id,$string){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $images = "NULL";
            $hall = DB::table('hall_images')->where('id', $id)->delete();
//            $hall->update(array(
//                'images' => $images,
//            ));
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/agent_hall_section_edit_get/'.$string);
        }else{
            return redirect('/realestate_login');
        }
    }
    public function hall_section_delete(Request $request,$id,$string){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
             DB::table('hall_roll_type')->where('id', $id)->delete();
             DB::table('hall_images')->where('sec_id', $id)->delete();

            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/agent_hall_info/'.$string);
        }else{
            return redirect('/realestate_login');
        }
    }


    public function add_hall_service(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall = DB::table('hall')
                ->select('*')
                ->where('user_id','=',Auth::user()->id)
                ->get();
            return view('agent.add_hall_service',compact('hall','update'));
        }else{
            return redirect('/login');
        }
    }
    public function add_hall_service_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
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
                    foreach ($files as $file) {
                        $temp_name = rand(1, 1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath, $temp_name . "." . $file->getClientOriginalExtension());

                        $sales = new Hall_images();
                        $sales->images = $temp_name . "." . $file->getClientOriginalExtension();
                        $sales->service_id = $hall->id;
                        $sales->save();
                    }
                }

                $request->session()->flash('alert-success', 'Successfully Create!');
                return redirect('/agent_add_hall_service')->withInput($request->all);
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/agent_add_hall_service")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function hall_service_edit_get($id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall_service = DB::table('service')
                ->select('*')
                ->where('id' ,'=', $id)
                ->first();


            $hall = DB::table('hall')
                ->select('*')
                ->where((array("user_id" => Auth::user()->id )))
                ->get();

            $hall_service_image = DB::table('hall_images as hi')
                ->select('hi.images','hi.id')
                ->where('hi.service_id' ,'=', $id)
                ->get();

            return view('agent.add_hall_service' , compact('hall_service','hall_service_image','update','hall'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_service_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
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
            return redirect('/agent_hall_info/'.$hall_id);
        }else{
            return redirect('/login');
        }

    }
    public function hall_service_image_delete(Request $request,$id,$string){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $images = "NULL";
            $hall = DB::table('hall_images')->where('id', $id)->delete();
//            $hall->update(array(
//                'images' => $images,
//            ));
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/agent_hall_section_edit_get/'.$string);
        }else{
            return redirect('/realestate_login');
        }
    }
    public function hall_service_details($id){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall_services = DB::table('service as s')
                ->select('s.*')
                ->where('s.id' ,'=', $id)
                ->get();

            $hall_service_images = DB::table('hall_images as hi')
                ->select('hi.images')
                ->where('hi.service_id' ,'=', $id)
                ->get();

            return view('agent.hall_service_details' , compact('hall_services','update','hall_service_images'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_service_delete(Request $request,$id,$string){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            DB::table('service')->where('id', $id)->delete();
            DB::table('hall_images')->where('service_id', $id)->delete();

            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/agent_hall_info/'.$string);
        }else{
            return redirect('/realestate_login');
        }
    }


    public function add_hall_theme(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall = DB::table('hall')
                ->select('*')
                ->where('user_id','=',Auth::user()->id)
                ->get();
            return view('agent.add_hall_theme',compact('hall','update'));
        }else{
            return redirect('/login');
        }
    }
    public function add_hall_theme_store(Request $request) {
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            if($request->input('_token')){
                $this->validate($request, [
                    'hall_name' => 'required',
                    'amount' => 'required',
                    'detail' => 'required',
                ]);

                $hall_name = $request->input('hall_name');
                $amount = $request->input('amount');
                $detail = $request->input('detail');


                $hall = new Theme;
                $hall->hall_id = $hall_name;
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
                        $sales->theme_id = $hall->id;
                        $sales->save();
                    }
                }

                $request->session()->flash('alert-success', 'Successfully Create!');
                return redirect('/agent_add_hall_theme')->withInput($request->all);
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/agent_add_hall_theme")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function hall_theme_edit_get($id){
        $update = true;
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall_theme = DB::table('theme')
                ->select('*')
                ->where('id' ,'=', $id)
                ->first();


            $hall = DB::table('hall')
                ->select('*')
                ->where((array("user_id" => Auth::user()->id )))
                ->get();

            $hall_theme_image = DB::table('hall_images as hi')
                ->select('hi.images','hi.id')
                ->where('hi.theme_id' ,'=', $id)
                ->get();

            return view('agent.add_hall_theme' , compact('hall_theme','hall_theme_image','update','hall'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_theme_update(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $this->validate($request, [
                'hall_name' => 'required',
                'amount' => 'required',
                'detail' => 'required',

            ]);
            $hall_id = $request->input('hall_id');
            $p_id = $request->input('p_id');
            $hall_name = $request->input('hall_name');
            $amount = $request->input('amount');
            $detail = $request->input('detail');

            $hall = DB::table('theme')->where('id', $p_id);
            $hall->update(array(
                'hall_id' => $hall_name,
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
            return redirect('/agent_hall_info/'.$hall_id);
        }else{
            return redirect('/login');
        }

    }
    public function hall_theme_image_delete(Request $request,$id,$string){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $images = "NULL";
            $hall = DB::table('hall_images')->where('id', $id)->delete();
//            $hall->update(array(
//                'images' => $images,
//            ));
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/agent_hall_theme_edit_get/'.$string);
        }else{
            return redirect('/realestate_login');
        }
    }
    public function hall_theme_details($id){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall_theme = DB::table('theme as s')
                ->select('s.*')
                ->where('s.id' ,'=', $id)
                ->get();

            $hall_theme_images = DB::table('hall_images as hi')
                ->select('hi.images')
                ->where('hi.theme_id' ,'=', $id)
                ->get();

            return view('agent.hall_theme_details' , compact('hall_theme','update','hall_theme_images'));
        }else{
            return redirect('/login');
        }
    }
    public function hall_theme_delete(Request $request,$id,$string){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            DB::table('theme')->where('id', $id)->delete();
            DB::table('hall_images')->where('theme_id', $id)->delete();

            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/agent_hall_info/'.$string);
        }else{
            return redirect('/realestate_login');
        }
    }

    public function booking(){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $booking = DB::table('booking_request as bq')
                ->leftjoin('hall_roll_type as hr','bq.hall_roll_type','hr.id')
                ->leftjoin('hall as h','bq.hall_id','h.id')
                ->select('bq.*','h.hall_name','hr.section_name')
                ->where('bq.user_id','=',Auth::user()->id)
                ->get();

            return view('agent.booking' , compact('booking'));
        }else{
            return redirect('/login');
        }
    }
    public function add_booking(){
        $update = false;
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall = DB::table('hall')
                ->select('*')
                ->where('user_id','=',Auth::user()->id)
                ->get();

            $hall_section = DB::table('hall_roll_type')
                ->select('*')
                ->where('user_id','=',Auth::user()->id)
                ->get();
            return view('agent.add_booking',compact('update','hall','hall_section'));
        }else{
            return redirect('/login');
        }
    }
    public function add_booking_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            if($request->input('_token')) {
                $this->validate($request, [
                    'id_country' => 'required',
                    'id_state' => 'required',
                    'booking_date' => 'required',
                    'message' => 'required',
                ]);

                $user_id = Auth::user()->id;
                $hall_name = $request->input('id_country');
                $section_name = $request->input('id_state');
                $booking_date = $request->input('booking_date');
                $message = $request->input('message');

                $booking_id = rand(1, 1000000);
                $booking_req = new Booking_request;
                $booking_req->booking_id = $booking_id;
                $booking_req->user_id = $user_id;
                $booking_req->hall_id = $hall_name;
                $booking_req->hall_roll_type = $section_name;
                $booking_req->booking_date = $booking_date;
                $booking_req->message = $message;
                $booking_req->save();

                $request->session()->flash('alert-success', 'Successfully Create!');
                return redirect('/add_booking')->withInput($request->all);
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/add_booking")->withInput();
            }
        }else{
            return redirect('/login');
        }
    }
    public function booking_edit(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {
            $hall = DB::table('hall')
                ->select('*')
                ->where('user_id','=',Auth::user()->id)
                ->get();
            $booking = DB::table('booking_request as bq')
                ->leftjoin('hall_roll_type as hr','bq.hall_roll_type','hr.id')
                ->leftjoin('hall as h','bq.hall_id','h.id')
                ->select('bq.*','h.hall_name','hr.section_name')
                ->where('bq.id' ,'=', $id)
                ->get();

            return view('agent.booking_edit', compact('booking','hall'));
        }else{
            return redirect('/login');
        }

    }
    public function booking_update(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "agent") {

            $this->validate($request, [
                'id_country' => 'required',
                'id_state' => 'required',
                'booking_date' => 'required',
                'message' => 'required',
            ]);

            $hall_name = $request->input('id_country');
            $section_name = $request->input('id_state');
            $booking_date = $request->input('booking_date');
            $message = $request->input('message');

            $hall = DB::table('booking_request')->where('id', $id);

            $hall->update(array(
                'hall_id' => $hall_name,
                'hall_roll_type' => $section_name,
                'booking_date' => $booking_date,
                'message' => $message,
            ));

            $request->session()->flash('alert-success', 'Successfully Update!');
            return redirect('/booking');
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
        if($type_check == "agent") {
            DB::table('booking_request')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return Redirect::to('booking');
        }else{
            return redirect('/realestate_login');
        }
    }
}