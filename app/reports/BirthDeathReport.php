<?php
/**
 * Created by PhpStorm.
 * User: Chamamme
 * Date: 6/3/2018
 * Time: 8:17 AM
 */

namespace App\Reports;


use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class BirthDeathReport implements  FromView
{

    public function __construct(Collection $collection)
    {
        $this->data = $collection;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        // TODO: Implement collection() method.
        return  view('members.report',['result'=>$this->data]) ;
    }
}