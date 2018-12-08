<?php
/**
 * Created by PhpStorm.
 * User: aabed
 * Date: 12/8/18
 * Time: 9:56 AM
 */

namespace App\Http\Interfaces;

interface EmpRepoInterface {

    /**
     * Get all employees from model.
     *
     * @return query_result
     */
    public function getAllEmployees();
}
