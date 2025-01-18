<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'field_name' => 'top_nav_bar_email',
                'field_value' => 'info@caedo.org',
                'type'      => 'string',
            ],
            [
                'field_name' => 'top_nav_bar_address',
                'field_value' => 'Apartment # 6, Ansari Plaza, Shahr-e-Naw, Kabul, Afg',
                'type'      => 'string',
            ],
            [
                'field_name' => 'top_nav_bar_facebook',
                'field_value' => '#',
                'type'      => 'string',
            ],
            [
                'field_name' => 'top_nav_bar_linkedin',
                'field_value' => '#',
                'type'      => 'string',
            ],
            [
                'field_name' => 'top_nav_bar_instagram',
                'field_value' => '#',
                'type'      => 'string',
            ],
            [
                'field_name' => 'top_nav_bar_x',
                'field_value' => '#',
                'type'      => 'string',
            ],
            [
                'field_name' => 'top_nav_bar_phone',
                'field_value' => '#',
                'type'      => 'string',
            ],
            [
                'field_name' => 'main_menu_logo',
                'field_value' => '',
                'type'      => 'image',
                'description' => ''
            ],
            [
                'field_name' => 'home_slider_slogan',
                'field_value' => 'Building Sustainable Livelihoods for Communities.',
                'type'      => 'string',
                
            ],
            [
                'field_name' => 'home_slider_image1',
                'field_value' => '',
                'type'      => 'image',
                'category' => 'Home Slider',
                'description' => '1920X804'
            ],
            [
                'field_name' => 'home_slider_image2',
                'field_value' => '',
                'type'      => 'image',
                'category' => 'Home Slider',
                'description' => '1920X804'
            ],
            [
                'field_name' => 'home_slider_image3',
                'field_value' => '',
                'type'      => 'image',
                'category' => 'Home Slider',
                'description' => '1920X804'
            ],
            [
                'field_name' => 'home_event_subtitle',
                'field_value' => '',
                'type'      => 'string',
                'description' => '1920X804'
            ],
            [
                'field_name' => 'footer_logo',
                'field_value' => '',
                'type'      => 'image',
            ],
            [
                'field_name' => 'footer_logan',
                'field_value' => 'Building Sustainable Livelihoods for Communities.',
                'type'      => 'string',
            ],
            [
                'field_name' => 'footer_address',
                'field_value' => 'Apartment # 6, Ansari Plaza, Kolula Pushta Road, Street 2, Ansari, Shahr-e-Naw, District # 4, Kabul, Afghanistan',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_overview_top_image',
                'field_value' => '',
                'description' => '1920X784',
                'type'      => 'image',
            ],
            [
                'field_name' => 'about_overview_top_title',
                'field_value' => 'About CAEDO',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_overview_top_paragraph',
                'field_value' => 'The Community and Enterprise Development Organization (CAEDO) is an Afghan NGO, established in 2023 under the “non-governmental organizations’ law” of Afghanistan. CAEDO believes that there is a need as well as unique opportunity to improve the lives of poor people in Afghanistan. CAEDO is led by experienced development professionals with extensive community development and financial services experience in Afghanistan and other countries.',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_overview_vision_text',
                'field_value' => 'Improve the social and economic well-being of disadvantaged people in Afghanistan.',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_overview_mission_text',
                'field_value' => 'Provide opportunities for disadvantaged people to access basic health, agriculture, livelihoods, and financial services to improve their social and economic conditions in partnership with other relevant organizations.',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_overview_board_title',
                'field_value' => 'Board Of Directors',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_overview_board_subtitle',
                'field_value' => 'CAEDO’s Board of Directors is comprised of seasoned professionals with decades of experience in development, financial inclusion, Islamic banking, and governance.',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_overview_team_title',
                'field_value' => 'The Management',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_overview_team_subtitle',
                'field_value' => 'CAEDO’s staff comprises experienced professionals with diverse expertise in strategic leadership, financial management, and digital financial services.',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_board_chair_message_image',
                'field_value' => '',
                'type'      => 'image',
                'description' => '200X250'
            ],
            [
                'field_name' => 'about_board_chair_message_name',
                'field_value' => 'Stephen Rasmussen',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_board_chair_message_title',
                'field_value' => 'Chairman of the Board',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_board_chair_message_p1',
                'field_value' => 'The Community and Enterprise Development Organization was established in 2023. Our aim is to build sustainable livelihoods for people and communities.',
                'type'      => 'string',
                'category'  => 'Board Chair message'
            ],
            [
                'field_name' => 'about_board_chair_message_p2',
                'field_value' => 'Our work encompasses livelihoods, financial services, health services, and agriculture. In 2024 we began initiatives to improve livelihoods for extremely poor families to programs, fostering entrepreneurship and business creation for youth, and building a shared agent network to improve the reach of digital financial services.',
                'type'      => 'string',
                'category'  => 'Board Chair message'
            ],
            [
                'field_name' => 'about_board_chair_message_p3',
                'field_value' => 'Our approach is to work in partnership with other like-minded organizations to achieve positive outcomes. We believe that committed and determined organizations working together can create opportunities for people and hope for a better future.',
                'type'      => 'string',
                'category'  => 'Board Chair message'
            ],
            [
                'field_name' => 'about_board_chair_message_p4',
                'field_value' => 'We extend our heartfelt gratitude to the Islamic Emirate of Afghanistan, our partners, and donors for their continued support and commitment to our shared mission.',
                'type'      => 'string',
                'category'  => 'Board Chair message'
            ],
            [
                'field_name' => 'about_accountability_policy_top_title',
                'field_value' => 'Policies',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_accountability_policy_top_text',
                'field_value' => 'CAEDO has developed and implemented several policies to ensure transparency, accountability, and operational efficiency. These include:',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_stakeholder_top_title',
                'field_value' => 'Stakeholders',
                'type'      => 'string',
            ],
            [
                'field_name' => 'about_stakeholder_top_text',
                'field_value' => 'We ready for your requesr lobal management consulting firm that serves a private',
                'type'      => 'string',
            ],
            [
                'field_name' => 'our_work_key_area_of_focus_top_title',
                'field_value' => 'Goals And Areas Of Work Of The Organization',
                'type'      => 'string',
            ],
            [
                'field_name' => 'our_work_key_area_of_focus_top_text',
                'field_value' => 'As a social, non-governmental, and non-for-profit organization, the overall goal of the organization is rendering services to the deprived people of the society and without consideration of any political, ethnic, racial, lingual and regional discrimination; which includes the followings:',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_top_title',
                'field_value' => 'About Mutahid DFI',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_top_text',
                'field_value' => 'Mutahid Development Finance Institution, established in April 2011 and one of the leading microfinance institutions in Afghanistan, is dedicated to empowering entrepreneurs and driving economic growth. Through our Shariah compliant financial solutions, comprehensive guidance, and commitment to financial inclusion, we are transforming the landscape of entrepreneurship in the country. Join us as we continue to make a positive impact, one business at a time.',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_coutnter_title',
                'field_value' => 'Latest updates on Mutahid',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_coutnter_active_borrowers_number',
                'field_value' => '9342',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_coutnter_active_borrowers_title',
                'field_value' => 'ACTIVE BORROWERS',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_coutnter_active_gross_loan_number',
                'field_value' => '9342',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_coutnter_active_gross_loan_title',
                'field_value' => 'ACTIVE BORROWERS',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_coutnter_active_loan_outstanding_number',
                'field_value' => '9342',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_coutnter_active_loan_outstanding_title',
                'field_value' => 'ACTIVE BORROWERS',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_coutnter_active_women_number',
                'field_value' => '9342',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_coutnter_active_women_title',
                'field_value' => 'ACTIVE BORROWERS',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_repot_title',
                'field_value' => 'About Mutahid DFI',
                'type'      => 'string',
            ],
            [
                'field_name' => 'institution_we_own_mutahid_dfi_report_text',
                'field_value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an",
                'type'      => 'string',
            ],
            [
                'field_name' => 'get_involved_donate_text',
                'field_value' => "At CAEDO, we believe in the transformative power of collective action to build sustainable livelihoods and brighter futures for Afghanistan's most vulnerable communities. By joining hands with us as a donor, partner, or supporter, you can directly contribute to creating meaningful change. To make your contribution effortless and impactful, please contact us through “info@caedo.org” for a smooth and secure transaction process. Together, we can turn challenges into opportunities and dreams into realities.",
                'type'      => 'string',
            ],
            
            
        ];

        foreach ($settings as $key => $value) {
            Setting::create($value);
        }
    }
}
