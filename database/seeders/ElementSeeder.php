<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elements = [
            ['type' => 'text', 'name' => 'about_title_1', 'content' => 'About CAEDO', 'page_id' => 2],
            ['type' => 'text', 'name' => 'about_content_1', 'content' => 'The Community and Enterprise Development Organization (CAEDO) is an Afghan NGO, established in 2023 under the “non-governmental organizations’ law” of Afghanistan. CAEDO believes that there is a need as well as unique opportunity to improve the lives of poor people in Afghanistan. CAEDO is led by experienced development professionals with extensive community development and financial services experience in Afghanistan and other countries.', 'page_id' => 2],
            ['type' => 'text', 'name' => 'about_vision_title', 'content' => 'Vision', 'page_id' => 2],
            ['type' => 'text', 'name' => 'about_vision_content', 'content' => 'Improve the social and economic well-being of disadvantaged people in Afghanistan.', 'page_id' => 2],
            ['type' => 'text', 'name' => 'about_mission_title', 'content' => 'Mission', 'page_id' => 2],
            ['type' => 'text', 'name' => 'about_mission_content', 'content' => 'Provide opportunities for disadvantaged people to access basic health, agriculture, livelihoods, and financial services to improve their social and economic conditions in partnership with other relevant organizations.', 'page_id' => 2],
            ['type' => 'text', 'name' => 'board_chair_title_1', 'content' => 'Message From The Board Chair', 'page_id' => 3],
            ['type' => 'select', 'name' => 'board_chair_id_1', 'content' => 1, 'page_id' => 3],
            ['type' => 'image', 'name' => 'board_chair_image', 'content' => "", 'page_id' => 3],
            ['type' => 'text', 'name' => 'board_chair_message_p1', 'content' => 'Since our establishment in 2023, CAEDO has been driven by a vision of enhancing the social and economic well-being of those in need. We believe that every individual deserves the opportunity to thrive, regardless of their circumstances.', 'page_id' => 3],
            ['type' => 'text', 'name' => 'board_chair_message_p2', 'content' => 'Our mission is to provide access to essential health services, agricultural support, livelihoods, and financial opportunities in partnership with other like-minded organizations, making a meaningful and lasting impact in the communities we serve. Afghanistan is a country of incredible potential, yet it faces unique challenges.', 'page_id' => 3],
            ['type' => 'text', 'name' => 'board_chair_message_p3', 'content' => 'At CAEDO, we understand that sustainable development is not just about providing aid but about empowering individuals and communities to build better futures for themselves. From our initiatives targeting ultra-poor families to programs fostering entrepreneurship and business creation and building shared agent networks, we aim to equip people with the tools they need to achieve self-sufficiency and resilience.', 'page_id' => 3],
            ['type' => 'text', 'name' => 'board_chair_message_p4', 'content' => "Our success is a result of collaborative efforts. I would like to extend my heartfelt gratitude to our dedicated staff, our donors, and our implementing partners. Your unwavering support, expertise, and shared commitment to CAEDO's mission enable us to deliver transformative programs that positively impact lives.", 'page_id' => 3],
            ['type' => 'text', 'name' => 'board_chair_message_p5', 'content' => 'As we move forward, CAEDO remains steadfast in its commitment to innovation and inclusivity. Whether through digital education programs, livelihood studies, or enterprise creation for youth and women, we are continuously seeking new ways to address the evolving needs of the people we serve.', 'page_id' => 3],
            ['type' => 'text', 'name' => 'board_chair_title_1', 'content' => 'We invite you to join us in our journey—whether as a partner, donor, or supporter—and become part of a movement that believes in the power of hope, opportunity, and determination. Together, we can build a brighter future for Afghanistan, one step at a time. Thank you for visiting our website and for your interest in CAEDO’s mission.', 'page_id' => 3],
        ];
    }
}
