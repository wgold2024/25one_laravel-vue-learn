<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserCard;
use App\User;
use App\Card;

class DashboardController extends Controller
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
        $cards = UserCard::with('card')->with('user')->get();  
        $users = User::all();
        $types = Card::all();
       
        return view('dashboard', ['cards' => $cards, 'users' => $users, 'types' => $types]);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        
        UserCard::create($request->all());
        
        return UserCard::with('card')->with('user')->get();
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserCard $card)
    {
        return $card;
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, UserCard $card)
     {
         $card->update($request->all());
         
         return UserCard::with('card')->with('user')->get();
     }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCard $card)
    {
        $card->delete();
        
        return UserCard::with('card')->with('user')->get();
    }
}
