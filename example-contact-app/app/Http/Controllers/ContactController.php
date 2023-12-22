<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index');
    }

    public function confirm(ContactRequest $request): View
    {
        $data = $request->validated();

        return view('contact.confirm', $data);
    }

    public function complete(ContactRequest $request): View|RedirectResponse
    {
        if ($request->input('action') == 'back') {
            return Redirect::route('contact.index')->withInput();
        }

        try {
            DB::transaction(function () use ($request) {
                Contact::create($request->validated());
                Mail::send(new ContactMail($request));
            });
        } catch (\Illuminate\Database\QueryException $e) {
            return Redirect::route('contact.index')->withInput()->withErrors(['db' => 'データベースエラーが発生しました。']);
        } catch (\Exception $e) {
            return Redirect::route('contact.index')->withInput()->withErrors(['mail' => 'メール送信中にエラーが発生しました。']);
        }

        return view('contact.complete');
    }
}
