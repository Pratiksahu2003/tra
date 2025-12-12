<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\ContactSubmission;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PublicController extends Controller
{
    public function about()
    {
        return view('public.about');
    }

    public function features()
    {
        return view('public.features');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function storeContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Get client IP address
        $ipAddress = $request->ip();

        // Check if this IP has already submitted a form
        $existingSubmission = ContactSubmission::where('ip_address', $ipAddress)->first();

        if ($existingSubmission) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already submitted a contact form from this IP address. Please wait before submitting again.'
                ], 429);
            }
            return back()
                ->with('error', 'You have already submitted a contact form from this IP address. Please wait before submitting again.')
                ->withInput();
        }

        try {
            // Store the submission
            ContactSubmission::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip_address' => $ipAddress,
            ]);

            // Send email to floortrading0@gmail.com
            Mail::to('floortrading0@gmail.com')->send(
                new ContactMail(
                    $request->name,
                    $request->email,
                    $request->subject,
                    $request->message
                )
            );

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for contacting us! We will get back to you within 24 hours.'
                ]);
            }

            return back()->with('success', 'Thank you for contacting us! We will get back to you within 24 hours.');
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, there was an error sending your message. Please try again later.'
                ], 500);
            }
            return back()
                ->with('error', 'Sorry, there was an error sending your message. Please try again later.')
                ->withInput();
        }
    }

    public function privacy()
    {
        return view('public.privacy');
    }

    public function terms()
    {
        return view('public.terms');
    }

    public function disclaimer()
    {
        return view('public.disclaimer');
    }
}
