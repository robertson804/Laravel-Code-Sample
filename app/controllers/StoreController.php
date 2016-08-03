<?php 
use User as UserModel;
class StoreController extends BaseController{

	public function home() {
		$param['stores'] = UserModel::get();
		return View::make('user.store.home')->with($param);
	} 
	
	public function del($id)
	{
		//echo 1;exit;
		
		  
		 UserModel::where('id', $id)->delete();
		 
		 return Redirect::route('user.home');
	}
	public function edit($id)
	{
		$result=UserModel::find($id);
		$param['user'] = $result;
		
		return View::make('user.store.edit')->with($param);
	}
	public function doUpdate()
	{
		$id = Input::get('id');
		//print_r($id);exit;
		$user = UserModel::find($id);
		//print_r($user);exit;
		$user->name = Input::get('name');
		$user->email= Input::get('email');
		$user->birthday= Input::get('birthday');
		$user->save();
		return Redirect::route('user.store.edit', $id);
		// return View::make('user.auth.signup');
		
	}
}
