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
            $user = User::updateOrCreate(
                [
                    'email'     => $row[5]
                ],
                [
                    'email'     => $row[5],
                    'name'      => $row[1],
                    'password'  => bcrypt($row[6]),
                    'level_id'  => 2,
                ]
            );

            $participant = Participant::updateOrCreate(
                [
                    'user_id'       => $user->id
                ],
                [
                    'phone'         => $row[2],
                    'agency'        => $row[3],
                    'user_id'       => $user->id,
                ]
            );

            DB::table('participant_event')->insert([
                'event_id'          => $event->id,
                'participant_id'    => $participant->id,
                'created_at'        => date('Y-m-d H:i:s')
            ]);
        }
    }

    public function startRow() : int
    {
        return 1;
    }
}
