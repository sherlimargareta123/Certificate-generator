<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Certificate, Event, Participant};

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::orderBy('created_at')->get();
        return view('certificate.index', compact(
            'certificates'
        ));
    }

    public function indexUser()
    {
        $certificates = Certificate::where('participant_id', auth()->user()->participant->id)->orderBy('created_at')->get();
        return view('certificate.index', compact(
            'certificates'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('certificate.create', compact(
            'events'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'event_id'      => 'required',
            'description'   => 'required|string|max:200',
        ]);

        $event          = Event::find($data['event_id']);
        $participants   = Participant::where('event_id', $data['event_id'])->get();

        if ($participants->count() == 0) {
            alert()->html('<b>'.$event->name.' Event</b>'," does not have participants",'warning');
            return redirect()->route('certificates.create');
        }

        try {
            foreach ($participants as $participant) {
                Certificate::updateOrCreate(
                    [
                        'participant_id'=> $participant->id,
                        'event_id'      => $event->id,
                    ],
                    [
                        'description'   => $data['description'],
                    ]
                );
            }
            toast('Certificate generated successfully!','success');
            return redirect()->route('certificates.index');
        } catch (\Thdataable $th) {
            toast('Certificate failed to generate!','error');
            return redirect()->route('certificates.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        if ($certificate) {
            return response()->json([
                'success' => true,
                'title'   => 'Success',
                'message' => 'Your data has been deleted!'
            ]);
        } else {
            return response()->json([
                'success' => true,
                'title'   => 'Failed',
                'message' => 'Your failed to delete!'
            ]);
        }
    }

    public function generate($id)
    {
        $certificate = Certificate::find($id);
        return view('certificate.certificate', compact(
            'certificate'
        ));
    }
}
