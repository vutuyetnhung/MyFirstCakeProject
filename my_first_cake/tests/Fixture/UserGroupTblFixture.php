<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserGroupTblFixture
 *
 */
class UserGroupTblFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_group_tbl';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'user_group_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'group_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'is_leader' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '0: normal member, 1: manager, 2: sub manager', 'precision' => null, 'autoIncrement' => null],
        'create_time' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'update_time' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'delete_status' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '0: chua xoa, 1: da xoa', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['user_group_id'], 'length' => []],
            'user_group_id' => ['type' => 'unique', 'columns' => ['user_group_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'user_group_id' => '45df3acc-867a-48d7-aeb7-712d68dda977',
            'user_id' => '63e5b716-3fde-4578-b8ef-e89cb4ed43e6',
            'group_id' => '7e02b89e-53a1-458c-832d-64afe32a702b',
            'is_leader' => 1,
            'create_time' => 1512239934,
            'update_time' => 1512239934,
            'delete_status' => 1
        ],
    ];
}
