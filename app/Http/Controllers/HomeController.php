<?php

namespace App\Http\Controllers;

use DB;
use Auth;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return redirect('/dashboard');
	}

	public function dashboard() {
		$company_id = '';
		if (session()->get('user_id') == 1 && session()->get('user_type') == "super_admin") {
			$user_role_id = 1;
		} else {
			$user_role_id = session()->get('user_role_id');
		}
		$company_id = session()->get('company_id');

		$menus_array = array();
		if (isset($user_role_id)) {
			$menus = DB::select('call get_user_menu_by_role("' . $user_role_id . '","' . $company_id . '")');

			$i = 0;
			foreach ($menus as $key => $value) {

				$child_menu = DB::select('call get_child_menu_list("' . $value->menu_id . '","' . $user_role_id . '","' . $company_id . '")');
                    $lower=strtolower($value->name);
                    $final_key=str_replace(' ', '_', $lower);
                    $menu_trans=trans("others.mxp_menu_"."$final_key");
				if (!empty($child_menu)) {

					$menus_array[$i]['name'] = $menu_trans;
					$menus_array[$i]['route_name'] = $value->route_name;
					$menus_array[$i]['order_id'] = $value->order_id;
					$menus_array[$i]['menu_id'] = $value->menu_id;
					$j = 0;
					foreach ($child_menu as $cm) {
						$lower_sub=strtolower($cm->name);
                        $final_key_sub=str_replace(' ', '_', $lower_sub);
                        $menu_trans_sub=trans("others.mxp_menu_"."$final_key_sub");
						$menus_array[$i]['subMenu'][$j]['name'] = $menu_trans_sub;
						$menus_array[$i]['subMenu'][$j]['route_name'] = $cm->route_name;
						$menus_array[$i]['subMenu'][$j]['order_id'] = $cm->order_id;
						$menus_array[$i]['subMenu'][$j]['menu_id'] = $cm->menu_id;

						$j++;
					}
				} 
				$i++;
			}

		}

		session()->put('UserMenus', $menus_array);



		$selectBuyer = DB::table('mxp_party')->where('user_id',Auth::user()->user_id)->get();
		return view('dashboard',compact('selectBuyer'));
	}
}