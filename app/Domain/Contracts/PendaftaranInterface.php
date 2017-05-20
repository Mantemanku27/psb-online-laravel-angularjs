<?php

namespace App\Domain\Contracts;

/**
 * Antarmuka PendaftaranInterface.
 * @package App\Domain\Contracts
 */
interface PendaftaranInterface {

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
