<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //create
    public function create(Request $request){
        Member::create($request->all());
        return redirect('/admin')->with('success','Data Berhasil ditambah');
    }
    // edit
    public function edit($id)
	{
		$member = Member::find($id);
		return view('admin.edit',['member' => $member]);
	}
    // update
    public function update(Request $request,$id)
	{
		$member = Member::find($id);
		$member->update($request->all());
		return redirect('/admin')->with('success','Data berhasil diupdate');
	}
    // delete
    public function delete($id)
	{
		$member = Member::find($id);
		$member->delete($member);
		return redirect('/admin')->with('success','Data berhasil dihapus');
	}
}
