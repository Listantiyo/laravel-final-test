<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardList;
use Illuminate\Support\Facades\DB;
use App\Models\Photo;
use App\Models\TypeCard;
use Illuminate\Support\Facades\Storage;

class DataTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TypeCard::all();
        // dd($data);
        return view('datatype.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('type_cards')->get();
        // dd($data);
        return view('datatype.tambah',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = validator($request->all(),
        //     [
        //       'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        //       'Name' => 'required|string|max:255',
        //       'id_type' => 'required',
        //       'desc' => 'required|string',
        //     ])->validate();

        //     $name = $request->file('image')->getClientOriginalName();

        //     $path = $request->file('image')->store('public/images');


        //     $cardlist = new CardList($validatedData);

        //     $cardlist->name_img = $name;
        //     $cardlist->path = $path;

            // dd($cardlist);

        //     $cardlist->save();

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'Name' => 'required|string|max:255',
                'id_type' => 'required',
                'desc' => 'required|string',

               ]);

               $name = $request->file('image')->getClientOriginalName();

               $path = $request->file('image')->store('public/images');


               $save = new CardList;

               $save->name_img = $name;
               $save->path = $path;
               $save->Name = $request->Name;
               $save->id_type = $request->id_type;
               $save->desc = $request->desc;

            //    dd($save);

               $save->save();


        return redirect(route('cardtype.index'));
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
        $data = DB::table('type_cards')->get();
        $edit = CardList::find($id);

        // return dd($edit);
        return view('datacard.edit', compact('edit'),compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  int  $cardtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cardtype)
    {
        $validatedData = validator($request->all(),
        [
          'type' => 'required',

        ])->validate();

        $cardlist = TypeCard::find($cardtype);
        $cardlist->update($validatedData);

        return redirect(route('cardtype.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $cardtype
     * @return \Illuminate\Http\Response
     */
    public function destroy($cardtype)
    {
       $data = TypeCard::find($cardtype)->delete();
        return redirect(route('cardtype.index'));
        // return dd($cardlist);
    }

    public function addtype(Request $request)
    {

        $validatedData = validator($request->all(),
            [ 'type' => 'required',
            ])->validate();
        // dd($validatedData);
            $type = new TypeCard($validatedData);
            $type->save();


            return redirect(route('cardtype.index'));
    }
    public function imageshow()
    {

        $img=CardList::all('path');
        // dd($img);

        return view('image.img',compact('img'));


    }

}
