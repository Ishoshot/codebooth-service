<?php

namespace App\Http\Controllers;

use App\Mail\AddedUserToTeam;
use App\Mail\UserAddedToTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeamController extends Controller
{
    /**
     * Sends a Mail to the Initiator and Member of a team.
     *
     * @param  Request $request
     * @return {}
     */
    public function userAddedToTeam(Request $request)
    {

        // To the Person that was Added
        Mail::to($request->member)->queue(new UserAddedToTeam($request->team));

        // To the Initiator
        Mail::to($request->user)->queue(new AddedUserToTeam($request->team));

        return response()->json(['message' => 'Successful!', 'code' => '00'], 201);
    }

    /**
     * Sends a Mail to the Initiator and Member of a team on TeamRequest Update.
     *
     * @param  Request $request
     * @return {}
     */
    public function teamRequest(Request $request)
    {
        return response()->json(['message' => $request->all(), 'code' => '00'], 201);
    }


    /**
     * Sends a Mail to the Initiator and Member of a team on Leave.
     *
     * @param  Request $request
     * @return {}
     */
    public function leaveTeam(Request $request)
    {
        return response()->json(['message' => $request->all(), 'code' => '00'], 201);
    }
}
