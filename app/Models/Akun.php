<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akuns';

    protected $guarded = [''];

    protected $with = ['childs', 'detail_memorials'];

    public $saldo_total_debet = 0;
    public $saldo_total_kredit = 0;
    public $saldo_debet = 0;
    public $saldo_kredit = 0;
    public $saldo_neraca_debet = 0;
    public $saldo_neraca_kredit = 0;

    public function memorials()
    {
        return $this->hasMany(Memorial::class);
    }

    public function detail_memorials()
    {
        return $this->hasMany(DetailMemorial::class);
    }

    public function childs()
    {
        return $this->hasMany(Akun::class, 'akun_id', 'id');
    }

    public static function getAkunWithCallback($akun, $callback)
    {
        $akun = $callback($akun);
        foreach ($akun->childs as $child) {
            $ch = self::getAkunWithCallback($child, $callback);
            $akun->saldo_total += $ch->saldo_total;
            $akun->debet_shu += $ch->debet_shu;
            $akun->kredit_shu += $ch->kredit_shu;
            $akun->saldo += $ch->saldo;
        }
        return $akun;
    }

    public function saldo_calculate_date_between($date1, $date2)
    {
        foreach ($this->detail_memorials()->whereHas('memorial', function ($q) use ($date1, $date2) {
            $q->whereBetween('tanggal', [$date1, $date2]);
        })->get() as $jd) {
            $this->saldo_debet += $jd->debet;
            $this->saldo_kredit += $jd->kredit;
        }
        $this->saldo_total_kredit = $this->saldo_kredit;
        $this->saldo_total_debet = $this->saldo_debet + $this->saldo;
    }

    public function saldo_calculate_month($month, $year)
    {
        foreach ($this->detail_memorials()->whereHas('memorial', function ($q) use ($month, $year) {
            $q->whereMonth('tanggal', $month)->whereYear('tanggal', $year);
        })->get() as $jd) {
            $this->saldo_debet += $jd->debet;
            $this->saldo_kredit += $jd->kredit;
        }
        $this->debet_shu = $this->saldo_debet;
        $this->kredit_shu = $this->saldo_kredit;
    }
}
