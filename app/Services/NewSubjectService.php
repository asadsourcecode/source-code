<?php

namespace App\Services;

use App\Models\Page;

class NewSubjectService
{
    private const DEFAULTS = [
        'launching_heading' => "LAUNCHING \"CHARACTER EDUCATION\" AS A SEPARATE SUBJECT FOR MUSLIM INSTITUTIONS, ISLAMIC\nCOMMUNITY PROGRAMMES, HOME-SCHOOLING AND ONLINE-TEACHING",
        'para_1' => 'The programme has been introduced to convey ethics to children pedagogically and effectively. The programme aims at a unique project which is a comprehensive ethical programme that will grow and boost children\'s values while they grow up.',
        'para_2' => 'The curriculum aims to provide the student/pupil with a comprehensive ethical programme that will grow and boost children\'s values while they grow up. This is a programme which contains all the pedagogical ingredients that have so far not been put together with the aim of teaching character building within the Islamic tradition.',
        'para_3' => 'Character Building is a complementary subject taught alongside traditional courses. It is a subject which aims at developing students\'/pupils\' moral, emotional and social skills and competencies, which comprises different areas of skills like self-awareness, empathy, self-control, moral reasoning, self-reflection, problem-solving and behavioural self-regulation.',
        'para_4' => 'Almost no homework and no grading but lots of stories, interactive communication, playing, untraditional activities and exercises, all presented with a touch of entertainment, we hope this will become one of the children\'s favourite subjects.',
        'approach_text' => 'The approach of this Theme, which also is a turning point in the educational traditions of religious education for Muslim communities all over the world. All types of:',
        'quote_text' => '"What is the use of worldly education if our children do not develop into good human beings? This is a subject where the child\'s Muslim identity is strengthened from the roots but delicately and positively."',
        'educationists_text' => 'Educationists have labelled this "as one of the first serious international attempts at Integrated Character Education for Muslims in modern times. A need which has been left unaddressed for too long but is now finally available."',
        'programme_aims_text' => 'The programme aims to motivate and inspire teachers, educators and parents to convey ethics creatively, motivationally, pedagogically in ways that are constructive and have long-term effectiveness.',
        'closing_prayer_text' => 'May this effort, by the grace of Allah, begin a trend of teaching ethics based on Islamic values and pedagogical teaching methods and may this subject contribute to reinforce the values of children in their practical lives.',
    ];

    private const DEFAULT_BULLET_ITEMS = [
        'Stories',
        'Real events',
        'Pictures',
        'Creative and involving pedagogical activities and exercises through dynamic teaching',
        'Training Forums of problem-solving and mediation',
        'Methods of positive reinforcement (which is in line with the teaching of Islam)',
        'Skill training techniques and strategies',
        'Motivational self-reading',
        'Humor and jokes with a point',
        'Self-leading techniques and strategies',
        'Self-motivated self-reading',
        'Appropriately use of quotations and sayings',
        'Delicately placed Quranic verses and Hadiths',
        "Music (kept to a minimum), in an attempt to involve, motivate and develop the pupils' creativity",
    ];

    public function getData(): array
    {
        $page = Page::where('slug', 'new-subject')->first();

        $launchingHeading   = $page?->meta('launching_heading', self::DEFAULTS['launching_heading']) ?? self::DEFAULTS['launching_heading'];
        $para1              = $page?->meta('para_1', self::DEFAULTS['para_1']) ?? self::DEFAULTS['para_1'];
        $para2              = $page?->meta('para_2', self::DEFAULTS['para_2']) ?? self::DEFAULTS['para_2'];
        $para3              = $page?->meta('para_3', self::DEFAULTS['para_3']) ?? self::DEFAULTS['para_3'];
        $para4              = $page?->meta('para_4', self::DEFAULTS['para_4']) ?? self::DEFAULTS['para_4'];
        $approachText       = $page?->meta('approach_text', self::DEFAULTS['approach_text']) ?? self::DEFAULTS['approach_text'];
        $quoteText          = $page?->meta('quote_text', self::DEFAULTS['quote_text']) ?? self::DEFAULTS['quote_text'];
        $educationistsText  = $page?->meta('educationists_text', self::DEFAULTS['educationists_text']) ?? self::DEFAULTS['educationists_text'];
        $programmeAimsText  = $page?->meta('programme_aims_text', self::DEFAULTS['programme_aims_text']) ?? self::DEFAULTS['programme_aims_text'];
        $closingPrayerText  = $page?->meta('closing_prayer_text', self::DEFAULTS['closing_prayer_text']) ?? self::DEFAULTS['closing_prayer_text'];

        $buildingImage = ($page?->meta('building_image'))
            ? asset('admin-storage/' . $page->meta('building_image'))
            : asset('images/building.webp');

        $girlsImage = ($page?->meta('girls_image'))
            ? asset('admin-storage/' . $page->meta('girls_image'))
            : asset('images/girls.webp');

        $rawBullets  = $page?->meta('bullet_items', '') ?? '';
        $bulletItems = $rawBullets
            ? array_values(array_filter(array_map('trim', explode("\n", $rawBullets))))
            : self::DEFAULT_BULLET_ITEMS;

        return compact(
            'page',
            'launchingHeading',
            'para1', 'para2', 'para3', 'para4',
            'buildingImage',
            'approachText', 'bulletItems',
            'quoteText', 'educationistsText', 'programmeAimsText', 'closingPrayerText',
            'girlsImage',
        );
    }
}
