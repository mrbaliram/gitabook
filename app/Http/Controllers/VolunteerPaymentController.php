<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Volunteer_payment;
use App\Http\Requests\StoreVolunteer_paymentRequest;
use App\Http\Requests\UpdateVolunteer_paymentRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class VolunteerPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request['search'] != null){
            $searchVal = $request['search'];
            $results = DB::table('volunteer_payments')
            ->select('volunteer_payments.*','users.name as volunteerName','users.id as userId')
            ->join('users','users.id','=','volunteer_payments.volunteer_id')
            ->where(function($query) use ($searchVal) {
                $query->where('users.name', 'like', '%' . $searchVal . '%')
                ->orWhere('volunteer_payments.amount', 'like', '%' . $searchVal . '%');
            })->orderBy('volunteer_payments.created_at', 'DESC')
            ->paginate();



        }else{
            $results = DB::table('volunteer_payments')
                ->select('volunteer_payments.*','users.name as volunteerName','users.id as userId')            
                ->join('users','users.id','=','volunteer_payments.volunteer_id')
                ->orderBy('volunteer_payments.created_at', 'DESC')
            ->paginate(10);
        }

        return view('volunteer_payment.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        //
        $userResult = User::all();

        return view('volunteer_payment.create', ['userResult' => $userResult]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVolunteer_paymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        //volunteer_id
        $validatedData = $request->validate([
            'volunteer_id' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'payment_date' => 'required|string|max:255',
        ]);
        
        $book = new Volunteer_payment();
        //$book->remarks = $validatedData['remarks'];
        
        $book->volunteer_id = $validatedData['volunteer_id'];
        $book->amount = $validatedData['amount'];
        $book->payment_date = $validatedData['payment_date'];
        //price name phone address
       
        $book->remarks = $request['remarks'];
        $book->save();
        
        return redirect()->route('Volunteer_payment.index')->with('success', 'Payment added successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer_payment  $volunteer_payment
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer_payment $volunteer_payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer_payment  $volunteer_payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userResult = User::all();
        
        $volenteerPaymentResult = Volunteer_payment::find($id);
        return view('volunteer_payment.edit', ['volenteerPaymentResult' => $volenteerPaymentResult, 'userResult' => $userResult]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVolunteer_paymentRequest  $request
     * @param  \App\Models\Volunteer_payment  $volunteer_payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $book = Volunteer_payment::findOrFail($id);
        $validatedData = $request->validate([
            'volunteer_id' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'payment_date' => 'required|string|max:255',
        ]);
             
        $book->volunteer_id = $validatedData['volunteer_id'];
        $book->amount = $validatedData['amount'];
        $book->payment_date = $validatedData['payment_date'];
        //price name phone address
       
        $book->remarks = $request['remarks'];

        $book->save();

        return redirect()->route('Volunteer_payment.index')->with('success', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer_payment  $volunteer_payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Volunteer_payment::findOrFail($id);
        $book->delete();
        return redirect()->route('Volunteer_payment.index')->with('success', 'Book deleted successfully');
    }
}
