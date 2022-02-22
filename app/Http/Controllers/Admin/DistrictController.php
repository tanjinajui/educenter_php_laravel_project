<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Divisions;
use App\Districts;
class DistrictController extends Controller
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
       $divisions=Divisions::all();
        $districts=Districts::orderBy('id','desc')->paginate(2);
        return view('Admin.address.district.index',compact('divisions','districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=Divisions::all();
        return view('Admin.address.district.index',compact('districts'));
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
        'divisions_id' => 'required',
        'district_name' => 'required|unique:districts',
    ]);
        $data_add=$request->all();
       Districts::create($data_add);
       return redirect('/districts')->with('success', 'Data inserted successfully');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data_show=Districts::where('id',$id)->first();
        $divisions=Divisions::all();
        return view('Admin.address.district.edit',compact('data_show', 'divisions'));
        // $data_show=Districts::find($id);
        // return view('Admin.address.district.edit',compact('data_show'));
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
        $data=Districts::find($id);
        $update_data=$request->all();
        $data->update($update_data);
        return redirect('/districts')->with('success','District update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_show=Districts::find($id);
        $data_show->delete();
        //return back dile delete hoye oi page thakbe
        return back()->with('success',"Delete this data");
        // redirect je page debo delete hoye se page a jabe
        return redirect('/districts')->with('success',"Delete this data");
    }
}
