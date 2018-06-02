<?php

namespace App\Http\Controllers;

use App\Country;
use App\ElectrolDetail;
use App\HospitalDetail;
use App\Institution;
use App\LicenceDetail;
use App\Member;
use App\PassportDetail;
use App\PoliceDetail;
use App\SsnitDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\GlobalState\Snapshot;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inst = auth()->user()->institution;
        $template = strtolower(snake_case($inst->name,'_'));
        switch ($template){
            case 'birth_and_death':
                $members = Member::orderby('id','desc')->get();
                break;
            case 'passport_office':
                $members = PassportDetail::orderby('id','desc')->get();
                break;
            case 'd_v_l_a':
                $members = LicenceDetail::orderby('id','desc')->get();
                break;
            case 'hospital':
                $members = HospitalDetail::orderby('id','desc')->get();
                break;
            case 'e_c':
                $members = ElectrolDetail::orderby('id','desc')->get();
                break;
            case 's_s_n_i_t':
                $members = SsnitDetail::orderby('id','desc')->get();
                break;
            case 'police':
                $members = PoliceDetail::orderby('id','desc')->get();
                break;

        }

        return view("members.list",compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $countries = Country::where('demonym','!=','')->get();
//        dd($countries);
        $inst = auth()->user()->institution;
        $template = strtolower(snake_case($inst->name,'_'));

        if($template =='birth_and_death' && $request->type){#check if is death
            $template = 'death';
        }
        return view("members.{$template}_add",compact('inst','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $inputs = $request->input();
//        unset('member_id',$inputs);
        $inst = auth()->user()->institution;
        $inputs['biodata']= "asdajkshdfkjahseljalskjdlfajklsdlfkalskdfasei";
        switch (strtolower(snake_case($inst->name,'_'))){
            case 'birth_and_death':
                unset($inputs['member_id']);
                $inputs['ref_id']= uniqid('bad-');
                $rules = [
                    'first_name'=> 'required|no_numeric|max:32',
                    'last_name'=> 'required|no_numeric|max:32',
                    'phone'=> 'phone',
                    'gender'=>'required|string',
                    'email' => 'email'
                ];
                $this->validate($request,$rules);
                $details = Member::create($inputs);
                break;
            case 'passport_office':
                $rules = [
                    'member_id'=>'required',
                    'first_name'=> 'required|no_numeric|max:32',
                    'last_name'=> 'required|no_numeric|max:32',
                    'phone'=> 'required|phone',
                    'gender'=>'required|string',
                    'profession'=>'required|no_numeric',
                    'place_of_birth'=>'required|no_numeric',
                    'email' => 'email',
                    'height' => 'required|numeric',
                    'residential_address' => 'required',
                    'nationality' => 'required',
                    'garantee_name1' => 'required|no_numeric',
                    'garantee_contact1' => 'required|phone',
                    'garantee_name2' => 'required|no_numeric',
                    'garantee_contact2' => 'required|phone',
                ];
                $inputs['ref_id']= uniqid('ps-');
                $this->validate($request,$rules);
                $details = PassportDetail::create($inputs);
                break;
            case 'd_v_l_a':
                $rules = [
                    'member_id'=>'required',
                    'first_name'=> 'required|no_numeric|max:32',
                    'last_name'=> 'required|no_numeric|max:32',
                    'phone'=> 'required|phone',
                    'email' => 'email',
                    'class' => 'required|max:1|string',
                    'residential_address' => 'required',
                    'nationality' => 'required',
                    'id_type' => 'required',
                    'id_number' => 'required',
                ];
                $inputs['ref_id']= uniqid('dv-');
                $this->validate($request,$rules);
                $details = LicenceDetail::create($inputs);
                break;
            case 'hospital':
                $rules = [
                    'member_id'=>'required',
                    'first_name'=> 'required|no_numeric|max:32',
                    'last_name'=> 'required|no_numeric|max:32',
                    'phone'=> 'required|phone',
                    'residential_address' => 'required',
                    'nationality' => 'required',
                    'report' => 'required',
                    'weight' => 'required|numeric',
                ];
                $inputs['ref_id']= uniqid('hs-');
                $this->validate($request,$rules);
                $details = HospitalDetail::create($inputs);
                break;
            case 'police':
                $rules = [
                    'member_id'=>'required',
                    'first_name'=> 'required|no_numeric|max:32',
                    'last_name'=> 'required|no_numeric|max:32',
                    'phone'=> 'required|phone',
                    'residential_address' => 'required',
                    'case_report' => 'required',
                    'case_type' => 'required',
                    'officer_in_charge' => 'required',
                ];
                $inputs['ref_id']= uniqid('hs-');
                $this->validate($request,$rules);
                $details = PoliceDetail::create($inputs);
                break;
            case 'e_c':

                $rules = [
                    'member_id'=>'required',
                    'first_name'=> 'required|no_numeric|max:32',
                    'last_name'=> 'required|no_numeric|max:32',
                    'phone'=> 'required|phone',
                    'email' => 'email',
                    'residential_address' => 'required',
                    'nationality' => 'required',
                    'card_number' => 'required',
                ];
                $inputs['ref_id']= uniqid('ec-');
                $this->validate($request,$rules);
                $details = ElectrolDetail::create($inputs);
                break;
            case 's_s_n_i_t':

                $rules = [
                    'member_id'=>'required',
                    'first_name'=> 'required|no_numeric|max:32',
                    'last_name'=> 'required|no_numeric|max:32',
                    'phone'=> 'required|phone',
                    'email' => 'email',
                    'residential_address' => 'required',
                    'nationality' => 'required',
                    'gender' => 'required',
                    'salary' => 'required',
                    'id_type' => 'required',
                    'id_number' => 'required',
                ];
                $inputs['ref_id']= uniqid('ec-');
                $this->validate($request,$rules);
                $details = SsnitDetail::create($inputs);
                break;

        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($details->ref_id).'.'.strtolower($image->getClientOriginalExtension());
            $destinationPath = public_path('');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $details->image = $name;
            #update member image column with image path
            $details->save();
            Member::where('ref_id',$details->member_id)->update(['image'=>$name]);
        }
        if ($request->hasFile('death_evidence')) {
            $image = $request->file('death_evidence');
            $name = "evd_".str_slug($details->ref_id).'.'.strtolower($image->getClientOriginalExtension());
            $destinationPath = public_path('');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $details->death_evidence = $name;
            #update member image column with image path
            $details->save();
        }
//        dd($details);
        Session::flash('flash_message',['type'=>'alert-info','message'=>'Saved Successfully']);
        return redirect(route('members.list'));
//        return redirect(route('members.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    public function details(Request $request){
        $id     = $request->id;
//        $id = 'bad-5b0d4dd4c3ec5';

        $bad    = Member::where('ref_id',$id)
                ->orWhere('first_name','like',"{$id}")
                ->orWhere('last_name','like',"{$id}")
                ->first() ;
//        dd($bad ? 'hello':'asd');
        $id = $bad ? $bad->ref_id: '';
        $pass   = PassportDetail::where('member_id',$id)->first();
        $dvla   = LicenceDetail::where('member_id',$id)->first();
        $hosp   = HospitalDetail::where('member_id',$id)->first();
        $ec     = ElectrolDetail::where('member_id',$id)->first();
        $ssnit  = SsnitDetail::where('member_id',$id)->first();
        $pc  = PoliceDetail::where('member_id',$id)->first();
        return view('details',compact('bad','pass','dvla','hosp','members','ec','ssnit','pc'));
    }

    public function saveFinger(Request $request){
       return ($request->input());
    }

    public function markDeceased(Request $request){
//        dd('as');
        $id = $request->ref_id;
        $evidence = '';
        if ($request->hasFile('death_evidence')) {
            $image = $request->file('death_evidence');
            $name = "evd_".str_slug($id).'.'.strtolower($image->getClientOriginalExtension());
            $destinationPath = public_path('');
            $image->move($destinationPath, $name);
            $evidence = $name;
        }

         Member::where('ref_id',$id)->update([
            'status'=>'deceased',
            'date_of_death' => $request->date_of_death,
            'time_of_death' => $request->time_of_death,
            'death_location' => $request->death_location,
            'name_of_registerer' => $request->name_of_registerer,
            'cause_of_death' => $request->cause_of_death,
            'death_evidence' => $evidence,
        ]);

        Session::flash('flash_message',['type'=>'alert-info','message'=>' Successfully marked as deceased']);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Fetches  a user's  detail from the Birth and death registry
     * @param Request $request
     * @return string
     */
    public function verify(Request $request){
        $str = trim($request->bad_id);
        $members = Member::where('ref_id',$str)
            ->orWhere('first_name','like',"{$str}")
            ->orWhere('last_name','like',"{$str}")
            ->first();
//        dd($str,$members);
        return json_encode($members ? $members : []);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
