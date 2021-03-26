<?php


namespace App\repositories;


interface BusinessRepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function read($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);
}
