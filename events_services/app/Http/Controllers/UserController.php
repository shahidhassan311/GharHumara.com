<?php namespace App\Http\Controllers;

use App\User;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Booking;
use App\Hall_rating;
use App\Vendor_service_booking;
use App\Booking_services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use JWTAuth;
use Response;
use App\Repository\Transformers\UserTransformer;
use \Illuminate\Http\Response as Res;
use Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class UserController extends ApiController
{
    /**
     * @var \App\Repository\Transformers\UserTransformer
     * */
    protected $userTransformer;

    public function __construct(userTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
    }

    function convertImg($img, $path)
    {
        // $img = $_POST['img'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imgName = rand(1, 1000000) . '.png';
        $file = $path . '/' . $imgName;
        $success = file_put_contents($file, $data);
        return $success ? $imgName : false;
    }

    public function authenticate(Request $request)
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        } else {
            $user = User::where('email', $request['email'])->first();
            if ($user) {
                $api_token = $user->api_token;
                if ($api_token == NULL) {
                    return $this->_login($request['email'], $request['password']);
                }
                try {
                    $user = JWTAuth::toUser($api_token);
                    return $this->respond([
                        'status' => 'success',
                        'status_code' => $this->getStatusCode(),
                        'message' => 'Already logged in',
                        'user' => $this->userTransformer->transform($user)
                    ]);
                } catch (JWTException $e) {
                    $user->api_token = NULL;
                    $user->save();
                    return $this->respondInternalError("Login Unsuccessful. An error occurred while performing an action!");
                }
            } else {
                return $this->respondWithError("Invalid Email or Password");
            }
        }
    }

    private function _login($email, $password)
    {
        $credentials = ['email' => $email, 'password' => $password];

        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->respondWithError("User does not exist!");
        }
        $user = JWTAuth::toUser($token);
        $user->api_token = $token;
        Session::put('api_token', $token);
        $user->save();
        return $this->respond([
            'status' => 'success',
            'status_code' => $this->getStatusCode(),
            'message' => 'Login successful!',
            'data' => $this->userTransformer->transform($user),
        ]);
    }

    public function register(Request $request)
    {
        $rules = array(
            'name' => 'required|max:255',
            'contact' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:3',
            'role' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        } else {
            $flle_client = "";
            $convertImg = $_REQUEST['images'];
            $destinationPath = public_path('uploads');

            if (!empty($convertImg)) {
                $flle_client = $this->convertImg($convertImg, $destinationPath);
            }

            $user = User::create([
                'name' => $request['name'],
                'contact' => $request['contact'],
                'email' => $request['email'],
                'password' => \Hash::make($request['password']),
                'role' => $request['role'],
                'image' => $flle_client
            ]);

            return $this->_login($request['email'], $request['password']);
        }
    }

    public function logout($api_token)
    {
        try {
            $user = JWTAuth::toUser($api_token);
            $user->api_token = NULL;
            $user->save();
            JWTAuth::setToken($api_token)->invalidate();
            $this->setStatusCode(Res::HTTP_OK);
            Session::flush();
            return $this->respond([
                'status' => 'success',
                'status_code' => $this->getStatusCode(),
                'message' => 'Logout successful!',
            ]);

        } catch (JWTException $e) {
            return $this->respondInternalError("An error occurred while performing an action!");
        }
    }

    public function user_profile(Request $request, $id)
    {
        $token = $request->input('token');
        if (isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token', $token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users')
                    ->select('*')
                    ->where('id', '=', $id)
                    ->get();


                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users

                ]);
            }
        } else {
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    public function user_profile_update(Request $request, $id)
    {
        $token = $request->input('token');
        if (isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token', $token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $name = $request->input('name');
                $contact = $request->input('contact');
                $email = $request->input('email');

                $user = DB::table('users')->where('id', $id);
                $user->update(array(
                    'name' => $name,
                    'contact' => $contact,
                    'email' => $email
                ));

                if ($convertImg = $request->input('image')) {

                    $destinationPath = public_path('uploads');

                    $img = $this->convertImg($convertImg, $destinationPath);

                    $user_img = DB::table('users')->where('id', $id);
                    $user_img->update(array(
                        'image' => $img
                    ));
                }

                return $this->respond([
                    'success' => 'Data Update successfully',
                ]);

            }
        } else {
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    public function hall_listing_guest(Request $request)
    {
        $users = DB::table('hall_approved as p')
            ->leftJoin('hall_images as i', 'i.hall_id', '=', 'p.id')
            ->leftJoin('hall_rating as hr', 'p.id', '=', 'hr.hall_id')
            ->select('i.images', 'p.*', (DB::raw('(select SUM(`rating`) / COUNT(`hall_id`) from hall_rating where hall_id = `p`.`id` ) as rating')))
            ->where('p.status', "approved")
            ->groupBy('i.hall_id')
            ->orderBy('p.id', 'desc')
            ->get();

        return $this->respond([
            'success' => 'Data successfully',
            'data' => $users
        ]);


    }


    public function hall_listing_section_guest($id)
    {
        $users = DB::table('hall_roll_type as hr')
            ->leftJoin('hall as h', 'h.id', '=', 'hr.hall_id')
            ->leftJoin('hall_images as hi', 'hi.sec_id', '=', 'hr.id')
            ->select('hr.id as section_id', 'hr.amount', 'hr.detail as detail_section', 'hr.seating', 'hr.section_name', 'h.*', 'hi.images', 'hi.id as images_id')
            ->where('h.id', '!=', '0')
            ->where('h.id', '=', $id)
            ->groupBy('hr.id')
            ->get();
        return $this->respond([
            'success' => 'Data successfully',
            'data' => $users,
        ]);

    }

    public function hall_listing_section_details_guest($id)
    {

        $hall_detail = DB::table('hall_roll_type as hr')
            ->leftJoin('hall as h', 'hr.hall_id', '=', 'h.id')
            ->select('hr.*', 'h.*')
            ->where('hr.id', '=', $id)
            ->get();

        $hall_detail_image = DB::table('hall_images as hi')
            ->select('hi.images')
            ->where('hi.sec_id', '=', $id)
            ->get();

        return $this->respond([
            'success' => 'Data successfully',
            'data' => $hall_detail, $hall_detail_image
        ]);

    }

    public function hall_theme_guest($id)
    {
        $hall_theme = DB::table('theme as t')
            ->join('hall_images as hi', 't.id', 'hi.theme_id')
            ->select('t.*', 'hi.images')
            ->where('t.hall_id', '=', $id)
            ->groupBy('hi.theme_id')
            ->get();


        return $this->respond([
            'success' => 'Data successfully',
            'data' => $hall_theme
        ]);

    }

    public function hall_theme_detail_guest($id)
    {

        $theme_id = '';
        $hall_theme = DB::table('theme')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        foreach ($hall_theme as $hall_themes) {
            $theme_id = $hall_themes->id;
        }
        $hall_theme_img = DB::table('hall_images')
            ->select('images')
            ->where('theme_id', '=', $theme_id)
            ->get();

        return $this->respond([
            'success' => 'Data successfully',
            'data' => $hall_theme, $hall_theme_img
        ]);

    }

    public function hall_services_guest($id)
    {
        $hall_service = DB::table('service as s')
            ->join('hall_images as hi', 's.id', 'hi.service_id')
            ->select('s.service_name', 'hi.images', 's.id')
            ->where('s.hall_id', '=', $id)
            ->groupBy('hi.id')
            ->get();


        return $this->respond([
            'success' => 'Data successfully',
            'data' => $hall_service
        ]);

    }

    public function hall_services_detail_guest($id)
    {

        $service_id = '';
        $hall_service = DB::table('service')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        foreach ($hall_service as $hall_services) {
            $service_id = $hall_services->id;
        }
        $hall_service_img = DB::table('hall_images')
            ->select('images')
            ->where('service_id', '=', $service_id)
            ->get();

        return $this->respond([
            'success' => 'Data successfully',
            'data' => $hall_service, $hall_service_img
        ]);

    }

    public function hall_booking_guest(Request $request, $id)
    {
        $token = $request->input('token');
        if (isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token', $token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $this->validate($request, [
                    'booking_date' => 'required',
                    'message' => 'required',
                    'status' => 'required',
                    'hall_roll_type' => 'required',
                    'theme_id' => 'required',

                ]);

                $booking_id = rand(1, 1000000);
                $user = Booking::create([
                    'booking_id' => $booking_id,
                    'booking_date' => $request['booking_date'],
                    'user_id' => $id,
                    'message' => $request['message'],
                    'status' => $request['status'],
                    'hall_id' => $request['hall_id'],
                    'hall_roll_type' => $request['hall_roll_type'],
                    'theme_id' => $request['theme_id']
                ]);


                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $user->id
                ]);
            }
        } else {
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    public function hall_booking_serivce_guest(Request $request)
    {
        $token = $request->input('token');
        if (isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token', $token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {

                $this->validate($request, [
                    'booking_id' => 'required',
                ]);
                $booking_id = $request->input('booking_id');
                $service_id = $request->input('service_id');


//                $user = Booking_services::create([
//                    'booking_id' => $request['booking_id'],
//                    'service_id' => $request['service_id'],
//                ]);
                $hall = new Booking_services;
                $hall->booking_id = $booking_id;
                $hall->service_id = $service_id;
                $hall->save();


                return $this->respond([
                    'success' => 'Data successfully',
//                    'data' => $user
                ]);
            }
        } else {
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

//    public function search_filter(Request $request){
//        $input = Input::get('booking_date');
//        $fnf_booking = [];
//        $filter_date = Carbon::parse($input)->format('d-m-Y');
//        $filter = DB::select(DB::raw('SELECT * FROM `booking` WHERE booking_date != "'.$input.'"'));
//
//
//        foreach ($filter as $filters){
//            $booking_date = $filters->booking_date;
//            $booking_date_parse = Carbon::parse($booking_date)->format('d-m-Y');
//
//            if ($filter_date !== $booking_date_parse){
//                $hall = DB::table('hall_approved as p')
//                    ->leftJoin('hall_images as i','i.hall_id','=','p.id')
//                    ->select('i.images','p.*')
//                    ->where('p.id',$filters->hall_id)
//                    ->groupBy('i.hall_id')
//                    ->orderBy('p.id', 'desc')
//                    ->first();
//
//                array_push($fnf_booking,$hall);
//            }
//        }
//
//
//        return $this->respond([
//            'success' => 'Data successfully',
//            'data' => $filter
//        ]);
//    }

    public function search_filter_section()
    {
        $booking_date = Input::get('booking_date');
        $hall_id = Input::get('hall_id');

        $filter_date = Carbon::parse($booking_date)->format('Y-m-d');
        $avaliable_section = [];
        $filter_sections = DB::table('booking')
            ->select('*')
            ->where('booking_date', 'like', '%' . $filter_date . '%')
            ->get();


        $sections = DB::table('hall_roll_type')
            ->select('*')
            ->where('hall_id', $hall_id)
            ->get();
        foreach ($sections as $data) {
            $result = DB::select(DB::raw('SELECT * FROM booking WHERE booking_date like "%' . $filter_date . '%" && hall_role_type_id =' . $data->id));
            if (empty($result)) {
                $image = DB::table('hall_images')->where('sec_id', $data->id)->first();
                if (!empty($image)) {
                    $data->image = $image->images;
                }
                array_push($avaliable_section, $data);
            }
        }
        return $this->respond([
            'success' => 'Data successfully',
            'data' => $avaliable_section
        ]);
    }

    public function rating_halls(Request $request)
    {
        $token = $request->input('token');
        if (isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token', $token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {

                $this->validate($request, [
                    'user_id' => 'required',
                    'hall_id' => 'required',
                    'rating' => 'required',
                ]);
                $user_id = $request->input('user_id');
                $hall_id = $request->input('hall_id');
                $rating = $request->input('rating');


                $hall = new Hall_rating;
                $hall->user_id = $user_id;
                $hall->hall_id = $hall_id;
                $hall->rating = $rating;
                $hall->save();


                return $this->respond([
                    'success' => 'Data successfully',
                ]);
            }
        } else {
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    public function rating_detail(Request $request, $id)
    {

        $hall = DB::table('hall_rating')
            ->select(DB::raw('SUM(rating) / (COUNT(' . $id . ')) as avg_rating'))
            ->where('hall_id', '=', $id)
            ->get();

        return $this->respond([
            'hall' => $hall,
        ]);

    }

    public function vendor_service_type(Request $request)
    {

        $vendor_service = DB::table('vendor_service_type')
            ->select('*')
            ->get();

        return $this->respond([
            'data' => $vendor_service
        ]);
    }

    public function vendor_service(Request $request, $id)
    {

        $vendor_service = DB::table('vendor_service as vs')
            ->leftjoin('vendor_service_image as vsi', 'vs.id', 'vsi.vendor_service_id')
            ->select('vsi.image', 'vs.*')
            ->where('vs.type', '=', $id)
            ->groupBy('vs.id')
            ->get();

        return $this->respond([
            'data' => $vendor_service
        ]);
    }

    public function vendor_service_detail(Request $request, $id)
    {

        $vendor_service = DB::table('vendor_service as vs')
            ->leftjoin('vendor_service_image as vsi', 'vs.id', 'vsi.vendor_service_id')
            ->select('vsi.image', 'vs.*')
            ->where('vs.id', '=', $id)
            ->get();

        return $this->respond([
            'data' => $vendor_service
        ]);
    }

    public function vendor_service_booking(Request $request)
    {
        $token = $request->input('token');
        if (isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token', $token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {

                $this->validate($request, [
                    'service_type' => 'required',
                    'service_id' => 'required',
                    'date' => 'required',
                    'details' => 'required',
                ]);
                $service_type = $request->input('service_type');
                $service_id = $request->input('service_id');
                $date = $request->input('date');
                $details = $request->input('details');

                $hall = new Vendor_service_booking;
                $hall->service_type = $service_type;
                $hall->service_id = $service_id;
                $hall->date = $date;
                $hall->details = $details;
                $hall->save();


                return $this->respond([
                    'success' => 'Data successfully',
//                    'data' => $user
                ]);
            }
        } else {
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    public function user_booking_history(Request $request,$id)
    {
        $token = $request->input('token');
        if (isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token', $token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {

                $booking_approved = DB::table('booking as bq')
                    ->leftjoin('hall_roll_type as hr', 'bq.hall_role_type_id', 'hr.id')
                    ->leftjoin('hall as h', 'hr.hall_id', 'h.id')
                    ->leftjoin('users as u', 'bq.user_id','u.id')
                    ->leftjoin('hall_images as hi','hr.id','hi.sec_id')
                    ->select('bq.id','hi.images','bq.user_id','bq.booking_id', 'bq.booking_date', 'bq.message', 'bq.status', 'hr.section_name','bq.status', 'h.hall_name')
                    ->where('u.id','=',$id)
                    ->groupBy('hi.sec_id')
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $booking_approved
                ]);
            }
        } else {
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    public function check_rating(Request $request , $id){
        if ($token = $request->input('token')){
            if (isset($token)) {
                $user = JWTAuth::toUser($token);
                $userDetails = User::where('api_token', $token)->first();
                if (empty($user)) {
                    return $this->respondWithError(['User is not logged in!']);
                } else {
                    $userDetails->id;
                    $halls = DB::table('hall_rating')->select('*')->where(array("hall_id" => $id , "user_id" => $userDetails->id))->get();
                    
                    return $this->respond([
                        'success' => 'Data successfully',
                        'data' => $halls
                    ]);

                }
            } else {
                return $this->respondWithError(['Parameter token is missing!']);
            }

        }
    }


}