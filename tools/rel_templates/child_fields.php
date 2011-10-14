
#Generador Automatico de Relaciones
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
        ),
        
        '${parent}_link' => array (
            'name' => '${parent}_link',
            'type' => 'link',
            'relationship' => '${parent}_${child}',
            'link_type'=>'one',
            'side'=>'right',
            'source'=>'non-db',
        ),
#Fin Generador Automático de Relaciones
        
