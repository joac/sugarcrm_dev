<?php
    "${left}_${right}" => array (
      'order' => 100,
      'module' => '${right_mn}',
      'subpanel_name' => 'default',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'title_key' => 'LBL_${RIGHT}_SUBPANEL_TITLE',
      'get_subpanel_data' => '${right}',
      'top_buttons' =>
      array (
        0 =>
        array (
          'widget_class' => 'SubPanelTopCreateButton',
        ),
        1 =>
        array (
          'widget_class' => 'SubPanelTopSelectButton',
          'popup_module' => '${right_mn}',
          'mode' => 'MultiSelect',
        ),
      ),
    ),

?>
