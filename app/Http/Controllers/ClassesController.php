<?php

namespace App\Http\Controllers;

use App\classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\professor;
use App\type;
use App\Groups;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('Classes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       $Class = request()->validate(['Name' => 'required']);
       classe::create($Class);
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
      //   $class = classe::findOrFail($id);
      // ,compact('class')   
      return view('EditClass');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = professor::findOrFail($id);
        $classname = $professor->Classes;
        $class = classe::findOrFail($classname[0]->id);
        $professor->Classes()->detach($class);
        return back();
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
        classe::findOrFail($id)->update(request()->validate(['Name'=>'required']));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       classe::findOrFail($id)->delete();
       return back();
    }
    public function addprof($id)
    {
        $pid = request()->validate(['prof' => 'required']);
        $class = classe::findOrFail($id);
        $prof= professor::findOrFail($pid['prof']);
        $class->Professors()->attach($prof);
        return back();
    }
    public function AddStud()
    {
        function gcd($a, $b)
        {
              if ($a == 0)
              return $b;
              return gcd($b % $a, $a);
        }
        function lcm( $a, $b)
        {
              return ($a * $b) / gcd($a, $b);
        }
        $classes = classe::whereHas('Groups')->get();
        foreach ($classes as $class) {
       $a = $class->Groups->where('type', '=','1')->count();
       $b =  $class->Groups->where('type', '=','2')->count();
       $s = $class->Students->count();
        $lcm = lcm($a,$b);
       $allgroups = [];
       $singlegroup = [];
        $counter = 0;
       $gr = 1;

       foreach ($class->Students as $std ) {
            if ($counter == round($s/$lcm)) {
                $allgroups[$gr] = $singlegroup;
                $gr++;
                unset($singlegroup);
                $s -= $counter;
                $lcm--;
                $counter = 0;
            }
            elseif($std == $class->Students[$class->Students->count()-1])
            {
                $singlegroup[] = $std;
                $allgroups[$gr] = $singlegroup;
                break;
            }
            $singlegroup[] = $std;
            $counter++;
        }
        
        $LGroup = $class->Groups->where('type', '=', 1);
        $UGroup = $class->Groups->where('type', '=', 2);
        $tmp = 1;
        foreach ($LGroup as $Gr) {
            for ($i=1; $i <= count($allgroups)/$a  ; $i++) { 
                foreach ($allgroups[$tmp] as $std) {
                    $Gr->Students()->attach($std);
                }
                $tmp++;
            }
        }
        $tmp=1;
        foreach ($UGroup as $Gr) {
            for ($i=1; $i <= count($allgroups)/$b  ; $i++) { 
                foreach ($allgroups[$tmp] as $std) {
                    $Gr->Students()->attach($std);
                }
                $tmp++;
            }
        }
    }
        
       return back();
       
    }
    public function add()
    {
        return view('addclasses');
    }
    public function viewall()
    {
        $Classes = classe::orderby('id','DESC')->get()->all();
        return view('viewallSubject',compact('Classes'));
    }
}
