<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.auth.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.auth.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.pages.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/credentials' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.pages.credentials',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.pages.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.pages.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/stock-management' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.pages.stock-management',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/transfer-money' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.pages.transfer-money',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.categories.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/clients/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.clients.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/earnings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.earnings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/exchange-rates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.exchange-rates.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/exchange-rates/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.exchange-rates.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/losses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.losses.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/losses/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.losses.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.orders.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/orders/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.orders.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.permissions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.permissions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/products' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.products.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/products/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.products.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.roles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.roles.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.sales.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sales/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.sales.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/stock-hubs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.stock-hubs.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/stock-hubs/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.stock-hubs.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/stocks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.stocks.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/stocks/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.stocks.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/suppliers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.suppliers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/suppliers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.suppliers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/transit-receipts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.transit-receipts.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/transit-receipts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.transit-receipts.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/wallets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.wallets.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/wallets/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.wallets.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ezN0YbIDSibAsOE1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.min.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3WcGDaq8jv5LJKbs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jxKF1nxqLewF5QfZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZKfIAdfTBV6fOzQh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nWag9NoTVMpogPbc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/filament/(?|exports/([^/]++)/download(*:45)|imports/([^/]++)/failed\\-rows/download(*:90))|/admin/(?|c(?|ategories/([^/]++)/edit(*:135)|lients/([^/]++)/edit(*:163))|e(?|arnings/([^/]++)(*:192)|xchange\\-rates/([^/]++)/edit(*:228))|losses/([^/]++)(?|(*:255)|/edit(*:268))|orders/([^/]++)(?|(*:295)|/edit(*:308))|p(?|ermissions/([^/]++)/edit(*:345)|roducts/([^/]++)(?|(*:372)|/edit(*:385)))|roles/([^/]++)/edit(*:414)|s(?|ales/([^/]++)(?|(*:442)|/edit(*:455))|tock(?|\\-hubs/([^/]++)/edit(*:491)|s/([^/]++)/edit(*:514))|uppliers/([^/]++)/edit(*:545))|transit\\-receipts/([^/]++)/edit(*:585)|users/([^/]++)/edit(*:612)|wallets/([^/]++)/edit(*:641))|/livewire/preview\\-file/([^/]++)(*:682))/?$}sDu',
    ),
    3 => 
    array (
      45 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.exports.download',
          ),
          1 => 
          array (
            0 => 'export',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      90 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.imports.failed-rows.download',
          ),
          1 => 
          array (
            0 => 'import',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      135 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.categories.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      163 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.clients.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      192 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.earnings.view',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      228 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.exchange-rates.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.losses.view',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      268 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.losses.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      295 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.orders.view',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      308 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.orders.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      345 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.permissions.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      372 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.products.view',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      385 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.products.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      414 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.roles.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      442 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.sales.view',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.sales.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      491 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.stock-hubs.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      514 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.stocks.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      545 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.suppliers.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      585 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.transit-receipts.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.users.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      641 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.admin.resources.wallets.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      682 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.preview-file',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'filament.exports.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'filament/exports/{export}/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'filament.actions',
        ),
        'uses' => 'Filament\\Actions\\Exports\\Http\\Controllers\\DownloadExport@__invoke',
        'controller' => 'Filament\\Actions\\Exports\\Http\\Controllers\\DownloadExport',
        'as' => 'filament.exports.download',
        'namespace' => NULL,
        'prefix' => 'filament',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.imports.failed-rows.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'filament/imports/{import}/failed-rows/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'filament.actions',
        ),
        'uses' => 'Filament\\Actions\\Imports\\Http\\Controllers\\DownloadImportFailureCsv@__invoke',
        'controller' => 'Filament\\Actions\\Imports\\Http\\Controllers\\DownloadImportFailureCsv',
        'as' => 'filament.imports.failed-rows.download',
        'namespace' => NULL,
        'prefix' => 'filament',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.auth.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
        ),
        'uses' => 'Filament\\Pages\\Auth\\Login@__invoke',
        'controller' => 'Filament\\Pages\\Auth\\Login',
        'as' => 'filament.admin.auth.login',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/logout',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'Filament\\Http\\Controllers\\Auth\\LogoutController@__invoke',
        'controller' => 'Filament\\Http\\Controllers\\Auth\\LogoutController',
        'as' => 'filament.admin.auth.logout',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.pages.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Pages\\Dashboard@__invoke',
        'controller' => 'App\\Filament\\Pages\\Dashboard',
        'as' => 'filament.admin.pages.dashboard',
        'namespace' => NULL,
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.pages.credentials' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/credentials',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Pages\\Credentials@__invoke',
        'controller' => 'App\\Filament\\Pages\\Credentials',
        'as' => 'filament.admin.pages.credentials',
        'namespace' => NULL,
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.pages.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/profile',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Pages\\Profile@__invoke',
        'controller' => 'App\\Filament\\Pages\\Profile',
        'as' => 'filament.admin.pages.profile',
        'namespace' => NULL,
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.pages.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Pages\\Settings@__invoke',
        'controller' => 'App\\Filament\\Pages\\Settings',
        'as' => 'filament.admin.pages.settings',
        'namespace' => NULL,
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.pages.stock-management' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stock-management',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Pages\\StockManagement@__invoke',
        'controller' => 'App\\Filament\\Pages\\StockManagement',
        'as' => 'filament.admin.pages.stock-management',
        'namespace' => NULL,
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.pages.transfer-money' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/transfer-money',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Pages\\TransferMoney@__invoke',
        'controller' => 'App\\Filament\\Pages\\TransferMoney',
        'as' => 'filament.admin.pages.transfer-money',
        'namespace' => NULL,
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.categories.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/categories',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories@__invoke',
        'controller' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories',
        'as' => 'filament.admin.resources.categories.index',
        'namespace' => NULL,
        'prefix' => 'admin/categories',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.categories.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/categories/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory@__invoke',
        'controller' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory',
        'as' => 'filament.admin.resources.categories.create',
        'namespace' => NULL,
        'prefix' => 'admin/categories',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.categories.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/categories/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory@__invoke',
        'controller' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory',
        'as' => 'filament.admin.resources.categories.edit',
        'namespace' => NULL,
        'prefix' => 'admin/categories',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/clients',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ClientResource\\Pages\\ListClients@__invoke',
        'controller' => 'App\\Filament\\Resources\\ClientResource\\Pages\\ListClients',
        'as' => 'filament.admin.resources.clients.index',
        'namespace' => NULL,
        'prefix' => 'admin/clients',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.clients.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/clients/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ClientResource\\Pages\\CreateClient@__invoke',
        'controller' => 'App\\Filament\\Resources\\ClientResource\\Pages\\CreateClient',
        'as' => 'filament.admin.resources.clients.create',
        'namespace' => NULL,
        'prefix' => 'admin/clients',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.clients.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/clients/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ClientResource\\Pages\\EditClient@__invoke',
        'controller' => 'App\\Filament\\Resources\\ClientResource\\Pages\\EditClient',
        'as' => 'filament.admin.resources.clients.edit',
        'namespace' => NULL,
        'prefix' => 'admin/clients',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.earnings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/earnings',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\EarningResource\\Pages\\ListEarnings@__invoke',
        'controller' => 'App\\Filament\\Resources\\EarningResource\\Pages\\ListEarnings',
        'as' => 'filament.admin.resources.earnings.index',
        'namespace' => NULL,
        'prefix' => 'admin/earnings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.earnings.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/earnings/{record}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\EarningResource\\Pages\\ViewEarning@__invoke',
        'controller' => 'App\\Filament\\Resources\\EarningResource\\Pages\\ViewEarning',
        'as' => 'filament.admin.resources.earnings.view',
        'namespace' => NULL,
        'prefix' => 'admin/earnings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.exchange-rates.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exchange-rates',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ExchangeRateResource\\Pages\\ListExchangeRates@__invoke',
        'controller' => 'App\\Filament\\Resources\\ExchangeRateResource\\Pages\\ListExchangeRates',
        'as' => 'filament.admin.resources.exchange-rates.index',
        'namespace' => NULL,
        'prefix' => 'admin/exchange-rates',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.exchange-rates.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exchange-rates/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ExchangeRateResource\\Pages\\CreateExchangeRate@__invoke',
        'controller' => 'App\\Filament\\Resources\\ExchangeRateResource\\Pages\\CreateExchangeRate',
        'as' => 'filament.admin.resources.exchange-rates.create',
        'namespace' => NULL,
        'prefix' => 'admin/exchange-rates',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.exchange-rates.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/exchange-rates/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ExchangeRateResource\\Pages\\EditExchangeRate@__invoke',
        'controller' => 'App\\Filament\\Resources\\ExchangeRateResource\\Pages\\EditExchangeRate',
        'as' => 'filament.admin.resources.exchange-rates.edit',
        'namespace' => NULL,
        'prefix' => 'admin/exchange-rates',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.losses.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/losses',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\LossResource\\Pages\\ListLosses@__invoke',
        'controller' => 'App\\Filament\\Resources\\LossResource\\Pages\\ListLosses',
        'as' => 'filament.admin.resources.losses.index',
        'namespace' => NULL,
        'prefix' => 'admin/losses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.losses.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/losses/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\LossResource\\Pages\\CreateLoss@__invoke',
        'controller' => 'App\\Filament\\Resources\\LossResource\\Pages\\CreateLoss',
        'as' => 'filament.admin.resources.losses.create',
        'namespace' => NULL,
        'prefix' => 'admin/losses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.losses.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/losses/{record}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\LossResource\\Pages\\ViewLoss@__invoke',
        'controller' => 'App\\Filament\\Resources\\LossResource\\Pages\\ViewLoss',
        'as' => 'filament.admin.resources.losses.view',
        'namespace' => NULL,
        'prefix' => 'admin/losses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.losses.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/losses/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\LossResource\\Pages\\EditLoss@__invoke',
        'controller' => 'App\\Filament\\Resources\\LossResource\\Pages\\EditLoss',
        'as' => 'filament.admin.resources.losses.edit',
        'namespace' => NULL,
        'prefix' => 'admin/losses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.orders.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\OrderResource\\Pages\\ListOrders@__invoke',
        'controller' => 'App\\Filament\\Resources\\OrderResource\\Pages\\ListOrders',
        'as' => 'filament.admin.resources.orders.index',
        'namespace' => NULL,
        'prefix' => 'admin/orders',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.orders.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\OrderResource\\Pages\\CreateOrder@__invoke',
        'controller' => 'App\\Filament\\Resources\\OrderResource\\Pages\\CreateOrder',
        'as' => 'filament.admin.resources.orders.create',
        'namespace' => NULL,
        'prefix' => 'admin/orders',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.orders.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders/{record}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\OrderResource\\Pages\\ViewOrder@__invoke',
        'controller' => 'App\\Filament\\Resources\\OrderResource\\Pages\\ViewOrder',
        'as' => 'filament.admin.resources.orders.view',
        'namespace' => NULL,
        'prefix' => 'admin/orders',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.orders.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\OrderResource\\Pages\\EditOrder@__invoke',
        'controller' => 'App\\Filament\\Resources\\OrderResource\\Pages\\EditOrder',
        'as' => 'filament.admin.resources.orders.edit',
        'namespace' => NULL,
        'prefix' => 'admin/orders',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions@__invoke',
        'controller' => 'App\\Filament\\Resources\\PermissionResource\\Pages\\ListPermissions',
        'as' => 'filament.admin.resources.permissions.index',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.permissions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\PermissionResource\\Pages\\CreatePermission@__invoke',
        'controller' => 'App\\Filament\\Resources\\PermissionResource\\Pages\\CreatePermission',
        'as' => 'filament.admin.resources.permissions.create',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.permissions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\PermissionResource\\Pages\\EditPermission@__invoke',
        'controller' => 'App\\Filament\\Resources\\PermissionResource\\Pages\\EditPermission',
        'as' => 'filament.admin.resources.permissions.edit',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.products.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/products',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ProductResource\\Pages\\ListProducts@__invoke',
        'controller' => 'App\\Filament\\Resources\\ProductResource\\Pages\\ListProducts',
        'as' => 'filament.admin.resources.products.index',
        'namespace' => NULL,
        'prefix' => 'admin/products',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.products.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/products/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ProductResource\\Pages\\CreateProduct@__invoke',
        'controller' => 'App\\Filament\\Resources\\ProductResource\\Pages\\CreateProduct',
        'as' => 'filament.admin.resources.products.create',
        'namespace' => NULL,
        'prefix' => 'admin/products',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.products.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/products/{record}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ProductResource\\Pages\\ViewProduct@__invoke',
        'controller' => 'App\\Filament\\Resources\\ProductResource\\Pages\\ViewProduct',
        'as' => 'filament.admin.resources.products.view',
        'namespace' => NULL,
        'prefix' => 'admin/products',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.products.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/products/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\ProductResource\\Pages\\EditProduct@__invoke',
        'controller' => 'App\\Filament\\Resources\\ProductResource\\Pages\\EditProduct',
        'as' => 'filament.admin.resources.products.edit',
        'namespace' => NULL,
        'prefix' => 'admin/products',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\RoleResource\\Pages\\ListRoles@__invoke',
        'controller' => 'App\\Filament\\Resources\\RoleResource\\Pages\\ListRoles',
        'as' => 'filament.admin.resources.roles.index',
        'namespace' => NULL,
        'prefix' => 'admin/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.roles.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\RoleResource\\Pages\\CreateRole@__invoke',
        'controller' => 'App\\Filament\\Resources\\RoleResource\\Pages\\CreateRole',
        'as' => 'filament.admin.resources.roles.create',
        'namespace' => NULL,
        'prefix' => 'admin/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.roles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\RoleResource\\Pages\\EditRole@__invoke',
        'controller' => 'App\\Filament\\Resources\\RoleResource\\Pages\\EditRole',
        'as' => 'filament.admin.resources.roles.edit',
        'namespace' => NULL,
        'prefix' => 'admin/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.sales.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sales',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SaleResource\\Pages\\ListSales@__invoke',
        'controller' => 'App\\Filament\\Resources\\SaleResource\\Pages\\ListSales',
        'as' => 'filament.admin.resources.sales.index',
        'namespace' => NULL,
        'prefix' => 'admin/sales',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.sales.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sales/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SaleResource\\Pages\\CreateSale@__invoke',
        'controller' => 'App\\Filament\\Resources\\SaleResource\\Pages\\CreateSale',
        'as' => 'filament.admin.resources.sales.create',
        'namespace' => NULL,
        'prefix' => 'admin/sales',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.sales.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sales/{record}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SaleResource\\Pages\\ViewSale@__invoke',
        'controller' => 'App\\Filament\\Resources\\SaleResource\\Pages\\ViewSale',
        'as' => 'filament.admin.resources.sales.view',
        'namespace' => NULL,
        'prefix' => 'admin/sales',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.sales.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sales/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SaleResource\\Pages\\EditSale@__invoke',
        'controller' => 'App\\Filament\\Resources\\SaleResource\\Pages\\EditSale',
        'as' => 'filament.admin.resources.sales.edit',
        'namespace' => NULL,
        'prefix' => 'admin/sales',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.stock-hubs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stock-hubs',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\StockHubResource\\Pages\\ListStockHubs@__invoke',
        'controller' => 'App\\Filament\\Resources\\StockHubResource\\Pages\\ListStockHubs',
        'as' => 'filament.admin.resources.stock-hubs.index',
        'namespace' => NULL,
        'prefix' => 'admin/stock-hubs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.stock-hubs.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stock-hubs/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\StockHubResource\\Pages\\CreateStockHub@__invoke',
        'controller' => 'App\\Filament\\Resources\\StockHubResource\\Pages\\CreateStockHub',
        'as' => 'filament.admin.resources.stock-hubs.create',
        'namespace' => NULL,
        'prefix' => 'admin/stock-hubs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.stock-hubs.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stock-hubs/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\StockHubResource\\Pages\\EditStockHub@__invoke',
        'controller' => 'App\\Filament\\Resources\\StockHubResource\\Pages\\EditStockHub',
        'as' => 'filament.admin.resources.stock-hubs.edit',
        'namespace' => NULL,
        'prefix' => 'admin/stock-hubs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.stocks.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stocks',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\StockResource\\Pages\\ListStocks@__invoke',
        'controller' => 'App\\Filament\\Resources\\StockResource\\Pages\\ListStocks',
        'as' => 'filament.admin.resources.stocks.index',
        'namespace' => NULL,
        'prefix' => 'admin/stocks',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.stocks.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stocks/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\StockResource\\Pages\\CreateStock@__invoke',
        'controller' => 'App\\Filament\\Resources\\StockResource\\Pages\\CreateStock',
        'as' => 'filament.admin.resources.stocks.create',
        'namespace' => NULL,
        'prefix' => 'admin/stocks',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.stocks.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/stocks/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\StockResource\\Pages\\EditStock@__invoke',
        'controller' => 'App\\Filament\\Resources\\StockResource\\Pages\\EditStock',
        'as' => 'filament.admin.resources.stocks.edit',
        'namespace' => NULL,
        'prefix' => 'admin/stocks',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.suppliers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/suppliers',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SupplierResource\\Pages\\ListSuppliers@__invoke',
        'controller' => 'App\\Filament\\Resources\\SupplierResource\\Pages\\ListSuppliers',
        'as' => 'filament.admin.resources.suppliers.index',
        'namespace' => NULL,
        'prefix' => 'admin/suppliers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.suppliers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/suppliers/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SupplierResource\\Pages\\CreateSupplier@__invoke',
        'controller' => 'App\\Filament\\Resources\\SupplierResource\\Pages\\CreateSupplier',
        'as' => 'filament.admin.resources.suppliers.create',
        'namespace' => NULL,
        'prefix' => 'admin/suppliers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.suppliers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/suppliers/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\SupplierResource\\Pages\\EditSupplier@__invoke',
        'controller' => 'App\\Filament\\Resources\\SupplierResource\\Pages\\EditSupplier',
        'as' => 'filament.admin.resources.suppliers.edit',
        'namespace' => NULL,
        'prefix' => 'admin/suppliers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.transit-receipts.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/transit-receipts',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\TransitReceiptResource\\Pages\\ListTransitReceipts@__invoke',
        'controller' => 'App\\Filament\\Resources\\TransitReceiptResource\\Pages\\ListTransitReceipts',
        'as' => 'filament.admin.resources.transit-receipts.index',
        'namespace' => NULL,
        'prefix' => 'admin/transit-receipts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.transit-receipts.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/transit-receipts/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\TransitReceiptResource\\Pages\\CreateTransitReceipt@__invoke',
        'controller' => 'App\\Filament\\Resources\\TransitReceiptResource\\Pages\\CreateTransitReceipt',
        'as' => 'filament.admin.resources.transit-receipts.create',
        'namespace' => NULL,
        'prefix' => 'admin/transit-receipts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.transit-receipts.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/transit-receipts/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\TransitReceiptResource\\Pages\\EditTransitReceipt@__invoke',
        'controller' => 'App\\Filament\\Resources\\TransitReceiptResource\\Pages\\EditTransitReceipt',
        'as' => 'filament.admin.resources.transit-receipts.edit',
        'namespace' => NULL,
        'prefix' => 'admin/transit-receipts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\UserResource\\Pages\\ListUsers@__invoke',
        'controller' => 'App\\Filament\\Resources\\UserResource\\Pages\\ListUsers',
        'as' => 'filament.admin.resources.users.index',
        'namespace' => NULL,
        'prefix' => 'admin/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\UserResource\\Pages\\CreateUser@__invoke',
        'controller' => 'App\\Filament\\Resources\\UserResource\\Pages\\CreateUser',
        'as' => 'filament.admin.resources.users.create',
        'namespace' => NULL,
        'prefix' => 'admin/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\UserResource\\Pages\\EditUser@__invoke',
        'controller' => 'App\\Filament\\Resources\\UserResource\\Pages\\EditUser',
        'as' => 'filament.admin.resources.users.edit',
        'namespace' => NULL,
        'prefix' => 'admin/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.wallets.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/wallets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\WalletResource\\Pages\\ListWallets@__invoke',
        'controller' => 'App\\Filament\\Resources\\WalletResource\\Pages\\ListWallets',
        'as' => 'filament.admin.resources.wallets.index',
        'namespace' => NULL,
        'prefix' => 'admin/wallets',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.wallets.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/wallets/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\WalletResource\\Pages\\CreateWallet@__invoke',
        'controller' => 'App\\Filament\\Resources\\WalletResource\\Pages\\CreateWallet',
        'as' => 'filament.admin.resources.wallets.create',
        'namespace' => NULL,
        'prefix' => 'admin/wallets',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.admin.resources.wallets.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/wallets/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'panel:admin',
          1 => 'panel:admin',
          2 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          3 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          4 => 'Illuminate\\Session\\Middleware\\StartSession',
          5 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          6 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          7 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'BezhanSalleh\\FilamentLanguageSwitch\\Http\\Middleware\\SwitchLanguageLocale',
          11 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          12 => 'App\\Http\\Middleware\\SetLocale',
          13 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Resources\\WalletResource\\Pages\\EditWallet@__invoke',
        'controller' => 'App\\Filament\\Resources\\WalletResource\\Pages\\EditWallet',
        'as' => 'filament.admin.resources.wallets.edit',
        'namespace' => NULL,
        'prefix' => 'admin/wallets',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/update',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'controller' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'livewire.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ezN0YbIDSibAsOE1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'as' => 'generated::ezN0YbIDSibAsOE1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3WcGDaq8jv5LJKbs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.min.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'as' => 'generated::3WcGDaq8jv5LJKbs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/upload-file',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'as' => 'livewire.upload-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.preview-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/preview-file/{filename}',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'as' => 'livewire.preview-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jxKF1nxqLewF5QfZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e050000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::jxKF1nxqLewF5QfZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZKfIAdfTBV6fOzQh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'up',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:826:"function () {
                    $exception = null;

                    try {
                        \\Illuminate\\Support\\Facades\\Event::dispatch(new \\Illuminate\\Foundation\\Events\\DiagnosingHealth);
                    } catch (\\Throwable $e) {
                        if (app()->hasDebugModeEnabled()) {
                            throw $e;
                        }

                        report($e);

                        $exception = $e->getMessage();
                    }

                    return response(\\Illuminate\\Support\\Facades\\View::file(\'/Users/p3f/www/out-workspace/PSM/vendor/laravel/framework/src/Illuminate/Foundation/Configuration\'.\'/../resources/health-up.blade.php\', [
                        \'exception\' => $exception,
                    ]), status: $exception ? 500 : 200);
                }";s:5:"scope";s:54:"Illuminate\\Foundation\\Configuration\\ApplicationBuilder";s:4:"this";N;s:4:"self";s:32:"0000000000000df00000000000000000";}}',
        'as' => 'generated::ZKfIAdfTBV6fOzQh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nWag9NoTVMpogPbc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
    return \\redirect(\'/admin\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e0a0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nWag9NoTVMpogPbc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
