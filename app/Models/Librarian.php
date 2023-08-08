<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Librarian extends User
{
    protected $table = 'v_librarian';
    use HasFactory;

    public function loan(Client $client, Book $book) {
        try {
            DB::beginTransaction();
            $timestamp = Carbon::now('Africa/Nairobi');
            $loan_date = $timestamp;
            $timestamp->addDays(30);
            $back_date = $timestamp;
            $loan = new Loan($client->id, $this->id, $book->id, $loan_date, $back_date);
            $loan->save();
            $book->setTable('books');
            $book->update(['status' => 10]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    
    public function back(Client $client, Loan $loan ,Book $book) {
        try {
            DB::beginTransaction();
            $timestamp = Carbon::now('Africa/Nairobi');
            $back_date = $timestamp;
            $loan = new Back($client->id, $this->id, $book->id,$loan->id,$back_date);
            $loan->save();
            $book->setTable('books');
            $book->update(['status' => 0]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

}

