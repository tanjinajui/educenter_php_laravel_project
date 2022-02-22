<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Students;
use App\Semesters;
use App\Years;
use App\Months;
use App\FeeCategories;
use App\FeeAmounts;
use App\FeeCategoriesAmounts;
class FeeCategoryAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();
        $semesters = Semesters::all();
        $fee_categories = FeeCategories::all();
        $fee_categories_amounts=FeeCategoriesAmounts::orderBy('id','desc')->paginate(2);
        return view('Admin.manage_setup.fee_category_amount.index',compact('students','semesters','fee_categories', 'fee_categories_amounts'));
        // $fee_categories_amounts=Fee_Categories_Amounts::select('fee_categories_id')->groupBy('fee_categories_id')->orderBy('id','desc')->paginate(2);
         
        // return view('Admin.manage_setup.fee_category_amount.index',compact('fee_categories_amounts', 'students','semesters','fee_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all();
        $semesters = Semesters::all();
        $years = Years::all();
        $months = Months::all();
        $fee_categories = FeeCategories::all();
        return view('Admin.manage_setup.fee_category_amount.create',compact('students', 'semesters','years','months', 'fee_categories'));
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
    //     $request->validate([
    //     'fee_categories_id' => 'required',
    //     'semesters_id[]' => 'required',
    //     'amount[]' => 'required',
    // ]);
        // $countClass = count($request->semesters_id);
        // if($countClass !=NULL){
        //     for($i=0; $i <$countClass; $i++){
        //         $fee_amount = new Fee_Categories_Amounts();
        //         $fee_amount->student_first_name=$request->student_first_name;
        //         $fee_amount->student_last_name=$request->student_last_name;
        //         $fee_amount->student_email=$request->student_email;
        //         $fee_amount->fee_categories_id=$request->fee_categories_id;
        //         $fee_amount->date=$request->date;
        //         $fee_amount->semesters_id=$request->semesters_id[$i];
        //         $fee_amount->amount= $request->amount[$i];
        //         $fee_amount->save();
        //     }
        // }
        $data=new FeeCategoriesAmounts;
        $data->student_first_name=$request->student_first_name;
        $data->student_last_name=$request->student_last_name;
        $data->student_email=$request->student_email;
        $data->years_id=$request->years_id;
        $data->fee_categories_id=$request->fee_categories_id;
        $data->dates=$request->dates;
        $data->months_id=$request->months_id;
        $data->save();
        if (count($request->semesters_id) > 0) {
            foreach ($request->semesters_id as $item => $value) {
                $datad=array(
                    'fee_categories_amounts_id'=>$data->id,
                    'semesters_id'=>$request->semesters_id[$item],
                    'amount'=>$request->amount[$item],
                );
                FeeAmounts::insert($datad);
            }
        }
        //$data=$request->all();
        // $lastid=Fee_Categories_Amounts::create($data)->id;
        // if(count($request->semesters_id) > 0)
        // {
        //     foreach ($request->semesters_id as $item => $value) {
        //         $data2=array(  
        //             'fee_categories_amounts_id'=>$lastid,
        //             'student_first_name'=>$student_first_name,
        //             'student_last_name'=>$student_last_name,
        //             'student_email'=>$student_email,
        //             'fee_categories_id'=>$fee_categories_id,
        //             'years_id'=>$years_id,
        //             'months_id'=>$months_id,
        //             'dates'=>$dates,
        //             'semesters_id'=>$request->semesters_id[$item],
        //             'amount'=>$request->amount[$item],
        //         );
        //     Fee_Amounts::insert($data2);
        //     }
        // }
       return redirect('/fee_categories_amounts')->with('success', 'Data inserted successfully');
         //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $fee_amounts=FeeAmounts::where('fee_categories_amounts_id','=', $id)->get();
        return view('Admin.manage_setup.fee_category_amount.details',compact('fee_amounts'));
        //  $data['semesters'] = Semesters::all();
        // $data['data_show']=Fee_Amounts::where('fee_categories_id',$fee_categories_id)->orderBy('semesters_id','asc')->get();
        // dd("yes");
        // return view('Admin.manage_setup.fee_category_amount.details',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data['data_show']=Fee_Categories_Amounts::where('id',$id)->get();
        $data['data_show']=FeeCategoriesAmounts::find($id);
        $data['fee_amount']=FeeAmounts::all();
        $data['fee_categories']=FeeCategories::all();
        $data['students']=Students::all();
        $data['semesters']=Semesters::all();
        $data['months']=Months::all();
        $data['years']=Years::all();
        // $data['contents']=FeeAmounts::join('fee_categories_amounts','fee_amounts.fee_categories_amounts_id','=','fee_categories_amounts.id')->select('fee_amounts.*')->get();
        return view('Admin.manage_setup.fee_category_amount.edit',$data);
        
        
        // $data['data_show']=Fee_Amounts::find($id);
        // // $data['data_show']=Fee_Categories_Amounts::where('fee_categories_id',$fee_categories_id)->orderBy('semesters_id','asc')->get();
        // // dd($data['data_show']->toArray());
        // $data['fee_amount'] = Fee_Categories_Amounts::all();
        // $data['semesters'] = Semesters::all();
        // $data['students'] = Students::all();
        // $data['years'] = Years::all();
        // $data['months'] = Months::all();
        // $data['fee_categories'] = Fee_Categories::all();
        // return view('Admin.manage_setup.fee_category_amount.edit',$data);
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
        // if($request->semesters_id==NULL){
        //     return redirect()->back()->with('error','Sorry! you do not select any item');
        // }else{
        //     $std=Fee_Categories_Amounts::where('fee_categories_id', $fee_categories_id)->first();
        //     $countClass = count($request->semesters_id);
        //     for($i=0; $i <$countClass; $i++){
        //         $fee_amount = new Fee_Categories_Amounts();
        //         $fee_amount->fee_categories_id=$request->fee_categories_id;
        //          $fee_amount->student_first_name=$std->student_first_name;
        //          $fee_amount->student_last_name=$std->student_last_name;
        //          $fee_amount->student_email=$std->student_email;
        //         $fee_amount->semesters_id=$request->semesters_id[$i];
        //         $fee_amount->amount= $request->amount[$i];
        //         $fee_amount->save();
        //     }
        //      //  Fee_Categories_Amounts::where('fee_categories_id', $fee_categories_id)->delete();
        // }
        $data=FeeCategoriesAmounts::find($id);
        $data->student_first_name=$request->student_first_name;
        $data->student_last_name=$request->student_last_name;
        $data->student_email=$request->student_email;
        $data->years_id=$request->years_id;
        $data->fee_categories_id=$request->fee_categories_id;
        $data->dates=$request->dates;
        $data->months_id=$request->months_id; 
        $data->save();

         if(count($request->semesters_id) > 0) {
         foreach ($request->semesters_id as $amounts => $value) {
                $datad=array(
                    
                    'semesters_id'=>$request->semesters_id[$amounts],
                    'amount'=>$request->amount[$amounts],
                );
        $data_amounts=FeeAmounts::where('id',$request->id[$amounts])->first();
        $data_amounts->update($datad);
      }
  }
         return redirect('/fee_categories_amounts')->with('success','Fee Categories Amounts update successfully');
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
