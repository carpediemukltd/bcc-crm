<?php
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Hash;
 use App\Models\User;
 use App\Models\CustomFields;

 class UserController extends Controller
 {
    protected $user;
    public function __construct(){
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->data['user'] = $this->user;
            return $next($request);
        });
    }

    public function editProfile(Request $request){
        $this->data['current_slug'] = 'My Profile';
        if ($request->isMethod('post')) {
            $update_data = [
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'phone_number' => $request->phone_number
             ];
             
            if($request->password && !$request->confirm_password) {
                return redirect()->back()->withError('Confirm password is required.')->withInput();
            }else if ($request->password && ($request->password != $request->confirm_password)) {
                return redirect()->back()->withError('Password and Confirm password are not same.')->withInput();
            }else if ($request->password && strlen($request->password) < 6) {
                return redirect()->back()->withError('Password must be 6 digits.')->withInput();
            }else if ($request->password && strlen($request->password) >= 6 && ($request->password == $request->confirm_password)) {
                $update_data['password'] = Hash::make($request->password);
            }
            User::whereId($this->user->id)->update($update_data);
            return redirect(url('profile'))->withSuccess('Profile Update Successfully.')->withInput();
        }else if ($request->isMethod('get')) {
            return view("profile", $this->data);
        }
    } // editProfile

    public function addUser(Request $request){
        $this->data['current_slug'] = 'Add Contact';
        $this->data['slug']         = 'add_user';
        if ($request->isMethod('post')) {
            $request->validate([
                'first_name'   => 'required',
                'last_name'    => 'required',
                'phone_number' => 'required',
                'email'        => 'required|email|unique:users',
                'password'     => 'required|min:6'
            ]);
            $data = $request->all();
            if($data){
                User::create([
                    'first_name'    => $data['first_name'],
                    'last_name'     => $data['last_name'],
                    'email'         => $data['email'],
                    'phone_number'  => $data['phone_number'],
                    'password'      => Hash::make($data['password'])
                ]);
                return redirect(url('contacts'))->withSuccess('Contact Created Successfully.')->withInput();
            }
        }else if ($request->isMethod('get')) {
            return view("user.add", $this->data);
        }
    } // addUser

    public function userList(Request $request){
        $this->data['current_slug'] = 'Contacts';
        $this->data['slug']         = 'user_list';

        $this->data['users'] = User::where('role', 'user')->orderBy('id', 'DESC')->paginate(10);
        if($request->ajax()){
            $this->data['users'] = User::where('role', 'user')
                                       ->when($request->seach_term, function($q)use($request){
                                          $q->where('first_name', 'like', '%'.$request->seach_term.'%')
                                          ->orWhere('last_name', 'like', '%'.$request->seach_term.'%')
                                          ->orWhere('email', 'like', '%'.$request->seach_term.'%')
                                          ->orWhere('phone_number', 'like', '%'.$request->seach_term.'%');
                                    })
                                    ->when($request->status, function($q)use($request){
                                          $q->where('status',$request->status);
                                    })
                                    ->when($request->start_date, function($q)use($request){
                                          $q->whereBetween('created_at', [$request->start_date, $request->end_date]);
                                    })
                                    ->orderBy('id', 'DESC')->paginate(10);

         return view('user.user_pagination', $this->data)->render();
        }
        return view("user.list", $this->data);
    } // addUser

    public function editUser(Request $request, $id){
        $this->data['current_slug'] = 'Edit Contact';
        $this->data['slug']         = 'edit_user';
        $this->data['all_status']   = ['inactive', 'active', 'deleted', 'banned'];
        if ($request->isMethod('put')) {
            $update_data = [
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'phone_number' => $request->phone_number,
                'status'       => $request->status
            ];

            if ($request->password && strlen($request->password) < 6) {
                return redirect()->back()->withError('Password must be 6 digits.')->withInput();
            }else if ($request->password && strlen($request->password) >= 6) {
                $update_data['password'] = Hash::make($request->password);
            }
            User::whereId($id)->update($update_data);
            return redirect(url('contacts'))->withSuccess('Contact Update Successfully.')->withInput();
        }else if ($request->isMethod('get')) {
            $this->data['user'] = User::where('id', $id)->first();
            return view("user.edit", $this->data);
        }
    } // editUser

    public function addField(Request $request){
        $this->data['current_slug'] = 'Add Custom Field';
        $this->data['slug']         = 'add_field';
        if ($request->isMethod('post')) {
            $request->validate([
                'title'  => 'required|unique:custom_fields',
                'type'   => 'required'
            ]);
            $data = $request->all();
            if($data){
                CustomFields::create([
                    'title' => $data['title'],
                    'type'  => $data['type']
                ]);
                return redirect(url('customfield'))->withSuccess('Custom Field Created Successfully.')->withInput();
            }
        }else if ($request->isMethod('get')) {
            return view("customfield.add", $this->data);
        }
    } // addField

    public function editField(Request $request, $id){
        $this->data['current_slug'] = 'Edit Custom Field';
        $this->data['slug']         = 'edit_field';
        $this->data['fields_type']  = ['contact', 'deals'];

        if ($request->isMethod('put')) {
            $update_data = [
                'title'   => $request->title,
                'type'    => $request->type
            ];
            CustomFields::whereId($id)->update($update_data);
            return redirect(url('customfield'))->withSuccess('Custom Field Update Successfully.')->withInput();
        }else if ($request->isMethod('get')) {
            $this->data['rs_field'] = CustomFields::where('id', $id)->first();
            return view("customfield.edit", $this->data);
        }
    } // editField

    public function fieldList(Request $request){
        $this->data['current_slug'] = 'Custom Field';
        $this->data['slug']         = 'field_list';
        $this->data['rs_field']     = CustomFields::orderBy('id', 'DESC')->paginate(10);
        return view("customfield.list", $this->data);
    } // fieldList

 }