<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Divisions;
use App\Districts;
use App\Upozilas;
class UpozilaController extends Controller
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
        
    // $upozilas=Upozilas::join('divisions','upozilas.divisions_id','=','divisions.id')->select('upozilas.*','divisions.division_name')->paginate(2);
    // return view('Admission.index',compact('upozilas'));
        $divisions=Divisions::all();
        $districts = Districts::all();
        $upozilas=Upozilas::orderBy('id','desc')->paginate(4);
        return view('Admin.address.upozila.index',compact('divisions', 'districts', 'upozilas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $upozilas=Divisions::all();
        return view('Admin.address.upozila.index',compact('upozilas'));
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
        'districts_id' => 'required',
        'upozila_name' => 'required|unique:upozilas',
    ]);
        $data_add=$request->all();
       Upozilas::create($data_add);
       return redirect('/upozilas')->with('success', 'Data inserted successfully');
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
        // $data_show=Districts::where('id',$id)->first();
        // $divisions=Divisions::all();
        // return view('Admin.address.district.edit',compact('data_show', 'divisions'));
 
        $data_show=Upozilas::where('id',$id)->first();
        $divisions=Divisions::all();
        $districts = Districts::all();
        return view('Admin.address.upozila.edit',compact('data_show', 'divisions', 'districts'));
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
        $data=Upozilas::find($id);
        $update_data=$request->all();
        $data->update($update_data);
        return redirect('/upozilas')->with('success','Upozila update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_show=Upozilas::find($id);
        $data_show->delete();
        //return back dile delete hoye oi page thakbe
        return back()->with('success',"Delete this data");
        // redirect je page debo delete hoye se page a jabe
        return redirect('/upozilas')->with('success',"Delete this data");
    }
}
