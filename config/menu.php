<?php

return[
    [
        'name' => 'Dashboard',
        'icon' => 'fa-home',
        'route' => 'admin.index'
    ],[
        'name' => 'QL. Danh Mục',
        'icon' => 'fa-file-word-o',
        'route' => 'category.index',
        'items' => [
            [
                'name' => 'Danh sách',
                'icon' => 'fa-home',
                'route' => 'category.index'
            ],
            [
                'name' => 'Thêm mới',
                'icon' => 'fa-home',
                'route' => 'category.create'
            ]
        ]
            ],[
                'name' => 'QL. Sản Phẩm',
                'icon' => 'fa-image',
                'route' => 'product.index',
                'items' => [
                    [
                        'name' => 'Danh sách',
                        'icon' => 'fa-circle-o',
                        'route' => 'product.index'
                    ],
                    [
                        'name' =>'Thêm mới',
                        'icon' => 'fa-circle-o',
                        'route' => 'product.create'
                    ]
                ]
                    ],[
                        'name' => 'QL. Banner',
                        'icon' => 'fa-image',
                        'route' => 'banner.index',
                        'items' => [
                        [
                            'name' => 'Danh sách',
                            'icon' => 'fa-circle-o',
                            'route' => 'banner.index'
                        ],
                        [
                            'name' => 'Thêm mới',
                            'icon' => 'fa-circle-o',
                            'route' => 'banner.create'
                        ]
                    ]
                        ],[
                            'name' => 'QL. Admin',
                            'icon' => 'fa-user',
                            'route' => 'account.index',
                            'items' => [

                            [ 'name' => 'Danh sách',
                                'icon' => 'fa-circle-o',
                                'route' => 'account.index'
                            ],
                            [
                                'name' => 'Thêm mới',
                                'icon' => 'fa-circle-o',
                                'route' => 'account.create'
                            ]
                        ]
        ]
];


?>
