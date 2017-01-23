<?php

namespace App\Increase\Repository;

use Exception;
use App\Increase\Models\Users;

class UsersRepository
{
    public function __construct(
        Users $model
    ) {
        $this->model = $model;
    }

    /**
     * All roles
     * @return \Illuminate\Support\Collection|null|static|Role
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a role
     * @param  integer $id
     * @return \Illuminate\Support\Collection|null|static|Role
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a role
     *
     * @param  array $input
     * @return Role
     */
    public function create($input,$request)
    {
        $input['password'] = bcrypt($input['password']);
        if ($request->hasFile('photo')) {
            $input['photo'] = (new \ImageUpload($request['photo']))->uploadImageParameter();
        }
        return $this->model->create($input);
    }

    /**
     * Update a role
     *
     * @param  int $id
     * @param  array $input
     * @return boolean
     */
    public function update($id, $input,$request)
    {
        if ($request->hasFile('photo')) {
            $input['photo'] = (new \ImageUpload($request['photo']))->uploadImageParameter();
        }

        if(isset($input['password']) && $input['password'] != "")
            $input['password'] = bcrypt($input['password']);

        $role = $this->model->find($id);
        $role->update($input);

        return $role;
    }

    /**
     * Destroy the role
     *
     * @param  int $id
     * @return bool
     */
    public function destroy($id)
    {
        try {
            $result = $this->model->find($id)->delete();

            return $result;
        } catch (Exception $e) {
            throw new Exception("We were unable to delete this role", 1);
        }

        return $result;
    }
}
