/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
    'use strict';
  
    var dtUserTable = $('.teacher-list-table'),
      newUserSidebar = $('.new-teacher-modal'),
      newUserForm = $('.add-new-teacher');
  
    var assetPath = '../../../app-assets/',
      userView = 'app-user-view.html',
      userEdit = 'app-user-edit.html';
    if ($('body').attr('data-framework') === 'laravel') {
      assetPath = $('body').attr('data-asset-path');
      userView = assetPath + 'app/user/view';
      userEdit = assetPath + 'app/user/edit';
    }
  
    // Users List datatable
    if (dtUserTable.length) {
      dtUserTable.DataTable({
        ajax: "/fetch,",
        columns: [
          { data: 'id', name: 'id' },
          { data: 'f_name', name: 'f_name' },
          { data: 'l_name', name: 'l_name' },
          { data: 'email', name: 'email' },
          { data: 'phone', name: 'phone' },
          { data: 'status', name: 'status' }
        ], 
        columns: [
          // columns according to JSON
          { data: 'responsive_id' },
          { data: 'full_name' },
          { data: 'email' },
          { data: 'role' },
          { data: 'current_plan' },
          { data: 'status' },
          { data: '' }
        ],
        columnDefs: [
          {
            // For Responsive
            className: 'control',
            orderable: false,
            responsivePriority: 2,
            targets: 0
          },
          {
            // User full name and username
            targets: 1,
            responsivePriority: 4,
            render: function (data, type, full, meta) {
              var $name = full['full_name'],
                $uname = full['username'],
                
              // Creates full output for row
              var $row_output =
                '<div class="d-flex justify-content-left align-items-center">' +
                colorClass +
                ' mr-1">' +
                $output +
                '</div>' +
                '</div>' +
                '<div class="d-flex flex-column">' +
                '<a href="' +
                userView +
                '" class="user_name text-truncate"><span class="font-weight-bold">' +
                $name +
                '</span></a>' +
                '<small class="emp_post text-muted">@' +
                $uname +
                '</small>' +
                '</div>' +
                '</div>';
              return $row_output;
            }
          },

          {
            // Actions
            targets: -1,
            title: 'Actions',
            orderable: false,
            render: function (data, type, full, meta) {
              return (
                '<div class="btn-group">' +
                  '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                  feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                  '</a>' +
                  '<div class="dropdown-menu dropdown-menu-right">' +
                    '<a href="{{ Request::root() }}/teacher-show/{{ $teacher->id }}"' +
                    userView +
                    '" class="dropdown-item">' +
                    feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) +
                    'Details</a>' +

                    '<a href="{{ Request::root() }}/teacher-edit/{{ $teacher->id }}"' +
                    userEdit +
                    '" class="dropdown-item">' +
                    feather.icons['archive'].toSvg({ class: 'font-small-4 mr-50' }) +
                    'Edit</a>' +
                    
                    '<a href="{{ url('/teacher-destroy/'.$teacher->id)}}" class="dropdown-item delete-record">' +
                    feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
                    'Delete</a></div>' +
                  '</div>' +
                '</div>'
              );
            }
          }
        ],
        order: [[2, 'desc']],
        dom:
          '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
          '<"col-lg-12 col-xl-6" l>' +
          '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
          '>t' +
          '<"d-flex justify-content-between mx-2 row mb-1"' +
          '<"col-sm-12 col-md-6"i>' +
          '<"col-sm-12 col-md-6"p>' +
          '>',
        language: {
          sLengthMenu: 'Show _MENU_',
          search: 'Search',
          searchPlaceholder: 'Search..'
        },
        // Buttons with Dropdown
        buttons: [
          {
            text: 'Add New Teacher',
            className: 'add-new btn btn-primary mt-50',
            attr: {
              'data-toggle': 'modal',
              'data-target': '#modals-slide-in'
            },
            init: function (api, node, config) {
              $(node).removeClass('btn-secondary');
            }
          }
        ],
        // For responsive popup
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function (row) {
                var data = row.data();
                return 'Details of ' + data['full_name'];
              }
            }),
            type: 'column',
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
              tableClass: 'table',
              columnDefs: [
                {
                  targets: 2,
                  visible: false
                },
                {
                  targets: 3,
                  visible: false
                }
              ]
            })
          }
        },
        language: {
          paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
          }
        },
      });
    }
  
    // Check Validity
    function checkValidity(el) {
      if (el.validate().checkForm()) {
        submitBtn.attr('disabled', false);
      } else {
        submitBtn.attr('disabled', true);
      }
    }
  
    // Form Validation
    if (newUserForm.length) {
      newUserForm.validate({
        errorClass: 'error',
        rules: {
          'user-fullname': {
            required: true
          },
          'user-name': {
            required: true
          },
          'user-email': {
            required: true
          }
        }
      });
    }
  
    // To initialize tooltip with body container
    $('body').tooltip({
      selector: '[data-toggle="tooltip"]',
      container: 'body'
    });
  });
  