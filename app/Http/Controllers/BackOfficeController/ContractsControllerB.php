<?php

namespace App\Http\Controllers\BackOfficeController;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contratrecyclage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContractsControllerB extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve contracts for this user with pagination
        $contracts = Contratrecyclage::with('entreprise', 'centre')->paginate(2);

        return view('BackOffice.gestionContract.index', [
            'contracts' => $contracts,
            'calculateContractDuration' => function ($months) {
                return $this->calculateContractDuration($months);
            }
        ]);
    }

    // Function to calculate contract duration
    private function calculateContractDuration($months)
    {
        $years = intdiv($months, 12);
        $remainingMonths = $months % 12;
        $duration = [];

        if ($years > 0) {
            $duration[] = $years . ' ' . ($years > 1 ? 'ans' : 'an');
        }
        if ($remainingMonths > 0) {
            $duration[] = $remainingMonths . ' ' . ($remainingMonths > 1 ? 'mois' : 'mois');
        }

        return implode(' ', $duration);
    }

    public function updateStatus(Request $request, $id)
    {
        $contract = Contratrecyclage::find($id);

        if (!$contract) {
            return response()->json(['success' => false, 'message' => 'Contract not found'], 404);
        }

        $entreprise = $contract->entreprise;
        $centre = $contract->centre;
        $user = $entreprise->user;

        \Log::warning('user ' . $user);

        $newStatus = $request->input('typeContract');
        $contract->typeContract = $newStatus;
        $contract->save();

        if ($newStatus === 'accepté') {

            if ($user && $user->email) {
                Mail::html("
                    <p>Dear {$user->name},</p>
                    <p>Your contract with the center with the name : {$centre->nom} has been accepted.</p>
                    <p>Please review your contract details <a href='" . url('/contracts/' . $contract->id) . "'>here</a>.</p>
                    <p>Thank you for using our service!</p>
                ", function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('Contract Status Changed to Accepté');
                });
            }
        }

        return response()->json(['success' => true]);
    }
}
