<?php

namespace App\Imports;

use App\Models\{User,Participant,Event};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class ParticipantsImport implements ToCollection, WithHEadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $event = Event::get()->last();
        foreach ($collection as $row) {
            $user = User::Create(
                [
                'email'     => $row[5],
                'name'      => $row[1],
                'password'  => bcrypt($row[6]),
                'level_id'  => 2,
                ]
            );

            $participant = Participant::Create(
                [
                'phone'         => $row[2],
                'agency'        => $row[3],
                'user_id'       => $user->id,
                ]
            );

            DB::table('participant_event')->insert([
                'event_id'          => $event->id,
                'participant_id'    => $participant->id
            ]);
        }
    }

    public function startRow() : int
    {
        return 1;
    }
}
