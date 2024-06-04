<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('logos')->insert([
            'name' => 'আল জান্নাত ইসলামিক এডুকেশন ইনস্টিটিউট',
        ]);

        DB::table('footers')->insert([
            'title' => '&copy; Copyright 2024',
        ]);

        DB::table('school_histories')->insert([
            'title' => 'প্রতিষ্ঠানের ইতিহাস',
            'description' => 'সুনামগঞ্জ জেলাধীন জগন্নাথপুরস্থ এক প্রাচীন জনপদের নাম ইসহাকপুর । এ গ্রামের সম্ভ্রান্ত ধর্মভীরু মুসলিম পরিবার সমূহের মধ্যে শীর্ষস্থানে অবস্থান খান পরিবারের । বংশমর্যাদায় যেমন শ্রেষ্ঠত্বের দাবীদার তেমনি শিক্ষা-দীক্ষায়, ধর্মভীরুতায়.সামাজিক আচার-অনুষ্ঠানে এ জনপদের অন্য সবের উপর রয়েছে এ পরিবারের অতুলনীয় সম্মান। যতদূর জানা যায় মরহুম দেলওয়ার খান ছিলেন এ পরিবারের একজন শিক্ষিত ব্যক্তি ।তিনি যেমন ছিলেন শিক্ষানুরাগী তেমনটি ধর্মানুরাগী এবং পরহেযগার। তাঁর দুই ছেলে সন্তান বড় ছেলের নাম মুজাম্মিল খান এবং ছোট ছেলের নাম মাহমুদ খান। মুজাম্মিল খানের ৩ (তিন) ছেলে সন্তানের মধ্যে বড় ছেলের নাম আব্দুর গাফ্ফার খান মেঝো ছেলের নাম খান জয়নাল আবেদিন ছোট ছেলের নাম মোনায়েম খান। দীর্ঘদিন থেকেই পূর্বপুরুষের ইতিহাস ঐতিহ্য ধরে রাখার মনোস্কামনায় এবং সমাজ সেবার অংশ হিসেবে নিঃস¦ার্থ ভাবে খান জয়নাল আবেদিন ”খান ওয়েলফেয়ার ট্রাস্ট” নামে একটি ট্রাস্ট গঠনের প্রস্তাব খান বংশের সকল সদস্য বরাবর উপস্থাপন করলে তা অনুমোদিত হয় এবং ২০০০ সালে উক্ত” খান ওয়েল ফেয়ার ট্রাস্ট” গঠন করা হয়। গঠনতন্ত্র অনুযায়ী ট্রাস্টের অধীন মাদরাসা,মসজিদ, এতীমখানা, হাসপাতাল সহ অন্যান্য সেবাধর্মী প্রতিষ্ঠান গড়ে তোলার প্রতিশ্রুতির অংশ হিসেবে ২০০২ সালে অত্র ট্রাস্টের অধীন প্রতিষ্ঠা করা হয় আল জান্নাত ইসলামিক এডুকেশন ইনস্টিটিউট নামের এ বিশাল মাদরাসা ।',
        ]);

        DB::table('speech_ones')->insert([
            'title' => 'অধ্যক্ষের বাণী',
            'description' => 'মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বোর্ড, যশোর জনগণের দোরগোড়ায় শিক্ষা সেবা পৌঁছে দেবার লক্ষ্যে যাবতীয় কার্যাদী সম্পাদনে  ডিজিটাল প্রযুক্তি ব্যবহার  ও যশোর শিক্ষাবোর্ডের অধীন সকল প্রতিষ্ঠানের তথ্য অনলাইনে প্রেরণের ব্যবস্থা নেওয়া হয়েছে জেনে আমি আনন্দিত। বৃটিশ ঔপনিবেশিক আমলে মহৎপ্রাণ ব্যক্তি বাবু মথুরানাথ কুন্ডু মহাশয়ের প্রচেষ্টায় ১৮৫৬ খ্রিঃ প্রতিষ্ঠিত হয়েছিল ঐতিহ্যবাহী কুমারখালী এম এন পাইলট (মডেল) মাধ্যমিক বিদ্যালয় । তখন থেকে প্রতিষ্ঠানটি এ এ্লাকায় শিক্ষা প্রসারে  অনন্য ভূমিকা পালন করে চলেছে। উন্নত ও আলোকিত জাতি গঠনে আধুনিক শিক্ষায় শিক্ষিত দক্ষ জনগোষ্ঠী গড়ে তোলার জন্য বিদ্যালয়টি প্রায় ১৬০ বছর ব্যাপী পালন করছে মহান দায়িত্ব।

            আগামীতেও এই বিদ্যালয়ের সাথে সংশ্লিষ্ট বিজ্ঞ শিক্ষকমন্ডলী ও শিক্ষানুরাগী ব্যাক্তিবর্গ তাদের দায়িত্ব যথাযথভাবে পালন করে বিদ্যালয়টির সুনাম অক্ষুন্ন রাখতে সচেষ্ট থাকবেন বলে আমি আশাবাদী।
            আমি এই বিদ্যালয়টির সার্বিক সাফল্য কামনা করি এবং সংশ্লিষ্ট সকলকে জানাই আন্তরিক মোবারক বাদ।

            প্রধান শিক্ষক
            কুমারখালী এম এন পাইলট মাধ্যমিক বিদ্যালয়
            কুমারখালী, কুষ্টিয়া।',
        ]);

        DB::table('speech_twos')->insert([
            'title' => 'উপধ্যক্ষের বাণী',
            'description' => 'বাংলাদেশের শিক্ষা ব্যবস্থার একটি পূর্ণাঙ্গ ধারা মাদরাসা শিক্ষা। সাধারণ শিক্ষার পাশপাশি সমান্তরালভাবে এটি বয়ে চলেছে দীর্ঘদিন ধরে এবং এ দেশের জন-মানসে তার স্থান করে নিয়েছে সুরক্ষিত ও সুদৃঢ়ভাবে। ধর্মীয় শিক্ষা ও জাগতিক শিক্ষা দুটি পরস্পরের পরিপুরক। এ সমন্বিত ইসলামী শিক্ষা ব্যবস্থার প্রতিষ্ঠানিক রুপই হচ্ছে মাদরাসা শিক্ষা। ইহলৌকিক উন্নতির সাথে সাথে পারলৌকিক মুক্তির পথ দেখাতেই প্রতিষ্ঠা করা হয়েছে “আল জান্নাত ইসলামিক এডুকেশন ইনস্টিটিউট”। বাংলাদেশের দেড় সহস্রাধিক ফাযিল মাদরাসার মিছিলে ২০০২ সালে প্রতিষ্ঠিত এ মাদরাসাটি বিগত ২০১৬ সালে যোগ হলো।

            মাদরাসা শিক্ষা ব্যবস্থাকে সার্বজনীন মানসম্মত করার জন্য অপরিহার্য হচ্ছে অঙ্গীকার ও সার্বিক গুণগত ব্যবস্থাপনা এবং সৃজনশীল ও উদ্ভাবনীমূলক শিক্ষা কার্যক্রম পরিচালনার জন্য দরকার অনুকুল অবকাঠামো ও পরিবেশ। আমরা অঙ্গীকারাবদ্ধ, গুণগত ব্যবস্থাপনায় সদা সচেষ্ঠ এবং অবকাঠামো ও পরিবেশগত দিক দিয়ে মাশাল্লাহ্ জেলায় শ্রেষ্ঠত্বের দাবিদার। তাই, আসুন আমরা যার যার অবস্থান থেকে সাহায্য করে যেমন, কেউ ছাত্র-ছাত্রী দিয়ে, কেউ মেধা দিয়ে, কেউবা পরামর্শ দিয়ে মাদরাসাটিকে সামনের দিকে এগিয়ে নিয়ে যাই। আল্লাহ আমাদের সহায় হউন। আমিন!

            উপধ্যক্ষের বাণী
            কুমারখালী এম এন পাইলট মাধ্যমিক বিদ্যালয়
            কুমারখালী, কুষ্টিয়া।',
        ]);

        // End of code
    }
}
