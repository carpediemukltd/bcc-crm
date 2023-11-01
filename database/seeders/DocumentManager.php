<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DocumentManager extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DocumentManager::create([
            'title' => 'Completed Application',
            'key_name' => 'Completed_Application',
            'description' => 'Your application may have been completed at time of submission. If you have not already completed an application, please do so <a href="https://eform.pandadoc.com/?eform=956176a8-ecfc-4afa-ba88-fdc33c7a1bf2">here.</a>',
        ]);

        \App\Models\DocumentManager::create([
            'title' => 'Past 6 Months Of Bank Statements',
            'key_name' => 'Past_6_Months_of_Bank_Statements',
            'description' => 'Your corporate bank statements are a fundamental requirement for determining loan qualification. It is important to provide each and every page associated the month\'s full statement (even if it\'s a blank page). This protects against fraud and ensures we, and our bank partners, have an accurate portrayal of your cash flow.',
        ]);

        \App\Models\DocumentManager::create([
            'title' => 'Past 3 Years Of Personal & Corporate Tax Returns',
            'key_name' => 'Past_3_Years_of_Personal_&_Corporate_Tax_Returns',
            'description' => 'Your Personal Tax Returns showcase your ability to service all your personal obligations via your household income. Every page of your return has a purpose. When submitting your personal tax returns for review, please ensure that all pages are present.',
        ]);

        \App\Models\DocumentManager::create([
            'title' => '2023 Year-to-date (or Within 60 Days Max) Profit & Loss',
            'key_name' => 'yearToDateProfitLoss'
        ]);

        \App\Models\DocumentManager::create([
            'title' => '2023 Year-to-date (or Within 60 Days Max) Balance Sheet',
            'key_name' => 'yearToDateProfitBalanceSheet'
        ]);

        \App\Models\DocumentManager::create([
            'title' => 'Completed Debt Schedule',
            'key_name' => 'Completed_Debt_Schedule',
            'description' => 'Your interim financials (profit & loss and balance sheet) provide a year-to-date view for banks to understand how your business is performing in the present year. In addition to your most recently filed corporate tax return, interim financials are an integral component for a banking institution to make a lending decision. Since these are unaudited financials, it\s important to showcase as much strength as possible. Your BCCUSA at consultant will at times make suggestions for slight pivots that can be the difference between qualifying or not. This is value you can only receive from working with BCCUSA.',
        ]);

        \App\Models\DocumentManager::create([
            'title' => 'Personal Financial Statement',
            'key_name' => 'Personal_Financial_Statement'
        ]);

        \App\Models\DocumentManager::create([
            'title' => 'Signed Contingent Consulting Retainer Agreement',
            'key_name' => 'Signed_Contingent_Consulting_Retainer_Agreement',
            'description' => 'Your application may have been completed at time of submission. If you have not already completed an application, please do so <a href="https://eform.pandadoc.com/?eform=956176a8-ecfc-4afa-ba88-fdc33c7a1bf2">here.</a>',
        ]);

        \App\Models\DocumentManager::create([
            'title' => 'Driver\'s License Voided Check',
            'key_name' => 'Driver\'s_License_Voided_Check'
        ]);

        \App\Models\DocumentManager::create([
            'title' => 'Miscellaneous & Formation Documents',
            'key_name' => 'Miscellaneous_&_Formation_Documents'
        ]);

    }
}
