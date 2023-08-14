<?php

namespace Database\Seeders;

use App\Models\BasicSettings\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Menu::truncate();
   
        $data =[
            [ 'id' => 1, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => null,  'name'=> 'User Management', 'bn_name' => 'ইউজার ম্যানেজমেন্ট', 'slug'=> '#', 'icon' => '<svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.43425 7.5093H2.278C2.44675 7.5093 2.55925 7.3968 2.58737 7.31243L2.98112 6.32805H5.90612L6.27175 7.31243C6.328 7.48118 6.46862 7.5093 6.58112 7.5093H7.453C7.76237 7.48118 7.87487 7.25618 7.76237 7.03118L5.428 1.4343C5.37175 1.26555 5.3155 1.23743 5.14675 1.23743H3.88112C3.76862 1.23743 3.59987 1.29368 3.57175 1.4343L1.153 7.08743C1.0405 7.2843 1.20925 7.5093 1.43425 7.5093ZM4.47175 2.98118L5.3155 5.17493H3.59987L4.47175 2.98118Z" fill=""></path>
            <path d="M10.1249 2.5031H16.8749C17.2124 2.5031 17.5218 2.22185 17.5218 1.85623C17.5218 1.4906 17.2405 1.20935 16.8749 1.20935H10.1249C9.7874 1.20935 9.47803 1.4906 9.47803 1.85623C9.47803 2.22185 9.75928 2.5031 10.1249 2.5031Z" fill=""></path>
            <path d="M16.8749 6.21558H10.1249C9.7874 6.21558 9.47803 6.49683 9.47803 6.86245C9.47803 7.22808 9.75928 7.50933 10.1249 7.50933H16.8749C17.2124 7.50933 17.5218 7.22808 17.5218 6.86245C17.5218 6.49683 17.2124 6.21558 16.8749 6.21558Z" fill=""></path>
            <path d="M16.875 11.1656H1.77187C1.43438 11.1656 1.125 11.4469 1.125 11.8125C1.125 12.1781 1.40625 12.4594 1.77187 12.4594H16.875C17.2125 12.4594 17.5219 12.1781 17.5219 11.8125C17.5219 11.4469 17.2125 11.1656 16.875 11.1656Z" fill=""></path>
            <path d="M16.875 16.1156H1.77187C1.43438 16.1156 1.125 16.3969 1.125 16.7625C1.125 17.1281 1.40625 17.4094 1.77187 17.4094H16.875C17.2125 17.4094 17.5219 17.1281 17.5219 16.7625C17.5219 16.3969 17.2125 16.1156 16.875 16.1156Z" fill="white"></path>
        </svg>', 'description'=> null, 'status' => true ],
                [ 'id' => 2, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => 1, 'name'=> 'Role', 'bn_name' => 'রোল', 'slug'=> 'role', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 3, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => 1, 'name'=> 'Menu', 'bn_name' => 'মেনু', 'slug'=> 'menu', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 4, 'menu_label_id' => 1, 'order_id' => 3, 'parent_id' => 1, 'name'=> 'Permission', 'bn_name' => 'পারমিশন', 'slug'=> 'permission', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 5, 'menu_label_id' => 1, 'order_id' => 4, 'parent_id' => 1, 'name'=> 'User', 'bn_name' => 'ইউজার', 'slug'=> 'user', 'icon' => null, 'description'=> null, 'status' => true ],
            
            [ 'id' => 6, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => null, 'name'=> 'Basic Settings', 'bn_name' => 'বেসিক সেটিংস', 'slug'=> '#', 'icon' => '<svg class="fill-current" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_130_9807)">
                <path d="M15.7501 0.55835H2.2501C1.29385 0.55835 0.506348 1.34585 0.506348 2.3021V7.53335C0.506348 8.4896 1.29385 9.2771 2.2501 9.2771H15.7501C16.7063 9.2771 17.4938 8.4896 17.4938 7.53335V2.3021C17.4938 1.34585 16.7063 0.55835 15.7501 0.55835ZM16.2563 7.53335C16.2563 7.8146 16.0313 8.0396 15.7501 8.0396H2.2501C1.96885 8.0396 1.74385 7.8146 1.74385 7.53335V2.3021C1.74385 2.02085 1.96885 1.79585 2.2501 1.79585H15.7501C16.0313 1.79585 16.2563 2.02085 16.2563 2.3021V7.53335Z" fill=""></path>
                <path d="M6.13135 10.9646H2.2501C1.29385 10.9646 0.506348 11.7521 0.506348 12.7083V15.8021C0.506348 16.7583 1.29385 17.5458 2.2501 17.5458H6.13135C7.0876 17.5458 7.8751 16.7583 7.8751 15.8021V12.7083C7.90322 11.7521 7.11572 10.9646 6.13135 10.9646ZM6.6376 15.8021C6.6376 16.0833 6.4126 16.3083 6.13135 16.3083H2.2501C1.96885 16.3083 1.74385 16.0833 1.74385 15.8021V12.7083C1.74385 12.4271 1.96885 12.2021 2.2501 12.2021H6.13135C6.4126 12.2021 6.6376 12.4271 6.6376 12.7083V15.8021Z" fill=""></path>
                <path d="M15.75 10.9646H11.8688C10.9125 10.9646 10.125 11.7521 10.125 12.7083V15.8021C10.125 16.7583 10.9125 17.5458 11.8688 17.5458H15.75C16.7063 17.5458 17.4938 16.7583 17.4938 15.8021V12.7083C17.4938 11.7521 16.7063 10.9646 15.75 10.9646ZM16.2562 15.8021C16.2562 16.0833 16.0312 16.3083 15.75 16.3083H11.8688C11.5875 16.3083 11.3625 16.0833 11.3625 15.8021V12.7083C11.3625 12.4271 11.5875 12.2021 11.8688 12.2021H15.75C16.0312 12.2021 16.2562 12.4271 16.2562 12.7083V15.8021Z" fill=""></path>
            </g>
            <defs>
                <clipPath id="clip0_130_9807">
                    <rect width="18" height="18" fill="white" transform="translate(0 0.052124)"></rect>
                </clipPath>
            </defs>
        </svg>', 'description'=> null, 'status' => true ],
                [ 'id' => 7, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => 6, 'name'=> 'Division', 'bn_name' => 'বিভাগ', 'slug'=> 'division', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 8, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => 6, 'name'=> 'District', 'bn_name' => 'জেলা', 'slug'=> 'district', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 9, 'menu_label_id' => 1, 'order_id' => 3, 'parent_id' => 6, 'name'=> 'Upazila', 'bn_name' => 'উপজেলা', 'slug'=> 'upazila', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 10, 'menu_label_id' => 1, 'order_id' => 4, 'parent_id' => 6, 'name'=> 'City Corporation', 'bn_name' => 'সিটি কর্পোরেশন', 'slug'=> 'city-corporation', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 11, 'menu_label_id' => 1, 'order_id' => 5, 'parent_id' => 6, 'name'=> 'Thana', 'bn_name' => 'থানা', 'slug'=> 'thana', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 12, 'menu_label_id' => 1, 'order_id' => 6, 'parent_id' => 6, 'name'=> 'Post Office', 'bn_name' => 'পোস্ট অফিস', 'slug'=> 'post-office', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 13, 'menu_label_id' => 1, 'order_id' => 7, 'parent_id' => 6, 'name'=> 'Union', 'bn_name' => 'ইউনিয়ন', 'slug'=> 'union', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 14, 'menu_label_id' => 1, 'order_id' => 8, 'parent_id' => 6, 'name'=> 'Mouza', 'bn_name' => 'মৌজা', 'slug'=> 'mouza', 'icon' => null, 'description'=> null, 'status' => true ],

            [ 'id' => 15, 'menu_label_id' => 1, 'order_id' => 3, 'parent_id' => null,  'name'=> 'Organizational Management', 'bn_name' => 'প্রাতিষ্ঠানিক ব্যবস্থাপনা', 'slug'=> '#', 'icon' => '<svg class="fill-current" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_130_9814)">
                <path d="M12.7127 0.55835H9.53457C8.80332 0.55835 8.18457 1.1771 8.18457 1.90835V3.84897C8.18457 4.18647 8.46582 4.46772 8.80332 4.46772C9.14082 4.46772 9.45019 4.18647 9.45019 3.84897V1.88022C9.45019 1.82397 9.47832 1.79585 9.53457 1.79585H12.7127C13.3877 1.79585 13.9221 2.33022 13.9221 3.00522V15.0709C13.9221 15.7459 13.3877 16.2802 12.7127 16.2802H9.53457C9.47832 16.2802 9.45019 16.2521 9.45019 16.1959V14.2552C9.45019 13.9177 9.16894 13.6365 8.80332 13.6365C8.43769 13.6365 8.18457 13.9177 8.18457 14.2552V16.1959C8.18457 16.9271 8.80332 17.5459 9.53457 17.5459H12.7127C14.0908 17.5459 15.1877 16.4209 15.1877 15.0709V3.03335C15.1877 1.65522 14.0627 0.55835 12.7127 0.55835Z" fill=""></path>
                <path d="M10.4346 8.60205L7.62207 5.7333C7.36895 5.48018 6.97519 5.48018 6.72207 5.7333C6.46895 5.98643 6.46895 6.38018 6.72207 6.6333L8.46582 8.40518H3.45957C3.12207 8.40518 2.84082 8.68643 2.84082 9.02393C2.84082 9.36143 3.12207 9.64268 3.45957 9.64268H8.49395L6.72207 11.4427C6.46895 11.6958 6.46895 12.0896 6.72207 12.3427C6.83457 12.4552 7.00332 12.5114 7.17207 12.5114C7.34082 12.5114 7.50957 12.4552 7.62207 12.3145L10.4346 9.4458C10.6877 9.24893 10.6877 8.85518 10.4346 8.60205Z" fill=""></path>
            </g>
            <defs>
                <clipPath id="clip0_130_9814">
                    <rect width="18" height="18" fill="white" transform="translate(0 0.052124)"></rect>
                </clipPath>
            </defs>
        </svg>', 'description'=> null, 'status' => true ],
                [ 'id' => 16, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => 15, 'name'=> 'Prospective Organization', 'bn_name' => 'প্রত্যাশী সংস্থা', 'slug'=> 'organization', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 17, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => 15, 'name'=> 'Organization Office', 'bn_name' => 'সংস্থার দপ্তর', 'slug'=> 'organization-office', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 18, 'menu_label_id' => 1, 'order_id' => 3, 'parent_id' => 15, 'name'=> 'Organization Designation', 'bn_name' => 'সংস্থার পদবী', 'slug'=> 'organization-designation', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 19, 'menu_label_id' => 1, 'order_id' => 4, 'parent_id' => 15, 'name'=> 'Organization Officer', 'bn_name' => 'সংস্থার কর্মকর্তা', 'slug'=> 'organization-officer', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 20, 'menu_label_id' => 1, 'order_id' => 5, 'parent_id' => 15, 'name'=> 'Ministry', 'bn_name' => 'মন্ত্রণালয়', 'slug'=> 'ministry', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 61, 'menu_label_id' => 1, 'order_id' => 6, 'parent_id' => 15, 'name'=> 'Section', 'bn_name' => 'সেকশন', 'slug'=> 'section', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 62, 'menu_label_id' => 1, 'order_id' => 7, 'parent_id' => 15, 'name'=> 'Section Officer', 'bn_name' => 'সেকশন কর্মকর্তা', 'slug'=> 'section-officer', 'icon' => null, 'description'=> null, 'status' => true ],

            [ 'id' => 21, 'menu_label_id' => 1, 'order_id' => 4, 'parent_id' => null,  'name'=> 'Project', 'bn_name' => 'প্রকল্প', 'slug'=> '#', 'icon' => '<svg class="fill-current" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_130_9801)">
                <path d="M10.8563 0.55835C10.5188 0.55835 10.2095 0.8396 10.2095 1.20522V6.83022C10.2095 7.16773 10.4907 7.4771 10.8563 7.4771H16.8751C17.0438 7.4771 17.2126 7.39272 17.3251 7.28022C17.4376 7.1396 17.4938 6.97085 17.4938 6.8021C17.2688 3.28647 14.3438 0.55835 10.8563 0.55835ZM11.4751 6.15522V1.8521C13.8095 2.13335 15.6938 3.8771 16.1438 6.18335H11.4751V6.15522Z" fill=""></path>
                <path d="M15.3845 8.7427H9.1126V2.69582C9.1126 2.35832 8.83135 2.07707 8.49385 2.07707C8.40947 2.07707 8.3251 2.07707 8.24072 2.07707C3.96572 2.04895 0.506348 5.53645 0.506348 9.81145C0.506348 14.0864 3.99385 17.5739 8.26885 17.5739C12.5438 17.5739 16.0313 14.0864 16.0313 9.81145C16.0313 9.6427 16.0313 9.47395 16.0032 9.33332C16.0032 8.99582 15.722 8.7427 15.3845 8.7427ZM8.26885 16.3083C4.66885 16.3083 1.77197 13.4114 1.77197 9.81145C1.77197 6.3802 4.47197 3.53957 7.8751 3.3427V9.36145C7.8751 9.69895 8.15635 10.0083 8.52197 10.0083H14.7938C14.6813 13.4958 11.7845 16.3083 8.26885 16.3083Z" fill=""></path>
            </g>
            <defs>
                <clipPath id="clip0_130_9801">
                    <rect width="18" height="18" fill="white" transform="translate(0 0.052124)"></rect>
                </clipPath>
            </defs>
        </svg>', 'description'=> null, 'status' => true ],
                [ 'id' => 22, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => 21, 'name'=> 'Current Project', 'bn_name' => 'চলমান প্রকল্প', 'slug'=> 'project-current', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 23, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => 21, 'name'=> 'Finished Project',  'bn_name' => 'নিষ্পন্ন প্রকল্প', 'slug'=> 'project-finished', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 24, 'menu_label_id' => 1, 'order_id' => 3, 'parent_id' => 21, 'name'=> 'Pending Project',  'bn_name' => 'অমীমাংসিত প্রকল্প', 'slug'=> 'project-pending', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 25, 'menu_label_id' => 1, 'order_id' => 4, 'parent_id' => 21, 'name'=> 'Project Assign',  'bn_name' => 'প্রকল্পের দায়িত্ব অর্পণ', 'slug'=> 'project-assign', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 26, 'menu_label_id' => 1, 'order_id' => 5, 'parent_id' => 21, 'name'=> 'Project Feasibility',  'bn_name' => 'প্রকল্পের সম্ভাব্যতা যাচাই', 'slug'=> 'project-feasibility', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 27, 'menu_label_id' => 1, 'order_id' => 6, 'parent_id' => 21, 'name'=> 'Project Case',  'bn_name' => 'প্রকল্পের কেস তৈরি', 'slug'=> 'project-case', 'icon' => null, 'description'=> null, 'status' => true ],

            [ 'id' => 28, 'menu_label_id' => 1, 'order_id' => 5, 'parent_id' => null, 'name'=> 'Project Management', 'bn_name' => 'প্রকল্প ব্যবস্থাপনা', 'slug'=> '#', 'icon' => '<svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.7499 2.9812H14.2874V2.36245C14.2874 2.02495 14.0062 1.71558 13.6405 1.71558C13.2749 1.71558 12.9937 1.99683 12.9937 2.36245V2.9812H4.97803V2.36245C4.97803 2.02495 4.69678 1.71558 4.33115 1.71558C3.96553 1.71558 3.68428 1.99683 3.68428 2.36245V2.9812H2.2499C1.29365 2.9812 0.478027 3.7687 0.478027 4.75308V14.5406C0.478027 15.4968 1.26553 16.3125 2.2499 16.3125H15.7499C16.7062 16.3125 17.5218 15.525 17.5218 14.5406V4.72495C17.5218 3.7687 16.7062 2.9812 15.7499 2.9812ZM1.77178 8.21245H4.1624V10.9968H1.77178V8.21245ZM5.42803 8.21245H8.38115V10.9968H5.42803V8.21245ZM8.38115 12.2625V15.0187H5.42803V12.2625H8.38115ZM9.64678 12.2625H12.5999V15.0187H9.64678V12.2625ZM9.64678 10.9968V8.21245H12.5999V10.9968H9.64678ZM13.8374 8.21245H16.228V10.9968H13.8374V8.21245ZM2.2499 4.24683H3.7124V4.83745C3.7124 5.17495 3.99365 5.48433 4.35928 5.48433C4.7249 5.48433 5.00615 5.20308 5.00615 4.83745V4.24683H13.0499V4.83745C13.0499 5.17495 13.3312 5.48433 13.6968 5.48433C14.0624 5.48433 14.3437 5.20308 14.3437 4.83745V4.24683H15.7499C16.0312 4.24683 16.2562 4.47183 16.2562 4.75308V6.94683H1.77178V4.75308C1.77178 4.47183 1.96865 4.24683 2.2499 4.24683ZM1.77178 14.5125V12.2343H4.1624V14.9906H2.2499C1.96865 15.0187 1.77178 14.7937 1.77178 14.5125ZM15.7499 15.0187H13.8374V12.2625H16.228V14.5406C16.2562 14.7937 16.0312 15.0187 15.7499 15.0187Z" fill=""></path>
        </svg>', 'description'=> null, 'status' => true ],
                [ 'id' => 29, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => 28, 'name'=> 'Acquisition Class', 'bn_name' => 'ক্ষতিপূরণের শ্রেণিসমূহ', 'slug'=> 'acquisition-class', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 30, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => 28, 'name'=> 'Acquisition Value', 'bn_name' => 'ক্ষতিপূরণের মূল্য', 'slug'=> 'acquisition-value', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 31, 'menu_label_id' => 1, 'order_id' => 3, 'parent_id' => 28, 'name'=> 'Acquisition Rate', 'bn_name' => 'ক্ষতিপূরণের মূল্যহার', 'slug'=> 'acquisition-rate', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 32, 'menu_label_id' => 1, 'order_id' => 4, 'parent_id' => 28, 'name'=> 'Acquisition Attachment', 'bn_name' => 'ক্ষতিপূরণের সংযুক্তি', 'slug'=> 'acquisition-attachment', 'icon' => null, 'description'=> null, 'status' => true ],

            [ 'id' => 33, 'menu_label_id' => 1, 'order_id' => 6, 'parent_id' => null,  'name'=> 'Joint Investigation Report', 'bn_name' => 'যৌথ তদন্ত প্রতিবেদন', 'slug'=> '#', 'icon' => '<svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M1 10c1.5 1.5 5.25 3 9 3s7.5-1.5 9-3m-9-1h.01M2 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1ZM14 5V3a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v2h8Z"/>
          </svg>', 'description'=> null, 'status' => true ],
                [ 'id' => 34, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => 33, 'name'=> 'Dag Shuchi', 'bn_name' => 'দাগ সুচি', 'slug'=> 'dag-shuchi', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 35, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => 33, 'name'=> 'Khatian', 'bn_name' => 'খতিয়ান তৈরী', 'slug'=> 'khatian', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 36, 'menu_label_id' => 1, 'order_id' => 3, 'parent_id' => 33, 'name'=> 'Ownership Addition', 'bn_name' => 'মালিকানা সংযোজন', 'slug'=> 'ownership-addition', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 37, 'menu_label_id' => 1, 'order_id' => 4, 'parent_id' => 33, 'name'=> 'Building Statement', 'bn_name' => 'ঘরবাড়ি / দালানকৌঠা', 'slug'=> 'building-statement', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 38, 'menu_label_id' => 1, 'order_id' => 5, 'parent_id' => 33, 'name'=> 'Trees Statement', 'bn_name' => 'গাছপালার তথ্য বিবরণী', 'slug'=> 'trees-statement', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 39, 'menu_label_id' => 1, 'order_id' => 6, 'parent_id' => 33, 'name'=> 'Agriculture Statement', 'bn_name' => 'কৃষি ফসলের বিবরণ', 'slug'=> 'agriculture-statement', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 40, 'menu_label_id' => 1, 'order_id' => 7, 'parent_id' => 33, 'name'=> 'Pond Statement', 'bn_name' => 'পুকুরের বিবরণ', 'slug'=> 'pond-statement', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 41, 'menu_label_id' => 1, 'order_id' => 8, 'parent_id' => 33, 'name'=> 'Other Statement', 'bn_name' => 'অন্যান্য স্থাপনার বিবরণ', 'slug'=> 'other-statement', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 42, 'menu_label_id' => 1, 'order_id' => 9, 'parent_id' => 33, 'name'=> 'Joint Investigation Results', 'bn_name' => 'যৌথ তদন্ত ফলাফল', 'slug'=> 'joint-investigation-results', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 43, 'menu_label_id' => 1, 'order_id' => 10, 'parent_id' => 33, 'name'=> 'Joint Investigation Field', 'bn_name' => 'যৌথ তদন্ত ফিল্ড বহি', 'slug'=> 'joint-investigation-field', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 44, 'menu_label_id' => 1, 'order_id' => 11, 'parent_id' => 33, 'name'=> 'Class Change', 'bn_name' => 'শ্রেণি পরিবর্তন', 'slug'=> 'class-change', 'icon' => null, 'description'=> null, 'status' => true ],
                
                [ 'id' => 45, 'menu_label_id' => 1, 'order_id' => 7, 'parent_id' => null,   'name'=> 'Notice', 'bn_name' => 'বিজ্ঞপ্তি',  'slug'=> '#', 'icon' => '<svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z"></path>
              </svg>', 'description'=> null, 'status' => true ],

                [ 'id' => 46, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => 45, 'name'=> 'Notice Create', 'bn_name' => 'বিজ্ঞপ্তি তৈরী', 'slug'=> 'notice/create', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 47, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => 45, 'name'=> 'Notice List', 'bn_name' => 'বিজ্ঞপ্তি তালিকা', 'slug'=> 'notice', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 48, 'menu_label_id' => 1, 'order_id' => 3, 'parent_id' => 45, 'name'=> 'Requisition Create', 'bn_name' => 'চাহিদাপত্র তৈরী', 'slug'=> 'requisition/create', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 49, 'menu_label_id' => 1, 'order_id' => 4, 'parent_id' => 45, 'name'=> 'Requisition List', 'bn_name' => 'চাহিদাপত্র তালিকা', 'slug'=> 'requisition', 'icon' => null, 'description'=> null, 'status' => true ],

            [ 'id' => 50, 'menu_label_id' => 1, 'order_id' => 8, 'parent_id' => null,   'name'=> 'Application', 'bn_name' => 'আবেদন',  'slug'=> '#', 'icon' => '<svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v3m5-3v3m5-3v3M1 7h7m1.506 3.429 2.065 2.065M19 7h-2M2 3h16a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm6 13H6v-2l5.227-5.292a1.46 1.46 0 0 1 2.065 2.065L8 16Z"></path>
          </svg>', 'description'=> null, 'status' => true ],
                [ 'id' => 51, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => 50, 'name'=> 'New Application', 'bn_name' => 'নতুন আবেদন', 'slug'=> 'application-draft', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 52, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => 50, 'name'=> 'Finished Application',  'bn_name' => 'নিষ্পন্ন আবেদন', 'slug'=> 'application-finished', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 53, 'menu_label_id' => 1, 'order_id' => 3, 'parent_id' => 50, 'name'=> 'Pending Application',  'bn_name' => 'অমীমাংসিত আবেদন', 'slug'=> 'application-pending', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 54, 'menu_label_id' => 1, 'order_id' => 4, 'parent_id' => 50, 'name'=> 'All Application', 'bn_name' => 'সকল আবেদন', 'slug'=> 'application', 'icon' => null, 'description'=> null, 'status' => true ],
                
            [ 'id' => 55, 'menu_label_id' => 1, 'order_id' => 9, 'parent_id' => null,   'name'=> 'Miss Case', 'bn_name' => 'মিস কেস',  'slug'=> '#', 'icon' => '<svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 14 3-3m-3 3 3 3m-3-3h16v-3m2-7-3 3m3-3-3-3m3 3H3v3"></path>
          </svg>', 'description'=> null, 'status' => true ],
                [ 'id' => 56, 'menu_label_id' => 1, 'order_id' => 1, 'parent_id' => 55, 'name'=> 'Miss Case', 'bn_name' => 'মিস কেস তৈরী', 'slug'=> 'miss-case/create', 'icon' => null, 'description'=> null, 'status' => true ],
                [ 'id' => 57, 'menu_label_id' => 1, 'order_id' => 2, 'parent_id' => 55, 'name'=> 'Miss Case List', 'bn_name' => 'মিস কেস তালিকা', 'slug'=> 'miss-case', 'icon' => null, 'description'=> null, 'status' => true ],

            [ 'id' => 58, 'menu_label_id' => 2, 'order_id' => 10, 'parent_id' => null,   'name'=> 'Estimation', 'bn_name' => 'প্রাক্কলন',  'slug'=> 'estimation', 'icon' => '<svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h9M5 9h5m8-8H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h4l3.5 4 3.5-4h5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"></path>
          </svg>', 'description'=> null, 'status' => true ],
            [ 'id' => 59, 'menu_label_id' => 2, 'order_id' => 11, 'parent_id' => null,   'name'=> 'Firman', 'bn_name' => 'আদেশ পত্র',  'slug'=> 'firman', 'icon' => '<svg class="fill-current" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_130_9756)">
                <path d="M15.7501 0.55835H2.2501C1.29385 0.55835 0.506348 1.34585 0.506348 2.3021V15.8021C0.506348 16.7584 1.29385 17.574 2.27822 17.574H15.7782C16.7345 17.574 17.5501 16.7865 17.5501 15.8021V2.3021C17.522 1.34585 16.7063 0.55835 15.7501 0.55835ZM6.69385 10.599V6.4646H11.3063V10.5709H6.69385V10.599ZM11.3063 11.8646V16.3083H6.69385V11.8646H11.3063ZM1.77197 6.4646H5.45635V10.5709H1.77197V6.4646ZM12.572 6.4646H16.2563V10.5709H12.572V6.4646ZM2.2501 1.82397H15.7501C16.0313 1.82397 16.2563 2.04897 16.2563 2.33022V5.2271H1.77197V2.3021C1.77197 2.02085 1.96885 1.82397 2.2501 1.82397ZM1.77197 15.8021V11.8646H5.45635V16.3083H2.2501C1.96885 16.3083 1.77197 16.0834 1.77197 15.8021ZM15.7501 16.3083H12.572V11.8646H16.2563V15.8021C16.2563 16.0834 16.0313 16.3083 15.7501 16.3083Z" fill=""></path>
            </g>
            <defs>
                <clipPath id="clip0_130_9756">
                    <rect width="18" height="18" fill="white" transform="translate(0 0.052124)"></rect>
                </clipPath>
            </defs>
        </svg>', 'description'=> null, 'status' => true ],
            [ 'id' => 60, 'menu_label_id' => 2, 'order_id' => 12, 'parent_id' => null,   'name'=> 'Award', 'bn_name' => 'রোয়েদাদ /  এওয়ার্ড',  'slug'=> 'award', 'icon' => '<svg class="fill-current" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_130_9763)">
                <path d="M17.0721 7.30835C16.7909 6.99897 16.3971 6.83022 15.9752 6.83022H15.8909C15.7502 6.83022 15.6377 6.74585 15.6096 6.63335C15.5815 6.52085 15.5252 6.43647 15.4971 6.32397C15.4409 6.21147 15.4971 6.09897 15.5815 6.0146L15.6377 5.95835C15.9471 5.6771 16.1159 5.28335 16.1159 4.86147C16.1159 4.4396 15.9752 4.04585 15.6659 3.73647L14.569 2.61147C13.9784 1.99272 12.9659 1.9646 12.3471 2.58335L12.2627 2.6396C12.1784 2.72397 12.0377 2.7521 11.8971 2.69585C11.7846 2.6396 11.6721 2.58335 11.5315 2.55522C11.3909 2.49897 11.3065 2.38647 11.3065 2.27397V2.13335C11.3065 1.26147 10.6034 0.55835 9.73148 0.55835H8.15648C7.7346 0.55835 7.34085 0.7271 7.0596 1.00835C6.75023 1.31772 6.6096 1.71147 6.6096 2.10522V2.21772C6.6096 2.33022 6.52523 2.44272 6.41273 2.49897C6.35648 2.5271 6.32835 2.5271 6.2721 2.55522C6.1596 2.61147 6.01898 2.58335 5.9346 2.49897L5.87835 2.4146C5.5971 2.10522 5.20335 1.93647 4.78148 1.93647C4.3596 1.93647 3.96585 2.0771 3.65648 2.38647L2.53148 3.48335C1.91273 4.07397 1.8846 5.08647 2.50335 5.70522L2.5596 5.7896C2.64398 5.87397 2.6721 6.0146 2.61585 6.09897C2.5596 6.21147 2.53148 6.29585 2.47523 6.40835C2.41898 6.52085 2.3346 6.5771 2.19398 6.5771H2.1096C1.68773 6.5771 1.29398 6.71772 0.984604 7.0271C0.675229 7.30835 0.506479 7.7021 0.506479 8.12397L0.478354 9.69897C0.450229 10.5708 1.15335 11.274 2.02523 11.3021H2.1096C2.25023 11.3021 2.36273 11.3865 2.39085 11.499C2.4471 11.5833 2.50335 11.6677 2.53148 11.7802C2.5596 11.8927 2.53148 12.0052 2.4471 12.0896L2.39085 12.1458C2.08148 12.4271 1.91273 12.8208 1.91273 13.2427C1.91273 13.6646 2.05335 14.0583 2.36273 14.3677L3.4596 15.4927C4.05023 16.1115 5.06273 16.1396 5.68148 15.5208L5.76585 15.4646C5.85023 15.3802 5.99085 15.3521 6.13148 15.4083C6.24398 15.4646 6.35648 15.5208 6.4971 15.549C6.63773 15.6052 6.7221 15.7177 6.7221 15.8302V15.9427C6.7221 16.8146 7.42523 17.5177 8.2971 17.5177H9.8721C10.744 17.5177 11.4471 16.8146 11.4471 15.9427V15.8302C11.4471 15.7177 11.5315 15.6052 11.644 15.549C11.7002 15.5208 11.7284 15.5208 11.7846 15.4927C11.9252 15.4365 12.0377 15.4646 12.1221 15.549L12.1784 15.6333C12.4596 15.9427 12.8534 16.1115 13.2752 16.1115C13.6971 16.1115 14.0909 15.9708 14.4002 15.6615L15.5252 14.5646C16.144 13.974 16.1721 12.9615 15.5534 12.3427L15.4971 12.2583C15.4127 12.174 15.3846 12.0333 15.4409 11.949C15.4971 11.8365 15.5252 11.7521 15.5815 11.6396C15.6377 11.5271 15.7502 11.4708 15.8627 11.4708H15.9471H15.9752C16.819 11.4708 17.5221 10.7958 17.5502 9.92397L17.5784 8.34897C17.5221 8.01147 17.3534 7.5896 17.0721 7.30835ZM16.2284 9.9521C16.2284 10.1208 16.0877 10.2615 15.919 10.2615H15.8346H15.8065C15.1596 10.2615 14.569 10.6552 14.344 11.2177C14.3159 11.3021 14.2596 11.3865 14.2315 11.4708C13.9784 12.0333 14.0909 12.7365 14.5409 13.1865L14.5971 13.2708C14.7096 13.3833 14.7096 13.5802 14.5971 13.6927L13.4721 14.7896C13.3877 14.874 13.3034 14.874 13.2471 14.874C13.1909 14.874 13.1065 14.874 13.0221 14.7896L12.9659 14.7052C12.5159 14.2271 11.8409 14.0865 11.2221 14.3677L11.1096 14.424C10.4909 14.6771 10.0971 15.2396 10.0971 15.8865V15.999C10.0971 16.1677 9.95648 16.3083 9.78773 16.3083H8.21273C8.04398 16.3083 7.90335 16.1677 7.90335 15.999V15.8865C7.90335 15.2396 7.5096 14.649 6.89085 14.424C6.80648 14.3958 6.69398 14.3396 6.6096 14.3115C6.3846 14.199 6.1596 14.1708 5.9346 14.1708C5.54085 14.1708 5.1471 14.3115 4.83773 14.6208L4.78148 14.649C4.66898 14.7615 4.4721 14.7615 4.3596 14.649L3.26273 13.524C3.17835 13.4396 3.17835 13.3552 3.17835 13.299C3.17835 13.2427 3.17835 13.1583 3.26273 13.074L3.31898 13.0177C3.7971 12.5677 3.93773 11.8646 3.6846 11.3021C3.65648 11.2177 3.62835 11.1333 3.5721 11.049C3.3471 10.4583 2.7846 10.0365 2.13773 10.0365H2.05335C1.8846 10.0365 1.74398 9.89585 1.74398 9.7271L1.7721 8.1521C1.7721 8.0396 1.82835 7.98335 1.85648 7.9271C1.8846 7.89897 1.96898 7.84272 2.08148 7.84272H2.16585C2.81273 7.87085 3.40335 7.4771 3.65648 6.88647C3.6846 6.8021 3.74085 6.71772 3.76898 6.63335C4.0221 6.07085 3.9096 5.36772 3.4596 4.91772L3.40335 4.83335C3.29085 4.72085 3.29085 4.52397 3.40335 4.41147L4.52835 3.3146C4.61273 3.23022 4.6971 3.23022 4.75335 3.23022C4.8096 3.23022 4.89398 3.23022 4.97835 3.3146L5.0346 3.39897C5.4846 3.8771 6.1596 4.01772 6.77835 3.7646L6.89085 3.70835C7.5096 3.45522 7.90335 2.89272 7.90335 2.24585V2.13335C7.90335 2.02085 7.9596 1.9646 7.98773 1.90835C8.01585 1.8521 8.10023 1.82397 8.21273 1.82397H9.78773C9.95648 1.82397 10.0971 1.9646 10.0971 2.13335V2.24585C10.0971 2.89272 10.4909 3.48335 11.1096 3.70835C11.194 3.73647 11.3065 3.79272 11.3909 3.82085C11.9815 4.1021 12.6846 3.9896 13.1627 3.5396L13.2471 3.48335C13.3596 3.37085 13.5565 3.37085 13.669 3.48335L14.7659 4.60835C14.8502 4.69272 14.8502 4.7771 14.8502 4.83335C14.8502 4.8896 14.8221 4.97397 14.7659 5.05835L14.7096 5.1146C14.2034 5.53647 14.0627 6.2396 14.2877 6.8021C14.3159 6.88647 14.344 6.97085 14.4002 7.05522C14.6252 7.64585 15.1877 8.06772 15.8346 8.06772H15.919C16.0315 8.06772 16.0877 8.12397 16.144 8.1521C16.2002 8.18022 16.2284 8.2646 16.2284 8.3771V9.9521Z" fill=""></path>
                <path d="M9.00029 5.22705C6.89092 5.22705 5.17529 6.94268 5.17529 9.05205C5.17529 11.1614 6.89092 12.8771 9.00029 12.8771C11.1097 12.8771 12.8253 11.1614 12.8253 9.05205C12.8253 6.94268 11.1097 5.22705 9.00029 5.22705ZM9.00029 11.6114C7.59404 11.6114 6.44092 10.4583 6.44092 9.05205C6.44092 7.6458 7.59404 6.49268 9.00029 6.49268C10.4065 6.49268 11.5597 7.6458 11.5597 9.05205C11.5597 10.4583 10.4065 11.6114 9.00029 11.6114Z" fill=""></path>
            </g>
            <defs>
                <clipPath id="clip0_130_9763">
                    <rect width="18" height="18" fill="white" transform="translate(0 0.052124)"></rect>
                </clipPath>
            </defs>
        </svg>', 'description'=> null, 'status' => true ],


        ];
        DB::table('menus')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
