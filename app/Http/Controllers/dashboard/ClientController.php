<?php

namespace App\Http\Controllers\dashboard;

use App\client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
   
    public function index(Request $request)
    {
        $clients=Client::when($request->search ,function($q) use ($request){
            return $q -> where('name','like','%'.$request->search.'%')
             ->OrWhere('phone','like','%'.$request->search.'%')
             ->OrWhere('address','like','%'.$request->search.'%')
            ;
        })->latest()->paginate(4);
        return view('dashboard.clients.index',compact('clients'));

    }//end of index
    public function create()
    {
      return view('dashboard.clients.create');

    }// end of create
    public function store(Request $request)
    {
        $requested=$request->validate([

            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        Client::Create($requested);
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.clients.index');
    }// end of store
     
    public function edit(client $client)
    {
        return view('dashboard.clients.edit',compact('client'));

    }//end of edit

    public function update(Request $request, client $client)
    {
       $requested= $request->validate([

            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $client->update($requested);
        session()->flash('success',__('site.updated_successfully'));
        return redirect()->route('dashboard.clients.index');
    }//end of update


    public function destroy(client $client)
    {
        $client->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of destory
}//end of class
