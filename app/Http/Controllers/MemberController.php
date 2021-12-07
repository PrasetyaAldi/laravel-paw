<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
	public function index()
	{
		$data_member = \App\Models\Member::all();
		return view('member.index',['data_member' =>$data_member]);
	}

	public function create(Request $request)
	{
		\App\Models\Member::create($request->all());
		return redirect('/member')->with('sukses','Data berhasil diinput');
	}

	public function edit($id)
	{
		$member = \App\Models\Member::find($id);
		return view('member/edit',['member' => $member]);
	}

	public function update(Request $request,$id)
	{
		$member = \App\Models\Member::find($id);
		$member->update($request->all());
		return redirect('/member')->with('sukses','Data berhasil diupdate');
	}

	public function delete($id)
	{
		$member = \App\Models\Member::find($id);
		$member->delete($member);
		return redirect('/member')->with('sukses','Data berhasil dihapus');
	}
}
