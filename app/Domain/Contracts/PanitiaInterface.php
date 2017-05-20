<?php

namespace App\Domain\Contracts;

/**
 * Antarmuka PanitiaInterface.
 * @package App\Domain\Contracts
 */
interface PanitiaInterface {

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
