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
        $document_data = [
            [
                'title' => 'Completed Application',
                'key_name' => 'Completed_Application',
                'description' => 'Your application may have been completed at time of submission. If you have not already completed an application, please do so <a href="https://eform.pandadoc.com/?eform=956176a8-ecfc-4afa-ba88-fdc33c7a1bf2">here.</a>',
                'document_group_id' => 1
            ],
            [
                'title' => 'Completed Debt Schedule',
                'key_name' => 'Completed_Debt_Schedule',
                'description' => 'Your interim financials (profit & loss and balance sheet) provide a year-to-date view for banks to understand how your business is performing in the present year. In addition to your most recently filed corporate tax return, interim financials are an integral component for a banking institution to make a lending decision. Since these are unaudited financials, it\s important to showcase as much strength as possible. Your BCCUSA at consultant will at times make suggestions for slight pivots that can be the difference between qualifying or not. This is value you can only receive from working with BCCUSA.',
                'document_group_id' => 1
            ],
            [
                'title' => 'Personal Financial Statement',
                'key_name' => 'Personal_Financial_Statement',
                'document_group_id' => 1
            ],
            [
                'title' => 'Signed Contingent Consulting Retainer Agreement',
                'key_name' => 'Signed_Contingent_Consulting_Retainer_Agreement',
                'description' => 'Your application may have been completed at time of submission. If you have not already completed an application, please do so <a href="https://eform.pandadoc.com/?eform=956176a8-ecfc-4afa-ba88-fdc33c7a1bf2">here.</a>',
                'document_group_id' => 1
            ],
            [
                'title' => 'Miscellaneous & Formation Documents',
                'key_name' => 'Miscellaneous_&_Formation_Documents',
                'document_group_id' => 1
            ],
            [
                'title' => 'Past 6 Months Of Bank Statements',
                'key_name' => 'Past_6_Months_of_Bank_Statements',
                'description' => 'Your corporate bank statements are a fundamental requirement for determining loan qualification. It is important to provide each and every page associated the month\'s full statement (even if it\'s a blank page). This protects against fraud and ensures we, and our bank partners, have an accurate portrayal of your cash flow.',
                'document_group_id' => 2
            ],
            [
                'title' => 'Past 3 Years Of Personal & Corporate Tax Returns',
                'key_name' => 'Past_3_Years_of_Personal_&_Corporate_Tax_Returns',
                'description' => 'Your Personal Tax Returns showcase your ability to service all your personal obligations via your household income. Every page of your return has a purpose. When submitting your personal tax returns for review, please ensure that all pages are present.',
                'document_group_id' => 2
            ],
            [
                'title' => '2023 Year-to-date (or Within 60 Days Max) Profit & Loss',
                'key_name' => 'yearToDateProfitLoss',
                'document_group_id' => 2
            ],
            [
                'title' => '2023 Year-to-date (or Within 60 Days Max) Balance Sheet',
                'key_name' => 'yearToDateProfitBalanceSheet',
                'document_group_id' => 2
            ],
            [
                'title' => '2023 Corporate Tax Return',
                'key_name' => '2023_Corporate_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'title' => '2023 Personal Tax Return',
                'key_name' => '2023_Personal_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'title' => '2022 Corporate Tax Return',
                'key_name' => '2022_Corporate_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'title' => '2022 Personal Tax Return',
                'key_name' => '2022_Personal_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'title' => '2021 Corporate Tax Return',
                'key_name' => '2021_Corporate_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'title' => '2021 Personal Tax Return',
                'key_name' => '2021_Personal_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'title' => '2020 Corporate Tax Return (Affiliate Entity)',
                'key_name' => '2020_Corporate_Tax_Return_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'title' => '2021 Corporate Tax Return (Affiliate Entity)',
                'key_name' => '2021_Corporate_Tax_Return_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'title' => '2022 Corporate Tax Return (Affiliate Entity)',
                'key_name' => '2022_Corporate_Tax_Return_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'title' => '2022 Year-end P&L and Balance Sheet (Affiliate Entity)',
                'key_name' => '2022_Year-end_P&L_and_Balance_Sheet_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'title' => '2023 Year-to-date P&L and Balance Sheet (Affiliate Entity)',
                'key_name' => '2023_Year-to-date_P&L_and_Balance_Sheet_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'title' => 'Driver\'s License Voided Check',
                'key_name' => 'Driver\'s_License_Voided_Check',
                'document_group_id' => 3
            ],
            [
                'title' => 'SBA 1919 Form',
                'key_name' => 'SBA_1919_Form',
                'document_group_id' => 4
            ],
            [
                'title' => 'Use of Proceeds',
                'key_name' => 'Use_of_Proceeds',
                'document_group_id' => 4
            ],
            [
                'title' => 'Certificate of LLC Members',
                'key_name' => 'Certificate_of_LLC_Members',
                'document_group_id' => 4
            ],
            [
                'title' => 'Certificate of Corporate Secretary',
                'key_name' => 'Certificate_of_Corporate_Secretary',
                'document_group_id' => 4
            ],
            [
                'title' => 'Landlord Option to Renew',
                'key_name' => 'Landlord_Option_to_Renew',
                'document_group_id' => 4
            ],
            [
                'title' => 'Professional Resume',
                'key_name' => 'Management_Resume_Template',
                'document_group_id' => 4
            ],
            [
                'title' => 'Business Location Confirmation (Mortgage Statement or Lease Agreement)',
                'key_name' => 'Business_Location_Confirmation_(Mortgage_Statement_or_Lease_Agreement)',
                'document_group_id' => 4
            ],
            [
                'title' => 'Personal Location Confirmation (Mortgage Statement or Lease Agreement)',
                'key_name' => 'Personal_Location_Confirmation_(Mortgage_Statement_or_Lease_Agreement)',
                'document_group_id' => 4
            ],
        ];

        foreach ($document_data as $data){
            \App\Models\DocumentManager::create($data);
        }

    }
}
