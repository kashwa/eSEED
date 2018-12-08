<?php
/**
 * Created by PhpStorm.
 * User: aabed
 * Date: 12/8/18
 * Time: 9:56 AM
 */

namespace App\Http\Repository;

use App\Employee;
use App\Http\Interfaces\EmpRepoInterface;
use App\Http\Interfaces\query;

class EmployeeRepository implements EmpRepoInterface{

    protected $emp;
    public function __construct(Employee $emp)
    {
        $this->emp = $emp;
    }

    /**
     * Get all employees from model.
     *
     * @return query_result
     */
    public function getAllEmployees()
    {
        //  Employee::where('name', 'aabed')->get()
        return $this->emp->all();
    }
}
