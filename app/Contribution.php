<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contribution extends Model
{

    protected $fillable = ['child_id', 'sponsor_id', 'currency_id', 'contribution'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sponsor(){
        return $this->belongsTo('App\Sponsor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function child(){
        return $this->belongsTo('App\Child');
    }

    /**
     * Retrieve monthly contributions
     * @return array
     */
    public function getMonthly()
    {
        $data = DB::table('contributions')
            ->select(DB::raw("SUM(contribution) AS contribution, extract(year from created_at) AS year"))
            ->groupBy(DB::raw("year"))
            ->get();
        $output = array();
        foreach($data as $obj){
            array_push($output, array(
                    'contribution' =>intval($obj->contribution),
                    'year' => $obj->year
                )
            );

        }
        return $output;
    }

    /**
     * Retrieve yearly contributions
     * @return array
     */
    public function getYearly() {
        $data = DB::table('contributions')
            ->select(DB::raw("SUM(contribution) AS contribution, extract(year from created_at) AS year"))
            ->groupBy(DB::raw("year"))
            ->get();

        $output = array();
        foreach($data as $obj){
            array_push($output, array(
                    'contribution' =>intval($obj->contribution),
                    'year' => $obj->year
                )
            );

        }
        return $output;
    }

    /**
     * Retieve contributions for year
     * @param $year
     * @return array
     */
    public function getByYear($year) {
        $data = DB::table('contributions')
            ->select(DB::raw("SUM(contribution) AS contribution, extract(year from created_at) AS year"))
            ->whereRaw('EXTRACT(year FROM "created_at") = ?',[$year])
            ->groupBy(DB::raw("year"))
            ->get();

        $output = array();
        foreach($data as $obj){
            array_push($output, array(
                    'contribution' =>intval($obj->contribution),
                    'year' => $obj->year
                )
            );

        }
        return $output;
    }
    /**
     * Retrieve total
     * @return \Illuminate\Support\Collection
     */
    public function getTotal() {
        $data = DB::table('contributions')
            ->select(DB::raw('SUM(contribution) AS contribution'))
            ->get();
        return $data;
    }

    public function getThisMonth() {
        $data = DB::table('contributions')
            ->select(DB::raw('SUM(contribution) AS contribution'))
            ->whereRaw('created_at < date_trunc(\'month\', CURRENT_DATE) + interval \'1 month\'')
            ->get();
        return $data;
    }
}
