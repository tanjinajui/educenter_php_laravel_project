<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Months;
class MonthController extends Controller
{
    //Authentication use Register chara login er jonno
    public function __construct()
{
    $this->middleware('admin');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months=Months::orderBy('id','desc')->paginate(2);
        return view('Admin.manage_setup.month.index',compact('months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.manage_setup.month.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //form validation
        $request->validate([
        'month_name' => 'required|unique:months|max:255|min:3',
        
    ]);
        $data_add=$request->all();
        Months::create($data_add);
        return back()->with('success', 'Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_show=Months::find($id);
        return view('Admin.manage_setup.month.edit',compact('data_show'));
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
         $data=Months::find($id);
        $update_data=$request->all();
        $data->update($update_data);
        return redirect('/month')->with('success','month update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_show=Months::find($id);
        $data_show->delete();
        //return back dile delete hoye oi page thakbe
        return back()->with('success',"Delete this data");
        // redirect je page debo delete hoye se page a jabe
        return redirect('/month')->with('success',"Delete this data");
    }
}
