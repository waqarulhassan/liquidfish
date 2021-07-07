<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\CreateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
	public function store(CreateRequest $request)
	{
		$data = [
			'first_name' => $request->get('first_name'),
			'last_name'  => $request->get('last_name'),
			'email'      => $request->get('email'),
			'phone'      => $request->get('phone'),
			'subject'    => $request->get('subject'),
			'message'    => $request->get('message'),
		];

		$contact = new Contact();
		$contact->persist($data);
	}
}
