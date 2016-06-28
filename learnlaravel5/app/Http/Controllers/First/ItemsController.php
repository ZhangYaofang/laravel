<?php

namespace App\Http\Controllers\First;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Item;
use Redirect, Auth;

use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use Illuminate\Support\Facades\File;
use Mail;
use PDF;
use App;
use DB;



class ItemsController extends Controller
{      
	 public function show($id)
  	{
		   		
		return view('first.items.show')->withItem(Item::find($id));
  	} 

	public function downloadFile($id)
	{
		$item = Item::find($id);
		return response()->download($item->inputfile);
	}

	public function generatePDF($id)
	{	
		
		$item = Item::find($id);
		
		$pdf = PDF::loadHTML('<h1>Your information</h1>
				<br>
				<h4>Firstname: '.$item->firstname.'</h4>
				<br>
				<h4>Email: '.$item->email.'</h4>
				<br>
				<h4>Check Box: '.$item->check_box.'</h4>
				<br>
				<h4>Dropdown: '.$item->dropdown.'</h4>
				<br>'
				);
	        return $pdf->download('information.pdf');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('first.items.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'firstname' => 'required|unique:items|max:255',
			'email' => 'required',
		]);

		$item = new Item;
		$item->firstname = Input::get('firstname');
		$item->email = Input::get('email');
		$item->check_box = Input::get('check_box');
		$item->dropdown = Input::get('dropdown');
		
		$file = $request->file('inputfile');
		$newFilename = $item->firstname. '.pdf';
		$file->move('uploads',$newFilename);
		$savepath = 'uploads/'.$newFilename;
		$item->inputfile= $savepath;

		//$data = $request->only('firstname', 'email', 'check_box','dropdown', 'inputfile');
		$data = array('firstname'=>$item->firstname, 'email'=>$item->email, 'check_box'=>$item->check_box, 'dropdown'=>$item->dropdown, 'inputfile'=>$item->inputfile);
		$data['messageLines'] = explode("\n", $request->get('message'));

		if ($item->save()) {
			Mail::send('emails.contact', $data, function ($message) use ($data) {
            			$message->subject('Information Form: '.$data['firstname'])
              			->to($data['email'])
              			->replyTo($data['email']);

				$attachment = public_path($data['inputfile']);
				
				$message->attach($attachment);
        		});
			return Redirect::to('first');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}

	}

	
}
