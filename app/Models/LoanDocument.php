<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanDocument extends Model
{
    protected $table = 'loan_documents';

    protected $primaryKey = 'loan_document_id';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false; 
    protected $fillable = [
        'loan_application_id',
        'loan_id',
        'doc_type',
        'file_url',
        'uploaded_by_user_id',
        'verified_by_user_id',
        'status',
        'notes',
        'expiry_date',
    ];

    // Relationships

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'loan_id');
    }

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class, 'loan_application_id', 'loan_application_id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by_user_id', 'user_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by_user_id', 'user_id');
    }
}