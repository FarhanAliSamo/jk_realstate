<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BasicDetails;
use App\Models\Industry;
use App\Models\SeoContent;
use App\Models\MetaTags;
use App\Models\BlogArticles;
use App\Models\BlogMessage;
use App\Models\Appointment;
use App\Mail\AppointmentConfirmation;
use Mail;


class AppointmentController extends Controller
{
    
    
    public function processAppointments(Request $request)
    {
        // Replace 'your-artisan-command' with the actual Artisan command you want to run.
        $command = 'php ' . base_path('artisan') . ' your-artisan-command';

        $process = new Process($command);

        try {
            $process->mustRun();
            return 'Command executed successfully: ' . $process->getOutput();
        } catch (ProcessFailedException $exception) {
            return 'Command failed: ' . $exception->getMessage();
        }
    }
    
    public function index()
{
    return view('appointment.index');
}

public function store(Request $request)
{
    // Validation
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'date_time' => 'required|date',
    ]);

    // Store the appointment in the database
    $appointment = new Appointment;
    $appointment->name = $request->name;
    $appointment->email = $request->email;
    $appointment->date_time = $request->date_time;
    $appointment->save();

    // Send confirmation email
    Mail::to($request->email)->send(new AppointmentConfirmation($appointment));

    return view('appointment.confirmation');
}

}
