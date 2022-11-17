<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Participant, Event, User};
use App\Imports\ParticipantsImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::with('user')->orderBy('created_at')->get();
        return view('participant.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('participant.create', compact(
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
            'name'      => 'required|string|max:200',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:8',
            'phone'     => 'required|max:15',
            'agency'    => 'required|max:200',
            'event_id'  => 'required',
        ]);

        DB::beginTransaction();
        try {
            $user = User::updateOrCreate(
                [
                'email'     => $data['email'],
                ],
                [
                'name'      => $data['name'],
                'password'  => bcrypt($data['password']),
                'level_id'  => 2,
                ]
            );

            $participant = Participant::updateOrCreate(
                [
                'phone'         => $data['phone'],
                'event_id'      => $data['event_id'],
                ],
                [
                'agency'        => $data['agency'],
                'user_id'       => $user->id,
                ]
            );
            DB::commit();
            toast('Participant created successfully!','success');
            return redirect()->route('participants.index');
        } catch (\Thdataable $th) {
            DB::rollback();
            toast('Participant failed to create!','error');
            return redirect()->route('participants.index');
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
        $event = Event::findOrFail($id);
        return view('participant.index', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        return view('participant.edit');
        $events = Event::all();
        return view('participant.edit', compact(
            'participant', 'events'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:200',
            'email'     => 'required|email|unique:users,email,'.$participant->user_id,
            'phone'     => 'required|max:15',
            'agency'    => 'required|max:200',
            'event_id'  => 'required',
        ]);

        DB::beginTransaction();
        try {
            $user = User::find($participant->user_id);
            $user->update([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'phone'     => $data['phone'],
            ]);

            $participant->update([
                'agency'    => $data['agency'],
                'event_id'  => $data['event_id'],
            ]);

            DB::commit();
            toast('Participant updated successfully!','success');
            return redirect()->route('participants.index');
        } catch (\Thdataable $th) {
            DB::rollback();
            toast('Participant failed to update!','error');
            return redirect()->route('participants.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        $user = User::find($participant->user_id)->delete();
        if ($user) {
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

    public function import(Request $request)
    {
        $data = $request->validate([
            'file'      => 'required|file|mimes:xlsx',
        ]);

        $participants = Excel::import(new ParticipantsImport, $request->file('file'));
        if ($participants) {
            toast('Participant imported successfully!','success');
            return redirect()->route('participants.index');
        } else {
            toast('Import Failed!','error');
            return redirect()->route('participants.index');
        }
    }
}
