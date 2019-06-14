<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class WelcomeController extends Controller
{
    public function welcome(){
        return view('welcome');
    }


    public function about(){
        return view('pages.about');
    }


    public function contact(){



        return view('pages.contact');
    }


    public function contactusRequest()
    {
        $contact = new Contact();
        $contact->name =request('name');
        $contact->email =request('email');
        $contact->phone =request('phone');
        $contact->subject =request('subject');
        $contact->message =request('message');

        if(  $contact->save()){

            return redirect('contact')

                ->with('success','successfully! Thanks for contact Us');
        }

        else{

            return redirect('contact')

                ->with('success','fails to reach us');
        }

    }


    public function loan(){
        return view('pages.loan');
    }

    public function people(){
        return view('pages.people');
    }

    public function service(){
        return view('pages.service');
    }


    /*LOANS*/

    public function loanBiashara(){
        return view('pages.Loans.loanBiashara');
    }

    public function loanExcutive(){
        return view('pages.Loans.loanExcutive');
    }

    public function loanAjira(){
        return view('pages.Loans.loanAjira');
    }


    public function loanMakazi(){
        return view('pages.Loans.loanMakazi');
    }
}
