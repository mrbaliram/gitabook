<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event_info;
use App\Http\Requests\StoreEvent_infoRequest;
use App\Http\Requests\UpdateEvent_infoRequest;
use Illuminate\Support\Facades\DB; 
class EventInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $results = DB::table('event_infos')
            ->select('event_infos.*')
            ->orderBy('created_at', 'DESC')
        ->paginate(10);

        return view('event_info.index', compact('results'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $results = null;
        return view('event_info.create', ['results' => $results]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEvent_infoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'event_name' => 'required|string|max:255',
            'start_date' => 'required|string|max:255',
            'end_date' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            
        ]);
 
        $sql = new Event_info();
        $sql->event_name = $validatedData['event_name'];
        $sql->start_date = $validatedData['start_date'];
        $sql->city = $validatedData['city'];
        $sql->state = $validatedData['state'];
        $sql->end_date = $validatedData['end_date'];
        $sql->address1 = $validatedData['address1'];
       
        // optional fields
        $sql->leader_name = $request['leader_name'];
        $sql->leader_alternate_no = $request['leader_alternate_no'];
        $sql->leader_contact_no = $request['leader_contact_no'];
        $sql->place_contact_person = $request['place_contact_person'];
        $sql->leader_alternate_no = $request['leader_alternate_no'];
        $sql->place_contact_no = $request['place_contact_no'];
        $sql->place_alternate_no = $request['place_alternate_no'];
        $sql->remarks = $request['remarks'];
        $sql->address2 = $request['address2'];
        $sql->pin_code = $request['pin_code'];

        $sql->save();
        return redirect()->route('events.index')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event_info  $event_info
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       $results = DB::table('event_infos')
            ->select('event_infos.*')
            ->where('event_infos.id', $id)
            ->get()->first();
        return view('event_info.show', ['results' => $results]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event_info  $event_info
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $results = Event_info::find($id);
        return view('event_info.edit', ['results' => $results]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvent_infoRequest  $request
     * @param  \App\Models\Event_info  $event_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'event_name' => 'required|string|max:255',
            'start_date' => 'required|string|max:255',
            'end_date' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            
        ]);
 
        $sql = Event_info::findOrFail($id);
        $sql->event_name = $validatedData['event_name'];
        $sql->start_date = $validatedData['start_date'];
        $sql->city = $validatedData['city'];
        $sql->state = $validatedData['state'];
        $sql->end_date = $validatedData['end_date'];
        $sql->address1 = $validatedData['address1'];
        // optional fields
        $sql->leader_name = $request['leader_name'];
        $sql->leader_alternate_no = $request['leader_alternate_no'];
        $sql->leader_contact_no = $request['leader_contact_no'];
        $sql->place_contact_person = $request['place_contact_person'];
        $sql->leader_alternate_no = $request['leader_alternate_no'];
        $sql->place_contact_no = $request['place_contact_no'];
        $sql->place_alternate_no = $request['place_alternate_no'];
        $sql->remarks = $request['remarks'];
        $sql->address2 = $request['address2'];
        $sql->pin_code = $request['pin_code'];


        $sql->save();
        return redirect()->route('events.index')->with('success', 'Record updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event_info  $event_info
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sql = Event_info::findOrFail($id);
        $sql->delete();
        return redirect()->route('events.index')->with('success', 'Record deleted successfully');
    }
}
