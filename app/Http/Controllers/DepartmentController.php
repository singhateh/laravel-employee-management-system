<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate(5);

        return view('system-mgmt/department/index', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system-mgmt/department/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $input = $request->all();
        // dd( $input); die;
        $this->validateInput($request);
         Department::create([
            'name' => $request['name'],
            'code' => $request['code']
        ]);

        return redirect()->intended('system-management/department')->with('success','Department Created Successfully!');
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
        $department = Department::find($id);
        // Redirect to department list if updating department wasn't existed
        if ($department == null ) {
            return redirect()->intended('/system-management/department')
            ->with('error','Department Update Fail!');
        }

        return view('system-mgmt/department/edit', ['department' => $department]);
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
        $department = Department::findOrFail($id);
        $this->validateInput($request);
        $input = [
            'name' => $request['name'],
            'code' => $request['code']
        ];
        Department::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/department')->with('success','Department Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id', $id)->delete();
         return redirect()->intended('system-management/department')->with('success','Department Deleted Successfully!');
    }

    /**
     * Search department from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $departments = $this->doSearchingQuery($constraints);
       return view('system-mgmt/department/index', ['departments' => $departments, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = department::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'name' => 'required|max:60|unique:department'
    ]);
    }
}
