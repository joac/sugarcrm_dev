<?php
$$dictionary["${left}_${right}"] = array (
    'true_relationship_type' => 'many-to-many',
    'relationships' =>
    array (
        '${left}_${right}' =>
        array (
            'lhs_module' => '${left_mn}',
            'lhs_table' => '${left}',
            'lhs_key' => 'id',
            'rhs_module' => '${right_mn}',
            'rhs_table' => '${right}',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => '${left}_${right}',
            'join_key_lhs' => '${left}_id',
            'join_key_rhs' => '${right}_id',
            ),
        ),
    'table' => '${left}_${right}',
    'fields' =>
    array (

        array (
            'name' => 'id',
            'type' => 'varchar',
            'len' => 36,
            ),

        array (
            'name' => 'date_modified',
            'type' => 'datetime',
            ),

        array (
            'name' => 'deleted',
            'type' => 'bool',
            'len' => '1',
            'default' => '0',
            'required' => true,
            ),

        array (
                'name' => '${left}_id',
                'type' => 'varchar',
                'len' => 36,
              ),

        array (
                'name' => '${right}_id',
                'type' => 'varchar',
                'len' => 36,
              ),

        ),
        'indices' =>
        array (

                array (
                    'name' => '${left}_${right}spk',
                    'type' => 'primary',
                    'fields' =>
                    array (
                        'id',
                        ),
                    ),

                array (
                    'name' => '${left}_${right}_alt',
                    'type' => 'alternate_key',
                    'fields' =>
                    array (
                        '${left}_id',
                        '${right}_id',
                        ),
                    ),
              ),
        );
?>
