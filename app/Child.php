<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Child extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sponsor()
    {
        return $this->hasOne(ChildSponsor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    /**
     * Retrieve monthly contributions
     * @param $child_id
     * @param $year
     * @return array
     */
    public function getMonthlyContributions($child_id, $year)
    {
        $data = DB::table('contributions')
                ->select(DB::raw("SUM(contribution) as contribution, to_char(to_timestamp (date_part('month', created_at)::text, 'MM'), 'TMmon') AS month"))
                ->whereRaw('child_id = ?',[$child_id])
                ->whereRaw('EXTRACT(year FROM "created_at") = ?',[$year])
                ->groupBy(DB::raw("month"))
                ->get();
        $output = array();
        foreach($data as $obj){
            array_push($output, array(
                    'contribution' =>intval($obj->contribution),
                    'month' => $obj->month
                )
            );

        }
        return $output;
    }

    /**
     * Retrieve yearly contributions
     * @param $child_id
     * @return array
     */
    public function getYearlyContribution($child_id) {
        $data = DB::table('contributions')
            ->select(DB::raw("SUM(contribution) as contribution, extract(year from created_at) AS year"))
            ->whereRaw('child_id = ?',[$child_id])
            ->groupBy(DB::raw("year"))
            ->get();
        $output = array();
        foreach($data as $obj){
            array_push($output, array('year' =>intval($obj->year), 'contribution' => intval($obj->contribution))
            );

        }
        return $output;
    }

    /**
     * Search for child
     * @param $search
     * @return mixed
     */
    public function search($search) {
        $query= Child::query()
            ->with(['gender'])
            ->whereLike('first_name', $search)
            ->whereLike('last_name', $search)
            ->get();
        return $query;
    }
}
