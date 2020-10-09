<?php

namespace App\Http\Controllers\Admin;

use App\EmailConfiguration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailConfigurationController extends Controller
{
    public function index()
    {
        $emails = EmailConfiguration::all();
        return view('Admin.MailConfiguration', compact('emails'));
    }

    public function store(Request $request)
    {
        EmailConfiguration::create([
            'host'          => $request->smtpHost,
            'port'          => $request->smtpPort,
            'username'      => $request->smtpUsername,
            'password'      => $request->smtpPassword,
            'emailFrom'     => $request->smtpSendFromEmail,
            'emailFromName' => $request->smtpSendFromName,
            'status'        => $request->status,
        ]);

        return redirect()->route('email-config');
    }

    public function edit(EmailConfiguration $email)
    {
        return view('Admin.MailConfigurationEdit', compact('email'));
    }

    public function update(EmailConfiguration $email, Request $request)
    {
        $email->update([
            'host'          => $request->smtpHost,
            'port'          => $request->smtpPort,
            'username'      => $request->smtpUsername,
            'password'      => $request->smtpPassword,
            'emailFrom'     => $request->smtpSendFromEmail,
            'emailFromName' => $request->smtpSendFromName,
            'status'        => $request->status,
        ]);
        return redirect()->route('email-config');
    }
}
