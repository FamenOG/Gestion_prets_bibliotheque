<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Library;

class Librarian extends User
{
    protected $table = 'v_librarian';
    use HasFactory;

    public function loan(Client $client, Book $book)
    {
        try {
            DB::beginTransaction();
            $timestamp = Carbon::now('Africa/Nairobi');
            $loan_date = $timestamp;
            $back_date = $timestamp->copy()->addDays(30);
            $loan = new Loan($client->id, $this->id, $book->id, $loan_date, $back_date);
            $loan->save();
            $book->updateStatus(10);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function back(Loan $loan)
    {
        try {
            DB::beginTransaction();
            $book = Library::where('id', $loan->book_id)->first();
            $book->updateStatus(0);
            $back = new Back($this->id, $loan->id, Carbon::now('Africa/Nairobi'));
            $back->save();
            
            if ($loan->back_date < $back->back_date) {
                $daysLate = $book->getLate($loan, $back);
                $penaltyAmount = 5000 * $daysLate;
                $penalty = new Penalty($back->id, 2, $this->id, $penaltyAmount);
                $penalty->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
