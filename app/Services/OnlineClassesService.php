<?php

namespace App\Services;

use App\Models\Page;

class OnlineClassesService
{
    public function getData(): array
    {
        $page = Page::active()->where('slug', 'online-classes')->firstOrFail();

        $bgStyle = $page->meta('bg_image')
            ? 'background-image: url("' . asset('admin-storage/' . $page->meta('bg_image')) . '"); background-attachment: fixed; background-size: cover; background-position: top; background-repeat: no-repeat;'
            : '';

        $introText              = $page->meta('intro_text', '');
        $launchingText          = $page->meta('launching_text', 'LAUNCHING SOON!');
        $onlineTeachersHeading  = $page->meta('online_teachers_heading', 'ONLINE TEACHERS');
        $teachWithUsHeading     = $page->meta('teach_with_us_heading', 'Teach with Us');
        $teachWithUsContent     = $page->meta('teach_with_us_content', '');

        $bannerStyle = $page->meta('banner_image')
            ? 'background-image: url("' . asset('admin-storage/' . $page->meta('banner_image')) . '"); background-repeat: no-repeat; background-size: 100% 100%;'
            : '';

        $sections = $page->meta('sections', []);

        $classroomImage = $page->meta('classroom_image')
            ? asset('admin-storage/' . $page->meta('classroom_image'))
            : asset('images/classroom.webp');

        $featuredImage = $page->featured_image
            ? asset('admin-storage/' . $page->featured_image)
            : asset('images/mind-body-spirit.webp');

        return compact(
            'page',
            'bgStyle',
            'featuredImage',
            'introText', 'launchingText', 'onlineTeachersHeading', 'teachWithUsHeading', 'teachWithUsContent',
            'bannerStyle',
            'sections',
            'classroomImage',
        );
    }
}
