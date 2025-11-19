<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Certificate extends Model
{
    use HasFactory, LogsActivity;
    // $table->text('observation')->nullable();
    // $table->string('url')->nullable();
    // $table->foreignId('type_certificate_id')->constrained()->onDelete('cascade');
    // $table->foreignId('fonctionnaire_id')->constrained()->onDelete('cascade');
    // $table->integer('jours');
    // $table->date('date_depot');
    // $table->date('date_debut');


    protected $fillable = [
        'observation', 'url', 'type_certificate_id', 'fonctionnaire_id', 'jours', 'date_depot', 'date_debut'
    ];



    public function type_certificate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TypeCertificate::class, 'type_certificate_id');
    }

    /**
     * Alias for compatibility with camelCase relation name used in some places.
     * Keeps backwards compatibility with code that uses $certificate->typeCertificate
     */
    public function typeCertificate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->type_certificate();
    }

    public function fonctionnaire(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class, 'fonctionnaire_id');
    }

    protected static $logAttributes = ['*'];

    protected static $logName = 'Certificate';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->logOnlyDirty()
            ->useLogName('Certificate');
    }//

}
