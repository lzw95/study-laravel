<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use Auth;
use DB;

class UsersController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', [
			'except' => ['create', 'store', 'index']
		]);

		$this->middleware('guest', [
			'only'	=> ['create']		
		]);
	}

	// 显示所有用户
	public function index()
	{
        $users = User::paginate(10);
        return view('users.index', compact('users'));

	}

    // 注册页面
	public function create()
	{
		return view('users.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name'	=>	'required|max:50',
			'email' =>  'required|email|unique:users|max:255',
			'password' => 'required|min:6|confirmed' 
		]);

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password)
			]);

		Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
		return redirect()->route('users.show', [$user]);
	}

	// 个人中心
	public function show(User $user)
	{
		return view('users.show', compact('user'));
	}

	// 更新资料页面
	public function edit(User $user)
	{
		$this->authorize('update', $user);
		return view('users.edit', compact('user'));

	}

	// 更新资料操作
	public function update(Request $request, User $user)
	{
		$this->validate($request, [
			'name' => 'required|max:50',
			'password' => 'nullable|confirmed|min:6'
		]);

		$this->authorize('update', $user);

		$data = [];
		$data['name'] = $request->name;
		if ($request->password) {
			$data['password'] = bcrypt($request->password);
		}

		$user->update($data);
        session()->flash('success', '个人资料更新成功！');
        return redirect()->route('users.show', $user->id);

	}

	public function destroy(User $user)
	{
		$this->authorize('destroy', $user);		
		$user->delete();
		session()->flash('success', '删除用户成功');
		return back();
	}





}
