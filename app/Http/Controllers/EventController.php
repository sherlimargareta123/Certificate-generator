<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Imports\ParticipantsImport;
use Excel;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at')->get();
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
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
            'name'      => 'required|string|max:100',
            'date'      => 'required',
            'location'  => 'required|string|max:100',
            'file'      => 'required|file|mimes:xlsx',
        ]);


            $namaData = $request->file('file')->getClientOriginalName();


            $event = Event::create($data);
            $participants = Excel::import(new ParticipantsImport, $request->file('file'));
            $request->file('file')->move(base_path('\DataParticipant'), $namaData);

        if ($event && $participants) {
            toast('Event created & Participant imported successfully!','success');
            return redirect()->route('events.index');
        } else {
            toast('Event or import participants failed !','error');
            return redirect()->route('events.index');
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
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100',
            'date'      => 'required',
            'location'  => 'required|string|max:100',
        ]);

        $event->update($data);

        if ($event) {
            toast('Event updated successfully!','success');
            return redirect()->route('events.index');
        } else {
            toast('Event failed to update!','error');
            return redirect()->route('events.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        if ($event) {
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
        $namaData = $data->getClientOriginalName();
        $data->move('DataParticipant', $namaData);

        $participants = Excel::import(new ParticipantsImport, $request->file('file'));
        if ($participants) {
            toast('Participant imported successfully!','success');
            return redirect()->route('participants.index');
        } else {
            toast('Import Failed!','error');
            return redirect()->route('participants.index');
        }

    }
    // public function import(Request $request)
    // {
    //     $data = $request->validate([
    //         'file'      => 'required|file|mimes:xlsx',
    //     ]);

    //     $participants = Excel::import(new ParticipantsImport, $request->file('file'));
    //     if ($participants) {
    //         toast('Participant imported successfully!','success');
    //         return redirect()->route('participants.index');
    //     } else {
    //         toast('Import Failed!','error');
    //         return redirect()->route('participants.index');
    //     }
    // }

    // public function view(Request $request)
    // {
    //     require_once("D:\server/www/cls/PHPExcel.php");
    //     require_once("D:\server/www/cls/PHPExcel/IOFactory.php");

    //     $objPHPExcel = new PHPExcel();
    //     $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', 'HeaderB');
    //     $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', 'HeaderC');
    //     $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', 'HeaderD');
    //     ob_end_clean();

    //     header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    //     header("Cache-Control: no-store, no-cache, must-revalidate");
    //     header("Cache-Control: post-check=0, pre-check=0", false);
    //     header("Pragma: no-cache");

    //     $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    //     ob_end_clean();

    //     $objWriter->save('php://output');
    // }
}
