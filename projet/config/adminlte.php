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

    'skin' => 'green',

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
                        'can'     => 'ADM',
                        'submenu' => [
                            
                            [
                        'text'    => 'Consultas',
                        'icon'    => 'television',
                        'submenu' => [
                            [
                                'text' => 'Log de Acesso',
                                'icon' => 'key',
                                'url'  => 'adm/consulta/log_acesso',
                                'can'  => 'ADM',    
                            ],
                            [
                                'text' => 'PHP info',
                                'icon' => 'code',
                                'url'  => 'adm/consulta/phpinfo',
                                'can'  => 'ADM',
                            ],    

                                     ], /* Fecha submenu Consulta ADM - BI */
                            ], /* Fecha Consulta ADM - BI */

                            [
                                'text' => 'Permissões',
                                'icon' => 'key',
                                'url'  => 'adm/permissao',
                                'can'  => 'ADM',
                            ],

                            [
                                'text' => 'Grupos',
                                'icon' => 'users',
                                'url'  => 'adm/grupo',
                                'can'  => 'ADM',
                            ],
                            [
                                'text' => 'Usuários',
                                'icon' => 'user',
                                'url'  => 'adm/usuario',
                                'can'  => 'ADM',
                            ],

                            
                            [
                                'text' => 'Empresa',
                                'icon' => 'building',
                                'url'  => 'adm/empresa',
                                'can'  => 'ADM',
                            ],
[
                                'text' => 'Empresa x Usuário',
                                'icon' => 'random',
                                'url'  => 'adm/emp_user',
                                'can'  => 'ADM',
                            ],
                             [
                                'text' => 'Troca Empresa',
                                'icon' => 'cog',
                                'url'  => 'adm/trocaempresa/lista',
                                'can'  => 'ADM',
                            ],    

                            
                            
                                         ], /* Fecha submenu ADM - BI */
                             ], /* Fecha - ADM */
                    [
                        'text'    => 'BI',
                        'icon'    => 'bar-chart',
                        'can'     => 'BI',
                        'submenu' => [

                    [
                        'text'    => 'Cadastros',
                        'icon'    => 'share',
                        'url'     => 'bi/cadastros',
                        'can'     => 'BI',
                        'submenu' => [
                            [
                                'text' => 'Categoria',
                                'url'  => 'bi/cadastro/categoria',
                                'can'  => 'BI',
                                
                            ],
                            [
                                'text' => 'Condição Pagamento',
                                'icon' => 'money',
                                'url'  => 'bi/cadastro/condpagto',
                                'can'  => 'BI',
                            ],
                            [
                                'text' => 'Estabelecimento',
                                'icon' => 'bank',
                                'url'  => 'bi/cadastro/estabelecimento',
                                'can'  => 'BI',
                            ],
                            [
                                'text' => 'Pessoa',
                                'icon' => 'male',
                                'url'  => 'bi/cadastro/pessoa',
                                'can'  => 'BI',
                            ],
                            [
                                'text' => 'Relacionados a Produto',
                                'url'  => 'share',
                                'can'  => 'BI',
                            'submenu' => [
                                [
                                'text' => 'Grupo de Produto',
                                'icon' => 'sitemap',
                                'url'  => 'bi/cadastro/produtogrupo',
                                'can'  => 'BI',
                                ],
                                [
                                'text' => 'Nível do Plano',
                                'url'  => 'bi/cadastro/produtoplanonivel',
                                'can'  => 'BI',
                                ],
                                [
                                'text' => 'Plano Produto',
                                'url'  => 'bi/cadastro/produtoplano',
                                'can'  => 'BI',
                                ], 
                                [
                                'text' => 'Produto',
                                'icon' => 'product-hunt',
                                'url'  => 'bi/cadastro/produto',
                                'can'  => 'BI',
                                ], 
                                [
                                'text' => 'Unidade Produto',
                                'url'  => 'bi/cadastro/produtounidade',
                                'can'  => 'BI',
                                ],       
                                        ],/* Fecha submenu Relacionados a Produto - BI */

                            ], /* Fecha Relacionados a Produto - BI */
                            
                                   
                            [
                                'text' => 'Região',
                                'icon' => 'globe',
                                'url'  => 'bi/cadastro/regiao',
                                'can'  => 'BI',
                            ],
                            [
                                'text' => 'Regional',
                                'icon' => 'globe',
                                'url'  => 'bi/cadastro/regional',
                                'can'  => 'BI',
                            ],
                            [
                                'text' => 'Vendedor Tipo',
                                'url'  => 'bi/cadastro/vendedortipo',
                                'can'  => 'BI',
                            ],
                            [
                                'text' => 'Vendedor',
                                'icon' => 'male',
                                'url'  => 'bi/cadastro/vendedor',
                                'can'  => 'BI',
                            ],
                   
                                      ], /* Fecha submenu Cadastro - BI */
                    
                    ], /* Fecha Cadastro - BI */

                        [
                        'text'    => 'Tarefas',
                        'icon'    => 'tasks',
                        'submenu' => [
                            [
                                'text' => 'Importar Faturamento',
                                'icon' => 'male',
                                'url'  => 'bi/tarefas/impfaturamento',
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
                        'icon'    => 'search',
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
                        'url'     => 'metas/cadastros',
                        'can'     => 'METAS',
                        'submenu' => [

                    [
                        'text'    => 'Cadastros',
                        'icon'    => 'share',
                        'can'     => 'METAS',
                        'submenu' => [
                            [
                                'text' => 'Metas',
                                'url'  => 'metas/cadastro/meta',
                                //'can'  => 'Categoria',
                            ],
                            [
                                'text' => 'Período',
                                'url'  => 'metas/cadastro/periodo',
                                //'can'  => 'Categoria',
                            ],
                            [
                                'text' => 'Configura Metas',
                                'url'  => 'metas/cadastro/configmeta',
                                //'can'  => 'Categoria',
                            ],
                            [
                                'text' => 'Calendário',
                                'icon' => 'calendar',
                                'url'  => 'metas/cadastro/calendario',
                                //'can'  => 'Categoria',
                            ],
                                
                            ], /* Fecha submenu Cadastro - METAS */

                     ], /* Fecha Cadastro - METAS */

                     [
                        'text'    => 'Tarefas',
                        'icon'    => 'tasks',
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
                        'icon'    => 'search',
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


        
    ], /* Fecha Menu Principal */

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
