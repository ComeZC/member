<?php
/**
 * This file is part of Notadd.
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-11-02 10:24
 */
namespace Notadd\Member;

use Notadd\Foundation\Member\Abstracts\Manager as AbstractManager;
use Notadd\Member\Models\Member;

/**
 * Class Manager
 * @package Notadd\Member
 */
class Manager extends AbstractManager
{
    /**
     * @param int $id
     * @param bool $force
     * @return mixed
     */
    public function delete(int $id, $force = false)
    {
        $member = Member::query()->find($id);
        if ($member) {
            return $force ? $member->forceDelete() : $member->delete();
        } else {
            return false;
        }
    }
    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return Member::query()->find($id);
    }
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return Member::create($data);
    }
    /**
     * @param int $id
     * @param array $data
     * @param bool $force
     * @return mixed
     */
    public function update(int $id, array $data, $force = false)
    {
        $member = Member::query()->find($id);
        if ($member) {
            return $force ? $member->updateOrCreate($data) : $member->update($data);
        } else {
            return false;
        }
    }
}
