<?php

namespace App\Http\Controllers;

use App\Models\EventOne;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_enrollments = EventOne::all()
            ->count();
        $total_confirmed_enrollments = EventOne::all()
            ->where('email_verified_at','!=',null )
            ->count();
        $total_not_confirmed_enrollments = EventOne::all()
            ->where('email_verified_at','=',null )
            ->count();

       //logica das idades

        $year = date('Y');
        $today_date = date('Y-m-d');
        $month = date('m');
        $day = date('d');

        $year_minors = date('Y') - 18;
        $year_18_25 = $year - 25;
        $year_25_40 = $year - 40;




        //montar a data de nascimento para os menores de 18 anos de idade

        $mount_date_minors = $year_minors.'-'.$month.'-'.$day;

        //montar a data de nascimento para os de 18 a 25 anos de idade

        $mount_18_25 = $year_18_25.'-'.$month.'-'.$day;

        //montar a data de nascimento para os de 25 a 40 anos de idade

        $mount_25_40 = $year_25_40.'-'.$month.'-'.$day;



//        dd($mount_18_25);

        $count_minors = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_date_minors, $today_date])
            ->count();

        $count_18_25 = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_18_25, $today_date])
            ->count();

        $count_25_40 = EventOne::all()
            ->whereBetween('date_of_birth', [$mount_25_40, $today_date])
            ->count();
        $count_over_40 = EventOne::all()
            ->where('date_of_birth', '<', $mount_25_40)
            ->count();





        return view('home', [
            'total_enrollments' => $total_enrollments,
            'total_confirmed_enrollments'=>$total_confirmed_enrollments,
            'total_not_confirmed_enrollments'=>$total_not_confirmed_enrollments,

        ]);
    }
}
