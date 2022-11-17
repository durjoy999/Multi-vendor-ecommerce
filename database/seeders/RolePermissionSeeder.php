<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        $roleSuperAdmin = '';
        if(Role::where('name','SuperAdmin')->first()){
            $roleSuperAdmin = Role::where('name','SuperAdmin')->first();
        }
        else{
            $roleSuperAdmin = Role::create(['name' => 'SuperAdmin','guard_name' => 'admin']);
        }
        //permission list as array
        $permissions = [

            [
                //dashboard permission
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.index',
                ]
            ],
            [
                //admin permission
                'group_name' => 'admin',
                'permissions' => [
                    'admin.index',
                    'admin.create',
                    'admin.store',
                    'admin.edit',
                    'admin.update',
                    'admin.destroy',
                ]
            ],
            [
                //role permission
                'group_name' => 'role',
                'permissions' => [
                    'role.index',
                    'role.create',
                    'role.store',
                    'role.edit',
                    'role.update',
                    'role.destroy',
                ]
            ],
            [
                //profile permission
                'group_name' => 'profile',
                'permissions' => [
                    'profile.edit',
                    'profile.update'
                ]
            ],
            [
                //general settings permission
                'group_name' => 'settings',
                'permissions' => [
                    'generalSettings.index',
                    'generalSettings.update',
                ]
            ],
            [
                //config settings permission
                'group_name' => 'settings',
                'permissions' => [
                    'configSettings.index',
                    'configSettings.optimizeClear',
                    'configSettings.optimize',
                ]
            ],
            [
                //user management
                'group_name' => 'user',
                'permissions' => [
                    'user.all',
                    'user.edit',
                    'user.delete',
                ]
            ],
            [
                //user management
                'group_name' => 'category',
                'permissions' => [
                    'category.all',
                    'category.create',
                    'category.edit',
                    'category.delete',
                ]
            ],
            [
                //user management
                'group_name' => 'subCategory',
                'permissions' => [
                    'subCategory.all',
                    'subCategory.create',
                    'subCategory.edit',
                    'subCategory.delete',
                ]
            ],
            [
                //child  category  management
                'group_name' => 'childCategory',
                'permissions' => [
                    'childCategory.all',
                    'childCategory.create',
                    'childCategory.edit',
                    'childCategory.delete',
                ]
            ],
            [
                //brand  management
                'group_name' => 'brand',
                'permissions' => [
                    'brand.all',
                    'brand.create',
                    'brand.edit',
                    'brand.delete',
                ]
            ],
            [
                //brand  management
                'group_name' => 'product',
                'permissions' => [
                    'product.all',
                    'product.create',
                    'product.edit',
                    'product.delete',
                ]
            ],
            [
                //brand  management
                'group_name' => 'productSpecification',
                'permissions' => [
                    'productSpecification.all',
                    'productSpecification.create',
                    'productSpecification.edit',
                    'productSpecification.delete',
                ]
            ],
            [
                //brand  management
                'group_name' => 'tax',
                'permissions' => [
                    'tax.all',
                    'tax.create',
                    'tax.edit',
                    'tax.delete',
                ]
            ],
            [
                //coupon  management
                'group_name' => 'coupon',
                'permissions' => [
                    'coupon.all',
                    'coupon.create',
                    'coupon.edit',
                    'coupon.delete',
                ]
            ],
            [
                //slider  management
                'group_name' => 'slider',
                'permissions' => [
                    'slider.all',
                    'slider.create',
                    'slider.edit',
                    'slider.delete',
                ]
            ],
            [
                //zeroProduct  management
                'group_name' => 'heroProduct',
                'permissions' => [
                    'heroProduct.index',
                    'heroProduct.update',
                ]
            ],
            [
                //Subscriber  management
                'group_name' => 'subscribe',
                'permissions' => [
                    'subscribe.index',
                    'subscribe.delete',
                ]
            ],
            [
                //contact  management
                'group_name' => 'contact',
                'permissions' => [
                    'contact.all',
                    'contact.delete',
                    'contact.sendMail',
                ]
            ],
            [
                //slider  management
                'group_name' => 'faq',
                'permissions' => [
                    'faq.all',
                    'faq.create',
                    'faq.edit',
                    'faq.delete',
                ]
            ],
            [
                //slider  management
                'group_name' => 'quickLink',
                'permissions' => [
                    'quickLink.all',
                    'quickLink.create',
                    'quickLink.edit',
                    'quickLink.delete',
                ]
            ],
            [
                //slider  management
                'group_name' => 'team',
                'permissions' => [
                    'team.all',
                    'team.create',
                    'team.edit',
                    'team.delete',
                ]
            ],
            [
                //slider  management
                'group_name' => 'userMassage',
                'permissions' => [
                    'userMassage.all',
                    'userMassage.sendMail',
                    'userMassage.delete',
                ]
            ],
            [
                //slider  management
                'group_name' => 'productAttribute',
                'permissions' => [
                    'productAttribute.all',
                    'productAttribute.create',
                    'productAttribute.edit',
                    'productAttribute.delete',
                ]
            ]



        ];

        //asign permisions
        for($i = 0; $i<count($permissions); $i++){
            $permissionGroup = $permissions[$i]['group_name'];

            for($j = 0; $j<count($permissions[$i]['permissions']); $j++){
                //create permission
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                    'guard_name' => 'admin'
                ]);

                //assign permission to role
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }

    }
}
