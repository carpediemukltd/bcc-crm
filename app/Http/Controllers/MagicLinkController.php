<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\MagicLink;
use App\Helpers\Permissions;
use Spatie\Permission\Models\Permission;


class MagicLinkController extends Controller
{
    public function generateLink(Request $request, $contact_id)
    {
        // Check if the user is authenticated and authorized to generate the link
        // if (Auth::check() && $this->isAuthorized($contact_id)) {
            // Generate a unique token for the magic link
            $token = Str::random(40);

            // Save the token and associated contact ID in your database
            $magicLink             = new MagicLink();
            $magicLink->user_id    = Auth::user()->id;
            $magicLink->token      = $token;
            $magicLink->expires_at = now()->addHours(24); // Adjust the expiration time as needed
            $magicLink->save();

            // $magicLinkUrl = route('bankportal.upload', ['token' => $token]);php 
            // return redirect('http://127.0.0.1:8000/user/upload-documents/'.$token);

            // Generate the magic link URL
            // return view('magic-link.generated', ['token' => $token]);
           
            return response()->json(['token' => $token, 'contact_id' => $request->contact_id]);

            // return view('magic-link.generated', ['token' => $token, 'contact_id' => $request->contact_id]); 
        // }

        // return redirect()->route('login'); // Redirect to login if not authenticated or authorized
    }

    private function isAuthorized($contact_id)
    {

        $user = Auth::user();
        $id   = $contact_id;
        $access = Permissions::checkUserAccess($user, $id);
        if (!$access) {
            return false;
        } else {
            return true;
        }
        // Implement your authorization logic here
        // Check if the authenticated user has permission to access the contact
        // You may use policies, roles, or any other authorization method here
        // Return true if authorized, false otherwise
    }

    // public function viewLink(Request $request, $token)
    // {
    //     // Find the magic link by token
    //     $magicLink = MagicLink::where('token', $token)->first();

    //     // Check if the link is valid and hasn't expired
    //     if ($magicLink && $magicLink->isNotExpired()) {
    //         // Fetch the associated contact and their documents
    //         $contact = Contact::find($magicLink->contact_id);
    //         $documents = $contact->documents;
    //         dd($con)

    //         return view('magic-link.view', ['contact' => $contact, 'documents' => $documents]);
    //     }

    //     abort(404); // Magic link is invalid or expired
    // }
}
