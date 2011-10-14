// En el subpanel defs del modulo padre

<?php

#en el archivo subpaneldefs del modulo ${parentmn}

'${child}' => array (
    'order' => 99, // number to set appearance order if many subpanels
    'module' => '${childmn}',
    'subpanel_name' => 'default',
    'sort_order' => 'asc',
    'sort_by' => 'id',
    'title_key' => 'LBL_${CHILD}_SUBPANEL_TITLE',
    'get_subpanel_data' => '${child}', // link field name from parent
),

# en el vardefs del modulo ${parentmn}, dentro de relationships

'${parent}_${child}' => array(
    'lhs_module' => '${parentmn}',
    'lhs_table' => '${parent}',
    'lhs_key' => 'id',
    'rhs_module' => '${childmn}',
    'rhs_table' => '${child}',
    'rhs_key' => '${parentdl}_id',
    'relationship_type' => 'one-to-many'
),

# en el vardes del modulo ${parentmn}, dentro de fields


'${child}' => array (
    'name' => '${child}',
    'type' => 'link',
    'relationship' => '${parent}_${child}',
    'source'=>'non-db',
    'side' => 'right',
),


# en el vardefs de ${childmn} dentro de fields

'${parentdl}_id' => array (
    'name' => '${parentdl}_id',
    'type' => 'id',
    'len' => 36,
),

'${parentdl}_name' => array (
    'source' => 'non-db',
    'name' => '${parentdl}_name',
    'vname' => 'LBL_${PARENTDL}_NAME',
    'type' => 'relate',
    'len' => '255',
    'id_name' => '${parentdl}_id',
    'module' => '${parentmn}',
    'link'=>'${parent}_link',
    'join_name'=>'${parent}',
    'rname' => 'name',
    #uncomment following to create field when ${parentdl}_name a combined field
    
    /*
    'table' => '${parent}',
    'db_concat_fields' =>
    array (
    0 => 'first_name',
    1 => 'last_name',
    ),
    */
),

'${parent}_link' => array (
    'name' => '${parent}_link',
    'type' => 'link',
    'relationship' => '${parent}_${child}',
    'link_type'=>'one',
    'side'=>'right',
    'source'=>'non-db',
),

# En el vardefs del modulo ${childmn} dentro de indices

'indices' => array(
	array(
        'name' =>'${parentdl}_id',
        'type' =>'index',
        'fields'=>array('${parentdl}_id')
    ),
),
