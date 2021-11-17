<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Gender;
use App\Models\Contact;
use App\Mail\ContactMail;
use Session;

class ContactController extends Controller
{
    public function index()
    {
        // Get Stored Contact Submissions
        $contacts = Contact::orderBy('name', 'ASC')->get();


        return view('dashboard', compact("contacts"));
    }

    public function create()
    {
        // Get Gender Types
        $genders = Gender::all();
        
        return view('contact.create', compact("genders"));
    }

    public function store(Request $request)
    {
        // Get Form Field Data
        $formData = $request->all();

        // Validate Form Field Data
        $request->validate([
                'name'=>'required | max:10',
                'email'=>'required',
                'gender_id'=>'required',
                'content'=>'required',
        ]);

        // Set gender_id value to be stored on contact table
        $formData['gender_id'] = Gender::where('val', $formData['gender_id'])->value('id');

        // Store form values to contact table
        $contact = Contact::create($formData);

        // Store form values to contact table
        $details = [
            'name' => $formData['name'],
            'email' => $formData['email'],
        ];

        Mail::to($formData['email'])->send(new ContactMail($details));

        // session::flash('message', 'Form Completed Succesfully.');

        // return redirect()->back();
        return response()->json(['success'=>'Successfully']);

    }

    public function view(Request $request)
    {
        $id = ($request->id) ? $request->id : null;

        $contact = Contact::find($id);
        $response['title'] = $contact->name . ' - ' . $contact->email;
        $response['body'] = $contact->content;

        return $response;
    }

    public function destroy($id)
    {
        
        Contact::find($id)->delete();

        return back();
    }
}
