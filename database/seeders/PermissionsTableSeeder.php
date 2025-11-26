<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 21,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 22,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 23,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 24,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 25,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 26,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 27,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 28,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 29,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 30,
                'title' => 'expense_create',
            ],
            [
                'id'    => 31,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 32,
                'title' => 'expense_show',
            ],
            [
                'id'    => 33,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 34,
                'title' => 'expense_access',
            ],
            [
                'id'    => 35,
                'title' => 'income_create',
            ],
            [
                'id'    => 36,
                'title' => 'income_edit',
            ],
            [
                'id'    => 37,
                'title' => 'income_show',
            ],
            [
                'id'    => 38,
                'title' => 'income_delete',
            ],
            [
                'id'    => 39,
                'title' => 'income_access',
            ],
            [
                'id'    => 40,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 41,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 42,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 43,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 44,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 45,
                'title' => 'service_access',
            ],
            [
                'id'    => 46,
                'title' => 'service_type_create',
            ],
            [
                'id'    => 47,
                'title' => 'service_type_edit',
            ],
            [
                'id'    => 48,
                'title' => 'service_type_show',
            ],
            [
                'id'    => 49,
                'title' => 'service_type_delete',
            ],
            [
                'id'    => 50,
                'title' => 'service_type_access',
            ],
            [
                'id'    => 51,
                'title' => 'service_detail_create',
            ],
            [
                'id'    => 52,
                'title' => 'service_detail_edit',
            ],
            [
                'id'    => 53,
                'title' => 'service_detail_show',
            ],
            [
                'id'    => 54,
                'title' => 'service_detail_delete',
            ],
            [
                'id'    => 55,
                'title' => 'service_detail_access',
            ],
            [
                'id'    => 56,
                'title' => 'project_create',
            ],
            [
                'id'    => 57,
                'title' => 'project_edit',
            ],
            [
                'id'    => 58,
                'title' => 'project_show',
            ],
            [
                'id'    => 59,
                'title' => 'project_delete',
            ],
            [
                'id'    => 60,
                'title' => 'project_access',
            ],
            [
                'id'    => 61,
                'title' => 'review_create',
            ],
            [
                'id'    => 62,
                'title' => 'review_edit',
            ],
            [
                'id'    => 63,
                'title' => 'review_show',
            ],
            [
                'id'    => 64,
                'title' => 'review_delete',
            ],
            [
                'id'    => 65,
                'title' => 'review_access',
            ],
            [
                'id'    => 66,
                'title' => 'payment_create',
            ],
            [
                'id'    => 67,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 68,
                'title' => 'payment_show',
            ],
            [
                'id'    => 69,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 70,
                'title' => 'payment_access',
            ],
            [
                'id'    => 71,
                'title' => 'website_setup_access',
            ],
            [
                'id'    => 72,
                'title' => 'enquiry_create',
            ],
            [
                'id'    => 73,
                'title' => 'enquiry_edit',
            ],
            [
                'id'    => 74,
                'title' => 'enquiry_show',
            ],
            [
                'id'    => 75,
                'title' => 'enquiry_delete',
            ],
            [
                'id'    => 76,
                'title' => 'enquiry_access',
            ],
            [
                'id'    => 77,
                'title' => 'contact_detail_create',
            ],
            [
                'id'    => 78,
                'title' => 'contact_detail_edit',
            ],
            [
                'id'    => 79,
                'title' => 'contact_detail_show',
            ],
            [
                'id'    => 80,
                'title' => 'contact_detail_delete',
            ],
            [
                'id'    => 81,
                'title' => 'contact_detail_access',
            ],
            [
                'id'    => 82,
                'title' => 'logo_create',
            ],
            [
                'id'    => 83,
                'title' => 'logo_edit',
            ],
            [
                'id'    => 84,
                'title' => 'logo_show',
            ],
            [
                'id'    => 85,
                'title' => 'logo_delete',
            ],
            [
                'id'    => 86,
                'title' => 'logo_access',
            ],
            [
                'id'    => 87,
                'title' => 'brand_create',
            ],
            [
                'id'    => 88,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 89,
                'title' => 'brand_show',
            ],
            [
                'id'    => 90,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 91,
                'title' => 'brand_access',
            ],
            [
                'id'    => 92,
                'title' => 'link_create',
            ],
            [
                'id'    => 93,
                'title' => 'link_edit',
            ],
            [
                'id'    => 94,
                'title' => 'link_show',
            ],
            [
                'id'    => 95,
                'title' => 'link_delete',
            ],
            [
                'id'    => 96,
                'title' => 'link_access',
            ],
            [
                'id'    => 97,
                'title' => 'gallery_create',
            ],
            [
                'id'    => 98,
                'title' => 'gallery_edit',
            ],
            [
                'id'    => 99,
                'title' => 'gallery_show',
            ],
            [
                'id'    => 100,
                'title' => 'gallery_delete',
            ],
            [
                'id'    => 101,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 102,
                'title' => 'team_create',
            ],
            [
                'id'    => 103,
                'title' => 'team_edit',
            ],
            [
                'id'    => 104,
                'title' => 'team_show',
            ],
            [
                'id'    => 105,
                'title' => 'team_delete',
            ],
            [
                'id'    => 106,
                'title' => 'team_access',
            ],
            [
                'id'    => 107,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
