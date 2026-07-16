<?php

namespace App\Services\Website;

use App\Models\Page;

class TeachersTrainingService
{
    public function getData(): array
    {
        $page = Page::active()->where('slug', 'feature-teachers-training')->firstOrFail();

        $bgStyle = $page->meta('bg_image')
            ? 'background-image: url("' . asset('admin-storage/' . $page->meta('bg_image')) . '"); background-size: cover; background-repeat: no-repeat;'
            : '';

        $introPara       = $page->meta('intro_para', 'To show commitment towards inculcating the true essence of this Course, ICE Publishers presents the option of training the teaching faculty of institutions and home school educators. The right purpose, approach, competency, and dedication are vital to meeting the course\'s objectives and reaching the desired effect through focused Teacher Training.');
        $offerHeading    = $page->meta('offer_heading', 'We offer two types of training:');
        $offerPoint1     = $page->meta('offer_point_1', '1) Customised Teacher\'s Training to institutions through Source Code Academia led by Mr.Sahil Adeem.');
        $offerPoint2     = $page->meta('offer_point_2', '2) Teacher Onboarding Training, which is compulsory for home-school teachers, online teachers, and other educators without a formal degree in Education or relevant teaching experience. Our training programme will ensure that both Intellectual Property (IP) as well as General Data Protection Regulation (GDPR) are respected and principally not breached.');
        $section1Heading = $page->meta('section1_heading', '1. Customised Teacher\'s Training through Source Code Academia:');
        $section1Para1   = $page->meta('section1_para_1', 'Raising the standards of thinking and getting the teacher to be a role model is only the beginning. Harbouring the right mindset for teaching this non-traditional subject, building competency, and enhancing the functional capacity of the whole staff is a prime duty of the institutions or educators responsible for building good character within their students.');
        $section1Para2   = $page->meta('section1_para_2', '"Source Code Academy" is a professional, international training company that has joined hands with ICE Publishers to take up this venture.');
        $listHeading     = $page->meta('list_heading', 'With over a decade of training experience and professional counselling, Source Code Academia provides Teacher\'s Training, emphasising areas such as:');
        $bulletList      = $page->meta('bullet_list', '');
        $customCourses   = $page->meta('custom_courses_para', 'We can also offer customised courses to build or fine-tune the competencies required by the faculty to reach the desired results.');
        $scaContactPara  = $page->meta('sca_contact_para', 'For customised Teacher\'s Training Programmes for schools led by Sahil Adeem, contact us or Source Code Academy\'s website directly.');
        $scaImage        = $page->meta('sca_image')
            ? asset('admin-storage/' . $page->meta('sca_image'))
            : asset('images/source-code-academia.png');
        $section2Heading = $page->meta('section2_heading', '2. ICE Publishers Teachers\' Training are booked here.');
        $contactPara     = $page->meta('contact_para', '✏ <a href="/contact" class="text-[rgba(var(--color-body-text-rgb),0.7)]">Contact Us</a>. Don\'t forget to mention <strong class="charcoal-bluish-txt">"Teachers\' Training"</strong> in subject.');
        $licensePara     = $page->meta('license_para', 'Educators wanting to teach our Character Building Course professionally in a classroom setup (whether virtual or physical classroom) must enrol in a short Teacher Training Programme. This will also give them access to supervision and a license to teach our digital books online from our platform.');
        $moreInfoPara    = $page->meta('more_info_para', 'For more information, see <a href="/online-classes" class="text-[rgba(var(--color-body-text-rgb),0.7)]"><strong>Online Classes</strong></a>.');
        $meetingImage    = $page->meta('meeting_image')
            ? asset('admin-storage/' . $page->meta('meeting_image'))
            : asset('images/meeting.webp');

        return compact(
            'page', 'bgStyle',
            'introPara', 'offerHeading', 'offerPoint1', 'offerPoint2',
            'section1Heading', 'section1Para1', 'section1Para2', 'listHeading', 'bulletList', 'customCourses',
            'scaContactPara', 'scaImage',
            'section2Heading', 'contactPara', 'licensePara', 'moreInfoPara',
            'meetingImage',
        );
    }
}
