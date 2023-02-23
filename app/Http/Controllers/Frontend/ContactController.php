<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Mail\Admin\ContactForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $errors = [];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ], [
            'name.required' => 'El campo "Nombre" es requerido.',
            'email.required' => 'El campo "Email" es requerido.',
            'message.required' => 'El campo "Mensaje" es requerido.',
        ]);

        $validator->fails();

        if($validator->failed())
        {
            foreach($validator->failed() as $key => $value)
            {
                $errors[$key] = $validator->errors()->first($key);
            }
        }

        if(!$errors)
        {
            $company = Company::first();

            Mail::to($company->email)->send(new ContactForm($company, $request->all()));
        }

        return response()->json([
            'success' => (bool) !$errors,
            'errors' => $errors,
        ]);
    }
}
