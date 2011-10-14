<?php
    "${left}_${right}" => array (
      'order' => 100,
      'module' => '${left_mn}',
      'subpanel_name' => 'default',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'title_key' => 'LBL_${LEFT}_SUBPANEL_TITLE',
      'get_subpanel_data' => '${left}',
      'top_buttons' =>
      array (
        0 =>
        array (
          'widget_class' => 'SubPanelTopCreateButton',
        ),
        1 =>
        array (
          'widget_class' => 'SubPanelTopSelectButton',
          'popup_module' => '${left_mn}',
          'mode' => 'MultiSelect',
        ),
      ),
    ),

?>
