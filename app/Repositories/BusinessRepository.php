<?php


namespace App\Repositories;


use App\Models\Business;
use Illuminate\Support\Facades\Auth;

class BusinessRepository implements BusinessRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        $businesses = Business::with('user')->where('user_id', Auth::id())->get();

        return $businesses;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function read($id)
    {
        return Business::find($id);
    }

    /**
     * @param array $input
     */
    public function store(array $input)
    {
        $input['user_id'] = Auth::id();

        return Business::create($input);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return Business::find($id)->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return Business::destroy($id);
    }
}
