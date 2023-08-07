<?php

/**
 * 
 */
function get_page_dependencies($page_role, $file_type)
{
  // website files
  $project_files_archeticture = [
    // global files
    'global' => [
      'css' => [
        '1' => 'global.css',
        '2' => 'sidebar-menu.css'
      ],
      'js' => [
        '1' => 'global.js',
        '2' => 'sidebar-menu.js'
      ],
      'node' => [
        'css' => [
          '1' => 'bootstrap/dist/css/bootstrap.min.css',
          '2' => 'bootstrap-icons/font/bootstrap-icons.css',
        ],
        'js' => [
          '1' => 'jquery/dist/jquery.min.js',
          '2' => 'bootstrap/dist/js/bootstrap.bundle.min.js',
        ]
      ],
      'fonts' => [
        '1' => 'cairo.css'
      ]
    ],

    // for tables files
    'tables' => [
      'css' => [
        '1' => 'table-style.css',
      ],
      'js' => [
        '1' => 'table-behaviour.js',
      ],
      'node' => [
        'css' => [
          '1' => "datatables.net-bs5/css/dataTables.bootstrap5.min.css",
          '2' => 'datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css',
        ],
        'js' => [
          '1'   => 'jszip/dist/jszip.min.js',
          '2'   => 'pdfmake/build/pdfmake.min.js',
          '3'   => 'pdfmake/build/vfs_fonts.js',
          '4'   => 'datatables.net/js/jquery.dataTables.min.js',
          '5'   => 'datatables.net-bs5/js/dataTables.bootstrap5.min.js',
          '6'   => 'datatables.net-buttons/js/dataTables.buttons.min.js',
          '7'   => 'datatables.net-buttons/js/buttons.colVis.js',
          '8'   => 'datatables.net-buttons/js/buttons.html5.min.js',
          '9'   => 'datatables.net-buttons/js/buttons.print.min.js',
          '10'  => 'datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js',
        ]
      ],
      'fonts' => []
    ],


    // for login files
    'login' => [
      'css' => [
        '1' => 'login.css'
      ],
      'js' => [],
      'node' => [
        'css' => [],
        'js' => []
      ],
      'fonts' => []
    ],

    // for dashboard files
    'dashboard' => [
      'css' => [
        '1' => 'dashboard.css'
      ],
      'js' => [],
      'node' => [
        'css' => [],
        'js' => []
      ],
      'fonts' => []
    ],



  ];
  // returns files of the given page role
  return $project_files_archeticture[$page_role][$file_type];
}