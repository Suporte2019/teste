<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'ProSIM Web',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b></b>ProSIM',

    'logo_mini' => '<b>B</b>I',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'wsim',

    'logout_url' => 'logout',
    

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
                    
                    'MENU',
                    
                    [
                        'text'    => 'ADM',
                        'icon'    => 'bank',
                        'can'     => 'Painel',
                        'submenu' => [
                            [
                                'text' => 'Permissões',
                                'icon' => 'file-o',
                                'url'  => 'permissao',
                                'can'  => 'Painel',
                            ],

                            [
                                'text' => 'Grupos',
                                'icon' => 'users',
                                'url'  => 'grupo',
                                'can'  => 'Painel',
                            ],
                            [
                                'text' => 'Usuários',
                                'icon' => 'user',
                                'url'  => 'usuario',
                                'can'  => 'Painel',
                            ],

                            
                            [
                                'text' => 'Empresa',
                                'icon' => 'building',
                                'url'  => 'empresa',
                                'can'  => 'Painel',
                            ],
[
                                'text' => 'Empresa x Usuário',
                                'icon' => 'random',
                                'url'  => 'emp_user',
                                'can'  => 'Painel',
                            ],
                             [
                                'text' => 'Troca Empresa',
                                'icon' => 'cog',
                                'url'  => 'trocaempresa/lista',
                                'can'  => 'Painel',
                            ],
                            [
                                'text' => 'PHP info',
                                'icon' => 'code',
                                'url'  => 'phpinfo',
                                'can'  => 'Painel',
                            ],        

                            [
                            'text'        => 'Importar dados',
                            'url'         => 'importar/dados',
                            'icon'        => 'user',
                            'label_color' => 'success',
                            //'can'         => 'Painel',
                             ],
                            
                            
                                          ],
                    ],

                    [
                        'text'    => 'BI',
                        'icon'    => 'bar-chart',
                        'can'     => 'Painel',
                        'submenu' => [

                    [
                        'text'    => 'Cadastros',
                        'icon'    => 'share',
                        'submenu' => [
                            [
                                'text' => 'Categoria',
                                'url'  => 'categoria',
                                'can'  => 'Categoria',
                                
                            ],
                            [
                                'text' => 'Condição Pagamento',
                                'icon' => 'money',
                                'url'  => 'condpagto',
                            ],
                            [
                                'text' => 'Estabelecimento',
                                'icon' => 'bank',
                                'url'  => 'estabelecimento',
                            ],
                            [
                                'text' => 'Pessoa',
                                'icon' => 'male',
                                'url'  => 'pessoa',
                            ],
                            [
                                'text' => 'Relacionados a Produto',
                                'url'  => 'share',
                            'submenu' => [
                                [
                                'text' => 'Grupo de Produto',
                                'icon' => 'sitemap',
                                'url'  => 'produtogrupo',
                                ],
                                [
                                'text' => 'Nível do Plano',
                                'url'  => 'produtoplanonivel',
                                ],
                                [
                                'text' => 'Plano Produto',
                                'url'  => 'produtoplano',
                                ], 
                                [
                                'text' => 'Produto',
                                'icon' => 'product-hunt',
                                'url'  => 'produto',
                                ], 
                                [
                                'text' => 'Unidade Produto',
                                'url'  => 'produtounidade',
                                ],       
                                          ],

                            ],
                            
                                   
                            [
                                'text' => 'Região',
                                'icon' => 'globe',
                                'url'  => 'regiao',
                            ],
                            [
                                'text' => 'Regional',
                                'icon' => 'globe',
                                'url'  => 'regional',
                            ],
                            [
                                'text' => 'Vendedor Tipo',
                                'url'  => 'vendedortipo',
                            ],
                            [
                                'text' => 'Vendedor',
                                'icon' => 'male',
                                'url'  => 'vendedor',
                            ],
                   
                                      ], /* Fecha submenu Cadastro - BI */
                    
                    ], /* Fecha Cadastro - BI */

                        [
                        'text'    => 'Tarefas',
                        'icon'    => 'share',
                        'submenu' => [
                            [
                                'text' => 'Importar Faturamento',
                                'icon' => 'male',
                                'url'  => 'ImportarFaturamento',
                            ],
                            [
                                'text' => 'Classificar Produtos',
                                'icon' => 'male',
                                'url'  => 'ClassificarProdutos',
                            ],

                        ],/* Fecha submenu Tarefas - BI */
                        ],/* Fecha Tarefas - BI */

                        [
                        'text'    => 'Consulta',
                        'icon'    => 'share',
                        'submenu' => [
                            [
                                'text' => 'Consulta dinâmica (BI)',
                                'icon' => 'male',
                                'url'  => 'Consultadinâmica',
                            ],
                            [
                                'text' => 'Faturamento Realizado',
                                'icon' => 'male',
                                'url'  => 'FaturamentoRealizado',
                            ],

                        ],/* Fecha submenu Consulta - BI */
                        ],/* Fecha Consulta - BI */

                        [
                        'text'    => 'Dados',
                        'icon'    => 'share',
                        'submenu' => [
                             [
                                'text' => 'Filtro dados (Usuário)',
                                'icon' => 'male',
                                'url'  => 'FiltroUsuario',
                            ],

                        ],/* Fecha submenu Dados - BI */
                        ],/* Fecha Dados - BI */

                        [
                        'text'    => 'Especial',
                        'icon'    => 'share',
                        'submenu' => [

                        ],/* Fecha submenu Especial - BI */
                        ],/* Fecha Especial - BI */

                                      ], /* Fecha submenu BI */
                    
                    ], /* Fecha BI */
            
 /* ----------------------------------------------------------------------*/
                    
                    [
                        'text'    => 'METAS',
                        'icon'    => 'line-chart',
                       // 'can'     => 'Painel',
                        'submenu' => [

                    [
                        'text'    => 'Cadastros',
                        'icon'    => 'share',
                        'submenu' => [
                            [
                                'text' => 'Metas',
                                'url'  => 'Metas',
                                //'can'  => 'Categoria',
                            ],
                            [
                                'text' => 'Período',
                                'url'  => 'Periodo',
                                //'can'  => 'Categoria',
                            ],
                            [
                                'text' => 'Config Metas',
                                'url'  => 'ConfigMwetas',
                                //'can'  => 'Categoria',
                            ],
                            [
                                'text' => 'Calendário',
                                'url'  => 'Calendario',
                                //'can'  => 'Categoria',
                            ],
                                
                            ], /* Fecha submenu Cadastro - METAS */

                     ], /* Fecha Cadastro - METAS */

                     [
                        'text'    => 'Tarefas',
                        'icon'    => 'share',
                        'submenu' => [
                            [
                                'text' => 'Importar Meta Linha Prod',
                                'url'  => 'ImportarMetaLinhaProd',
                                //'can'  => 'Categoria',
                            ],
                            [
                                'text' => 'Importar Meta Cliente Atend',
                                'url'  => 'ImportarMetaClienteAtend',
                                //'can'  => 'Categoria',
                            ],


                        ], /* Fecha submenu Tarefas - METAS */
                        ], /* Fecha Tarefas - METAS */

                        [
                        'text'    => 'Consulta',
                        'icon'    => 'share',
                        'submenu' => [
                            [
                                'text' => 'Fat Real X Meta',
                                'url'  => 'FatRealXMeta',
                                //'can'  => 'Categoria',
                            ],
                            [
                                'text' => 'Fat Real X Meta - Agrup Meses',
                                'url'  => 'FatRealXMetaAgrupMeses',
                                //'can'  => 'Categoria',
                            ],

                        ],/* Fecha submenu Consulta - METAS */
                        ],/* Fecha Consulta - METAS */

                        
                        [
                        'text'    => 'Especial',
                        'icon'    => 'share',
                        'submenu' => []
                        ],

                            ], /* Fecha submenu METAS */

                     ], /* Fecha METAS */

                  
                   /* [
                        'text'    => 'Relatórios',
                        'icon'    => 'share',
                        'submenu' => [
                            [
                                'text' => 'Teste Relatório',
                                'url'  => 'relatorio/lista',
                                     ],
                        
                             ],
                    ], */
                     
                     [
                        'text' => 'Logout',
                        'url'  => '/',
                        'icon' => 'share-square',
                         ],


        
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
