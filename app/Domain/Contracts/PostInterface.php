<?php

namespace App\Domain\Contracts;

/**
 * Antarmuka PostInterface.
 * @package App\Domain\Contracts
 */
interface PostInterface {

    /**
     * @param int $limit
     * @param int $page
     * @param array $column
     * @param $field
     * @param string $search
     * @return mixed
     */
    public function paginate($limit = 10, $page = 1, array $column, $field, $search = '');

}
