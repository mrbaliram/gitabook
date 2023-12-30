<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact_info;
use App\Models\User;
use App\Models\Event_info;

use App\Http\Requests\StoreContact_infoRequest;
use App\Http\Requests\UpdateContact_infoRequest;
use Illuminate\Support\Facades\DB; 
class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $results = DB::table('contact_infos')
            ->select('contact_infos.*','event_infos.event_name','event_infos.start_date as event_sDate')
            ->join('event_infos','event_infos.id','=','contact_infos.event_id')
            ->orderBy('created_at', 'DESC')
        ->paginate(10);

        return view('contact_info.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userResult = User::all();
        $eventsResult = Event_info::all();
        return view('contact_info.create', ['eventsResult' => $eventsResult,'userResult' => $userResult]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContact_infoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'volunteer_id' => 'required|string|max:255',
            'event_id' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
        ]);
 
        $sql = new Contact_info();

        $sql->first_name = $validatedData['first_name'];
        $sql->last_name = $validatedData['last_name'];
        $sql->volunteer_id = $validatedData['volunteer_id'];
        $sql->event_id = $validatedData['event_id'];
        $sql->city = $validatedData['city'];
        $sql->state = $validatedData['state']; 
        $sql->address1 = $validatedData['address1'];        
        
        // optional
        $sql->address2 = $request['address2'];
        $sql->pin_code = $request['pin_code'];
        $sql->contact_no = $request['contact_no'];
        $sql->alternate_no = $request['alternate_no'];
        $sql->remarks = $request['remarks'];

        $sql->save();
        return redirect()->route('Contact_info.index')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact_info  $contact_info
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       $results = DB::table('contact_infos')
            ->select('contact_infos.*')
            ->where('contact_infos.id', $id)
            ->get()->first();
        return view('contact_info.show', ['results' => $results]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact_info  $contact_info
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userResult = User::all();
        $eventsResult = Event_info::all();

        $results = Contact_info::find($id);
        return view('contact_info.edit', ['results' => $results, 'eventsResult' => $eventsResult,'userResult' => $userResult]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContact_infoRequest  $request
     * @param  \App\Models\Contact_info  $contact_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'volunteer_id' => 'required|string|max:255',
            'event_id' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            
        ]);
 
        $sql = Contact_info::findOrFail($id);
        $sql->first_name = $validatedData['first_name'];
        $sql->last_name = $validatedData['last_name'];
        $sql->volunteer_id = $validatedData['volunteer_id'];
        $sql->event_id = $validatedData['event_id'];
        $sql->city = $validatedData['city'];
        $sql->state = $validatedData['state'];
        $sql->address1 = $validatedData['address1'];

        // optional
        $sql->address2 = $request['address2'];
        $sql->pin_code = $request['pin_code'];
        $sql->contact_no = $request['contact_no'];
        $sql->alternate_no = $request['alternate_no'];
        $sql->remarks = $request['remarks'];
       
        $sql->save();

        return redirect()->route('Contact_info.index')->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact_info  $contact_info
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $sql = Contact_info::findOrFail($id);
        $sql->delete();
        return redirect()->route('Contact_info.index')->with('success', 'Record deleted successfully');
    }
}